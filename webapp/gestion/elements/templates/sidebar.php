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
            // $groupes__ = Home\GROUPECOMMANDE::encours();
            // $prospections__ = Home\PROSPECTION::encours();
            // $ventecaves__ = Home\PROSPECTION::findBy(["etat_id ="=>Home\ETAT::ENCOURS, "typeprospection_id ="=>Home\TYPEPROSPECTION::VENTECAVE]);
            // $livraisons__ = Home\PROSPECTION::findBy(["etat_id ="=>Home\ETAT::ENCOURS, "typeprospection_id ="=>Home\TYPEPROSPECTION::LIVRAISON]);
            // $approvisionnements__ = Home\APPROVISIONNEMENT::encours();
            // $datas1__ = array_merge(Home\PANNE::encours(), Home\DEMANDEENTRETIEN::encours(), Home\ENTRETIENVEHICULE::encours(), Home\ENTRETIENMACHINE::encours());

            ?>

            <ul class="nav metismenu" id="side-menu">
                <li class="" id="dashboard">
                    <a href="<?= $this->url($this->section, "master", "dashboard") ?>"><i class="fa fa-tachometer"></i> <span class="nav-label">Tableau de bord</span></a>
                </li>
                <li class="" id="clients">
                    <a href="<?= $this->url($this->section, "master", "clients") ?>"><i class="fa fa-search"></i> <span class="nav-label">Liste des clients</span></a>
                </li>
                <li class="" id="parcauto">
                    <a href="<?= $this->url($this->section, "master", "parcauto") ?>"><i class="fa fa-car"></i> <span class="nav-label">Parc auto</span> <?php if (true) { ?> <span class="label label-warning float-right"><?= 0 ?></span> <?php } ?></a>
                </li>
                <li class="" id="rechercher">
                    <a href="<?= $this->url($this->section, "master", "rechercher") ?>"><i class="fa fa-search"></i> <span class="nav-label">Rechercher</span></a>
                </li>
                <li><hr class="mp3" style="background-color: transparent; "></li>


                <li class="" id="reservations">
                    <a href="<?= $this->url($this->section, "master", "reservations") ?>"><i class="fa fa-archive"></i> <span class="nav-label">Reservations</span> <?php if (true) { ?> <span class="label label-warning float-right"><?= 0 ?></span> <?php } ?></a>
                </li>
                <li class="" id="locations">
                    <a href="<?= $this->url($this->section, "master", "locations") ?>"><i class="fa fa-home"></i> <span class="nav-label">Locations en cours</span> <?php if (true) { ?> <span class="label label-warning float-right"><?= 0 ?></span> <?php } ?></a>
                </li>
                <li class="" id="entrepot">
                    <a href="<?= $this->url($this->section, "master", "entrepot") ?>"><i class="fa fa-handshake-o"></i> <span class="nav-label">Inspections </span> <?php if (true) { ?> <span class="label label-warning float-right"><?= 0 ?></span> <?php } ?></a>
                </li>
                <li class="" id="expertise">
                    <a href="<?= $this->url($this->section, "master", "expertise") ?>"><i class="fa fa-home"></i> <span class="nav-label">Planning </span> <?php if (true) { ?> <span class="label label-warning float-right"><?= 0 ?></span> <?php } ?></a>
                </li>

                <li><hr class="mp3" style="background-color: transparent; "></li>
                <li class="" id="ventepieces">
                    <a href="<?= $this->url($this->section, "master", "ventepieces") ?>"><i class="fa fa-handshake-o"></i> <span class="nav-label">Rapport du jour</span> <?php if (true) { ?> <span class="label label-warning float-right"><?= 0 ?></span> <?php } ?></a>
                </li>
                <li class="" id="entrepot">
                    <a href="<?= $this->url($this->section, "master", "entrepot") ?>"><i class="fa fa-handshake-o"></i> <span class="nav-label">Maintenance </span> <?php if (true) { ?> <span class="label label-warning float-right"><?= 0 ?></span> <?php } ?></a>
                </li>


                <li><hr class="mp3" style="background-color: transparent; "></li>
                <li class="" id="expertise">
                    <a href="<?= $this->url($this->section, "master", "expertise") ?>"><i class="fa fa-home"></i> <span class="nav-label">Les tarifs </span> <?php if (true) { ?> <span class="label label-warning float-right"><?= 0 ?></span> <?php } ?></a>
                </li>
                <li class="" id="devis">
                    <a href="<?= $this->url($this->section, "master", "devis") ?>"><i class="fa fa-truck"></i> <span class="nav-label">Devis / Proforma</span> <?php if (true) { ?> <span class="label label-warning float-right"><?= count([]) ?></span> <?php } ?></a>
                </li>
                <?php if ($employe->isAutoriser("master")) { ?>


                <?php } ?>

                <li><hr class="mp3" style="background-color: transparent; "></li>



            </ul>

        </ul>

    </div>
</nav>

<style type="text/css">
    li.dropdown-divider{
     !important;
 }
</style>