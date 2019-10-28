<?php

namespace App\Http\Controllers;

use App\Autorisation;
use App\Demande;
use App\Rejected;
use Illuminate\Http\Request;

class AutorisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth()->check() && Auth()->user()->role == 'admin'){

            $amm = Demande::join('produits', 'produits.demande_id', '=', 'demandes.id')
            ->join('autorisations', 'demandes.id','=','autorisations.demande_id')
            ->get();

            return view('autorisation.index', ['amm' => $amm]);
        }
        else{

            $amm = Demande::join('produits', 'produits.demande_id', '=', 'demandes.id')
            ->join('users', 'users.id', '=', 'demandes.user_id')
            ->join('autorisations', 'demandes.id','=','autorisations.demande_id')
            ->where('demandes.user_id', Auth()->user()->id)
            ->get();

            // $amm = Demande::join('users', 'users.id', '=', 'demandes.user_id')
            // ->join('autorisations', 'demandes.id','=','autorisations.demande_id')
            // ->join('produits', 'produits.demande_id', '=', 'demandes.id')
            // ->where('demandes.user_id', Auth()->user()->id)
            // ->get();
            // dd($amm);
            return view('autorisation.index', ['amm' => $amm]);
        }


        // dd($amm);

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
        $y = Date('Y');
        $ex = $y + 5;

        $expiration = Date($ex.'-m-d');

        $code = str_random(12);
        $numero = str_random(8);

        if($request->input('status') == '0'){
            $rejected= Rejected::create([
                'demande_id' => $request->input('demande_id'),
                'user_id' => Auth()->user()->id,
                ]);

                return back()->with('success','Vous avez rejter la demande!');

        }else
        {
            $autorisation= Autorisation::create([
                'code' => $code,
                'numero' => $numero,
                'expiration' => $expiration,
                'demande_id' => $request->input('demande_id'),
                'user_id' => Auth()->user()->id
                ]);

                $amm = Autorisation::join('demandes', 'demandes.id','=','autorisations.demande_id')
                ->join('produits', 'produits.demande_id', '=', 'autorisations.demande_id')
                ->get();

                // dd($amm);
                return view('autorisation.index', ['amm' => $amm]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autorisation  $autorisation
     * @return \Illuminate\Http\Response
     */
    public function show(Autorisation $autorisation)
    {
        // dd($autorisation);
        // $amm = Autorisation::join('demandes', 'demandes.id','=','autorisations.demande_id')
        // ->join('produits', 'produits.demande_id', '=', 'autorisations.demande_id')
        // ->first();
        // dd($amm);

        $amm = Demande::join('produits', 'produits.demande_id', '=', 'demandes.id')
        ->join('autorisations', 'demandes.id','=','autorisations.demande_id')
        ->where('autorisations.id', $autorisation->id)
        ->first();
        // dd($amm);

        $test = "Autorisation de Mise sur le Marche du Produit: ".$amm->produit.
        "<br /> Numero: ".$amm->numero.
        "<br /> Date d'autorisation: ". $amm->created_at.
        "<br /> Date d'expiration: ". $amm->expiration.
        "<br /> Laboratoire detenteur de l'AMM: ". $amm->labo.
        "<br /> Adresse: ". $amm->adresse.
        "<br /> Phone Number: ".$amm->phone.
        "<br />Email: ".$amm->email
         ;
        // dd($test);
        // $demande = Demande::join('produits', 'demandes.id','=','produits.demande_id');
        return view('autorisation.show', ['test' => $test, 'amm' => $amm] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autorisation  $autorisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Autorisation $autorisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autorisation  $autorisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autorisation $autorisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autorisation  $autorisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autorisation $autorisation)
    {
        //
    }
}
