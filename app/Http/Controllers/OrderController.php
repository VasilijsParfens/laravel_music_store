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

    public function getOrdersByUser($userId)
    {
        $orders = Order::where('user_id', $userId)->get();
        return view('albums.order_list', compact('orders'));
    }

    public function getOrdersByAlbum($albumId)
    {
        $orders = Order::where('album_id', $albumId)->get();
        return view('albums.order_list', compact('orders'));
    }

    public function commentHistory(){
        return view('users.comment_history');
    }
}
