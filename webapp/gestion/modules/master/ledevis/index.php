<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content">
                        <h2 class="text-uppercase gras">Nouveau devis reparation <small><?= $devis->reference ?></small></h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <address>
                                    <strong><?= $devis->ticket->client->name()  ?></strong><br>
                                    <?= $devis->ticket->client->adresse  ?><br>
                                    <?= $devis->ticket->client->email  ?><br>
                                    <i class="fa fa-phone"></i> <?= $devis->ticket->client->contact  ?>
                                </address>
                            </div>

                            <div class="col-sm-6 text-right">
                                <address>
                                    <strong><?= $devis->ticket->auto->marque->name() ?> <?= $devis->ticket->auto->modele  ?></strong><br>
                                    <?= $devis->ticket->auto->immatriculation  ?><br>
                                    VIN: <?= $devis->ticket->auto->vin  ?><br>
                                    Couleur: <?= $devis->ticket->auto->couleur ?>
                                </address>
                            </div>
                        </div><br>

                        <div>
                            <button class="btn btn-white btn-xs" data-toggle="modal" data-target="#modal-rechercher_auto"><i class="fa fa-close text-danger"></i> Rechercher Piece Auto</button>
                            <button class="btn btn-white btn-xs" data-toggle="modal" data-target="#modal-rechercher_auto"><i class="fa fa-close text-danger"></i> Rechercher Pneumatique</button>
                            <button class="btn btn-white btn-xs" data-toggle="modal" data-target="#modal-rechercher_auto"><i class="fa fa-close text-danger"></i> Rechercher Autre</button>
                            <button class="btn btn-white btn-xs pull-right"><i class="fa fa-close text-danger"></i> Ajouter main d'oeuvre</button>
                        </div><hr class="mp3">

                        <div class="row">
                            <div class="col-md-8 ">
                                <div class="table-responsive m-t">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Qté</th>
                                                <th>P.Unit</th>
                                                <th>Remise</th>
                                                <th>P.U Net</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div><strong>Admin Theme with psd project layouts</strong></div>
                                                    <small>Lorem ipsum dolor sit amet, tempor incididunt ut labore et dolore magna aliqua.</small></td>
                                                    <td>1</td>
                                                    <td>$26.00</td>
                                                    <td>$5.98</td>
                                                    <td>$31,98</td>
                                                    <td><i class="fa fa-trash text-danger"></i></td>
                                                </tr>
                                                <tr>
                                                    <td><div><strong>Wodpress Them customization</strong></div>
                                                        <small>Lorem ipsum dolor sit amet, tempor incididunt ut labore et dolore magna aliqua.
                                                            Eiusmod tempor incididunt ua.
                                                        </small></td>
                                                        <td>2</td>
                                                        <td>$80.00</td>
                                                        <td>$36.80</td>
                                                        <td>$196.80</td>
                                                    </tr>
                                                    <tr>
                                                        <td><div><strong>Angular JS & Node JS Application</strong></div>
                                                            <small>Lorem ipsum dolor sit amet, tempor incididunt ut labore et dolore magna aliqua.</small></td>
                                                            <td>3</td>
                                                            <td>$420.00</td>
                                                            <td>$193.20</td>
                                                            <td>$1033.20</td>
                                                        </tr>
                                                    </tbody>
                                                </table><hr class="mp0">

                                                <table class="table invoice-total">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Total Montant HT :</strong></td>
                                                            <td>$1026.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>TVA :</strong></td>
                                                            <td>$235.98</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Net à Payer :</strong></td>
                                                            <td><h4 class="gras">$1261.98</h4></td>
                                                        </tr>
                                                    </tbody>
                                                </table><br>
                                                <p class="text-center">Montant total du présent devis à la somme de <br> <b>520 000 Fcfa</b></p>

                                                <div class="">
                                                    <button class="btn btn-primary"><i class="fa fa-close"></i> Annuler le devis</button>
                                                    <button class="btn btn-primary pull-right"><i class="fa fa-check"></i> Soumettre le devis</button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="offset-md-1 ocol-md-3"><br>
                                            <h3 class="text-uppercase gras text-right">Liste des tâches</h3>
                                            <ul>
                                                <?php foreach ($diagnostic->fourni("listeconstatdiagnostic") as $key => $value) { ?>
                                                    <li><?= $value->constat ?></li>
                                                <?php } ?>
                                            </ul>

                                            <h3 class="text-uppercase gras text-right">Liste des pièces</h3>
                                            <table class="table">
                                                <tbody>
                                                    <?php foreach ($diagnostic->fourni("listepiecediagnostic") as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $value->piece ?></td>
                                                            <td>x <?= $value->quantite ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>

                    <?php include($this->rootPath("composants/assets/modals/modal-rechercher_auto.php")); ?>  


                </div>
            </div>


            <?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


        </body>

        </html>
