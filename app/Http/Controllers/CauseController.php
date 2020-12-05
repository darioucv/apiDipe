<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use Illuminate\Http\Request;
use Validator;
class CauseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $causes = Cause::latest()->get();

        return view('causes.index', compact('causes'));
    }
    public function CauseList(){
        return response ()->json(Cause::get(),200);
    }
    public function create()
    {
        return view('causes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            //'cause ' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $contenido = new Cause();
        $contenido->cause = $request->input ('cause');
        $contenido->description = $request->input ('description');
        $contenido->save();
        return back()->with('status', 'Creado con éxito');
    }

    public function edit (Cause $cause){
        return view('causes.edit',compact('cause'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$cause_id)
    {
        $contenido = Cause::find($cause_id);
        if(is_null($contenido)){
            return response()->json('id no válido',404);
        }

        $rules = [
            //'cause ' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        
        $contenido->cause = $request->input ('cause');
        $contenido->description = $request->input ('description');
        $contenido->save();
        return back()->with('status', 'Creado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cause $cause)
    {
        //
    }
}
