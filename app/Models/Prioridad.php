<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    use HasFactory;
    protected $table = 'prioridad_tickets';
    public $timestamps=false;
    
    protected $fillable = [
         'nombre'
    ];

    protected $guarded = [];
}
