<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class congee extends Model
{
    use HasFactory;
    protected $fillable=['employee_id','typecongee_id','Date debut','Date fin','nbr jours','annee'];
    public function congee()
    {
        return $this->hasMany(congee::class);
    }
    public function employee()
    {
        return $this->belongsTo(employee::class);
    }
    public function typecongee()
    {
        return $this->belongsTo(typecongee::class);
    }
    
}
