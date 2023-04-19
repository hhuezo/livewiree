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
        session(['id_proyecto' => $id]);
        return view('proyectos.edit', ['proyecto' => Proyecto::findOrFail($id)]);
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
