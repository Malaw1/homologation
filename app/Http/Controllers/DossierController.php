<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Demande;
use Storage;
use Response;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class DossierController extends Controller
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
        $module_1 = $request->file('module');
        // dd($module_1);
        $extension = $module_1->extension()?: 'pdf';
        $destinationPath = storage_path('/app/public/uploads/modules/'.Auth()->user()->id.'/'.$request->input('demande_id'));
        $moduleName_1 = str_random(150) . '.' . $extension;
        $module_1->move($destinationPath, $moduleName_1);

        $labo= Dossier::create([
            'moduleNumber' => $request->input('moduleNumber'),
            'fileName' => $moduleName_1,
            'user_id' => Auth()->user()->id,
            'demande_id' => $request->input('demande_id')
        ]);

        return back()->with('success','Votre Module '.$request->input('moduleNumber').' a bien été uploader..!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {


        // dd($_GET['file']);
        $filename = 'app/public/uploads/modules/'.$dossier->user_id.'/'.$dossier->demande_id.'/'.$_GET['file'];
        $path = storage_path($filename);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossier $dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dossier $dossier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossier $dossier)
    {
        //
    }
}
