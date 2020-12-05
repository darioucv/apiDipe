<?php

namespace App\Http\Controllers;

use App\Models\CategoryDisease;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Storage;
class CategoryDiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryDisease::latest()->get();

        return view('categories.index', compact('categories'));
    }

    public function CategoryDiseasesList(){
        return response ()->json(CategoryDisease::get(),200);
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'description' => 'required',
            //'category ' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $contenido = new CategoryDisease();
        $contenido->category = $request->input ('category');
        $contenido->description = $request->input ('description');
        if($request->file('image')){
            $contenido->image = $request->file('image')->store('categories','public');
        }
        $contenido->save();
        return back()->with('status', 'Creado con éxito');
    }

    public function edit (CategoryDisease $category){
        return view('categories.edit',compact('category'));
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
            //'category ' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        
        $contenido->category = $request->input ('category');
        $contenido->description = $request->input ('description');
        if($request->file('image')){
            //eliminar imagen -- importar clase, look up
            Storage::disk('public')->delete($contenido->image);
            $contenido->image = $request->file('image')->store('categories','public');
        } 
        $contenido->save();
        
        return back()->with('status', 'Actualizado con éxito');
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
