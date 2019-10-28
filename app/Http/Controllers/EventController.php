<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Validator;
use Calendar;
use App\Event;


class EventController extends Controller
{
    public function index(){
        $events = Event::get();
        $event_list = [];
        foreach($events as $key => $event){
            $event_list[] = Calendar::event(
                $event->title,
                true,
                new \DateTime($event->date),
                new \DateTime($event->date)
            );
        }
        $calendar_details = Calendar::addEvents($event_list);
        // dd($events);
        return view('events.index', compact('events'));
    }

    public function addEvent(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date'  => 'required',
            'demande_id'    => 'required',
            'user_id'   => 'required'
        ]);

        if($validator->fails()){
            \Session::flash('warning', 'Veuillez entrer des donnees valides');
            return Redirect::to('/events')->withInput()->withErrors($validator);
        }

        $event = new Event;
        $event->title = $request['title'];
        $event->date = $request['date'];
        $event->demande_id = $request['demande_id'];
        $event->user_id = $request['user_id'];

        $event->save();
        \Session::flash('success', 'Votre rendez-vous a ete bien enregistrer');
        return Redirect::to('\events');
    }
}
