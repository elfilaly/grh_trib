<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tache extends Model
{
    use HasFactory;
    protected $fillable=['Nom','الاطار'];
    public function employee()
    {
        return $this->hasMany(employee::class);
    }

}
