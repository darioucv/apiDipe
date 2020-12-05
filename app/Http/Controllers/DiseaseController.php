<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disease;
use App\Models\CategoryDisease;
use Validator;

use Illuminate\Support\Facades\Storage;
class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
        $diseases = Disease::latest()->get();

        return view('diseases.index', compact('diseases'));
    }

    public function diseasesList(){

        return response ()->json(Disease::get(),200);
            /* return response ()->json(Disease::chunk(
                200, function ($projects) {
                    foreach ($projects as $project) {
                        //Aquí escribimos lo que haremos con los datos (operar, modificar, etc)
                    }
                }
            ),200); */
     }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryDisease $categoryDisease)
    {
        return view('diseases.create',[
            'categoryDiseases' => $categoryDisease::all()
        ]);
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
            'popularity' => 'numeric|required',
            'category_id' => 'numeric|required',
            'image' => 'mimes:jpg,jpeg,png'
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $contenido = new Disease();
        $contenido->disease = $request->input ('disease');
        $contenido->concept = $request->input ('concept');
        $contenido->popularity = $request->input ('popularity');
        $contenido->category_id = $request->input ('category_id');
        if($request->file('image')){
            $contenido->image = $request->file('image')->store('diseases','public');
        }   
        $contenido->save();

        return back()->with('status', 'Creado con éxito');
    }

    public function edit (Disease $disease,CategoryDisease $categoryDisease){
        /* return view('diseases.edit',compact('disease')); */

        /* return view('diseases.edit',[
            'categoryDiseases' => $categoryDisease::all()
        ]); */
        return view('diseases.edit',compact('disease'),[
            'categoryDiseases' => $categoryDisease::all(),
            'categoryDiseaseID' => $categoryDisease::find($disease->category_id)
            
        ]);
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
            'popularity' => 'numeric|required',
            'category_id' => 'numeric|required',
            'image' => 'mimes:jpg,jpeg,png'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        
        $contenido->disease = $request->input ('disease');
        $contenido->concept = $request->input ('concept');
        $contenido->popularity = $request->input ('popularity');
        $contenido->category_id = $request->input ('category_id');
        if($request->file('image')){
            //eliminar imagen -- importar clase, look up
            Storage::disk('public')->delete($contenido->image);
            $contenido->image = $request->file('image')->store('diseases','public');
        }  
        $contenido->save();

        return back()->with('status', 'Actualizado con éxito');
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
