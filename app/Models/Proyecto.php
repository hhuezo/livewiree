<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyectos'; 
    
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['nombre','descripcion','estado_id','destacado','finalizado','unidad_id'];

    protected $guarded = [];

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'estado_id', 'id');
    }
}
