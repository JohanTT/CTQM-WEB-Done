<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Prime_Packs;
// use Illuminate\Database\Eloquent\Casts\Attribute;

class Users extends Model
{
    use HasFactory;

    // public function usersLearn()
    // {
    //     return $this->hasMany(PrimePacks::class, 'users_id', 'id');
    // }

    // public function scopeSearch($query)
    // {
    //     if ($key = request()->key) {
    //         $query = $query->where('user_name', 'like', '%'.$key.'%');
    //     }
    //     return $query;
    // }

    // protected function getID()
    // {
    //     return Attribute::make(
    //       get: fn ($id) => ucfirst($id),
    //     );
    // }
    public $timestamps = false;

    protected $attributes = ['id', 'user_name', 'nick_name','password', 'cash', 'score'];

    protected $fillable = [
		'user_name', 'nick_name','password', 'cash', 'score'
    ];
}
