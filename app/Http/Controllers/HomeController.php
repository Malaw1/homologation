<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laboratoire;
use App\Demande;
use App\Autorisation;
use App\User;
use App\Produit;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $demande = Produit::join('demandes', 'demandes.id','=','produits.demande_id')
            ->where('demandes.user_id', Auth()->user()->id)
            ->get();

       $dem = count($demande);

       $totalDemande = Produit::join('demandes', 'demandes.id','=','produits.demande_id')->get();
        $toDem = count($totalDemande);

       $labo = Laboratoire::where('user_id', Auth()->user()->id)->get();
        $lab = count($labo);

        $totalLabo = Laboratoire::All();
        $toLab = count($totalLabo);

        $agence = User::where('role', 'agence')->get();
        $agences = count($agence);

        $amm = Autorisation::where('user_id', Auth()->user()->id)->get();
        $auto = count($amm);

        $autorisation = Autorisation::All();
        $autorised = count($autorisation);

        // $nbLabo =

        return view('home', [
            'lab' => $lab,
            'auto' => $auto,
            'demande' => $demande,
            'dem' => $dem,
            'toLab' => $toLab,
            'toDem' => $toDem,
            'agences' => $agences,
            'autorised' => $autorised,
            'totalDemande' => $totalDemande

            ]);
    }
}
