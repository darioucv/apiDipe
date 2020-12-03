<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    /* protected $table="causes";
    protected $primaryKey = 'cause_id'; */
    protected $fillable = ['cause','description'];

    //una causa puede estar en varias listas List_cause_by_disease 
    public function list_cause_by_diseases(){
        return $this->hasMany(List_cause_by_disease::class);
    }
}
