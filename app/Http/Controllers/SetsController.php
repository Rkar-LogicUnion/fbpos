<?php

namespace App\Http\Controllers;

use App\Sets;
use Illuminate\Http\Request;

class SetsController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sets  $sets
     * @return \Illuminate\Http\Response
     */
    public function show(Sets $set)
    {
        return $set->items;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sets  $sets
     * @return \Illuminate\Http\Response
     */
    public function edit(Sets $sets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sets  $sets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sets $sets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sets  $sets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sets $sets)
    {
        //
    }
}
