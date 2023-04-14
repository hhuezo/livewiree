<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Estado;
use App\Models\Proyecto as ProyectoModel;
use Request;

class Proyecto extends Component
{
    public $modal_id = 0, $estado_id = 2, $nombre, $descripcion,$modal_estado_id = 2, $modal_nombre, $modal_descripcion, $busqueda;
    public $proyectos;


    public $count = 2;

 


    public function render()
    {
        if (strlen($this->busqueda) > 0) {
            $this->proyectos = ProyectoModel::where('nombre', 'like', '%' . $this->busqueda . '%')->orderBy('id','desc')->get();
        } else {
            $this->proyectos = ProyectoModel::orderBy('id','desc')->get();
        }
        $estados = Estado::whereIn('id', [2, 3, 4])->get();
        return view('livewire.proyecto', ['estados' => $estados]);
    }

    public function increment()
    {
        $this->count++;
    }

   public function resetInput()
    {
        $this->reset();
    }   


    public function store()
    {
        $validateData = $this->validate([
            'estado_id' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        //dd($validateData );
        $this->count++;
        ProyectoModel::create($validateData);
        session()->flash('message', 'Registro creado correctamente');
        $this->resetInput();

    }


    public function edit($id){
        
        $proyecto = ProyectoModel::findOrFail($id);
        $this->modal_id = $proyecto->id;
        $this->modal_nombre = $proyecto->nombre;
        $this->modal_descripcion = $proyecto->descripcion;
        $this->modal_estado_id = $proyecto->estado_id;

    }

    
    public function update()
    {
       
        //$proyecto = ProyectoModel::findOrFail($this->modal_id);
        $this->modal_nombre = $this->modal_id;


       // return $request;

        /*
        //dd($validateData );
        $this->count++;
        ProyectoModel::create($validateData);
        session()->flash('message', 'Registro creado correctamente');
        $this->resetInput();*/

    }
}
