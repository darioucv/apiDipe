<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Storage;
class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recommendations = Recommendation::latest()->get();

        return view('recommendations.index', compact('recommendations'));

    }
    public function RecommendationList(){
        return response ()->json(Recommendation::get(),200);

    }

    public function create()
    {
        return view('recommendations.create');
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
            //'recommendation ' => 'required',
            //'concept ' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        
        $contenido = new Recommendation();
        $contenido->recommendation = $request->input ('recommendation');
        $contenido->concept = $request->input ('concept');
        if($request->file('image')){
            $contenido->image = $request->file('image')->store('recommendations','public');
        }
        $contenido->save();
        return back()->with('status', 'Creado con éxito');
    }

    public function edit (Recommendation $recommendation){
        return view('recommendations.edit',compact('recommendation'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $recommendation_id)
    {
        $contenido = Recommendation::find($recommendation_id);
        if(is_null($contenido)){
            return response()->json('id no válido',404);
        }

        $rules = [
            //'recommendation ' => 'required',
            //'concept ' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        
        $contenido->recommendation = $request->input ('recommendation');
        $contenido->concept = $request->input ('concept');
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
     * @param  \App\Models\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recommendation $recommendation)
    {
        //
    }
}
