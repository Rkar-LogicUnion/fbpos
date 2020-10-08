<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    public function index(){
        $orders=Order::all();
        return view('receipts.receipts',['orders'=>$orders]);
    }
}
