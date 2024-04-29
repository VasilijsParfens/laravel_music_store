<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function showLibrary(){
        // Get the authenticated user's orders
        $userOrders = Order::where('user_id', auth()->id())->with('album')->get();

        // Pass the orders data to the view
        return view('albums.library', ['userOrders' => $userOrders]);
    }
}
