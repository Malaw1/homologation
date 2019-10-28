<?php

namespace App\Http\Controllers;

use App\Laboratoire;
use App\Demande;
use Illuminate\Http\Request;

class LaboratoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth()->check() && Auth()->user()->role == 'admin'){

            $labo = Laboratoire::join('users', 'users.id','=','laboratoires.user_id')
            ->get();

            // dd($demande);

            return view ('laboratoire.index', ['labo' => $labo]);
        }
        else{
            $labo = Laboratoire::where('user_id', Auth()->user()->id )->get();
            return view ('laboratoire.index', ['labo' => $labo]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laboratoire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $labo= Laboratoire::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'user_id' => $request->input('user_id'),
            'adresse' => $request->input('adresse'),
            'region' => $request->input('region'),
            'pays' => $request->input('pays'),
            'zip' => $request->input('zip'),
            ]);

            $labo = Laboratoire::where('user_id', Auth()->user()->id )->get();
            return view ('laboratoire.index', ['labo' => $labo])->with('success','Laboratoire Enregistrer avec succés!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laboratoire  $laboratoire
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratoire $laboratoire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratoire  $laboratoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratoire $laboratoire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratoire  $laboratoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratoire $laboratoire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratoire  $laboratoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratoire $laboratoire)
    {
        //
    }
}
