<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';
    public $timestamps=false;
    
    protected $fillable = [
        'numero_ticket', 'descripcion', 'fecha_inicio', 'fecha_fin', 'porcentaje',
        'fecha_asignacion', 'fecha_liberacion', 'proyecto_id', 'users_id',
        'estado_id', 'categoria_id', 'prioridad_id', 'ponderacion', 'contenido', 'forma'
    ];

    protected $guarded = [];

    public function proyecto()
    {
        return $this->belongsTo('App\Models\Proyecto');
    }

    
    public function estado(){
        return $this->belongsTo('App\Models\Estado', 'estado_id', 'id');
    }

    public function prioridad(){
        return $this->belongsTo('App\Models\Prioridad', 'prioridad_id', 'id');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Users', 'users_id', 'id');
    }


}
