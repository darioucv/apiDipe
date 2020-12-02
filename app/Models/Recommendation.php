<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $table="recommendations";
    protected $primaryKey = 'recommendation_id';
}
