<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\View\View;
class AssessmentController extends Controller
{
    public function index(): View { return view('admin.assessments.index',['items'=>Assessment::with('company')->latest()->paginate(20)]); }
    public function show(Assessment $assessment): View { $assessment->load(['company.industry','details.indicator']); return view('admin.assessments.show',compact('assessment')); }
}
