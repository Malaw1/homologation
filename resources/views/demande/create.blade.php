@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-5">Suivi de Votre Demande</h1>
        <p class="lead">{{ $demande->type}} du produit: <strong>{{ $produit->nom_medicament }} {{ $produit->forme_pharmaceutique }} </strong> du laboratoire <I>{{ $demande->labo }}</I></p>
        <hr class="my-4">


        @if($demande->status != 'Acceptée')
            <div class="alert alert-warning">
                Status: <strong>{{ $demande->status}}</strong>
            </div>
        @else
            <div class="alert alert-success">
                Status: <strong>{{ $demande->status}}</strong>
            </div>
        @endif
        <p class="lead">
        </p>
    </div>

    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    II. Confirmation et Paiement
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                @if($demande->status === 'Acceptée')
                <h2>Conditions de traitements des dossiers</h2>
                    <div class="">
                        <h4>What is Lorem Ipsum?</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>
                        <h4>Why do we use it?</h4>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content
                            of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as opposed to using 'Content here, content here',
                            making it look like readable English. Many desktop publishing packages and web page editors now use
                            Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites
                            still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes
                            on purpose (injected humour and the like).

                        </p>

                        <h4>Where does it come from?</h4>

                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                            piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                            McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the
                            more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites
                                of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from
                                sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                                by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during
                                the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line
                                    in section 1.10.32.
                            <br />
                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                            for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum
                            et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                            by English versions from the 1914 translation by H. Rackham.
                        </p>


                        <h4>Where can I get some?</h4>
                        <p>
                            There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form, by injected humour,
                            or randomised words which don't look even slightly believable.
                            If you are going to use a passage of Lorem Ipsum, you need to be sure
                            there isn't anything embarrassing hidden in the middle of text.
                            All the Lorem Ipsum generators on the Internet tend to repeat predefined
                            chunks as necessary, making this the first true generator on the Internet.
                            It uses a dictionary of over 200 Latin words, combined with a handful of model
                            sentence structures, to generate Lorem Ipsum which looks reasonable.
                            The generated Lorem Ipsum is therefore always free from repetition, injected humour,
                            or non-characteristic words etc.
                        </p>

                        @if($demande->status == 'Accepetée' && $paid->demande_id == $_GET['id'])
                        <button type="button" disabled class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Accepter et Payer
                        </button>
                        @else
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Accepter et Payer
                        </button>
                        @endif
                    </div>
                @endif
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    III. Depot des dossiers
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                @if($paid == null)
                <div class="card-body">
                    <p>Veuillez Payer les frais de demande de l'Autorisation de Mise sur le Marché</p>
                </div>
                @elseif($paid->demande_id == $demande->id)
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">

                            <h4>Progress</h4>
                        </div>
                        <div class="card-body">
                            <p id="progress-striped" data-tab-group="progress" class="active">
                                @if($nb == 1)
                                <div class="progress mb-3">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                                </div>
                                @elseif($nb == 2)
                                <div class="progress mb-3">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                </div>
                                @elseif($nb == 3)
                                <div class="progress mb-3">
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                </div>
                                @elseif($nb == 4)
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                                </div>
                                @elseif($nb == 5)
                                <div class="progress mb-3">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">100%</div>
                                </div>
                                @else
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dossier.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if($nb < 5)
                                <h4>Veuillez Uploader le module <strong>{{ $nb + 1 }}</strong></h4>
                                <div class="row">
                                    <div class="col-sm-9 ol-md-9 col-xs-12">
                                        <div class="white-box">
                                            <input type="file" name="module"  class="form-control" required />
                                            <input type="hidden" name="moduleNumber" value="{{ $nb + 1 }}" />
                                            <input type="hidden" value="{{$_GET['id'] }}" name="demande_id">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 ol-md-3 col-xs-12">
                                        <div class="white-box">
                                            <button type="submit" class="btn-lg btn btn-primary full-width">Deposer</button>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <h4>Vos document ont ete bien uploader..! Nous vous enverrons une acusee de reception sous peu..! Merci bcp</h4>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

                @else

                @endif
            </div>
        </div>

        <div class="card">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">

<div class="container">
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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('paiement.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" name="name_on_card" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                Name on card is required
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" name="card_number" placeholder="" required>
                <div class="invalid-feedback">
                Credit card number is required
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="mm/yy" name="expiration" required>
                <div class="invalid-feedback">
                Expiration date required
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required name="cvv">
                <div class="invalid-feedback">
                Security code required
                </div>
            </div>
        </div>
                <input type="hidden" name="demande_id" value="{{ $demande->id }}">
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection
@push('js')
    <script src="{{asset('js/jasny-bootstrap.js')}}"></script>

    <script src="{{asset('plugins/components/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $(function() {
            // Basic
            $('.dropify').dropify();
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });
            // Used events
            var drEvent = $('#input-file-events').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
@endpush
