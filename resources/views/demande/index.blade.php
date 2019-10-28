@extends('layouts.layout')


@section('content')

<div class="row mt-5">
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
                          <th>Type</th>
                          <th>Code</th>
                          <th>Nom Commercial</th>
                          <th>Nom du Labo</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        <tbody>
                            @foreach($demande as $demande)
                                <tr>
                                    <td width="40">
                                        <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                        <label for="checkbox-1" class="custom-control-label"></label>
                                        </div>
                                    </td>
                                    <td>{{ $demande->type }}</td>
                                    <td>{{ $demande->code }}</td>
                                    <td>{{ $demande->nom_medicament }}</td>
                                    @if($demande->role == 'labo')
                                        <td>------------</td>
                                    @else
                                        <td>{{ $demande->labo }}</td>
                                    @endif

                                    @if($demande->status == 'Acceptée')
                                        <td><div class="badge badge-success">{{ $demande->status }}</div></td>
                                    @else
                                        <td><div class="badge badge-warning">{{ $demande->status }}</div></td>
                                    @endif
                                    <td>
                                    <a href="{{ url('/demande/' . $demande->id) }}" class="btn btn-action btn-secondary">Detail</a>

                                        @if(Auth()->check() && Auth()->user()->role != 'admin')

                                            <button class="item" disabled data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class=""><a href="{{ url('/demande/create?id=' . $demande->id) }}">Suivre</a></i>
                                            </button>

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
@endsection

