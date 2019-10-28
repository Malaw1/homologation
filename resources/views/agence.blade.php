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
                    <h4>Agences</h4>
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
                          <th>Nom de l'agence</th>
                          <th>Adresse</th>
                          <th>Personne Responsable</th>
                          <th>Telephone</th>
                          <th>Email</th>
                        </tr>
                        <tbody>
                            @foreach($agence as $agence)
                                <tr>
                                    <td width="40">
                                        <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                        <label for="checkbox-1" class="custom-control-label"></label>
                                        </div>
                                    </td>
                                    <td>{{ $agence->name }}</td>
                                    <td>{{ $agence->adresse }}</td>
                                    <td>{{ $agence->first_name }} {{ $agence->last_name }}</td>
                                    <td>{{ $agence->telephone }}</td>
                                    <td>{{ $agence->email }}</td>
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

