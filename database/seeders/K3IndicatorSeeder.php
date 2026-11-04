<?php
namespace Database\Seeders;
use App\Models\K3Indicator;
use Illuminate\Database\Seeder;
class K3IndicatorSeeder extends Seeder
{
 public function run(): void {
  $items=[
   ['FIRE_TEAM_D','Personel','Petugas peran kebakaran tingkat D','orang','ratio'],
   ['FIRE_TEAM_TRAINED','Personel','Petugas kebakaran terlatih/bersertifikat','orang','ratio'],
   ['FIRE_EXPERT','Personel','Ahli K3 spesialis kebakaran','orang','ratio'],
   ['APAR','Peralatan','Jumlah APAR tersedia','unit','ratio'],
   ['HYDRANT','Peralatan','Hidran tersedia','unit','ratio'],
   ['SPRINKLER','Peralatan','Sprinkler tersedia/berfungsi','unit','boolean'],
   ['ALARM','Peralatan','Alarm kebakaran berfungsi','unit','boolean'],
   ['DETECTOR','Peralatan','Detektor kebakaran berfungsi','unit','boolean'],
   ['EVAC_ROUTE','Evakuasi','Jalur evakuasi tersedia dan sesuai','status','boolean'],
   ['EMERGENCY_DOOR','Evakuasi','Pintu darurat tersedia dan sesuai','status','boolean'],
   ['ASSEMBLY_POINT','Evakuasi','Titik kumpul tersedia','status','boolean'],
   ['SAFETY_SIGN','Evakuasi','Rambu evakuasi tersedia','status','boolean'],
   ['EMERGENCY_PLAN','Prosedur','Rencana tanggap darurat tersedia','status','boolean'],
   ['FIRE_DRILL','Prosedur','Simulasi kebakaran per tahun','kali/tahun','frequency'],
   ['APAR_INSPECTION','Prosedur','Inspeksi APAR per tahun','kali/tahun','frequency'],
  ];
  foreach($items as [$code,$group,$name,$unit,$method]) K3Indicator::firstOrCreate(['code'=>$code],['group_name'=>$group,'name'=>$name,'unit'=>$unit,'assessment_method'=>$method,'is_active'=>true]);
 }
}
