<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;  
use App\Models\Presentacione;  
use App\Models\Categoria;  
use Illuminate\Support\Facades\DB; 

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = null;
        return view('producto.index');
        #return view('producto.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::join('caracteristicas as c','marcas.caracteristica_id',"=",'c.id')->where('c.estado',1)->get();
        $presentaciones = Presentacione::join('caracteristicas as c','presentaciones.caracteristica_id',"=",'c.id')->where('c.estado',1)->get();
        $categorias = Categoria::join('caracteristicas as c','categorias.caracteristica_id',"=",'c.id')->where('c.estado',1)->get();
        return view('producto.create',compact('marcas','presentaciones','categorias'));
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
