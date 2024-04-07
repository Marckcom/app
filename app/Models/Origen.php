<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Origen extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function  registros() : HasMany{
        return $this->hasMany(Registro::class);
    }
}
