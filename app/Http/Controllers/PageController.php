<?php

namespace App\Http\Controllers;

use App\Models\Disease;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getAllDiseases(){
        return view('diseases',[
            'diseases' => Disease::with('category')->latest()->paginate()
        ]);
    }

    public function getDisease(Disease $disease_id){
        return view ('disease',[
            'disease' => $disease_id
        ]);
    }
}
