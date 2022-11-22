<?php

namespace App\Http\Controllers;

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
        
        $videojuegos = [
            ['titulo' => 'GTA V', 'precio' => 60, 'pegi' => 18, 'descripcion' => 'GTA V es un videojuego de acción-aventura de mundo abierto desarrollado por Rockstar North y publicado por Rockstar Games.'],
            ['titulo' => 'FIFA 21', 'precio' => 60, 'pegi' => 3, 'descripcion' => 'FIFA 21 es un videojuego de fútbol desarrollado por EA Vancouver y EA Salt Lake City y publicado por Electronic Arts.'],
            ['titulo' => 'Minecraft', 'precio' => 20, 'pegi' => 7, 'descripcion' => 'Minecraft es un videojuego de construcción, de tipo «mundo abierto» o «sandbox» creado originalmente por el sueco Markus Persson (conocido como «Notch») y posteriormente desarrollado y publicado por Mojang.'],
            ['titulo' => 'Call of Duty: Black Ops Cold War', 'precio' => 60, 'pegi' => 18, 'descripcion' => 'Call of Duty: Black Ops Cold War es un videojuego de disparos en primera persona desarrollado por Treyarch y Raven Software y publicado por Activision.'],
            ['titulo' => 'FIFA 21', 'precio' => 60, 'pegi' => 3, 'descripcion' => 'FIFA 21 es un videojuego de fútbol desarrollado por EA Vancouver y EA Salt Lake City y publicado por Electronic Arts.'],
            ['titulo' => 'Minecraft', 'precio' => 20, 'pegi' => 7, 'descripcion' => 'Minecraft es un videojuego de construcción, de tipo «mundo abierto» o «sandbox» creado originalmente por el sueco Markus Persson (conocido como «Notch») y posteriormente desarrollado y publicado por Mojang.']
        ];        
        return view('videojuegos/index', [
            'videojuegos' => $videojuegos,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
