<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function index(){
        return response()->json([
            'orders' => Order::with(['order_details.product', 'order_details.discount'])->get(),
        ]);
        
    }
    public function show(Order $order){
        return response()->json([
            'order' => Order::where('id', $order->id)->with(['order_details.product', 'order_details.discount'])->get(),
        ]);
        
    }
}
