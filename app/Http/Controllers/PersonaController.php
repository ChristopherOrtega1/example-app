<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        //
        return view('personas/personasIndex', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('personas/personasForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'correo' => 'required|email',
            'identificador' => 'required|max:10|unique:App\Models\Persona',
            'telefono' => 'max:15|required'
        ]);
        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? ''
        ]);
        Persona::create($request->all());
        /*
        $contacto = new Persona();
        $contacto->nombre = $request->nombre;
        $contacto->apellido_paterno = $request->apellido_paterno;
        $contacto->apellido_materno = $request->apellido_materno ?? '';
        $contacto->identificador = $request->identificador;
        $contacto->telefono = $request->telefono;
        $contacto->correo = $request->correo;
        $contacto->save();*/

        return redirect()->route('persona.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
        return view('personas.personasShow', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
        return view('personas/personasForm',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'correo' => 'required|email',
            'identificador' => [
                'required',
                'max:10',
                Rule::unique('personas')->ignore($persona->id),
            ],
            'telefono' => 'max:15|required'
        ]);
        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? ''
        ]);
        Persona::where('id',$persona->id)->update($request->except('_token','_method'));
        /*
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno ?? '';
        $persona->identificador = $request->identificador;
        $persona->telefono = $request->telefono;
        $persona->correo = $request->correo;
        $persona->save();*/

        return redirect()->route('persona.show', $persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
        $persona->delete();
        return redirect()->route('persona.index');
    }
}
