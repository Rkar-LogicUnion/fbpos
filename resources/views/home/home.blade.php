@extends('layouts/app')

@php
    $shift=App\Shift::first();
@endphp

@section('content')
    <div class="container-fluid mt-2" id="root">
        <div class="row">
            <div class="col-2">
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Shift : {{ $shift->name }}</li>
                        <li class="list-group-item">Cashier : {{ $shift->cashiers->last()->name }}</li>
                    </ul>
                </div>
                @include('home/types')
                @include('home/discount')
            </div>
            <div class="col-6" id="order">
                <h4 v-show="hasOrder">No Order</h4>
                <div v-show="!hasOrder">
                    @include('home/order')
                </div>
            </div>
            <div class="col-4">
                @include('home/set')
                @include('home/items')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/itemselect.js') }}"></script>
@endsection
