<?php

namespace App\Http\Controllers;

use App\Models\Consola;
use DB; 
use App\Http\Requests\UpdateConsolaRequest;
use Illuminate\Http\Request;

class ConsolasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensaje = "Insertada Correctamente";

        $consolas = Consola::all();

        return view('consolas/index', [
            //nombre con el que vamos a recibir en la vista => variable que vamos a pasar
            'mensaje' => $mensaje,
            'consolas' => $consolas

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('consolas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConsolaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consolas = new Consola;

        $consolas -> nombre = $request -> input('nombre');
        $consolas -> año_de_salida = $request -> input('año_de_salida');
        $consolas -> fabricante = $request -> input('fabricante');
        $consolas -> descripcion = $request -> input('descripcion');

        $consolas ->save();

        return redirect('consolas')->with('mensaje1', 'Insertada Correctamente');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consola  $consola
     * @return \Illuminate\Http\Response
     */
    public function show(Consola $consola)
    {
        $consola = Consola::find($consola->id);
        
        return view('consolas/show', [
            'consola'=> $consola
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consola  $consola
     * @return \Illuminate\Http\Response
     */
    public function edit(Consola $consola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsolaRequest  $request
     * @param  \App\Models\Consola  $consola
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsolaRequest $request, Consola $consola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consola  $consola
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('consolas') -> where('id','=', $id) -> delete();

        return redirect('consolas');
    }
}
