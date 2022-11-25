<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use DB;
use Illuminate\Http\Request;

class videojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videojuegos = Videojuego::all();
        

        $mensaje = 'Listado de videojuegos';

        return view('videojuegos/index', [
            'videojuegos' => $videojuegos,
            'mensaje' => $mensaje
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videojuegos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $videojuego = new Videojuego;
        $videojuego -> titulo = $request -> input('titulo');
        $videojuego -> precio = $request -> input('precio');
        $videojuego -> pegi = $request -> input('pegi');
        $videojuego -> descripcion = $request -> input('descripcion');
        $videojuego -> save();

        return redirect('videojuegos');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $videojuego = Videojuego::find($id);
        
        return view('videojuegos/show',[
            'videojuego' => $videojuego
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videojuego = Videojuego::find($id);
        return view('videojuegos/edit',[
            'videojuego' => $videojuego
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('videojuegos')->where('id','=', $id )->delete();

        return redirect('videojuegos');

    }
}
