<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Demande;


class MailController extends Controller {



    public function send(Request $request){
        $this->validate($request, [
            'recipient' => 'required|email',
            'objet' => 'required',
            'message' => 'required'
            ]);

            $data = array(
                'recipient' => $request->recipient,
                'objet' => $request->objet,
                'message'   => $request->message
            );

            // dd($request);
            $demande_id = $request->input('demande_id');

            if($request->input('status') == 0){
                $update = Demande::where('id','=',$demande_id)->update(['status' => 'Rejetée', 'rejected_by' => Auth()->user()->id ]);
            }elseif($request->input('status') == 1){
                $update = Demande::where('id','=',$demande_id)->update(['status' => 'Acceptée', 'approuved_by' => Auth()->user()->id ]);
            }

            Mail::to($data['recipient'])->send(new SendMail($data));
            return back()->with('success', 'Votre message a ete bien envoye');
        }


        function recevabilite(Request $request){
            $this->validate($request, [
                'recipient' => 'required|email',
                'objet' => 'required',
                'message' => 'required'
            ]);

            $data = array(
                'recipient' => $request->recipient,
                'objet' => $request->objet,
                'message'   => $request->message
            );

            // dd($request);
            $demande_id = $request->input('demande_id');

            if($request->input('recevable') == 'ok'){
                $update = Demande::where('id','=',$demande_id)->update(['recevabilite' => 'ok', 'received_by' => Auth()->user()->id ]);
            }elseif($request->input('recevable') == 'ko'){
                $update = Demande::where('id','=',$demande_id)->update(['recevabilite' => 'ko', 'received_by' => Auth()->user()->id ]);
            }

            Mail::to($data['recipient'])->send(new SendMail($data));
            return back()->with('success', 'Votre message a ete bien envoye');
        }

}
