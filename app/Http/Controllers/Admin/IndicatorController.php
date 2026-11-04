<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\K3Indicator;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class IndicatorController extends Controller
{
    public function index(): View { return view('admin.indicators.index',['items'=>K3Indicator::orderBy('group_name')->paginate(20)]); }
    public function create(): View { return view('admin.indicators.form',['item'=>new K3Indicator()]); }
    public function store(Request $r): RedirectResponse { K3Indicator::create($this->data($r)); return redirect()->route('admin.indicators.index')->with('success','Indikator ditambahkan.'); }
    public function edit(K3Indicator $indicator): View { return view('admin.indicators.form',['item'=>$indicator]); }
    public function update(Request $r,K3Indicator $indicator): RedirectResponse { $indicator->update($this->data($r)); return redirect()->route('admin.indicators.index')->with('success','Indikator diperbarui.'); }
    public function destroy(K3Indicator $indicator): RedirectResponse { $indicator->delete(); return back()->with('success','Indikator dihapus.'); }
    private function data(Request $r): array { return $r->validate(['code'=>'required|string|max:60','group_name'=>'required|string|max:80','name'=>'required|string|max:160','unit'=>'nullable|string|max:40','assessment_method'=>'required|in:ratio,boolean,frequency','description'=>'nullable|string|max:1000','is_active'=>'nullable|boolean']); }
}
