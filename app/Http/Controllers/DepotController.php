<?php

namespace App\Http\Controllers;

use App\Depot;
use Illuminate\Http\Request;

class DepotController extends Controller
{

    public function pdf($type,$fileName)
    {
        $path = storage_path('app/'.$type.'/'.$fileName);
        return response()->file($path);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function show(Depot $depot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function edit(Depot $depot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depot $depot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depot $depot)
    {
        //
    }
}
