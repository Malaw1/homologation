<?php

namespace App\Http\Controllers;

use App\Paiement;
use App\Demande;
use Illuminate\Http\Request;

class PaiementController extends Controller
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
        // dd($request);
        $paid= Paiement::create([
            'name_on_card' => $request->input('name_on_card'),
            'card_number' => $request->input('card_number'),
            'expiration' => $request->input('expiration'),
            'user_id' => $request->input('user_id'),
            'cvv' => $request->input('cvv'),
            'demande_id' => $request->input('demande_id')
            ]);

            return back()->with('success','Vous avez payé vos frais de traitement de dossier. Vous pouvez maintenant uploader les modules necessaires!');

        $demande = Demande::where('demandes.user_id', Auth()->user()->id )->get();
        return view ('demande.index', ['demande' => $demande]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        //
    }
}
