<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class K3Indicator extends Model
{
    protected $fillable = ['code','group_name','name','unit','assessment_method','description','is_active'];
    protected function casts(): array { return ['is_active' => 'boolean']; }
}
