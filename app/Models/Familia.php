<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Familia extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function  personals() : HasMany{
        return $this->hasMany(Personal::class);
    }
}
