@extends('layouts.layout')

@section('content')
<div class="container">
    <div id="accordion">
        <div class="card" id="produit">
            <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                2. Identification du Produit
                </button>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <form action="{{ route('produit.store')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="">Nom du Medicament</label>
                                <input type="text" class="form-control" placeholder="Nom du Medicament" name="nom_medicament">
                            </div>
                            <div class="col">
                                <label for="">Forme Pharmaceutique</label>
                                <input type="text" class="form-control" placeholder="Forme Pharmaceutique" name="forme_pharmaceutique">
                            </div>
                        </div>
                        <br />
                        <div class="form-row">

                            <div class="col">
                                <label for="">Presentation</label>
                                <input type="text" class="form-control" placeholder="Presentation" name="presentation">
                            </div>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="col">
                                <label for="">Indication therapeutique</label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea class="summernote-simple" name="indication" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="">Classe Therapeutique</label>
                                <input type="text" class="form-control" placeholder="Classe therapeutique" name="classe_therapeutique">
                            </div>
                        </div>

                        <br />
                        <div class="form-row react">
                            <div class="col">
                                <label for="">Substance Active</label>
                                <input type="text" class="form-control" placeholder="Substance Active" name="substance[]">
                            </div>
                            <div class="col">
                                <label for="">Dosage</label>
                                <input type="text" class="form-control" placeholder="Dosage" name="dosage[]">
                            </div>
                            <br />

                            <button type="button" class="fcbtn btn btn-success" id='add'>
                                <i class="fa fa-plus">+</i>
                            </button>
                            <button type="button" class="fcbtn btn btn-danger" id='remove'>
                                    <i class="fa fa-remove">-</i>
                            </button>
                        </div>
                         <br />
                        <div class="form-row">
                            <div class="col">
                                <label for="">Prix Grossiste Hors taxe</label>
                                <input type="text" class="form-control" placeholder="PGHT" name="pght">
                            </div>
                            <div class="col">
                                <!-- <input type="text" class="form-control" placeholder="Prix de Revient pour le Traitement" name="prpt"> -->
                            </div>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="col">
                                <label for="">Nom du Labo Fabricant</label>
                                <input type="text" class="form-control" placeholder="Manufacturer" name="manufacturer">
                            </div>
                            <div class="col">
                                <label for="">Adresse</label>
                                <input type="text" class="form-control" placeholder="Adrese" name="adresse">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Email du labo Fabricant</label>
                                <input type="text" class="form-control" placeholder="Manufacturer email" name="email">
                            </div>
                            <div class="col">
                                <label for="">Telephone du Labo Fabricant</label>
                                <input type="text" class="form-control" placeholder="Manufacturer's Phone Number" name="phone">
                            </div>
                        </div>
                        <br>

                        <input type="hidden" value="{{Auth()->user()->id}}" name="user_id">

                        <input type="hidden" value="{{$_GET['code'] }}" name="demande_id">

                        <div class="form-row">
                            <div >
                                <input type="submit" class="btn btn-primary" value="Enregistrer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                3. Motivation
                </button>
            </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <form action="{{ route('motivation.store') }}" method="post">
                        @csrf
                        <textarea name="motivation" class="form-control rounded-0" id="" cols="30" rows="10"></textarea>

                        <input type="hidden" value="{{Auth()->user()->id}}" name="user_id">

                        <input type="hidden" value="{{$_GET['code'] }}" name="demande_id">
                        <br />
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

   <!-- Ajout et Retrait pour le Les substances Actives -->
<script>
    function checkRemove() {
        if ($('div.react').length == 1) {
            $('#remove').hide();
        } else {
            $('#remove').show();
        }
    };
    $(document).ready(function() {
        checkRemove()
        $('#add').click(function() {
            $('div.react:last').after($('div.react:first').clone());
            checkRemove();
        });
        $('#remove').click(function() {
            $('div.react:last').remove();
            checkRemove();
        });
    });
</script>
