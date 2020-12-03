<?php

namespace App\Models;

/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;

class CategoryDisease extends Model
{
    /* protected $table="category_diseases";
    protected $primaryKey = 'category_disease_id'; */
    protected $fillable = ['category','description'];

    public function diseases(){
        return $this->hasMany(Disease::class);
    }

}
