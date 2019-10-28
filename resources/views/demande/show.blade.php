@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Suivi de votre demande</h5>
                <div class="card-body">
                    <h5 class="card-title">Numero: {{ $dem->code }}</h5>
                    <p class="card-text">
                        {{ $dem->type}} du produit: <strong>{{ $prod->nom_medicament }}</strong> du laboratoire <I>{{ $dem->labo }}</I>
                        <br />
                        @if($dem->status != 'Acceptée')
                            Status: {{ $dem->status}}
                        @else
                            Status: demande de depot de dossier {{ $dem->status}}
                        @endif
                    </p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="white-box printableArea">
                    @if($labo != null)
                        <h3><b>{{ $dem->type }}</b> <span class="pull-right">#{{ $dem->id}}</span></h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <address>
                                        <h3> &nbsp; <b class="text-danger">{{ $labo->name }}</b></h3>
                                        <p class="text-muted m-l-5">
                                                    &nbsp;   {{ $labo->adresse_1}},
                                            <br/> &nbsp; {{ $labo->zip}}, {{ $labo->region}}
                                            <br/> &nbsp;  {{ $labo->pays}}
                                    </address>
                                </div>
                                @endif
                                <!-- <div class="pull-right text-right">
                                    <address>
                                        <h3>To,</h3>
                                        <h4 class="font-bold">Gaala & Sons,</h4>
                                        <p class="text-muted m-l-30">C-201,
                                            <br/> Beykoz-34800,
                                            <br/> Istanbul,
                                            <br/> Turkey.</p>
                                        <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 23rd Jan 2017</p>
                                        <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2017</p>
                                    </address>
                                </div> -->
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Identification du Produit</div>
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                    @if($prod != null)
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Nom du Medicament</th>
                                                <td>{{ $prod->nom_medicament }}</td>
                                            </tr>
                                            <tr>
                                                <th>Forme Pharmaceutique</th>
                                                <td>{{ $prod->forme_pharmaceutique }}</td>
                                            </tr>
                                            <tr>
                                                <th>Presentation</th>
                                                <td>{{ $prod->presentation }}</td>
                                            </tr>

                                            <tr>
                                                <th>Classe Therapeutique</th>
                                                <td>{{ $prod->classe_therapeutique }}</td>
                                            </tr>
                                            <tr>
                                                <th>PGHT</th>
                                                <td>{{ $prod->pght }}</td>
                                            </tr>
                                            <!-- <tr>
                                                <th>PRPT</th>
                                                <td>{{ $prod->prpt }}</td>
                                            </tr> -->
                                        </table>
                                    @endif
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Substances Actives</div>
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                    @if($subs != null)
                                        <table class="table table-hover">
                                            <thead>
                                                <th>Substances</th>
                                                <th>Dosage</th>
                                                <th>Unite</th>
                                            </thead>
                                            <tbody>
                                                @foreach($subs as $subs)
                                                <tr>
                                                    <td>{{ $subs->substance }}</td>
                                                    <td>{{ $subs->dosage }}</td>
                                                    <td>{{ $subs->unite }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Laboratoire Fabricant</div>
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        @if($prod != null)
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Nom du Laboratoire</td>
                                                    <td>{{ $prod->manufacturer }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Adresse</td>
                                                    <td>{{ $prod->adresse }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{ $prod->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Numero de Telephone</td>
                                                    <td>{{ $prod->phone }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @else
                                            <p>Laboratoire Demandeur</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br />

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Indication Therapeutique</div>
                                    <div class="card-body">
                                        <p>{{ $prod->indication }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Motivation de la Demande</div>
                                    <div class="card-body">
                                    @if($motivation != null)
                                        <p>{{$motivation->motivation }} </p>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br />
                        @if(isset($dossier))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Documents Accompagnant la demande</div>
                                        <div class="card-body">
                                            @foreach($dossier as $files)
                                            <div class="row">
                                                <div class="col-sm-6 ol-md-6 col-xs-12">
                                                    <div class="white-box">
                                                        <object data="{{ url('dossier/'.$files->id.'?file='.$files->filename) }}" type="application/pdf" width="98%" height="100%"></object>
                                                        <h3 class="box-title"><a href="{{ url('dossier/'.$files->id.'?file='.$files->filename) }}" target="_blank" >Module {{ $files->moduleNumber }}</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!--  -->
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                        @endif

                        @if($demande->status != 'Acceptée' and Auth()->user()->poste == 'Responsable DCAM')
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Autorisez-vous le demandeur a deposer son dossier ?</div>
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#refusDepot">
                                            Refuser
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#deposer">
                                            Acceptée
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($received != null && Auth()->user()->id == $received->user_id )
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Recevabilité Administrative</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#ko">
                                                    Non Favorable
                                                </button>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#ok">
                                                    Favorable
                                                </button>
                                            </div>
                                            <div class="col-md-2">
                                                <a type="button" href="{{url('recevabilites/create?id='.$demande->id)}}" class="btn btn-warning mb-1">
                                                    Remplir la Grille
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                            @if(Auth()->user()->poste == 'Responsable DCAM' && $demande->status == 'Acceptée' && $demande->recevabilite != 'ok')
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Recevabilité Administrative</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#ko">
                                                        Non Favorable
                                                    </button>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#ok">
                                                        Favorable
                                                    </button>
                                                </div>
                                                @if($received == null)
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#recev">
                                                        Confier le dossier à
                                                    </button>
                                                </div>
                                                @else

                                                <div class="col-md-6">
                                                    <h4>Ce Dossier est confié a : <strong>{{ $received->titre }} {{ $received->name }}</strong></h4>
                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @elseif(Auth()->user()->role == 'admin' && $demande->recevabilite == 'ok')
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Evaluation Technique</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#recev">
                                                        Confier le dossier à
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Decision de la Commission</div>
                                        <!-- <div class="card-body">
                                            <button class="btn-success">Accorder</button>
                                            <button class="btn-danger">Rejeter</button>
                                        </div> -->
                                    </div>
                                </div>
                                @endif
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






















<!-- modal Confier le dossier -->
<div class="modal fade" id="recev" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Confier le dossier a </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('recevabilites') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nom du Pharmacien Responsable de ce dossier</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($user as $pharmacien)
                                    <option value="{{ $pharmacien->id }}">{{ $pharmacien->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Deadline</label>
                            <input type="date"  class="form-control" id="recipient-name" name="deadline">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Commentaire:</label>
                            <input type="hidden" name="demande_id" placeholder="demande_id" value="{{$demande->id }}">
                            <textarea class="form-control z-depth-1" name="commentaire" ></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
<!-- end modal COnfier le dossier -->






<!-- modal Autorisation de Depot -->
<div class="modal fade" id="deposer" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Autorisation de Depot de Dossier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mail/send')  }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Destinataire:</label>
                            <input type="text" class="form-control" name="recipient" id="recipient-name" value="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Objet:</label>
                            <input type="text" value="[Enregistrement du produit: {{ $prod->nom_medicament }} sous le numero : {{ $demande->code }}]" class="form-control" id="recipient-name" name="objet">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <input type="hidden" name="status"  value="1">
                            <input type="hidden" name="demande_id" placeholder="demande_id" value="{{$demande->id }}">
                            <textarea class="form-control z-depth-1" name="message" ></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
<!-- end modal Autorisation de Depot -->

<!-- modal Refus de Depot -->
<div class="modal fade" id="refusDepot" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Refus de Depot de Dossier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mail/send') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="email" class="form-control" name="recipient" id="recipient-name" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Objet:</label>
                            <input type="text" required value="[Enregistrement du produit: {{ $prod->nom_medicament }} sous le numero : {{ $demande->code }}]" class="form-control" id="recipient-name" name="objet">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <input type="hidden" name="status"  value="0">
                            <input type="hidden" name="demande_id" placeholder="demande_id" value="{{$demande->id }}">
                            <textarea class="form-control z-depth-1" name="message" required ></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
<!-- end modal Reject -->

<!-- modal recevabilite Rejected -->
    <div class="modal fade" id="ko" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Notification de la Recevabilité Administrative</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('mail/recevabilite') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Destinataire:</label>
                            <input type="text" class="form-control" name="recipient" id="recipient-name" value="{{ Auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Objet:</label>
                            <input type="text" value="[Enregistrement du produit: {{ $prod->nom_medicament }} sous le numero : {{ $demande->code }}]" class="form-control" id="recipient-name" name="objet">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <input type="hidden" name="recevable" value="ko">
                            <input type="hidden" name="demande_id" value="{{$demande->id }}">
                            <textarea class="form-control z-depth-1" name="message" ></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
<!-- end modal Reject -->

<!-- modal Recevablite Accepted -->
<div class="modal fade" id="ok" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Recevabilité Administrative</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('mail/recevabilite') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Destinataire:</label>
                        <input type="text" class="form-control" name="recipient" id="recipient-name" value="{{ Auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Objet:</label>
                        <input type="text" value="" class="form-control" id="recipient-name" name="objet">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <input type="hidden" name="recevable" value="ok">
                        <input type="hidden" name="demande_id" placeholder="demande_id" value="{{$demande->id }}">
                        <textarea class="form-control z-depth-1" name="message" ></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal Accept -->

<!-- modal Accepter -->
<div class="modal fade" id="accepter" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Notification de la Decision de la Commission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('demande.update', $demande->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" name="recipient" id="recipient-name" value="{{ Auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Objet:</label>
                        <input type="text" value="" class="form-control" id="recipient-name" name="objet">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <input type="hidden" name="demande_id" placeholder="demande_id" value="{{$demande->id }}">
                        <textarea class="summernote" name="message" ></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal Rejeter -->
<div class="modal fade" id="rejeter" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Notification de la Decision de la Commission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('demande.update', $demande->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" name="recipient" id="recipient-name" value="{{ Auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Objet:</label>
                        <input type="text" value="" class="form-control" id="recipient-name" name="objet">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <input type="hidden" value="0" name="decision">
                        <input type="hidden" name="demande_id" placeholder="demande_id" value="{{$demande->id }}">
                        <textarea class="summernote" name="message" ></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
