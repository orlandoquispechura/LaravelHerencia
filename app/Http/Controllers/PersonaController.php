<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas =  Persona::orderBy('id', 'desc')->paginate(5);
        return view('admin.personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.personas.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $persona = Persona::create(['nombre' => Str::of($request->nombre)->lower()]);

        if ($request->tipo_persona == 'natural') {
            $persona->personaNatural()->create(['dni' => $request->dni]);
        } else {
            $persona->personaJuridica()->create(['nit' => $request->nit]);
        }


        // $persona = new Persona();
        // $persona->nombre = $request->nombre;
        // $persona->create();


        // if ($request->tipo_persona == 'natural') {
        //     $persona->dni = $request->dni;
        //     $persona->personaNatural()->create();
        // } else {
        //     $persona->nit = $request->nit;
        //     $persona->personaJuridica()->create();
        // }
        // dd($request);

        return redirect()->route('admin.personas.index')->with('success', 'Persona registrada con exito');
    }
    public function show($id)
    {
        $persona = Persona::find($id);
        return view('admin.personas.show', compact('persona'));
    }
    public function edit($id)
    {
        $persona = Persona::find($id);
        return view('admin.personas.edit', compact('persona'));
    }
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $persona->update(['nombre' => Str::lower($request->nombre)]);

        if ($request->tipo_persona === 'natural') {
            $persona->personaNatural()->update(['dni' => $request->dni]);
        } else {
            $persona->personaJuridica()->update(['nit' => $request->nit]);
        }

        return redirect()->route('admin.personas.index')->with('success', 'Persona actualizada exitosamente.');
    }
    public function destroy(Persona $persona)
    {
        $persona->personaNatural()->delete();
        $persona->personaJuridica()->delete();
        $persona->delete();

        return redirect()->route('admin.personas.index')->with('success', 'Persona eliminada con exito');
    }
}
