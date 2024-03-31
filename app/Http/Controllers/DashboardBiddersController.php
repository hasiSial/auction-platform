<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class DashboardBiddersController extends Controller
{
    //view bidder index page
    public function indexBid()
    {
        $data = Bid::with('item','user')->get();
        
        return view('dashboard.pages.bidding.index',[
            'data' => $data
        ]);

    }

    //view create bidder page
    public function createBid()
    {
        $items = Item::all();
        return view('dashboard.pages.bidding.create', compact('items'));
    }

    //store bid into db
    public function storeBid(Request $request)
    {
        try {
            // Validate the data
            $validator = Validator::make($request->all(), [
                'item_id' => 'required|exists:items,id',
                'bid_amount' => 'required|numeric|min:' . $request->current_bid, 
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $bid = new Bid();
            $bid->item_id = $request->item_id;
            $bid->bid_amount = $request->bid_amount;
            $bid->bidder_id = Auth::id();
            $bid->save();

            $item = Item::findOrFail($request->item_id);
            $item->current_bid = $request->bid_amount;
            $item->save();

            return redirect()->back()->with('success', 'Bid placed successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to place bid. Please try again later.');
        }
    }
}
