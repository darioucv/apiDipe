<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disease;
use Validator;
class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* return response ()->json(Disease::chunk(
            200, function ($projects) {
                foreach ($projects as $project) {
                    //Aquí escribimos lo que haremos con los datos (operar, modificar, etc)
                }
            }
        ),200); */
        return response ()->json(Disease::get(),200);
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
            'disease' => 'required',
            'concept' => 'required',
            'popurality' => 'numeric|required',
            'category_id' => 'numeric|required',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $contenido = new Disease();
        $contenido->disease = $request->input ('disease');
        $contenido->concept = $request->input ('concept');
        $contenido->popurality = $request->input ('popurality');
        $contenido->category_id = $request->input ('category_id');
        $contenido->save();
        echo json_encode($contenido);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disease_id)
    {
        $contenido = Disease::find($disease_id);
        if(is_null($contenido)){
            return response()->json('id no válido',404);
        }

        $rules = [
            'disease' => 'required',
            'concept' => 'required',
            'popurality' => 'numeric|required',
            'category_id' => 'numeric|required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        
        $contenido->disease = $request->input ('disease');
        $contenido->concept = $request->input ('concept');
        $contenido->popurality = $request->input ('popurality');
        $contenido->category_id = $request->input ('category_id');
        $contenido->save();
        echo json_encode($contenido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        //
    }
}
