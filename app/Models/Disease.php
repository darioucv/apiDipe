<?php

namespace App\Models;

/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    /* protected $table="diseases";
    protected $primaryKey = 'disease_id'; */
    protected $fillable = ['disease','concept','popurality','category_id '];
    public function category(){
        return $this->belongsTo(CategoryDisease::class);
        /* return $this->belongsTo('App\Models\CategoryDisease'); */
    } 
}
