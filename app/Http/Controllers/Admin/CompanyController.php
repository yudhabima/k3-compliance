<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Company,Industry};
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class CompanyController extends Controller
{
    public function index(): View { return view('admin.companies.index',['companies'=>Company::with('industry')->latest()->paginate(15)]); }
    public function create(): View { return view('admin.companies.form',['company'=>new Company(),'industries'=>Industry::orderBy('name')->get()]); }
    public function store(Request $r): RedirectResponse { $data=$this->validated($r); Company::create($data); return redirect()->route('admin.companies.index')->with('success','Perusahaan ditambahkan.'); }
    public function edit(Company $company): View { return view('admin.companies.form',compact('company')+['industries'=>Industry::orderBy('name')->get()]); }
    public function update(Request $r, Company $company): RedirectResponse { $company->update($this->validated($r)); return redirect()->route('admin.companies.index')->with('success','Data diperbarui.'); }
    public function destroy(Company $company): RedirectResponse { $company->delete(); return back()->with('success','Perusahaan dihapus.'); }
    private function validated(Request $r): array { return $r->validate(['name'=>'required|string|max:180','industry_id'=>'required|exists:industries,id','location'=>'nullable|string|max:180','employee_count'=>'required|integer|min:1','hazard_summary'=>'nullable|string|max:2000','fire_risk_class'=>'required|string|max:30']); }
}
