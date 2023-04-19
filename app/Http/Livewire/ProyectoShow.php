<?php

namespace App\Http\Livewire;

use App\Models\Estado;
use App\Models\Proyecto;
use Livewire\Component;

class ProyectoShow extends Component
{
    public $id_proyecto = 0, $estado_id = 2, $nombre, $descripcion, $busqueda;
    public $proyectos;

    public function render()
    {
        if (strlen($this->busqueda) > 0) {
            $this->proyectos = Proyecto::where('nombre', 'like', '%' . $this->busqueda . '%')->orderBy('id', 'desc')->get();
        } else {
            $this->proyectos = Proyecto::orderBy('id', 'desc')->get();
        }
        $estados = Estado::whereIn('id', [2, 3, 4])->get();
        return view('livewire.proyecto-show', compact('estados'));
    }

   
    private function resetInput(){
        $this->id_proyecto = 0;
        $this->nombre = '';
        $this->descripcion = '';
        $this->estado_id = 2;
    }

    public function create()
    {
        $this->resetInput();    
    }


    public function store()
    {
        $messages = [
            'estado_id.required' => 'El estado es requerido',
            'nombre.required' => 'El nombre es requerido',
            'descripcion.required' => 'La descripcion es requerida',
        ];
        $validateData = $this->validate([
            'estado_id' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
        ],$messages);

        Proyecto::create($validateData);
        session()->flash('message', 'Registro creado correctamente');
        $this->resetInput();

        $this->dispatchBrowserEvent('close-modal');

    }

    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $this->id_proyecto = $proyecto->id;
        $this->nombre = $proyecto->nombre;
        $this->descripcion = $proyecto->descripcion;
        $this->estado_id = $proyecto->estado_id;
    }


    public function update()
    {
        $proyecto = Proyecto::findOrFail($this->id_proyecto);
        $proyecto->nombre = $this->nombre;
        $proyecto->descripcion = $this->descripcion;
        $proyecto->estado_id = $this->estado_id;
        $proyecto->update();
        $this->resetInput();
    }

    public function actividad_show($id)
    {       
        return redirect()->to('proyecto/' . $id);
    }

}
