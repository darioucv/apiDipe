<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disease;
use App\Models\Cause;
use App\Models\Symptom;
use App\Models\Recommendation;
/* relaciones */
use App\Models\List_cause_by_disease;
use App\Models\List_symptom_by_disease;
use App\Models\List_recommendation_by_disease;

class RelationController extends Controller
{   

    public function diseasesList()
    {  
        $diseases = Disease::all();
        $list_symptom_by_diseases = List_symptom_by_disease::with('symptom')->latest()->paginate();//disease2 viene del nombre de la funcion configurada en el modelo
        $list_cause_by_diseases = List_cause_by_disease::with('cause')->latest()->paginate();
        $list_recommendation_by_diseases = List_recommendation_by_disease::with('recommendation')->latest()->paginate();
        return view('relations.index',[
            'diseases' => $diseases,
            'list_symptom_by_diseases' => $list_symptom_by_diseases,
            'list_cause_by_diseases' => $list_cause_by_diseases,
            'list_recommendation_by_diseases' => $list_recommendation_by_diseases,
        ]);
        /* echo json_encode($diseases); */
    }
    
    //buscar a una disease por el id y mandarlo
    //mandar la tabla cause y la relacion de las dos
    public function createCausesDisease($disease_id)
    {
        return view('relations.causesDisease',[
            'disease' => Disease::find($disease_id),
            /* 'list_cause_by_diseases' => List_cause_by_disease::where('disease_id1',$disease_id)->get(), */
            'causes' => Cause::all()
        ]);
        
    }
    public function createSymptomsDisease($disease_id)
    {
        return view('relations.symptomDisease',[
            'disease' => Disease::find($disease_id),
            /* 'list_symptom_by_diseases' => List_symptom_by_disease::all(), */
            'symptoms' => Symptom::all()
        ]);
    }
    public function createRecommendationsDisease($disease_id)
    {
        return view('relations.recommendationDisease',[
            'disease' => Disease::find($disease_id),
            /* 'list_recommendation_by_disease' => List_recommendation_by_disease::all(), */
            'recommendations' => Recommendation::all()
        ]);
    }

    function saveCausesDisease(Request $request){
        $contenido = new List_cause_by_disease();
        $contenido->disease_id1 = $request->input ('disease_id1');
        $contenido->cause_id = $request->input ('cause_id');
        $contenido->save();
        return back()->with('status', 'Creado con éxito');
    }
    function saveRecommendationsDisease(Request $request){
        $contenido = new List_recommendation_by_disease();
        $contenido->disease_id3 = $request->input ('disease_id3');
        $contenido->recommendation_id = $request->input ('recommendation_id');
        $contenido->save();
        return back()->with('status', 'Creado con éxito');
    }
    function saveSymptomsDisease(Request $request){
        $contenido = new List_symptom_by_disease();
        $contenido->disease_id2 = $request->input ('disease_id2');
        $contenido->symptom_id = $request->input ('symptom_id');
        $contenido->save();
        return back()->with('status', 'Creado con éxito');
    }
}
