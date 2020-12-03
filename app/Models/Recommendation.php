<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    /* protected $table="recommendations";
    protected $primaryKey = 'recommendation_id'; */
    protected $fillable = ['recommendation','concept','image'];

    //una recomendacion puede estar en varias listas List_recommendation_by_disease 
    public function list_recommendation_by_diseases(){
        return $this->hasMany(List_recommendation_by_disease::class);
    }
}
