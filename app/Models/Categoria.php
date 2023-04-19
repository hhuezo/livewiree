<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria_tickets';
    public $timestamps=false;
    
    protected $fillable = [
        'codigo', 'nombre', 'unidad_id'
    ];

    protected $guarded = [];
}
