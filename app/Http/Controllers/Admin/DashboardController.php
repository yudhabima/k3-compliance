<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Assessment,Company,K3Indicator};
use Illuminate\View\View;
class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'companies' => Company::count(), 'assessments' => Assessment::count(),
            'indicators' => K3Indicator::where('is_active',true)->count(),
            'latest' => Assessment::with('company')->latest()->take(8)->get(),
        ]);
    }
}
