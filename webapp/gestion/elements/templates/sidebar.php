<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <h1 class="logo-name text-center" style="font-size: 50px; letter-spacing: 5px; margin: 0% auto !important; padding: 0% !important;">GRG</h1>
            <li class="nav-header" style="padding: 15px 10px !important; background-color: orange">
                <div class="dropdown profile-element">                        
                    <div class="row">
                        <div class="col-3">
                            <img alt="image" class="rounded-circle" style="width: 35px" src="<?= $this->stockage("images", "employes", $employe->image) ?>"/>
                        </div>
                        <div class="col-9">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold"><?= $employe->name(); ?></span>
                                <span class="text-muted text-xs block"><b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="<?= $this->url($this->section, "access", "locked") ?>">Vérouiller la session</a></li>
                                <li><a class="dropdown-item" href="#" id="btn-deconnexion" >Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="logo-element">
                    GRG
                </div>
            </li>

            <?php 
            $__essais_av = Home\ESSAI::findBy(["typeessai_id != "=>Home\TYPEESSAI::APRES, "etat_id ="=>Home\ETAT::ENCOURS]);
            $__essais_ap = Home\ESSAI::findBy(["typeessai_id = "=>Home\TYPEESSAI::APRES, "etat_id ="=>Home\ETAT::ENCOURS]);
            $__diagnostics = Home\DIAGNOSTIC::encours();
            $__devis = Home\DEVIS::findBy(["etat_id ="=>Home\ETAT::PARTIEL]);
            $__interventions = Home\INTERVENTION::encours();
            $__lavages = Home\LAVAGE::encours();
            $__attentes = Home\TICKET::enAttente();
            // $__devis = Home\PROSPECTION::findBy(["etat_id ="=>Home\ETAT::ENCOURS, "typeprospection_id ="=>Home\TYPEPROSPECTION::VENTECAVE]);
            // $livraisons__ = Home\PROSPECTION::findBy(["etat_id ="=>Home\ETAT::ENCOURS, "typeprospection_id ="=>Home\TYPEPROSPECTION::LIVRAISON]);
            // $approvisionnements__ = Home\APPROVISIONNEMENT::encours();
            // $datas1__ = array_merge(Home\PANNE::encours(), Home\DEMANDEENTRETIEN::encours(), Home\ENTRETIENVEHICULE::encours(), Home\ENTRETIENMACHINE::encours());

            ?>
            <ul class="nav metismenu" id="side-menu">
                <li class="" id="dashboard">
                    <a href="<?= $this->url($this->section, "master", "dashboard") ?>"><i class="fa fa-tachometer"></i> <span class="nav-label">Tableau de bord</span></a>
                </li>
                <li class="" id="vehicules">
                    <a href="<?= $this->url($this->section, "master", "vehicules") ?>"><i class="fa fa-car"></i> <span class="nav-label">Véhicules</span> <?php if (count($__attentes) > 0) { ?> <span class="label label-warning float-right"><?= count($__attentes) ?></span> <?php } ?></a>
                </li>
                <li class="" id="clients">
                    <a href="<?= $this->url($this->section, "master", "clients") ?>"><i class="fa fa-user"></i> <span class="nav-label">Clients</span> <?php if (count($__attentes) > 0) { ?> <span class="label label-warning float-right"><?= count($__attentes) ?></span> <?php } ?></a>
                </li>
                <li><hr class="mp3" style="background-color: transparent; "></li>



                <li class="" id="planning">
                    <a href="<?= $this->url($this->section, "master", "planning") ?>"><i class="fa fa-calendar"></i> <span class="nav-label">Planning Travail</span> <?php if (count($__attentes) > 0) { ?> <span class="label label-warning float-right"><?= count($__attentes) ?></span> <?php } ?></a>
                </li>
                <li class="" id="garage">
                    <a href="<?= $this->url($this->section, "master", "garage") ?>"><i class="fa fa-bank"></i> <span class="nav-label">Vue du garage</span> <?php if (count($__attentes) > 0) { ?> <span class="label label-warning float-right"><?= count($__attentes) ?></span> <?php } ?></a>
                </li>
                <li><hr class="mp3" style="background-color: transparent; "></li>



                <li class="" id="tickets">
                    <a href="<?= $this->url($this->section, "master", "tickets") ?>"><i class="fa fa-ticket"></i> <span class="nav-label">Tous les tickets</span> <?php if (count($__attentes) > 0) { ?> <span class="label label-warning float-right"><?= count($__attentes) ?></span> <?php } ?></a>
                </li>
                <li class="" id="essais_av">
                    <a href="<?= $this->url($this->section, "master", "essais_av") ?>"><i class="fa fa-wrench"></i> <span class="nav-label">En essais</span> <?php if (count($__lavages) > 0) { ?> <span class="label label-warning float-right"><?= count($__lavages) ?></span> <?php } ?></a>
                </li>
                <li class="" id="diagnostics">
                    <a href="<?= $this->url($this->section, "master", "diagnostics") ?>"><i class="fa fa-wrench"></i> <span class="nav-label">Sous diagnostic TK</span> <?php if (count($__lavages) > 0) { ?> <span class="label label-warning float-right"><?= count($__lavages) ?></span> <?php } ?></a>
                </li>
                <li class="" id="devis">
                    <a href="<?= $this->url($this->section, "master", "devis") ?>"><i class="fa fa-file-text-o"></i> <span class="nav-label">Devis en Attente</span> <?php if (count($__lavages) > 0) { ?> <span class="label label-warning float-right"><?= count($__lavages) ?></span> <?php } ?></a>
                </li>
                <li class="" id="livraisons">
                    <a href="<?= $this->url($this->section, "master", "livraisons") ?>"><i class="fa fa-check"></i> <span class="nav-label">Prêt pour livraison</span> <?php if (count($__lavages) > 0) { ?> <span class="label label-warning float-right"><?= count($__lavages) ?></span> <?php } ?></a>
                </li>
                <li><hr class="mp3" style="background-color: transparent; "></li>


                <li>
                    <a href="#"><i class="fa fa-search"></i> <span class="nav-label">Recherche TecDoc</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?= $this->url($this->section, "master", "tecdoc") ?>">Pieces autos/Shecmas</a></li>
                        <li><a href="<?= $this->url($this->section, "master", "tecdoc") ?>">Pneumatiques</a></li>
                    </ul>
                </li>


                <li><hr class="mp3" style="background-color: transparent; "></li>
                <li class="" id="archives">
                    <a href="<?= $this->url($this->section, "master", "archives") ?>"><i class="fa fa-archive"></i> <span class="nav-label">Archives Dossiers</span></a>
                </li>

            </ul>

        </ul>

    </div>
</nav>

<style type="text/css">
    li.dropdown-divider{
       !important;
   }
</style>