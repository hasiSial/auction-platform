<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'starting_price',
        'current_bid',
        'auction_end_time',
        'seller_id',
        'winner_id',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'seller_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

}
