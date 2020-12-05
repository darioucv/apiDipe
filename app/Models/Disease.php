<?php

namespace App\Models;

/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    /* protected $table="diseases";
    protected $primaryKey = 'disease_id'; */
    protected $fillable = ['disease','concept','popularity','category_id ','image'];

    
    //para que funcione esto implementamos el siguiente codigo: php artisan serve storage:link
    public function getGetImageAttribute(){
        if($this->image){
            return url("storage/$this->image");
        }   
    }
    /* relaciones */
    //una enfermedad pertenece a una categoria 
    public function category(){
        return $this->belongsTo(CategoryDisease::class);
    } 
    //una enfermedad puede estar en varias listas
    //List_cause_by_disease
    public function list_cause_by_diseases(){
        return $this->hasMany(List_cause_by_disease::class);
    }
    //List_symptom_by_disease
    public function list_symptom_by_diseases(){
        return $this->hasMany(List_symptom_by_disease::class);
    }
    //List_recommendation_by_disease
    public function list_recommendation_by_diseases(){
        return $this->hasMany(List_recommendation_by_disease::class);
    }
}
