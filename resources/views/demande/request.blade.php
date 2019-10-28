@extends('layouts.layout')


@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Nouvelle demande d'enregistrement</h5>
        <div class="card-body">
            <form action="{{ route('demande.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Type de la demande</label>
                    <input type="text" class="form-control" value="Enregistrement" name="type">
                </div>

                @if(Auth()->check() && Auth()->user()->role == 'agence')
                <div class="form-group">
                    <label for="exampleInputPassword1">Laboratoire demandeur:</label>
                    <select name="laboratoire" class="form-control" id="lab">
                        @foreach($labo as $lab)
                            <option value="{{ $lab->name }}">{{ $lab->name }}</option>
                        @endforeach
                    </select>
                </div>
                @else
                <input type="hidden" value="{{Auth()->user()->id}}" name="laboratoire">
                @endif

                        <div class="form-row">
                            <div class="col">
                                <label for="">Nom du Medicament</label>
                                <input type="text" class="form-control" placeholder="Nom du Medicament" name="nom_medicament">
                            </div>
                            <div class="col">
                                <label for="">Classe Therapeutique</label>
                                <input type="text" class="form-control" placeholder="Classe therapeutique" name="classe_therapeutique">
                            </div>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="col">
                                <label for="">Presentation</label>
                                <input type="text" class="form-control" placeholder="Presentation" name="presentation">
                            </div>
                            <div class="col">
                                <label for="">Forme Pharmaceutique</label>
                                <select name="forme_pharmaceutique" id="" class="form-control">
                                    <optgroup label="Liquides">
                                        <option value="Solution">Solution</option>
                                        <option value="Suspension">Suspension</option>
                                        <option value="Émulsion">Émulsion</option>
                                        <option value="Mousse">Mousse</option>
                                        <option value="Bain de bouche">Bain de bouche</option>
                                        <option value="Gargarisme">Gargarisme</option>
                                        <option value="Sirop">Sirop</option>
                                        <option value="Spray(Spray nasal)">Spray(Spray nasal)</option>
                                        <option value="Gouttes otiques">Gouttes otiques</option>
                                        <option value="Gouttes ophtalmiques">Gouttes ophtalmiques</option>
                                        <option value="Gouttes nasales">Gouttes nasales</option>
                                        <option value="Lavement">Lavement</option>
                                        <option value="Douche vaginale">Douche vaginale</option>
                                        <option value="Lotion">Lotion</option>
                                        <option value="Liniment">Liniment</option>
                                    </optgroup>

                                    <optgroup label="Semi-Solides">
                                        <option value="Gel">Gel</option>
                                        <option value="Creme">Creme</option>
                                        <option value="Pommade">Pommade</option>
                                    </optgroup>

                                    <optgroup label="Souples">
                                        <option value="Timbre transdermique">Timbre transdermique</option>
                                    </optgroup>

                                    <optgroup label="Solides">
                                        <option value="Poudre">Poudre</option>
                                        <option value="Suppositoire">Suppositoire</option>
                                        <option value="Ovule">Ovule</option>
                                        <option value="Capsule">Capsule</option>
                                        <option value="Gélule">Gélule</option>
                                        <option value="Gélule gastro-résistante">Gélule gastro-résistante</option>
                                        <option value="Granulé">Granulé</option>
                                        <option value="Granule">Granule</option>
                                        <option value="Cachet">Cachet</option>
                                        <option value="Comprimé">Comprimé</option>
                                        <option value="Dragée">Dragée</option>
                                        <option value="Comprimé effervescent">Comprimé effervescent</option>
                                        <option value="Pastille">Pastille</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="col">
                                <label for="">Indication therapeutique</label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group shadow-textarea">
                                            <textarea name="indication" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-divider">
                            DCI
                        </div>

                        <div class="form-row react">
                            <div class="col">
                                <label for="">Substance Active</label>
                                <input type="text" class="form-control" placeholder="Substance Active" name="substance[]">
                            </div>
                            <div class="col">
                                <label for="">Dosage</label>
                                <input type="text" class="form-control" placeholder="Dosage" name="dosage[]">
                            </div>
                            <div class="col">
                                <label for="">Unité</label>
                                <select class="form-control" id="" name="unite[]">
                                    <option value="mg">mg</option>
                                    <option value="g">g</option>
                                    <option value="l">l</option>
                                    <option value="ml">ml</option>
                                </select>
                            </div>
                            <br />

                            <button type="button" class="fcbtn btn btn-success" id='add'>
                                <i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="fcbtn btn btn-danger" id='remove'>
                                    <i class="fa fa-remove"></i>
                            </button>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="">Excipient</label>
                                <input type="text" class="form-control" placeholder="Excipient" name="excipient">
                            </div>
                            <div class="col">
                                <!-- <input type="text" class="form-control" placeholder="Prix de Revient pour le Traitement" name="prpt"> -->
                            </div>
                        </div>

                        <div class="form-divider"></div>

                        <div class="form-row">
                            <div class="col">
                                <label for="">Prix Grossiste Hors taxe</label>
                                <input type="text" class="form-control" placeholder="PGHT" name="pght">
                            </div>
                            <div class="col">
                                <!-- <input type="text" class="form-control" placeholder="Prix de Revient pour le Traitement" name="prpt"> -->
                            </div>
                        </div>
                        <div class="form-divider">
                            Laboratoire Fabricant
                        </div>
                        <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>
                        <label for = "same">Meme que le labo demandeur de l'AMM</label>

                        <div class="form-row">
                            <div class="col">
                                <label for="">Nom du Labo Fabricant</label>
                                <input type="text" class="form-control" placeholder="Manufacturer" id="manufacturer" name="manufacturer">
                            </div>
                            <div class="col">
                                <label for="">Adresse</label>
                                <input type="text" class="form-control" placeholder="Adrese" id="adresse" name="adresse">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="">Email du labo Fabricant</label>
                                <input type="text" class="form-control" placeholder="Manufacturer email" id="email" name="email">
                            </div>
                            <div class="col">
                                <label for="">Telephone du Labo Fabricant</label>
                                <input type="text" class="form-control" placeholder="Manufacturer's Phone Number" id="phone" name="phone">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group shadow-textarea">
                                            <label for="exampleFormControlTextarea6">Motivations</label>
                                            <textarea name="motivation" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <input type="hidden" value="{{Auth()->user()->id}}" name="user_id">

                <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
            </form>
        </div>
    </div>
</div>

<script>
function addressFunction()
{
if (document.getElementById('same').checked)
{
	document.getElementById('manufacturer').disabled = !this.checked;
    document.getElementById('adresse').disabled = !this.checked;
    document.getElementById('email').disabled = !this.checked;
    document.getElementById('phone').disabled = !this.checked;

}

else
{
    document.getElementById('manufacturer').disabled = this.checked;
	document.getElementById('adresse').disabled = this.checked;
    document.getElementById('email').disabled = this.checked;
    document.getElementById('phone').disabled = this.checked;
}
}
</script>
@endsection

