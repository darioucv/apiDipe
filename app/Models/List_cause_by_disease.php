<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_cause_by_disease extends Model
{
   /*  protected $table="list_cause_by_diseases"; */

    /* public function causesDiseases(){
        return $this->hasMany(Disease::class);
    } */
    protected $fillable = ['disease_id1','cause_id'];

    /* Relaciones */
    //una lista puede estar en una tabla
    //cause
    public function cause(){
        return $this->belongsTo(Cause::class);
    } 
    //Disease
    public function disease1(){
        return $this->belongsTo(Disease::class);
    } 
}
