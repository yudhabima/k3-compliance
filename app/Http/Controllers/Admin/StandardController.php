<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{K3Standard,K3Indicator};
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class StandardController extends Controller
{
    public function index(): View { return view('admin.standards.index',['items'=>K3Standard::with('indicator')->latest()->paginate(20)]); }
    public function create(): View { return view('admin.standards.form',['item'=>new K3Standard(),'indicators'=>K3Indicator::orderBy('name')->get()]); }
    public function store(Request $r): RedirectResponse { K3Standard::create($this->data($r)); return redirect()->route('admin.standards.index')->with('success','Standar ditambahkan.'); }
    public function edit(K3Standard $standard): View { return view('admin.standards.form',['item'=>$standard,'indicators'=>K3Indicator::orderBy('name')->get()]); }
    public function update(Request $r,K3Standard $standard): RedirectResponse { $standard->update($this->data($r)); return redirect()->route('admin.standards.index')->with('success','Standar diperbarui.'); }
    public function destroy(K3Standard $standard): RedirectResponse { $standard->delete(); return back()->with('success','Standar dihapus.'); }
    private function data(Request $r): array { return $r->validate(['indicator_id'=>'required|exists:k3_indicators,id','fire_risk_class'=>'nullable|string|max:30','minimum_value'=>'required|numeric|min:0','operator'=>'required|in:>=,=','regulation_name'=>'nullable|string|max:180','regulation_reference'=>'nullable|string|max:180','notes'=>'nullable|string|max:1000','is_active'=>'nullable|boolean']); }
}
