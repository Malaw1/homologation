<?php

namespace App\Http\Controllers;

use App\Recevabilite;
use App\Produit;
use Illuminate\Http\Request;

class RecevabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $received = Recevabilite::where('user_id', Auth()->user()->id)->get();
        dd($received);
        return view('recevabilite.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $demande = Produit::join('demandes', 'demandes.id', '=', 'produits.demande_id')
        ->where('demande_id', $_GET['id'])->first();
        // dd($demande);
        return view('recevabilite.create', ['demande' => $demande]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produit= Recevabilite::create([
            'user_id' => $request->input('user_id'),
            'demande_id' => $request->input('demande_id'),
            'deadline' => $request->input('deadline'),
            'commentaire' => $request->input('commentaire')
        ]);
        return back()->with('success','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function show(Recevabilite $recevabilite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function edit(Recevabilite $recevabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recevabilite $recevabilite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recevabilite $recevabilite)
    {
        //
    }
}
