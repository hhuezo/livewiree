<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';
    protected $primaryKey = 'id';   

    public $timestamps = false;

    protected $fillable = ['nombre','color','prioridad'];

    protected $guarded = [];
}
