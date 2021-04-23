<?php

namespace App\Http\Controllers;

use App\Programador;
use Illuminate\Http\Request;
use DB;

class ProgramadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $programador = Programador::all();
            return response($programador);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Programador  $programador)
    {
        try {
            return DB::transaction(function () use ($request , $programador ) {
                $existe = $programador->where('nombre', $request['nombre'])->first();
                if(isset($existe['nombre'])){
                    return ['operacion' => response(200),
                            'mensaje' => 'El  usuario ya existe', 
                            'TotalProgradoresRegistrados' => collect($programador->all())->count(),
                            'Programadores' => $programador->all()];

                }else {

                    $programador->nombre = $request['nombre'];
                    $programador->apellido = $request['apellido'];
                    $programador->cedula = $request['cedula'];
                    $programador->correo = $request['correo'];
                    $programador->lenguajes = $request['lenguajes'];
                    $programador->fecha_creacion = \Carbon\Carbon::now();
                    $programador->save();

                    return ['operacion' => response(200),
                            'mensaje' => 'El  usuario registrado con exito', 
                            'TotalProgradoresRegistrados' => collect($programador->all())->count(),
                            'Programadores' => $programador->all()];
                }
            },5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programador  $programador
     * @return \Illuminate\Http\Response
     */
    public function show(Programador $programador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programador  $programador
     * @return \Illuminate\Http\Response
     */
    public function edit(Programador $programador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programador  $programador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programador $programador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programador  $programador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programador $programador)
    {
        //
    }
}
