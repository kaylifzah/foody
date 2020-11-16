<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";

    protected $fillable = [
        'buyer_id',
        'foodPost_id',
        'seller_id',
        'purchaseqty',
        'pickupTime',
        'contact',
        'paymentScreenS',
        'paymentRef'
    ];

    // public function foodposts()
    // {
    //     return $this->belongsTo(Foodpost::class, 'user_id', 'foodPost_id');
    // }

    public function profiles() //inuse
    {
        return $this->belongsTo(Profile::class, 'buyer_id', 'user_id');
    }

    public function profilesSeller() //inuse
    {
        return $this->belongsTo(Profile::class, 'seller_id', 'user_id');
    }

    public function user() //inuse
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    public function userSeller() //inuse
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function foodposts() //inuse
    {
        return $this->belongsTo(Foodpost::class, 'foodPost_id', 'id');
    }
}