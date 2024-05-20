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

    // Show order list for admin
    public function order_list(){
        return view('albums.order_list');
    }

    // Show all orders
    public function showAllorders(){
        $orders = order::all();
        return view('albums.order_list', compact('orders'));
    }

    // Delete order
    public function destroy_order(Order $order) {
        $order->delete();
        return redirect('/order_list');
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

    public function orderHistory(){
        return view('users.order_history');
    }
}
