@extends('layouts/app')
@section('content')
    <div class="row">
        @foreach ($orders as $order)
            <div class="col-3">
                <div class="card p-2 mb-2">
                    <div class="text-center">
                        <p>LIBRASUN SNACKS</p>
                        <p>Mid Valley City,</p>
                        <p>Lingkaran Syed Putra,</p>
                        <p>59200 Kuala Lumpur</p>
                    </div>
                    <div class="row">
                        <div class="col-6">Receipt No. {{ $order->id }}</div>
                        <div class="col-6 text-right">{{ $order->order_id }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Shift {{ $order->shift->name}}</div>
                        <div class="col-6 text-right">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('Y-m-d') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Cashier {{ $order->cashier->name}}</div>
                        <div class="col-6 text-right">{{ $order->created_at }}</div>
                    </div>
                    <p>{{ $order->type->name }}</p>
                    <table class="table bg-light">
                        <thead>
                            <tr>
                                <th scope="col">QTY</th>
                                <th scope="col">ITEM</th>
                                <th scope="col">AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->sets as $set)
                                <tr class="text-danger">
                                    <td>{{ $set->pivot->quantity }}</td>
                                    <td>
                                        <p>{{ $set->name }}</p>
                                        @foreach ($set->items as $item)
                                            <p>{{ $item->pivot->quantity }} {{ $item->name }}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        <p>{{ $set->price*$set->pivot->quantity }}</p>
                                        @foreach ($set->items as $item)
                                            <p>0.00</p>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($order->items as $addo)
                                <tr class="text-primary">
                                    <td>{{ $addo->pivot->quantity }}</td>
                                    <td>
                                        <p>{{ $addo->name }}</p>
                                        @php
                                            $order_addons = DB::table('orders_items_addons')
                                                        ->where('order_id', $order->id)
                                                        ->where('item_id', $addo->id)
                                                        ->join('addons', 'orders_items_addons.addon_id', '=', 'addons.id')
                                                        ->get();
                                        @endphp

                                        @foreach ($order_addons as $order_addon)
                                            <p class="text-success">{{ $order_addon->quantity }} {{ $order_addon->name }}</p>
                                        @endforeach

                                    </td>
                                    <td>
                                        <p>{{ $addo->price*$addo->pivot->quantity }}</p>
                                        @foreach ($order_addons as $order_addon)
                                            <p class="text-success">{{ $order_addon->price*$order_addon->quantity }}</p>
                                        @endforeach
                                    </td>
                                </tr>

                            @endforeach
                            <tr>
                                <td></td>
                                <td>Sub Total</td>
                                <td>{{ $order->subtotal }}</td>
                            </tr>
                            @if ($order->discount)
                            <tr>
                                <td></td>
                                <td>Discount</td>
                                <td>{{ $order->discount->percent }} %</td>
                            </tr>
                            @endif
                            <tr>
                                <td></td>
                                <td>Grand Total</td>
                                <td>{{ $order->grandtotal }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>CASH</td>
                                <td>{{ $order->grandtotal }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <p>CUSTOMER HOTLINE</p>
                        <p>(060) 3 2298 7229</p>
                        <p>***Thank You!***</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
