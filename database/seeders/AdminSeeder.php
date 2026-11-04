<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
 public function run(): void { User::updateOrCreate(['email'=>'admin@k3compliance.test'],['name'=>'Administrator K3','password'=>Hash::make('ChangeMe!2026'),'role'=>'admin']); }
}
