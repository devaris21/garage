<div class="modal inmodal fade" id="modal-rechercher_auto">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Formulaire d'entretien de machine</h4>
            <small class="font-bold">Renseigner ces champs pour enregistrer les informations</small>
        </div>
        <form method="POST" class="formEntretienMachine">
            <p class="container text-center">Toutes les autres informations concernant le vehicule sont déjà et automatiquement prise en compte pour la recherche !</p>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Début de l'Entretien <span1>*</span1></label>
                        <div class="form-group">
                            <input type="date" class="form-control" name="started" value="<?= dateAjoute() ?>"  required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-4">
                                <div class="text-center" data-toggle="tooltip">
                                    <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", "default.jpg") ?>" class="img-thumbnail cursor" style="height: 110px;">
                                </div>
                            </div>
                            <div class="col-8">
                                <h1 class="gras text-navy" style="margin: 0"><strong><?= $ticket->auto->immatriculation ?></strong> 
                                    <span  data-toggle=modal data-target="#modal-vehicule" class="cursor pull-right" onclick="modification('ticket', <?= $ticket->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du vehiucle" class="fa fa-pencil cursor"></i></span>
                                </h1>
                                <address>
                                    <h3 style="margin-top: 6px;"><strong><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?></strong></h3>
                                    <h4 style="margin-top: 6px;">VIN: <strong><?= $ticket->auto->vin ?></strong></h4>
                                    <h5>Couleur <?= $ticket->auto->couleur ?></h5> <br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Avance sur de l'entretien <span1>*</span1></label>
                        <div class="form-group">
                            <input type="number" class="form-control" name="price" required autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label>Illustration 1</label>
                        <div class="">
                            <img style="width: 80px;" src="" class="img-thumbnail logo">
                            <input class="hide" type="file" name="photo1">
                            <button type="button" class="btn btn-sm bg-orange pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label>Illustration 2</label>
                        <div class="">
                            <img style="width: 80px;" src="" class="img-thumbnail logo">
                            <input class="hide" type="file" name="photo2">
                            <button type="button" class="btn btn-sm bg-orange pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                        </div>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Mode de payement <span1>*</span1></label>
                        <div class="form-group">
                            <?php Native\BINDING::html("select", "modepayement") ?>
                        </div>
                    </div>
                    <div class="col-sm-4 modepayement_facultatif">
                        <label>Structure d'encaissement<span style="color: red">*</span> </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-bank"></i></span><input type="text" name="structure" class="form-control">
                        </div>
                    </div><br>
                    <div class="col-sm-4 modepayement_facultatif">
                        <label>N° numero dédié<span style="color: red">*</span> </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span><input type="text" name="numero" class="form-control">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Pièces trouvés</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2">Autres correspondances TecDoc</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Images</th>
                                                <th>Description</th>
                                                <th>Qté dispo</th>
                                                <th>P.U TTC</th>
                                                <th>Lable</th>
                                                <th>P.U Net</th>
                                                <th>Marge de prix</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="http://dummyimage.com/100x70/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br><br>
                                                    <img src="http://dummyimage.com/100x50/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
                                                </td>
                                                <td>
                                                    <div><strong>Description de l'artcile</strong> // Marque</div>
                                                    <small>La liste de tous les details ut labore et dolore magna aliqua.</small><br>
                                                    <small>reference - etat</small>
                                                </td>
                                                <td>1</td>
                                                <td>$26.00</td>
                                                <td>$5.98</td>
                                                <td>le lable</td>
                                                <td>$31,98 - $31,98</td>
                                                <td><button class="btn btn-white btn-xs"><i class="fa fa-plus text-green"></i> Ajouter</button>
                                                </td>
                                            </tr>
                                            <tr><div><strong>Admin Theme with psd project layouts</strong></div>
                                                <small>Lorem ipsum dolor sit amet, tempor incididunt ut labore et dolore magna aliqua.</small></td>
                                                <td>1</td>
                                                <td>$26.00</td>
                                                <td>$5.98</td>
                                                <td>$31,98</td>
                                                <td><i class="fa fa-trash text-danger"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <strong>Donec quam felis</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                    and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                    sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div><hr class="">
            <div class="container">
                <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                <button class="btn btn-sm btn-primary dim pull-right"><i class="fa fa-check"></i> Valider l'entretien</button>
            </div>
            <br>
        </form>

    </div>
</div>
</div>

