<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attestation extends Model
{
    use HasFactory;
    protected $fillable=['nom'];
    public function employee()
    {
        return $this->hasMany(employee::class);
    }
}
