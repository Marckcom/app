<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Personal extends Model
{
    use HasFactory;
    protected $guarded =[];
    
    public function armas() : BelongsTo{
        return $this->belongsTo(Armas::class);
    }
    public function arrestos():BelongsTo{
        return $this->belongsTo(Arresto::class);
    }
    public function categorias():BelongsTo{
        return $this->belongsTo(Categoria::class);
    }
    public function cursos():BelongsTo{
        return $this->belongsTo(Curso::class);
    }
    public function cuadros():BelongsTo{
        return $this->belongsTo(Cuadro::class);
    }
    public function familias() : BelongsTo{
        return $this->belongsTo(Familia::class);
    }
    public function fuerzas():BelongsTo{
        return $this->belongsTo(Fuerza::class);
    }

    public function cargos():BelongsTo{
        return $this->belongsTo(Cargo::class);
    }
    public function grados():BelongsTo{
        return $this->belongsTo(Grados::class);
    }

    public function permisos() : BelongsTo{
        return $this->belongsTo(Permiso::class);
    }
    public function reposos():BelongsTo{
        return $this->belongsTo(Reposo::class);
    }
    public function viajes():BelongsTo{
        return $this->belongsTo(Viaje::class);
    }

    public function estados():BelongsTo{
        return $this->belongsTo(Estado::class);
    }


    public function personaldatas():BelongsTo{
        return $this->belongsTo(Personaldata::class);
    }

    protected $fillable = [
        'grados_id',
        'categorias_id',
        'cuadros_id',
        'fuerzas_id',
        'armas_id',
        'familias_id',
        'cursos_id',
        'permisos_id',
        'reposos_id',
        'cargos_id',
        'viajes_id',
        'arrestos_id',
        'estados_id',
        'Personaldatas_id',
        'image',
        'names',
        'lastnames',
        'birthday',
        'gender',
        'estado',
        'cedula',
        'cifile',
        'cifile_dos',
        'cimilitar',
        'cifilemilitar',
        'cifilemilitar_dos',
        'lnacimiento',
        'phone',
        'celular',
        'email',
        'fegreso',
        'decreto',
        'decretofile',

        
        
    ];

}
