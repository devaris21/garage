<div role="tabpanel" id="menu-1" class="tab-pane active">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6 col-sm-12 border-right" style="padding-right: 3%;">
                <div class="row">
                    <div class="col-4">
                        <div class="text-center" data-toggle="tooltip" title="Double-cliquez sur l'image pour la changer">
                            <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", $levehicule->image1) ?>" class="img-thumbnail cursor" style="height: 110px;">
                        </div>
                    </div>
                    <div class="col-7">
                        <small class="label label-<?= $levehicule->etatvehicule->class; ?> float-right mp5"><?= $levehicule->etatvehicule->name() ?></small>
                        <h1 class="gras text-navy" style="margin: 0"><strong><?= $levehicule->immatriculation ?></strong></h1>
                        <address>
                            <h3 style="margin-top: 6px;"><strong><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></strong></h3>
                            Véhicule <u><?= $levehicule->infovehicule->fonctionvehicule->name() ?></u> <br>
                        </address>
                    </div>
                    <div class="col-1 text-center">
                        <span  data-toggle=modal data-target="#modal-vehicule" class="cursor" onclick="modification('vehicule', <?= $levehicule->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du véhicule" class="fa fa-pencil fa-2x cursor"></i></span><br><br>
                        <span data-toggle='tooltip' title="Supprimer le véhicule" onclick="suppressionWithPassword('vehicule', <?= $levehicule->id ?>)" class="cursor" ><i class="fa fa-close text-red fa-2x cursor"></i></span><br>                                                                            
                    </div>
                </div>
                <button data-toggle=modal data-target="#modal-entretienvehicule1" class="btn btn-warning btn-xs btn-rounded btn-outline pull-right"><i class="fa fa-plus"></i> Nouvel entretien du véhicule</button>
            </div>
            <div class="col-sm-6 border-right">
                <?php if ($location != null) { ?>
                    <h2 class="text-green gras " style="margin-top: 0;">Location N°<?= $location->reference ?></h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class=""><?= $location->lieu  ?></p>
                            <span><b>Etat du véhicule :</b> <?= $location->etatduvehicule ?></span><br>
                            <span><b>Kilometrage actuel :</b> <?= $location->kilometrage ?> kms</span>
                            <h5><i class="fa fa-calendar"></i> Du <?= datecourt($location->started) ?> au <?= datecourt($location->finished) ?></h5>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= $this->url("gestion", "master", "client", $location->client->id)  ?>">
                                <h3 class="m-b-xs"><strong><?= $location->client->name() ?></strong></h3>
                                <div class="font-bold"><?= $location->client->typeclient->name() ?></div>
                                <address class="">
                                    <strong><?= $location->client->contact ?></strong><br>
                                    <?= $location->client->email ?>
                                </address>
                            </a>
                        </div>
                    </div>
                    <div class="justify-content-center">
                        <button onclick="modification('location', <?= $location->id ?>)" data-toggle="modal" data-target="#modal-<?= ($location->typelocation_id == 1)?'location2':'pret2' ?>" class="btn btn-outline btn-xs btn-warning  dim" type="button"><i data-toggle="tooltip" title="Modifier les infos de la location" class="fa fa-pencil"></i> Modifier</button>

                        <button data-toggle="modal" data-target="#modal-client" class="btn btn-outline btn-xs btn-success  dim" type="button"><i data-toggle="tooltip" title="Voir le contrat" class="fa fa-user"></i> Contrat</button>


                        <button onclick="terminerLocation(<?= $location->id ?>)" data-toggle="tooltip" title="Terminer la location" class="btn btn-outline btn-xs btn-primary dim" type="button"><i class="fa fa-check"></i> Terminer</button>
                        <button onclick="annulerLocation(<?= $location->id ?>)" data-toggle="tooltip" title="Annuler la location" class="btn btn-outline btn-xs btn-danger  dim" type="button"><i class="fa fa-close"></i> Annuler</button>
                    </div>
                <?php }else{ ?>
                    <h1 class="text-center text-green gras">Le véhicule est libre</h1>
                <?php } ?>
            </div>

        </div><br><hr>

        <div class="row">
            <div class="col-md-3 border-right">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>Immatriculation</td>
                            <td><?= $levehicule->immatriculation ?></td>
                        </tr>
                        <tr>
                            <td>Marque</td>
                            <td><?= $levehicule->marque->name() ?></td>
                        </tr>                                            
                        <tr>
                            <td>Modèle</td>
                            <td><?= $levehicule->modele ?></td>
                        </tr>
                        <tr>
                            <td>Couleur</td>
                            <td><?= $levehicule->couleur ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 border-right">
                <table class="table table-sm">
                    <tbody>                                    
                        <tr>
                            <td>N°Chasis</td>
                            <td><?= $levehicule->infovehicule->chasis ?></td>
                        </tr>
                        <tr>
                            <td>CNIT</td>
                            <td><?= $levehicule->infovehicule->cnit ?></td>
                        </tr>
                        <tr>
                            <td>Energie</td>
                            <td><?= $levehicule->infovehicule->energie->name() ?></td>
                        </tr>
                        <tr>
                            <td>Puissance</td>
                            <td><?= $levehicule->infovehicule->puissance ?> chevaux</td>
                        </tr>
                        <tr>
                            <td>Transmission</td>
                            <td><?= $levehicule->infovehicule->transmission->name() ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 border-right">
                <table class="table table-sm">
                    <tbody>                                    
                        <tr>
                            <td>Portieres / Places</td>
                            <td><?= $levehicule->infovehicule->nbPortes ?> portières / <?= $levehicule->infovehicule->nbPlaces ?> places</td>
                        </tr>
                        <tr>
                            <td>Climatisation</td>
                            <td><?= $levehicule->infovehicule->puissance ?> chevaux</td>
                        </tr>
                        <tr>
                            <td>Airbag Conduction</td>
                            <td><?= $levehicule->infovehicule->nbPortes ?> portières / <?= $levehicule->infovehicule->nbPlaces ?> places</td>
                        </tr>
                        <tr>
                            <td>AirBag Passager</td>
                            <td><?= $levehicule->infovehicule->transmission->name() ?></td>
                        </tr>
                        <tr>
                            <td>Sacs / Valises</td>
                            <td><?= $levehicule->infovehicule->nbSacs ?> sacs / <?= $levehicule->infovehicule->nbValises ?> valises</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>Mise en circulation</td>
                            <td><?= datecourt($levehicule->infovehicule->dateMiseCirculation) ?></td>
                        </tr>
                        <tr>
                            <td>Kilometrage actuel</td>
                            <td><?= $levehicule->kilometrage() ?> Kms</td>
                        </tr>
                        <tr>
                            <td>Equipements</td>
                            <td>MOI</td>
                        </tr>
                        <tr>
                            <td>Accessoires</td>
                            <td>MOI</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

     <!--       <div class="col-md-2 optionsbtn">  
            <button data-toggle="modal" data-target="#modal-pret1" class="btn btn-success btn-block  btn-xs btn-rounded btn-outline pull-right"><i class="fa fa-handshake-o"></i> Prêter ce véhicule</button>

            <button onclick="disponibilite(0)" class="btn btn-warning btn-block  btn-xs btn-rounded pull-right"><i class="fa fa-ban"></i> Le Rendre indisponible</button>
            <button onclick="disponibilite(1)" class="btn btn-warning btn-block  btn-xs btn-rounded pull-right"><i class="fa fa-ban"></i> Le Rendre à nouveau disponible
            </button>
            <button onclick="declassement(0)" class="btn btn-danger  btn-block btn-xs btn-rounded pull-right"><i class="fa fa-close"></i> Déclasser le véhicule</button>

            <button onclick="declassement(1)" class="btn btn-success  btn-block btn-xs btn-rounded pull-right"><i class="fa fa-refresh"></i> Reclasser le véhicule</button>


        </div> -->

    </div>
</div>