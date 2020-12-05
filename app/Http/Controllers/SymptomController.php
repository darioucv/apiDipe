<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;
use Validator;
class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $symptoms = Symptom::latest()->get();

        return view('symptoms.index', compact('symptoms'));
    }

    public function SymptomList(){
        return response ()->json(Symptom::get(),200);

    }

    public function create()
    {
        return view('symptoms.create');
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
            'symptom' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $contenido = new Symptom();
        $contenido->symptom = $request->input ('symptom');
        $contenido->description = $request->input ('description');
        $contenido->save();
        return back()->with('status', 'Creado con éxito');
    }

    public function edit (Symptom $symptom){
        return view('symptoms.edit',compact('symptom'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $symptom_id)
    {
        $contenido = Symptom::find($symptom_id);
        if(is_null($contenido)){
            return response()->json('id no válido',404);
        }

        $rules = [
            'symptom' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        
        $contenido->symptom = $request->input ('symptom');
        $contenido->description = $request->input ('description');
        $contenido->save();
        return back()->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Symptom $symptom)
    {
        //
    }
}
