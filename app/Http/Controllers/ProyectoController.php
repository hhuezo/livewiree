<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
 
    public function index()
    {
        $estados = Estado::whereIn('id',[2,3,4])->get();
        return view('proyectos.index', compact('estados'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $proyecto =  Proyecto::where('id','=',$id)->get();
        $estados = Estado::whereIn('id',[2,3,4])->get();
        $response = ["proyecto"=>$proyecto,"estados"=>$estados];
        return $response;
    }

    public function edit($id)
    {
        return view('proyectos.edit', ['proyecto' => Proyecto::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
