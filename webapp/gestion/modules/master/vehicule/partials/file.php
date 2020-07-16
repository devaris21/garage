
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="tabs-container">
        <ul class="nav nav-tabs" role="tablist">
            <li><a class="nav-link active" data-toggle="tab" href="#tab-cartegrise"> Cartes grises</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-assurance">Assurances</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-visitetechnique">Visites Techniques</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-piecevehicule">Autres pièces du véhicules</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-entretienvehicule">Entretiens du véhicule</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-sinistres">Sinistres</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" id="tab-cartegrise" class="tab-pane active">
                <div class="panel-body">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5 class="text-uppercase">Toutes les cartes grises de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                            <div class="ibox-tools">
                                <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-cartegrise" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Ajouter Nouvelle Carte Grise</button>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-hover">
                                <tbody>
                                   <?php foreach ($levehicule->cartegrises as $key => $carte) {
                                    $carte->actualise(); ?>
                                    <tr>
                                        <td class="project-status">
                                            <span class="label label-primary">Active</span>
                                        </td>
                                        <td class="project-title">
                                            <h3 class="mp0"><?= $carte->name ?></h3>
                                            <small>Etablie le <?= datecourt($carte->date_etablissement) ?></small>
                                        </td>
                                        <td class="project-completion">
                                            <span>Voiture <?= $carte->energie->name ?></span><br>
                                            <span>Couleur <?= $carte->couleur ?></span>
                                        </td>
                                        <td>
                                            <h4><?= money($carte->price) ?> <?= $params->devise ?></h4>
                                        </td>
                                        <td class="project-people">
                                         <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "cartegrises", $carte->image1) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "cartegrises", $carte->image1) ?>">
                                         <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "cartegrises", $carte->image2) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "cartegrises", $carte->image2) ?>">
                                     </td>
                                     <td class="project-actions">
                                        <button data-toggle="modal" data-target="#modal-cartegrise"  onclick="modification('cartegrise', <?= $carte->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Modiifer </button>
                                        <button class="btn btn-white btn-sm" onclick="suppressionWithPassword('cartegrise', <?= $carte->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div role="tabpanel" id="tab-assurance" class="tab-pane">
        <div class="panel-body">
            <div class="ibox">
                <div class="ibox-title">
                    <h5 class="text-uppercase">Toutes les assurances de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                    <div class="ibox-tools">
                        <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-assurance" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Ajouter Nouvelle Assurance</button>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover">
                        <tbody>
                           <?php foreach ($levehicule->assurances as $key => $assurance) {
                            $assurance->actualise(); ?>
                            <tr>
                                <td class="project-status">
                                    <span class="label label-primary">Active</span>
                                </td>
                                <td class="project-title">
                                    <h3 class="mp0"><?= $assurance->name ?></h3>
                                    <small>Etablie le <?= datecourt($assurance->date_etablissement) ?></small>
                                </td>
                                <td class="project-completion">
                                    <span class="italic gras">Du <?= datecourt($assurance->started) ?></span><br>
                                    <span class="italic gras">Au <?= datecourt($assurance->finished) ?></span>
                                </td>
                                <td class="project-completion">
                                    <span><?= $assurance->assurance ?></span><br>
                                    <span>Validité de <?= $assurance->finished ?></span>
                                </td>
                                <td>
                                    <h4><?= money($assurance->price) ?> <?= $params->devise ?></h4>
                                </td>
                                <td class="project-people">
                                 <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "assurances", $assurance->image1) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "assurances", $assurance->image1) ?>">
                                 <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "assurances", $assurance->image2) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "assurances", $assurance->image2) ?>">
                             </td>
                             <td class="project-actions">
                                <button data-toggle="modal" data-target="#modal-assurance"  onclick="modification('assurance', <?= $assurance->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Modiifer </button>
                                <button class="btn btn-white btn-sm" onclick="suppressionWithPassword('assurance', <?= $assurance->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


<div role="tabpanel" id="tab-visitetechnique" class="tab-pane">
    <div class="panel-body">
        <div class="ibox">
            <div class="ibox-title">
                <h5 class="text-uppercase">Toutes les visites techniques de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                <div class="ibox-tools">
                    <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-visitetechnique" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Enregistrer nouvelle visite</button>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover">
                    <tbody>
                       <?php foreach ($levehicule->visitetechniques as $key => $vist) {
                        $vist->actualise(); ?>
                        <tr>
                            <td class="project-status">
                                <span class="label label-primary">Active</span>
                            </td>
                            <td class="project-title">
                                <h3 class="mp0"><?= $vist->name ?></h3>
                                <small>Etablie le <?= datecourt($vist->date_etablissement) ?></small>
                            </td>
                            <td class="project-completion">
                                <span class="italic gras">Du <?= datecourt($vist->started) ?></span><br>
                                <span class="italic gras">Au <?= datecourt($vist->finished) ?></span>
                            </td>
                            <td class="project-completion">
                                <span>Validité de <?= $vist->finished ?></span>
                            </td>
                            <td>
                                <h4><?= money($vist->price) ?> <?= $params->devise ?></h4>
                            </td>
                            <td class="project-people">
                             <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "visitetechniques", $vist->image1) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "visitetechniques", $vist->image1) ?>">
                             <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "visitetechniques", $vist->image2) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "visitetechniques", $vist->image2) ?>">
                         </td>
                         <td class="project-actions">
                            <button data-toggle="modal" data-target="#modal-visitetechnique"  onclick="modification('visitetechnique', <?= $vist->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Modiifer </button>
                            <button class="btn btn-white btn-sm" onclick="suppressionWithPassword('visitetechnique', <?= $vist->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>



<div role="tabpanel" id="tab-piecevehicule" class="tab-pane">
    <div class="panel-body">
        <div class="ibox">
            <div class="ibox-title">
                <h5 class="text-uppercase">Autres pièces administratives de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                <div class="ibox-tools">
                    <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-piecevehicule" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Enregistrer nouvelle pièce</button>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover">
                    <tbody>
                       <?php foreach ($levehicule->piecevehicules as $key => $piece) {
                        $piece->actualise(); ?>
                        <tr>
                            <td class="project-status">
                                <span class="label label-primary">Active</span>
                            </td>
                            <td class="project-title">
                                <h3 class="mp0"><?= $piece->typepiecevehicule->name ?></h3>
                                <h5 class="mp0"><?= $piece->name ?></h5>
                                <small>Etablie le <?= datecourt($piece->date_etablissement) ?></small>
                            </td>
                            <td class="project-completion">
                                <span class="italic gras">Du <?= datecourt($piece->started) ?></span><br>
                                <span class="italic gras">Au <?= datecourt($piece->finished) ?></span>
                            </td>
                            <td class="project-completion">
                                <span>Validité de <?= $piece->finished ?></span>
                            </td>
                            <td>
                                <h4><?= money($piece->price) ?> <?= $params->devise ?></h4>
                            </td>
                            <td class="project-people">
                             <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "piecevehicules", $piece->image1) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "piecevehicules", $piece->image1) ?>">
                             <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "piecevehicules", $piece->image2) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "piecevehicules", $piece->image2) ?>">
                         </td>
                         <td class="project-actions">
                            <button data-toggle="modal" data-target="#modal-piecevehicule"  onclick="modification('piecevehicule', <?= $piece->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Modiifer </button>
                            <button class="btn btn-white btn-sm" onclick="suppressionWithPassword('piecevehicule', <?= $piece->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


<div role="tabpanel" id="tab-entretienvehicule" class="tab-pane">
    <div class="panel-body">
        <div class="ibox">
            <div class="ibox-title">
                <h5 class="text-uppercase">Les entretiens de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                <div class="ibox-tools">
                    <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-entretienvehicule1" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Nouvel entretien du véhicule</button>
                </div>
            </div>
            <div class="ibox-content">
               <?php foreach ($levehicule->entretienvehicules as $key => $entretien) {
                $entretien->actualise(); ?>
                <div class="vote-item <?= ($entretien->etat_id != Home\ETAT::ENCOURS)?'fini':'' ?>">
                    <div class="row">
                        <div class="col-md-7 border-right">
                            <div class="vote-actions" style="margin-right: 7%; height: 100%">
                                <div class="vote-icon">
                                    <span class="label label-<?= $entretien->etat->class ?>"><?= $entretien->etat->name ?></span>
                                </div>
                            </div>
                            <div>
                                <span class="vote-title"><u class="text-info">#<?= $entretien->ticket ?></u> // <?= $entretien->typeentretienvehicule->name ?></span>
                                <span><?= $entretien->comment ?></span>
                                <div class="vote-info">
                                  <i class="fa fa-clock-o"></i> 
                                  <?php if ($entretien->etat_id == Home\ETAT::ENCOURS) { ?>
                                    <a href="#">Annulée <?= depuis($entretien->date_approuve) ?></a>
                                <?php }else if ($entretien->etat_id == Home\ETAT::ENCOURS){ ?>
                                    <a href="#">Emise <?= depuis($entretien->created) ?></a>
                                <?php }else if ($entretien->etat_id == Home\ETAT::VALIDEE){ ?>
                                    <a href="#">Du <?= datecourt($entretien->started) ?> au <?= datecourt($entretien->finished) ?></a>
                                <?php } ?>
                                <i class="fa fa-wrench"></i> <a href="#">Entretien par <?= $entretien->prestataire->name() ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-right">
                        <a class="row" style="color: black; margin-top: 10%" href="<?= $this->url("gestionnaire", "master", "vehicule", $entretien->vehicule_id) ?>">
                            <div class="col-4">
                                <div class="text-center">
                                    <img alt="image" style="height: 40px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $entretien->vehicule->image) ?>">
                                </div>
                            </div>
                            <div class="col-8" style="font-size: 11px;">
                                <h3 style="margin: 0"><strong><?= $entretien->vehicule->immatriculation ?></strong></h3>
                                <address>
                                    <strong><?= $entretien->vehicule->marque->name ?></strong><br>
                                    <?= $entretien->vehicule->modele ?>
                                </address>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-1 text-right border-right">
                        <img style="width: 100%;" onclick="openImage('<?= $this->stockage("images", "entretienvehicules", $entretien->image1) ?>')" class="m-t-xs cursor" src="<?= $this->stockage("images", "entretienvehicules", $entretien->image1) ?>"><br>
                        <img style="width: 100%;" onclick="openImage('<?= $this->stockage("images", "entretienvehicules", $entretien->image2) ?>')" class="m-t-xs cursor" src="<?= $this->stockage("images", "entretienvehicules", $entretien->image2) ?>">
                    </div>
                    <div class="col-md-1 text-right">
                        <?php if ($entretien->etat_id == Home\ETAT::VALIDEE) { ?>
                            <div class="vote-icon">
                                <i class="fa fa-check text-green" data-toggle="tooltip" title="Entretien terminé avec succes"> </i>
                            </div>
                        <?php } else if ($entretien->etat_id == Home\ETAT::ENCOURS) { ?>
                            <div class="vote-icon">
                                <i class="fa fa-close text-red" data-toggle="tooltip" title="Entretien annulé"> </i>
                            </div>

                        <?php }else if ($entretien->etat_id == Home\ETAT::ENCOURS){ ?>
                            <div class="btn-group">
                                <button data-toggle="tooltip" title="Entretien terminé avec succes !" onclick="validerEntretien(<?= $entretien->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-check text-green"></i> </button>
                                <button data-toggle="tooltip" title="Entretien échoué" class="btn btn-white btn-sm" onclick="annulerEntretien(<?= $entretien->getId() ?>)"><i class="fa fa-close text-red"></i></button>
                            </div>
                        <?php } ?>                                      
                    </div>
                </div>
            </div>
        <?php  } ?>
    </div>
</div>
</div>
</div>



<div role="tabpanel" id="tab-sinistres" class="tab-pane">
    <div class="panel-body">
        <div class="ibox">
            <div class="ibox-title">
                <h5 class="text-uppercase">Les sinistres de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                <div class="ibox-tools">
                    <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-sinistre1" class="btn btn-danger dim btn-xs"><i class="fa fa-plus"></i> Déclarer nouveau sinistre</button>
                </div>
            </div>
            <div class="ibox-content">
               <table class="table table-hover table-sinistre">
                <tbody>
                    <?php foreach ($levehicule->sinistres as $key => $sinistre) {
                        $sinistre->actualise(); ?>
                        <tr class=" <?= ($sinistre->etat_id != Home\ETAT::ENCOURS)?'fini':'' ?> border-bottom">
                            <td class="project-status">
                                <span class="label label-<?= $sinistre->etat->class ?>"><?= $sinistre->etat->name ?></span>
                            </td>
                            <td class="project-title border-right" style="width: 50%;">
                                <h3 class="mp0"><u class="text-info">#<?= $sinistre->ticket ?></u> // <?= $sinistre->typesinistre->name ?></h3>
                                <h5 class="mp0">Survenu le <?= datecourt($sinistre->date_etablissement) ?> à <?= $sinistre->lieudrame ?></h5>
                                <span><?= $sinistre->comment ?></span>
                                <p> <small><?= $sinistre->constat() ?></small> // <small><?= $sinistre->pompier() ?></small></p>
                                <div class="vote-info mp0">
                                  <i class="fa fa-clock-o"></i> 
                                  <?php if ($sinistre->etat_id == Home\ETAT::ENCOURS) { ?>
                                    <a href="#">Annulée <?= depuis($sinistre->date_approbation) ?></a>
                                <?php }else if ($sinistre->etat_id == Home\ETAT::ENCOURS){ ?>
                                    <a href="#">Emise <?= depuis($sinistre->created) ?></a>
                                <?php }else if ($sinistre->etat_id == Home\ETAT::VALIDEE){ ?>
                                    <a href="#">Approuvée <?= depuis($sinistre->date_approbation) ?></a>
                                <?php } ?>
                                <i class="fa fa-user"></i> <a href="#">Par <?= $sinistre->auteur() ?> - <?= $sinistre->matricule ?></a>
                            </div>
                        </td>
                        <td class="border-right">
                            <a class="row" style="color: black; margin-top: 10%" href="<?= $this->url("gestionnaire", "master", "vehicule", $sinistre->vehicule_id) ?>">
                                <div class="col-4">
                                    <div class="text-center">
                                        <img alt="image" style="height: 40px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $sinistre->vehicule->image) ?>">
                                    </div>
                                </div>
                                <div class="col-8" style="font-size: 11px;">
                                    <h3 style="margin: 0"><strong><?= $sinistre->vehicule->immatriculation ?></strong></h3>
                                    <address>
                                        <strong><?= $sinistre->vehicule->marque->name ?></strong><br>
                                        <?= $sinistre->vehicule->modele ?>
                                    </address>
                                </div>
                            </a><hr>
                            <div class="text-center">
                              <img alt="" class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "sinistres", $sinistre->image1) ?>')" style="height: 40px; width: 40px;" src="<?= $this->stockage("images", "sinistres", $sinistre->image1) ?>">
                              <img alt="" class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "sinistres", $sinistre->image2) ?>')" style="height: 40px; width: 40px;" src="<?= $this->stockage("images", "sinistres", $sinistre->image2) ?>">
                              <img alt="" class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "sinistres", $sinistre->image3) ?>')" style="height: 40px; width: 40px;" src="<?= $this->stockage("images", "sinistres", $sinistre->image3) ?>">
                          </div>
                      </td>
                      <td class="project-title">
                        <small>L'autre partie</small>
                        <h5><?= $sinistre->nomautre ?></h5>
                        <h5 class="mp0"><?= $sinistre->vehiculeautre ?></h5>
                        <h5 class="mp0"><?= $sinistre->immatriculationautre ?></h5>
                        <h5 class="mp0"><i class="fa fa-phone"></i> <?= $sinistre->contactautre ?></h5>
                        <h5 class="mp0"><i class="fa fa-bank"></i> <?= $sinistre->assuranceautre ?></h5>

                    </td>
                    <td class="project-actions">
                       <?php if ($sinistre->etat_id == Home\ETAT::ENCOURS) { ?>
                        <div class="btn-group btn-group-vertical">
                            <?php if ($sinistre->carplan_id == null) { ?>
                               <button data-toggle="modal" data-target="#modal-sinistre"  onclick="modification('sinistre', <?= $sinistre->getId() ?>)" class="btn btn-white btn-sm"><i data-toggle="tooltip" title="Modifier les informations du sinistre" class="fa fa-pencil"></i> </button>
                           <?php } ?>                                
                           <button data-toggle="tooltip" title="Valider cette déclaration" class="btn btn-white btn-sm" onclick="validerSinistre(<?= $sinistre->getId(); ?>)"><i class="fa fa-check text-green"></i></button>
                           <button data-toggle="tooltip" title="Annuler cette déclaration" class="btn btn-white btn-sm" onclick="annulerSinistre(<?= $sinistre->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                       </div>
                   <?php } ?>
               </td>
           </tr>
       <?php  } ?>
   </tbody>
</table>
</div>
</div>
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