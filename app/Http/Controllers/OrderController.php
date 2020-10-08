<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order=new Order;
        $order->order_id=$request->orderID;
        $order->subtotal=$request->subtotal;
        $order->grandtotal=$request->grandtotal;
        $order->cash=$request->grandtotal;
        $order->cashiers_id=1;
        $order->shifts_id=1;
        $order->type_id=$request->type;
        if($request->discount['id'] > 0){
            $order->discount_id=$request->discount['id'];
        }
        $order->save();
        foreach ($request->orders as $value) {
            if($value['type']=='set'){
                $order->sets()->attach($value['id'],['quantity'=>$value['quantity']]);
            }else if($value['type']=='item'){
                $order->items()->attach($value['id'],['quantity'=>$value['quantity']]);
                foreach ($value['addOns'] as $valueAddon) {
                    $order->addons()->attach($valueAddon['id'],['quantity'=>$valueAddon['quantity'],"item_id"=>$value['id']]);
                }
            }
        }
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
