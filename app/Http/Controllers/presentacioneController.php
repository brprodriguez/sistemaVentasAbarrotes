<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Caracteristica; 
use App\Models\Presentacione; 

use App\Http\Requests\StorePresentacioneRequest;
use App\Http\Requests\UpdatePresentacioneRequest;

class presentacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentaciones = Presentacione::with('caracteristica')->latest()->get();
       
        return view('presentacione.index',['presentaciones'=>$presentaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presentacione.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresentacioneRequest $request)
    {
        try{
            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->presentacione()->create([
                'caracteristica_id' => $caracteristica->id
            ]);
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
        }
        return redirect()->route('presentaciones.index')->with('success','Presentación registrada');
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
    public function edit(Presentacione $presentacione)
    {
        return view('presentacione.edit',['presentacione'=>$presentacione]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresentacioneRequest $request, Presentacione $presentacione)
    {
        Caracteristica::where('id',$presentacione->caracteristica->id)->update($request->validated());

        return redirect()->route('presentaciones.index')->with('success','Presentación Editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msj = "";
        $presentacione = Presentacione::find($id);
        if($presentacione->caracteristica->estado == 1){
            Caracteristica::where('id',$presentacione->caracteristica->id)->update(['estado'=> 0]);
            $msj = 'Presentación Eliminada';
        }else{
            Caracteristica::where('id',$presentacione->caracteristica->id)->update(['estado'=> 1]);
            $msj = 'Presentación Restaurada';
        }
        return redirect()->route('presentaciones.index')->with('success',$msj);
    }
}
