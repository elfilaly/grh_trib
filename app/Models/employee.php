<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable=['nom','cin','Numero financier','date_naissance','situtaion familiale','telephone','adresse','date_embauche','date_embauche_tribunal','service_id','taches_id','الاسم'];
    public function employee()
    {
        return $this->hasMany(employee::class);
    }
    
    public function congee()
    {
        return $this->belongsTo(congee::class);
    }
    public function service()
    {
        return $this->belongsTo(service::class);
    }
    public function attestation()
    {
        return $this->belongsTo(attestation::class);
    }
   public function taches()
   {
    return $this->belongsTo(tache::class);
   }
}
