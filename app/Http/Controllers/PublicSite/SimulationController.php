<?php
namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\{Assessment, AssessmentDetail, Company, Industry, K3Indicator, K3Standard};
use App\Services\K3CalculationService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SimulationController extends Controller
{
    public function create(): View
    {
        return view('public.simulation', [
            'industries' => Industry::orderBy('name')->get(),
            'indicators' => K3Indicator::where('is_active', true)->orderBy('group_name')->get(),
        ]);
    }

    public function store(Request $request, K3CalculationService $calculator): RedirectResponse
    {
        $validated = $request->validate([
            'company_name' => ['required','string','max:180'],
            'industry_id' => ['required','exists:industries,id'],
            'location' => ['nullable','string','max:180'],
            'employee_count' => ['required','integer','min:1','max:1000000'],
            'hazard_summary' => ['nullable','string','max:2000'],
            'fire_risk_class' => ['required','in:Ringan,Sedang I,Sedang II,Sedang III,Berat'],
            'actual' => ['required','array'],
            'actual.*' => ['nullable','numeric','min:0','max:1000000'],
        ]);

        $assessment = DB::transaction(function () use ($validated, $calculator) {
            $company = Company::create([
                'name' => $validated['company_name'], 'industry_id' => $validated['industry_id'],
                'location' => $validated['location'] ?? null, 'employee_count' => $validated['employee_count'],
                'hazard_summary' => $validated['hazard_summary'] ?? null,
                'fire_risk_class' => $validated['fire_risk_class'],
            ]);

            $assessment = Assessment::create([
                'company_id' => $company->id, 'public_token' => Str::random(40),
                'assessment_date' => now()->toDateString(), 'status' => 'draft',
            ]);

            $compliant = $partial = $nonCompliant = 0;
            $indicators = K3Indicator::where('is_active', true)->get();
            foreach ($indicators as $indicator) {
                $actual = (float) ($validated['actual'][$indicator->id] ?? 0);
                $standard = K3Standard::where('indicator_id', $indicator->id)
                    ->where('is_active', true)
                    ->where(function ($q) use ($validated) { $q->whereNull('fire_risk_class')->orWhere('fire_risk_class', $validated['fire_risk_class']); })
                    ->first();
                $standardValue = (float) ($standard?->minimum_value ?? 0);

                if ($indicator->code === 'FIRE_TEAM_D') {
                    $standardValue = $calculator->personnelRequirement((int) $validated['employee_count']);
                }
                $result = $calculator->evaluate($actual, $standardValue, $indicator->assessment_method);
                if ($result['status'] === 'Memenuhi Standar') $compliant++;
                elseif ($result['status'] === 'Kurang dari Standar') $partial++;
                else $nonCompliant++;

                AssessmentDetail::create([
                    'assessment_id' => $assessment->id, 'indicator_id' => $indicator->id,
                    'standard_id' => $standard?->id, 'actual_value' => $actual,
                    'standard_value' => $standardValue, 'percentage' => $result['percentage'],
                    'status' => $result['status'], 'gap_value' => $result['gap'],
                ]);
            }
            $total = $indicators->count();
            $assessment->update([
                'total_indicators' => $total, 'compliant_count' => $compliant,
                'partial_count' => $partial, 'non_compliant_count' => $nonCompliant,
                'overall_percentage' => $total ? round(($compliant + ($partial * 0.5)) / $total * 100, 2) : 0,
                'status' => 'submitted',
            ]);
            return $assessment;
        });

        return redirect()->route('infographic.show', $assessment->public_token);
    }
}
