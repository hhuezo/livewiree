<?php

namespace App\Http\Livewire;

use App\Models\Proyecto;
use Livewire\Component;

class ProyectoFinalizado extends Component
{
    public $id_proyecto = 0, $estado_id = 2, $nombre, $descripcion, $busqueda;
    public $proyectos;
    public function render()
    {
        if (strlen($this->busqueda) > 0) {
            $this->proyectos = Proyecto::join('estados','proyectos.estado_id','=','estados.id')
            ->select('proyectos.id','proyectos.nombre','proyectos.descripcion','estados.nombre as estado',
            'estados.color','proyectos.destacado','proyectos.avance','proyectos.finalizado','proyectos.estado_id')
            ->where('proyectos.nombre','LIKE','%'.$this->busqueda .'%')
            ->where('proyectos.unidad_id','=',auth()->user()->unidad_id)
            ->where('proyectos.finalizado','=',1)
            ->where('proyectos.id','<>',28)
            //->take(20)
            ->get();
        } else {
            //$this->proyectos = Proyecto::orderBy('id', 'desc')->get();
            $this->proyectos = Proyecto::join('estados','proyectos.estado_id','=','estados.id')
            ->select('proyectos.id','proyectos.nombre','proyectos.descripcion','estados.nombre as estado',
            'estados.color','proyectos.destacado','proyectos.avance','proyectos.finalizado','proyectos.estado_id')
            ->where('proyectos.unidad_id','=',auth()->user()->unidad_id)
            ->where('proyectos.finalizado','=',1)
            ->where('proyectos.id','<>',28)
            //->take(20)
            ->get();
        }
        $colors = ["","planned_task","review_task","progress_task","completed_task","completed_task","planned_task"];
        return view('livewire.proyecto-finalizado', compact('colors'));
    }


    public function actividad_show($id)
    {       
        return redirect()->to('proyecto_finalizado/' . $id);
    }
}
