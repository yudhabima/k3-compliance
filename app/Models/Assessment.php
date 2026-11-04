<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Assessment extends Model
{
    protected $fillable = ['company_id','public_token','assessment_date','status','total_indicators','compliant_count','partial_count','non_compliant_count','overall_percentage','notes'];
    protected function casts(): array { return ['assessment_date'=>'date','overall_percentage'=>'decimal:2']; }
    public function company() { return $this->belongsTo(Company::class); }
    public function details(): HasMany { return $this->hasMany(AssessmentDetail::class); }
}
