<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Produit;
use App\Echantillon;
use App\Piece;
use App\Substance;
use App\Laboratoire;
use App\Motivation;
use App\Paiement;
use App\Dossier;
use App\User;
use App\Recevabilite;
use App\Evaluation;
use Illuminate\Http\Request;


class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth()->check() && Auth()->user()->role == 'admin'){

            $demande = Produit::join('demandes', 'demandes.id','=','produits.demande_id')
            ->get();

            // dd($demande);

            return view ('demande.index', ['demande' => $demande]);
        }elseif(Auth()->check() && Auth()->user()->role == 'pharmacien'){

            $demande = Produit::join('demandes', 'demandes.id','=','produits.demande_id')
            ->get();

            // dd($demande);

            return view ('demande.index', ['demande' => $demande]);
        }
        else{
            $demande = Produit::join('demandes', 'demandes.id','=','produits.demande_id')
            ->where('demandes.user_id', Auth()->user()->id )
            ->get();
            // dd($demande);
            return view ('demande.index', ['demande' => $demande]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = $_GET['id'];
        // dd($id);

        $demande = Demande::where('demandes.id', $id)->first();
        // dd($demande);
        $labo = Laboratoire::where('user_id', $id)->first();
        $produit = Produit::where('demande_id', $id)->first();
        $motivation = Motivation::where('demande_id', $id)->first();
        $paid = Paiement::where('demande_id', $id)->first();
        $files = Dossier::where('demande_id', $id)
                        ->get();

        $nb = count($files);
            //  dd(count($files));
        return view('demande.create' , [
            'paid' => $paid,
            'demande' => $demande,
            'labo' => $labo,
            'produit' => $produit,
            'motivation' => $motivation,
            'files' => $files,
            'nb' => $nb
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth()->user()->id;
        // dd($userId);
        $code = str_random(12);
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $code = str_shuffle($pin);

        // dd($code);

        $demande= Demande::create([
            'code' => $code,
            'type' => $request->input('type'),
            'labo' => $request->input('laboratoire'),
            'user_id' => $userId
            ]);

            // Enregistrement du Produit

            $id = $request->input('demande_id');
            $produit= Produit::create([
            'nom_medicament' => $request->input('nom_medicament'),
            'forme_pharmaceutique' => $request->input('forme_pharmaceutique'),
            'dci' => $request->input('dci'),
            'phone' => $request->input('phone'),
            'user_id' => $userId,
            'adresse' => $request->input('adresse'),
            'presentation' => $request->input('presentation'),
            'indication' => $request->input('indication'),
            'classe_therapeutique' => $request->input('classe_therapeutique'),
            'demande_id' => $demande->id,
            'pght' => $request->input('pght'),
            'email' => $request->input('email'),
            'manufacturer' => $request->input('manufacturer'),
            'excipient'     => $request->input('excipient')
            ]);

            $produit_id = $produit->id; /** Pour la table des substances */
            $dosage = $request->input('dosage');
            $substance = $request->input('substance');
            $unite = $request->input('unite');
            for($i = 0; $i < count($dosage) ; $i++){
                $subs =  Substance::create([
                'substance' => $substance[$i],
                'dosage' => $dosage[$i],
                'unite' => $unite[$i],
                'demande_id' => $demande->id
                ]);
            }

            $motivation= Motivation::create([
                'motivation' => $request->input('motivation'),
                'demande_id' => $demande->id,
                'user_id' => $userId
            ]);

            $demande = Demande::where('demandes.user_id', Auth()->user()->id )->get();
            return back()->with('success','Votre demande a été bien enregistrée!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {

        // dd($demande->id);
        $dem = Demande::join('users', 'demandes.user_id', '=', 'users.id')
            ->where('demandes.id', $demande->id)
            ->first();

            // dd($demande->id);
        $labo = Laboratoire::where('user_id', $demande->id)->first();
        // dd($labo);
        $prod = Produit::where('demande_id', $demande->id)->first();
        // dd($prod);
        // if(isset($prod->id)){
        //     dd("Is set");
        // }else{
        //     dd("Not set");
        // }
        $subs = Substance::where('demande_id', $demande->id)->get();
        // dd($subs);
        $motivation = Motivation::where('demande_id', $demande->id)->first();

        $dossier = Dossier::where('demande_id', $demande->id)->get();

        $user = User::where('role', 'pharmacien')->get();

        $received = Recevabilite::join('users', 'users.id', 'recevabilites.user_id')
        ->where('demande_id', $demande->id)->first();

        $evaluer = Evaluation::join('users', 'users.id', 'evaluations.users_id')
        ->where('demande_id', $demande->id)->first();

        // dd($evaluer);

        // foreach($dossier as $files){
        //     dd($files->filename);
        // }

        if ((Auth()->user()->id == $dem->id) || Auth()->user()->role == 'admin' || Auth()->user()->role == 'pharmacien' ){
        // dd($prod->id);
        return view ('demande.show', [
            'dem' => $demande,
            'prod' => $prod,
            'subs' => $subs,
            'labo' => $labo,
            'motivation' => $motivation,
            'demande' => $demande,
            'dossier' => $dossier,
            'user'  => $user,
            'received' => $received,
            'evaluer'   => $evaluer
        ]);
        } else{
            return view ('demande.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        if(Auth()->check() && Auth()->user()->role == 'admin' && $request->input('decision') == 0){
            $update = Demande::where('id','=',$demande->id)->update(['status' => 'Rejetée', 'rejected_by' => Auth()->user()->id ]);
            $demande = Demande::join('produits', 'demandes.id','=','produits.demande_id')->get();
            return view ('demande.index', ['demande' => $demande]);
        }else{
            $update = Demande::where('id','=',$demande->id)->update(['status' => 'Acceptée', 'approuved_by' => Auth()->user()->id]);
            $demande = Produit::join('demandes', 'demandes.id','=','produits.demande_id')->get();
            return view ('demande.index', ['demande' => $demande]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
