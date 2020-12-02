<?php

namespace App\Models;

/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    /* protected $table="diseases";
    protected $primaryKey = 'disease_id'; */
    public function categoryDisease(){
        return $this->belongsTo(CategoryDisease::class);
        /* return $this->belongsTo('App\Models\CategoryDisease'); */
    } 
}
