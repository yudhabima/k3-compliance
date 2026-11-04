<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class K3Standard extends Model
{
    protected $fillable = ['indicator_id','fire_risk_class','minimum_value','operator','regulation_name','regulation_reference','notes','is_active'];
    protected function casts(): array { return ['minimum_value' => 'decimal:2','is_active' => 'boolean']; }
    public function indicator() { return $this->belongsTo(K3Indicator::class, 'indicator_id'); }
}
