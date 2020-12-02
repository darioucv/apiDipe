<?php

namespace App\Http\Controllers;

use App\Models\CategoryDisease;
use Illuminate\Http\Request;

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
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryDisease  $categoryDisease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryDisease $categoryDisease)
    {
        //
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
