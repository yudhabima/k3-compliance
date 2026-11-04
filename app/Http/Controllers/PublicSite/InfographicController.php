<?php
namespace App\Http\Controllers\PublicSite;
use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\View\View;
class InfographicController extends Controller
{
    public function show(Assessment $assessment): View
    {
        $assessment->load(['company.industry','details.indicator']);
        return view('public.infographic', compact('assessment'));
    }
}
