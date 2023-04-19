<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Prioridad;
use App\Models\Proyecto;
use App\Models\Users;
use Livewire\Component;
use Carbon\Carbon;

class ActividadShow extends Component
{
    public $id_proyecto = 2, $numero_ticket, $ponderacion, $descripcion,
        $fecha_inicio, $categoria_id, $estado_id, $prioridad_id, $fecha_fin, $forma = "NO APLICA", $users_id;

    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    protected $listeners = ['load_actividad' => 'load'];

    public function load($id)
    {
        $this->id_proyecto = $id;
    }

    private function resetInput()
    {
        $this->numero_ticket = '';
        $this->descripcion = '';
        $this->estado_id = 2;
    }


    public function create()
    {
        $this->resetInput();
    }

    public function store()
    {


        $this->emit('goToPage');

       /* $messages = [
            'numero_ticket.required' => 'El número de ticket es requerido',
            'ponderacion.required' => 'La ponderación es requerida',
            'descripcion.required' => 'El descripcion es requerido',
            'fecha_inicio.required' => 'La fecha de inicio es requerida',
            'categoria_id.required' => 'La categoria es requerida',
            'estado_id.required' => 'El estado  es requerido',
            'prioridad_id.required' => 'La prioridad es requerida',
            'fecha_fin.required' => 'La fecha final es requerida',
            'forma.required' => 'La forma final es requerida',
            'users_id.required' => 'El usuario es requerido',
        ];
        $validate = $this->validate([
            'id_proyecto' => 'required',
            'numero_ticket' => 'required',
            'ponderacion' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'categoria_id' => 'required',
            'estado_id' => 'required',
            'prioridad_id' => 'required',
            'fecha_fin' => 'required',
            'forma' => 'required',
            'users_id' => 'required',
        ], $messages);


        $time = Carbon::now('America/El_Salvador');

        Actividad::create([
            'proyecto_id' => $this->id_proyecto,
            'numero_ticket' => $this->numero_ticket,
            'ponderacion' => $this->ponderacion,
            'descripcion' => $this->descripcion,
            'fecha_inicio' => $this->fecha_inicio,
            'categoria_id' => $this->categoria_id,
            'estado_id' => $this->estado_id,
            'prioridad_id' => $this->prioridad_id,
            'fecha_fin' => $this->fecha_fin,
            'forma' => $this->forma,
            'users_id' => $this->users_id,
            'fecha_asignacion' => $time->toDateTimeString(),
        ]);*/
    }

    public function render()
    {
        $proyecto = Proyecto::findOrFail($this->id_proyecto);
        $estados = Estado::get();
        $categorias = Categoria::get();
        $prioridades = Prioridad::get();
        $usuarios = Users::where('id', '>', 1)->get();
        $actividades = Actividad::where('proyecto_id', '=', $this->id_proyecto)->orderBy('id', 'desc')->get();
        return view('livewire.actividad-show', compact('proyecto', 'actividades', 'estados', 'categorias', 'prioridades', 'usuarios'));
    }
}
