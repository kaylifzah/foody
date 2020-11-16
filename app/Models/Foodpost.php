<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodpost extends Model
{
    use HasFactory;

    protected $table = "foodposts";

    protected $fillable = [
        'user_id',
        'foodName',
        'foodpic',
        'price',
        'qty',
        'description',
        'postalCode',
        'availDate',
        'collectTimeFrom',
        'collectTimeTo',
        'payAcc'
    ];

    public function user() //inuse
    {
        return $this->belongsTo(User::class);
    }

    public function profiles() //inuse
    {
        return $this->belongsTo(Profile::class, 'user_id', 'user_id');
    }

}




