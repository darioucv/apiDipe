<?php

namespace App\Http\Controllers;

use App\Models\CategoryDisease;
use Illuminate\Http\Request;
use Validator;
class CategoryDiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response ()->json(CategoryDisease::get(),200);
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
            'category ' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $contenido = new CategoryDisease();
        $contenido->category = $request->input ('category');
        $contenido->description = $request->input ('description');
        $contenido->save();
        echo json_encode($contenido);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryDisease  $categoryDisease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryDisease_id)
    {
        $contenido = CategoryDisease::find($categoryDisease_id);
        if(is_null($contenido)){
            return response()->json('id no válido',404);
        }

        $rules = [
            'category ' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        
        $contenido->category = $request->input ('category');
        $contenido->description = $request->input ('description');
        $contenido->save();
        echo json_encode($contenido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryDisease  $categoryDisease
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDisease $categoryDisease)
    {
        //
    }
}
