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
        $videojuego = Videojuego::find($id);

        DB::table('videojuegos')->where('id', $id)->update([
            'titulo' => $request -> input('titulo'),
            'precio' => $request -> input('precio'),
            'pegi' => $request -> input('pegi'),
            'descripcion' => $request -> input('descripcion')
        ]);

        return redirect('videojuegos') -> with('mensaje', 'Videojuego actualizado correctamente');
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

/*     public function search(Request $request)
    {
        $search = $request -> input('search');
        $videojuegos = DB::table('videojuegos')->where('titulo', 'like', '%'.$search.'%')->get();

        return view('videojuegos/index', [
            'videojuegos' => $videojuegos,
            'mensaje' => 'Resultados de la búsqueda'
        ]);
    } */
}
