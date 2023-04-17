<?php

namespace App\Http\Livewire;

use App\Models\Estado;
use Livewire\Component;

class ProyectoEdit extends Component
{
    public function render()
    {
        $estados = Estado::whereIn('id', [2, 3, 4])->get();
        return view('livewire.proyecto-edit',compact('estados'));
    }

   
}
