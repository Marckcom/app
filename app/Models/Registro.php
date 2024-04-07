<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registro extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function origens() : BelongsTo{
        return $this->belongsTo(Origen::class);
    }
    public function doctipos():BelongsTo{
        return $this->belongsTo(Doctipo::class);
    }
    public function destinos():BelongsTo{
        return $this->belongsTo(Destino::class);
    }

    public function situacions():BelongsTo{
        return $this->belongsTo(Situacion::class);
    }

  protected $fillable = [
        'doctipos_id',
        'origens_id',
        'destinos_id',
        'situacions_id',
        'ndoc',
        'objeto',
        'content',
        'tags',
        'file'
        
    ];  


    protected $casts = [
        'tags' => 'array', 
    ];

}
