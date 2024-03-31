<?php

namespace App\Jobs;

use App\Models\User; 
use App\Mail\AuctionEnded;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendAuctionEndedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $winner;
    protected $seller;

    /**
     * Create a new job instance.
     */
    public function __construct($winner, $seller)
    {
        $this->winner = $winner;
        $this->seller = $seller;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $winner = User::find($this->winner);
        $seller = User::find($this->seller);

        if ($winner && $seller) {
            Mail::to($winner)->cc($seller)->send(new AuctionEnded($winner, $seller));
        }
    }
}
