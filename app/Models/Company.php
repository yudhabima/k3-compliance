<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Company extends Model
{
    protected $fillable = ['name','industry_id','location','employee_count','hazard_summary','fire_risk_class'];
    public function industry() { return $this->belongsTo(Industry::class); }
    public function assessments(): HasMany { return $this->hasMany(Assessment::class); }
}
