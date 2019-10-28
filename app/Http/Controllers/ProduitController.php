<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Laboratoire;
use App\Demande;
use App\Substance;
use Illuminate\Http\Request;

class ProduitController extends Controller
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
        $id = $request->input('demande_id');
        $produit= Produit::create([
            'nom_medicament' => $request->input('nom_medicament'),
            'forme_pharmaceutique' => $request->input('forme_pharmaceutique'),
            'phone' => $request->input('phone'),
            'user_id' => $request->input('user_id'),
            'adresse' => $request->input('adresse'),
            'presentation' => $request->input('presentation'),
            'indication' => $request->input('indication'),
            'classe_therapeutique' => $request->input('classe_therapeutique'),
            'demande_id' => $request->input('demande_id'),
            'pght' => $request->input('pght'),
            'email' => $request->input('email'),
            'manufacturer' => $request->input('manufacturer'),
            ]);

            $produit_id = $produit->id; /** Pour la table des substances */
            $dosage = $request->input('dosage');
            $substance = $request->input('substance');
            for($i = 0; $i < count($dosage) ; $i++){
                $subs =  Substance::create([
                'substance' => $substance[$i],
                'dosage' => $dosage[$i],
                'demande_id' => $id
                ]);
            }

            return back()->with('success','Produit Enregistré avec succés!');

            $demande = Demande::where('demandes.user_id', Auth()->user()->id )->get();
            return view ('demande.index', ['demande' => $demande]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
