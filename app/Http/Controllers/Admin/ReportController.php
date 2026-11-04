<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;
class ReportController extends Controller
{
    public function index(): View { return view('admin.reports.index',['count'=>Assessment::count()]); }
    public function export(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $out=fopen('php://output','w'); fputcsv($out,['Tanggal','Perusahaan','Pekerja','Status','Kepatuhan (%)']);
            Assessment::with('company')->orderByDesc('id')->chunk(200,function($rows) use($out){ foreach($rows as $a) fputcsv($out,[$a->assessment_date?->format('Y-m-d'),$a->company?->name,$a->company?->employee_count,$a->status,$a->overall_percentage]); });
            fclose($out);
        },'laporan-k3.csv',['Content-Type'=>'text/csv']);
    }
}
