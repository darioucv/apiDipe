<?php

namespace App\Http\Controllers;

use App\Models\List_recommendation_by_disease;
use Illuminate\Http\Request;
use Validator;
class ListRecommendationByDiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response ()->json(List_recommendation_by_disease::get(),200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\List_recommendation_by_disease  $list_recommendation_by_disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, List_recommendation_by_disease $list_recommendation_by_disease)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\List_recommendation_by_disease  $list_recommendation_by_disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(List_recommendation_by_disease $list_recommendation_by_disease)
    {
        //
    }
}
