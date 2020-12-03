<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_symptom_by_disease extends Model
{
  /*  protected $table="list_symptom_by_diseases"; */ 
    protected $fillable = ['disease_id2 ','symptom_id'];
    
    /* Relaciones */
    //una lista puede estar en una tabla
    //Symptom
    public function symptom(){
      return $this->belongsTo(Symptom::class);
    } 
    //Disease
    public function disease2(){
        return $this->belongsTo(Disease::class);
    } 
}
