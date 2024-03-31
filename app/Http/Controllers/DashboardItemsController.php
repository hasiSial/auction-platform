<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class DashboardItemsController extends Controller
{
    //view items index page
    public function indexItem()
    {
        $data = Item::with('user')->get();
        
        return view('dashboard.pages.items.index',[
            'data' => $data
        ]);
    }

    //view item create page
    public function createItem()
    {
        return view('dashboard.pages.items.create');
    }

    // view item store in db
    public function storeItem(Request $request)
    {
        // Validate the data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'starting_price' => ['required', 'numeric', 'min:0'],
            'auction_end_time' => ['required', 'date'],
            'description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = new Item();
        $item->name = $request->input('name');
        $item->starting_price = $request->input('starting_price');
        $item->auction_end_time = $request->input('auction_end_time');
        $item->description = $request->input('description');
        $item->seller_id = Auth::id();

        try {
            $item->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to store item. Please try again later.');
        }

        return redirect()->back()->with('success', 'Item stored successfully!');
    }


    //view edit-item page
    public function editItem(String $id)
    {
        $item = Item::where('id',$id)->first();
        return view('dashboard.pages.items.edit',[
            'item' => $item
        ]);
    }

    //update item
    public function updateItem(Request $request)
    {
        // Validate the data
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'starting_price' => ['required', 'numeric', 'min:0'],
            'auction_end_time' => ['required', 'date'],
            'description' => ['required', 'string'],
        ]);

        $item = Item::findOrFail($request->input('item_id'));

        // Update the item data into db
        $item->name = $request->input('name');
        $item->starting_price = $request->input('starting_price');
        $item->auction_end_time = $request->input('auction_end_time');
        $item->description = $request->input('description');

        // Save the updated item
        try {
            $item->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update item. Please try again later.');
        }

        return redirect()->route('index.item')->with('success', 'Item updated successfully!');
    }

    //delete item from db
    public function destroyItem(String $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        try {
            $item->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete item. Please try again later.');
        }

        return redirect()->back()->with('success', 'Item deleted successfully!');
    }

}
