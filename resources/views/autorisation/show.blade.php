@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <B>REPUBLIQUE DU SENEGAL</B><br/>
                            <I>Un Peuple - Un But - Une Foi</I><br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-------------------<br/>
                            Ministere de la Sante <br/> et de l'Action Sociale <br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-------------------<br/>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">N°_______/MSAS/DGS/DPM</p>
                            <p class="text-muted"></p>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-10">
                            <div class="pull-right text-right">
                                <p class="font-weight-bold mb-4">
                                Analyse: arrêté portant octroi de l’Autorisation<br/>
                                de Mise sur le Marché à la spécialité : <br/> {{$amm->nom_medicament}} {{$amm->presentation}}</p>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-center">LE MINISTRE DE LA SANTE ET DE L’ACTION SOCIALE,</h3>
                    <div class="row p-5">
                        <div class="col-md-12" >
                            <p class="mb-1">VU  la Constitution ;</p>
                            <p class="mb-1">VU  le Code de la Santé publique notamment en ses articles 601 et 603, modifié par  la loi n°65- 33 du 19 mai 1965 ;</p>
                            <p class="mb-1">VU le décret n°67-007 du 04 janvier 1967 réglementant la présentation et la dénomination des spécialités pharmaceutiques ;</p>
                            <p class="mb-1">VU le décret n°67-008 du 04 janvier 1967 relatif aux visas des spécialités pharmaceutiques, complété par le décret n°71-803 du 16 juillet 1971 ;</p>
                            <p class="mb-1">VU le décret n°75-454 du 24 avril 1975 relatif à l’autorisation de débit des spécialités Pharmaceutiques;</p>
                            <p class="mb-1">VU le décret n°2004-1404 du 04 novembre 2004 portant organisation du Ministère de la Santé et de la Prévention médicale ;</p>
                            <p class="mb-1">VU le décret n°2019-904 du 14 mai 2019 fixant la composition du Gouvernement ;</p>
                            <p class="mb-1">VU le décret n°2019-910 du 15 mai 2019 portant répartition des services de l’Etat et du Contrôle des établissements publics, des sociétés nationales et des sociétés à participation  publique entre la Présidence de la République, le secrétariat Général du Gouvernement et les Ministères;</p>
                            <p class="mb-1">Vu le décret n°2019-965 du 29 mai 2019 relatif aux attributions du Ministre de la Santé et de l’Action sociale ;</p>
                            <p class="mb-1">VU l’arrêté ministériel n°17550 du 20 novembre 2014 instituant la Commission nationale du Médicament en application du Règlement N°06/2010/CM/UEMOA relatif aux procédures d’homologation des produits pharmaceutiques à usage humain dans les Etats membres de l’UEMOA ; </p>
                            <p class="mb-1">VU l’avis de la Commission nationale du Médicament en date du 03 août 2017 ;
                                Sur la note de présentation du Directeur de la Pharmacie et du Médicament,</p>
                            <p class="mb-1"></p>

                            <h3 class="text-center">ARRETE</h3>
                            <p class="mb-1"><B>Article premier.-</B> L’Autorisation de Mise sur le Marché est accordée à la spécialité : <strong>{{$amm->nom_medicament}} {{$amm->presentation}}</strong>
                                <br /> Du Laboratoire {{ $amm->labo}}
                                <br /> Sous le numero: {{ $amm->numero}}
                            </p>
                            <p class="mb-1"><B>Article 2.- </B>
                                Ladite spécialité répond à la composition suivante : <br />
                                Chaque gélule contient :<br/>
                                Principe actif :<br />
                                Acémétacine.................................................................90 mg <br />
                                Excipients : Lactose monohydraté, stéarate de magnésium, silice colloïdal anhydre, talc.
                                Gélule : Gélatine Jaune de quinoléine (E104), indigotine (E132), dioxyde de titane (E171), eau purifiée.
                            </p>

                            <p class="mb-1"><B>Article 3.-</B> Classe thérapeutique : {{$amm->classe_therapeutique}}.</p>
                            <p class="mb-1"><B>Article 4.-</B>
                            Le résumé des caractéristiques du produit (RCP), la notice et l’étiquetage tels qu’approuvés et validés par la Commission Nationale du Médicament font partie intégrante de ce présent arrêté.
                            </p>
                            <p class="mb-1"><B>Article 5.-</B>
                                Le fabricant devra respecter les conditions prévues dans sa demande d’Autorisation de Mise sur le Marché en ce qui concerne la fabrication et le contrôle de ce produit. Toutefois, les méthodes de contrôle devront être modifiées en fonction des progrès de la science et de l’évolution des techniques.
                            </p>
                            <p class="mb-1"><B>Article 6.- </B>
                            La présente Autorisation de Mise sur le Marché est valable 5 ans. Elle peut être renouvelée dans les conditions prévues par la réglementation.
                            </p>
                            <p class="mb-1"><B>Article 7.-</B>
                            La spécialité {{$amm->nom_medicament}} doit être cédée au Prix Grossiste Hors Taxe de 4658 F CFA, soit un prix public de 8657 F CFA.
                            </p>

                            <p classe="mb-1"><B>Article 8.- </B>
                            Le Directeur de la Pharmacie et du Médicament est chargé de l’exécution du présent arrêté qui sera enregistré et publié partout où besoin sera.
                            </p>

                            <h5>AMPLIATIONS</h5>
                            <p class="mb-1">PR/SG</p>
                            <p class="mb-1">SGG</p>
                            <p class="mb-1">MSAS/CAB</p>
                            <p class="mb-1">SYNDICAT DES PHARMACIENS</p>
                            <p class="mb-1">INTERESSES</p>
                            <p class="mb-1">ARCHIVES/JORS</p>
                        </div>
                    </div>

                    <div class="d-flex flex-row text-white p-4">
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                        ->size(200)
                        ->generate($test)
                        )!!} ">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>

</div>
@endsection
