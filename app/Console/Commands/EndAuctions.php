<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use App\Models\Bid;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuctionEnded;

class EndAuctions extends Command
{
    protected $signature = 'app:end-auctions';
    protected $description = 'End auctions and notify winners';

    public function handle()
    {
        // Find auctions that have ended
        $endedAuctions = Item::where('auction_end_time', '<=', now())
            ->whereNull('winner_id')
            ->get();

        foreach ($endedAuctions as $auction) {
            // Find the highest bidder for the ended auction
            $highestBid = Bid::where('item_id', $auction->id)
                ->orderByDesc('bid_amount')
                ->first();

            if ($highestBid) {
                // Update the winner_id column with the ID of the highest bidder
                $auction->update(['winner_id' => $highestBid->bidder_id]);

                Mail::to($highestBid->bidder->email)->send(new AuctionEnded($auction, $highestBid->bidder));
                Mail::to($auction->seller->email)->send(new AuctionEnded($auction, $highestBid->bidder));
            }
        }

        $this->info('Auction ending process completed successfully!');
    }
}
