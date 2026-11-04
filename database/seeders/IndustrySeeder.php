<?php
namespace Database\Seeders;
use App\Models\Industry;
use Illuminate\Database\Seeder;
class IndustrySeeder extends Seeder
{
 public function run(): void { foreach(['Manufaktur','Konstruksi','Pertambangan','Pergudangan dan Logistik','Perkantoran','Kimia dan Petrokimia','Kesehatan','Pendidikan','Lainnya'] as $name) Industry::firstOrCreate(['name'=>$name]); }
}
