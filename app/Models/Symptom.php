<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
   /*  protected $table="symptoms";
    protected $primaryKey = 'symptom_id'; */
    protected $fillable = ['symptom','description'];

    //un síntoma puede estar en varias listas List_symptom_by_disease 
    public function list_symptom_by_diseases(){
        return $this->hasMany(List_symptom_by_disease::class);
    }
}
