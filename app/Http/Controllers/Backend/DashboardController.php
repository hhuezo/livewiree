<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use DB;
use App\Domains\Auth\Models\User;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    
    public function formBasic(Request $request)
    {
        $validatedData = $request->validate([
            "firstname"  => 'required',
            "lastname"  => 'required',
            "phonenumber"  => 'required',
            "emailaddress"  => 'required|unique:employees|max:255',
            "admitdate"  => 'required',
            "admittime"  => 'required',
            "formFileMultiple"  => 'required',
            "exampleRadios"  => 'required',
            "addnote"  => 'required',
        ]);
    }

    public function formAdvance(Request $request)
    {
        $validatedData = $request->validate([
            "min8" => 'required|min:8',
            "between5to10" => 'required|between:5,10',
            "between_min_number" => 'required|min:5',
            "between20to30" => 'required|between:20,30'
        ]);
    }

    public function index()
    {
        //dd("hola");
        // $numero_tickets_anterior  = 20;
        // $numero_tickets_actual  = 50;
        // $numero_incremento_prod = 30;
        // $numero_proyectos_desarrollo = 17;

        //$dsb_obtener_datos = DB::select('call dashboardObtenerDatos()');
        $dsb_obtener_datos = DB::select("call dashboardObtenerDatos('" . auth()->user()->unidadId() . "')");

        //dd($dsb_obtener_datos);

        //$numero_tickets_anterior = TmpDsbDato::all()->get()->first()->numero_tickets_anterior;
        $numero_tickets_anterior = DB::table('tmp_dsb_datos')->where('unidad_id', '=', auth()->user()->unidadId())->get()->first()->numero_tickets_anterior;
        $numero_tickets_actual = DB::table('tmp_dsb_datos')->where('unidad_id', '=', auth()->user()->unidadId())->get()->first()->numero_tickets_actual;
        $numero_incremento_prod = DB::table('tmp_dsb_datos')->where('unidad_id', '=', auth()->user()->unidadId())->get()->first()->numero_incremento_prod;
        $numero_proyectos_desarrollo = DB::table('tmp_dsb_datos')->where('unidad_id', '=', auth()->user()->unidadId())->get()->first()->numero_proyectos_desarrollo;




           //$dsb_estado_proyectos = DB::select('call dashboardEstadoProyectos()');
           $dsb_estado_proyectos = DB::select("call dashboardEstadoProyectos('" . auth()->user()->unidadId() . "')");

           //$numero_tickets_anterior = TmpDsbDato::all()->get()->first()->numero_tickets_anterior;
           $numero_proyectos_asignados = DB::table('tmp_dsb_proyectos_estados')->get()->first()->numero_proyectos_asignados;
           $numero_proyectos_pausa = DB::table('tmp_dsb_proyectos_estados')->get()->first()->numero_proyectos_pausa;
           $numero_proyectos_desarrollo = DB::table('tmp_dsb_proyectos_estados')->get()->first()->numero_proyectos_desarrollo;
           $numero_proyectos_certificacion = DB::table('tmp_dsb_proyectos_estados')->get()->first()->numero_proyectos_certificacion;
           $numero_proyectos_creados = DB::table('tmp_dsb_proyectos_estados')->get()->first()->numero_proyectos_creados;
   
   
           $data_estado_proyectos = array(
               //array("name"=>"Asignado","y"=>(float) $numero_proyectos_asignados,"color"=>"#4670C0"),
               //array("name"=>"En Pausa","y"=>(float) $numero_proyectos_pausa,"color"=>"#CC1C9C"),
               array("name" => "En Desarrollo", "y" => (float) $numero_proyectos_desarrollo, "color" => "#5E72E4"),
               array("name" => "En Certificacion", "y" => (float) $numero_proyectos_certificacion, "color" => "#2DCE89"),
               array("name" => "En Pausa", "y" => (float) $numero_proyectos_pausa, "color" => "#11CDEF"),
           );

           




        //$dsb_proyectos_desa_tiempo = DB::select('call dashboardTiempoProyectosDesarrollo()');
        $dsb_proyectos_desa_tiempo = DB::select("call dashboardTiempoProyectosDesarrollo('" . auth()->user()->unidadId() . "')");

        $proyectos_avance = DB::table('tmp_tot_dsb_proyectos_desarrollo_tiempo')
            ->select('tmp_tot_dsb_proyectos_desarrollo_tiempo.id', 'tmp_tot_dsb_proyectos_desarrollo_tiempo.nombre', 'tmp_tot_dsb_proyectos_desarrollo_tiempo.avance', 'tmp_tot_dsb_proyectos_desarrollo_tiempo.tiempo')
            ->where('id', '<>', '9')
            ->where('id', '<>', '11')
            ->where('id', '<>', '28')
            ->where('avance', '>', '0')
            //->where('finalizado','=','0')
            ->orderBy('tmp_tot_dsb_proyectos_desarrollo_tiempo.avance', 'desc')
            ->get();
        //dd($proyectos_avance);





        //$dsb_proyectos_tiempo = DB::select('call dashboardTiempoProyectos()');
        $dsb_proyectos_tiempo = DB::select("call dashboardTiempoProyectos('" . auth()->user()->unidadId() . "')");
        //$dsb_tot_proyectos_tiempo = TmpDsbActividadDiaria::all();
        $dsb_tot_proyectos_tiempo = DB::table('tmp_tot_dsb_proyectos_tiempo')->orderBy('tmp_tot_dsb_proyectos_tiempo.tiempo');



        $data_proyectos_tiempo = DB::table('tmp_tot_dsb_proyectos_tiempo')
            ->select('tmp_tot_dsb_proyectos_tiempo.id', 'tmp_tot_dsb_proyectos_tiempo.proyecto', 'tmp_tot_dsb_proyectos_tiempo.tiempo')
            ->orderBy('tmp_tot_dsb_proyectos_tiempo.tiempo', 'desc')
            ->get();



            $users = User::where('unidad_id','=',auth()->user()->unidadId())->get();


        return view('backend.dashboard',['numero_tickets_anterior'=>$numero_tickets_anterior,
        'numero_tickets_actual'=>$numero_tickets_actual,
        'numero_incremento_prod'=>$numero_incremento_prod,
        'numero_proyectos_desarrollo'=>$numero_proyectos_desarrollo,
        'numero_proyectos_pausa'=>$numero_proyectos_pausa,
        'numero_proyectos_certificacion'=>$numero_proyectos_certificacion,

        'proyectos_avance'=>$proyectos_avance,
        'data_proyectos_tiempo'=>$data_proyectos_tiempo,
        'users'=>$users
    ]);
    }

    public function project()
    {
        return view('backend.project_dashboard');
    }
    
    public function help()
    {
        return view('backend.help');
    }
    public function classes(){
        return view('backend.classes');
    }
    public function student(){
        return view('backend.student');
    }
    public function videoClasses(){
        return view('backend.video-classes');
    }
    public function messages(){
        return view('backend.messages');
    }
    public function reviews(){
        return view('backend.reviews');
    }
}
