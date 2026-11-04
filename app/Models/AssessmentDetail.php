<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AssessmentDetail extends Model
{
    protected $fillable = ['assessment_id','indicator_id','standard_id','actual_value','standard_value','percentage','status','gap_value','notes'];
    protected function casts(): array { return ['actual_value'=>'decimal:2','standard_value'=>'decimal:2','percentage'=>'decimal:2','gap_value'=>'decimal:2']; }
    public function indicator() { return $this->belongsTo(K3Indicator::class, 'indicator_id'); }
    public function standard() { return $this->belongsTo(K3Standard::class, 'standard_id'); }
}
