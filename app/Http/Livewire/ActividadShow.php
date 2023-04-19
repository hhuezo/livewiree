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
    public $id_proyecto = 0, $id_actividad, $numero_ticket, $ponderacion, $descripcion,
        $fecha_inicio, $categoria_id, $estado_id, $prioridad_id, $fecha_fin, $forma = "NO APLICA", $users_id, $tipo = 1, $busqueda;

    public $count = 0;

    public function mount()
    {

        if (session('id_proyecto')) {
            $this->id_proyecto = session('id_proyecto');
        }
    }

    public function render()
    {
        $proyecto = Proyecto::findOrFail($this->id_proyecto);
        $estados = Estado::get();
        $categorias = Categoria::get();
        $prioridades = Prioridad::get();
        $usuarios = Users::where('id', '>', 1)->get();
        if (strlen($this->busqueda) > 0) {
            $actividades = Actividad::where('descripcion', 'like', '%' . $this->busqueda . '%')->where('proyecto_id', '=', $this->id_proyecto)->orderBy('id', 'desc')->get();
        } else {
            $actividades = Actividad::where('proyecto_id', '=', $this->id_proyecto)->orderBy('id', 'desc')->get();
        }
        return view('livewire.actividad-show', compact('proyecto', 'actividades', 'estados', 'categorias', 'prioridades', 'usuarios'));
    }

    protected $listeners = ['load_actividad' => 'load'];

    public function load($id)
    {
        $this->id_proyecto = $id;
    }

<<<<<<< HEAD
    private function resetInput()
    {
        $this->numero_ticket = '';
        $this->descripcion = '';
        $this->estado_id = 2;
=======



    public function changeType()
    {
        if ($this->tipo == 1) {
            $this->tipo = 2;
        } else {
            $this->tipo = 1;
        }
    }

    private function resetInput()
    {
        $tipo_temp = $this->tipo;
        $this->reset();
        $this->id_proyecto = session('id_proyecto');
        $this->tipo =  $tipo_temp;
>>>>>>> 18c89f0fc937a197dabce9ea5445f986ac0da412
    }


    public function create()
    {
        $this->resetInput();
    }

    public function store()
    {
<<<<<<< HEAD


        $this->emit('goToPage');

       /* $messages = [
            'numero_ticket.required' => 'El número de ticket es requerido',
            'ponderacion.required' => 'La ponderación es requerida',
            'descripcion.required' => 'El descripcion es requerido',
=======
        $messages = [
            'numero_ticket.required' => 'El número de ticket es requerido',
            'ponderacion.required' => 'La ponderación es requerida',
            'descripcion.required' => 'La descripcion es requerida',
>>>>>>> 18c89f0fc937a197dabce9ea5445f986ac0da412
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
<<<<<<< HEAD
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
=======
        ]);


        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id)
    {
        $actividad = Actividad::findOrFail($id);
        $this->id_actividad = $id;
        $this->id_proyecto = $actividad->proyecto_id;
        $this->numero_ticket = $actividad->numero_ticket;
        $this->ponderacion = $actividad->ponderacion;
        $this->descripcion = $actividad->descripcion;
        $this->fecha_inicio = substr($actividad->fecha_inicio, 0, 10);
        $this->categoria_id = $actividad->categoria_id;
        $this->estado_id = $actividad->estado_id;
        $this->prioridad_id = $actividad->prioridad_id;
        $this->fecha_fin = substr($actividad->fecha_fin, 0, 10);
        $this->forma = $actividad->forma;
        $this->users_id = $actividad->users_id;
    }

    public function update()
    {
        $messages = [
            'numero_ticket.required' => 'El número de ticket es requerido',
            'ponderacion.required' => 'La ponderación es requerida',
            'descripcion.required' => 'La descripcion es requerida',
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


        $actividad = Actividad::findOrFail($this->id_actividad);
        $actividad->numero_ticket = $this->numero_ticket;
        $actividad->ponderacion = $this->ponderacion;
        $actividad->descripcion = $this->descripcion;
        $actividad->fecha_inicio = $this->fecha_inicio;
        $actividad->categoria_id = $this->categoria_id;
        $actividad->estado_id = $this->estado_id;
        $actividad->prioridad_id = $this->prioridad_id;
        $actividad->fecha_fin = $this->fecha_fin;
        $actividad->forma = $this->forma;
        $actividad->users_id = $this->users_id;
        $actividad->update();

        $this->dispatchBrowserEvent('close-modal-edit');
>>>>>>> 18c89f0fc937a197dabce9ea5445f986ac0da412
    }
}
