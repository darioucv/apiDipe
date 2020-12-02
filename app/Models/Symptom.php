<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $table="symptoms";
    protected $primaryKey = 'symptom_id';
}
