<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'bid_amount',
        'bidder_id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'bidder_id');
    }

}
