<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructorRating extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
		'instructor_id', 'user_id', 'star'
    ];
}
