<?php
namespace Database\Seeders;
use App\Models\{K3Indicator,K3Standard};
use Illuminate\Database\Seeder;
class K3StandardSeeder extends Seeder
{
 public function run(): void {
  // Demonstration defaults only. Verify every threshold and legal basis before production use.
  $defaults=['FIRE_TEAM_TRAINED'=>0,'FIRE_EXPERT'=>0,'APAR'=>1,'HYDRANT'=>0,'SPRINKLER'=>1,'ALARM'=>1,'DETECTOR'=>1,'EVAC_ROUTE'=>1,'EMERGENCY_DOOR'=>1,'ASSEMBLY_POINT'=>1,'SAFETY_SIGN'=>1,'EMERGENCY_PLAN'=>1,'FIRE_DRILL'=>1,'APAR_INSPECTION'=>2];
  foreach($defaults as $code=>$value){$indicator=K3Indicator::where('code',$code)->first();if($indicator) K3Standard::firstOrCreate(['indicator_id'=>$indicator->id,'fire_risk_class'=>null],['minimum_value'=>$value,'operator'=>'>=','regulation_name'=>'Perlu verifikasi admin/ahli K3','regulation_reference'=>null,'notes'=>'Nilai awal demonstrasi; verifikasi regulasi dan konteks tempat kerja.','is_active'=>true]);}
 }
}
