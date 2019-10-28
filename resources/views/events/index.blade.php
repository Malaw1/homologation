@extends('layouts.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">

<div class="container">
    @if(Auth()->user()->role != 'pharmacien')
    <div class="panel panel-primary">
        <div class="panel-heading">Prise de Rendez-Vous</div>
            <div class="panel-body">
                <form action="{{ route('addEvent') }}" method="get" files="true">
                    <div class="col-xs-12">
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('warning'))
                            <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                        @endif
                    </div>



                {{ method_field('PATCH') }}
                @csrf
                    <div class="col-xs-4 col-md-4 col-sm-4">
                        <label for="">Titre</label>
                        <input type="text" name="title" id="" class="form-control">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-xs-4 col-md-4 col-sm-4">
                        <label for="">Date RV</label>
                        <input type="date" name="date" id="" class="form-control">
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-xs-4 col-md-4 col-sm-4">
                        <label for=""></label>
                        <input type="hidden" name="demande_id" required value="5">
                        <input type="hidden" name="user_id" required value="{{ Auth()->user()->id }}">
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="panel-primary panel">
        <div class="panel-heading">Mon Calendrier</div>
        <div class="panel-body">
        <div id='calendar'></div>
        </div>
    </div>
    @else
    <br>  <br>  <br>  <br>
    <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="float-right">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-secondary"><i class="ion ion-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <h4>Demandes Reçues</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th class="text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label"></label>
                            </div>
                          </th>
                          <th>Date</th>
                          <th>Motif</th>
                          <th>Demandeur</th>
                          <th>Action</th>
                        </tr>
                        <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <td></td>
                                    <td>{{$event->date}}</td>
                                    <td>{{$event->title}}</td>
                                    <td>{{$event->demandeur}}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
    @endif
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

@endsection
