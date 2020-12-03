<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_recommendation_by_disease extends Model
{
    /* protected $table="list_recommendation_by_diseases"; */
    protected $fillable = ['disease_id3','recommendation_id'];

    /* Relaciones */
    //una lista puede estar en una tabla
    //Recommendation
    public function recommendation(){
        return $this->belongsTo(Recommendation::class);
      } 
      //Disease
      public function disease3(){
          return $this->belongsTo(Disease::class);
      } 
}
