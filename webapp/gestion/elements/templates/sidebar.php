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
            $locations__ = Home\LOCATION::encours();
            $reservations__ = Home\RESERVATION::encours();
            $devis__ = Home\DEVIS::encours();
            $inspections__ = Home\INSPECTION::encours();
            ?>

            <ul class="nav metismenu" id="side-menu">
                <li class="" id="dashboard">
                    <a href="<?= $this->url($this->section, "master", "dashboard") ?>"><i class="fa fa-tachometer"></i> <span class="nav-label">Tableau de bord</span></a>
                </li>
                <li class="" id="clients">
                    <a href="<?= $this->url($this->section, "master", "clients") ?>"><i class="fa fa-search"></i> <span class="nav-label">Liste des clients</span></a>
                </li>
                <li class="" id="parcauto">
                    <a href="<?= $this->url($this->section, "master", "parcauto") ?>"><i class="fa fa-car"></i> <span class="nav-label">Parc auto</span> </a>
                </li>
                <li class="" id="planning">
                    <a href="<?= $this->url($this->section, "master", "planning") ?>"><i class="fa fa-calendar"></i> <span class="nav-label">Le Planning </span> </a>
                </li>
                <li><hr class="mp3" style="background-color: transparent; "></li>


                <li class="" id="locations">
                    <a href="<?= $this->url($this->section, "master", "locations") ?>"><i class="fa fa-home"></i> <span class="nav-label">Locations en cours</span> <?php if (count($locations__) > 0) { ?> <span class="label label-warning float-right"><?= count($locations__) ?></span> <?php } ?></a>
                </li>
                <li class="" id="reservations">
                    <a href="<?= $this->url($this->section, "master", "reservations") ?>"><i class="fa fa-archive"></i> <span class="nav-label">Reservations</span> <?php if (count($reservations__) > 0) { ?> <span class="label label-warning float-right"><?= count($reservations__) ?></span> <?php } ?></a>
                </li>
                <li class="" id="devis">
                    <a href="<?= $this->url($this->section, "master", "devis") ?>"><i class="fa fa-file-text-o"></i> <span class="nav-label">Devis / Proforma</span> <?php if (count($devis__) > 0) { ?> <span class="label label-warning float-right"><?= count($devis__) ?></span> <?php } ?></a>
                </li>

                <li><hr class="mp3" style="background-color: transparent; "></li>
                <li class="" id="inspections">
                    <a href="<?= $this->url($this->section, "master", "inspections") ?>"><i class="fa fa-wrench"></i> <span class="nav-label">En inspections </span> <?php if (count($inspections__) > 0) { ?> <span class="label label-warning float-right"><?= count($inspections__) ?></span> <?php } ?></a>
                </li>
                <li class="" id="maintenances">
                    <a href="<?= $this->url($this->section, "master", "maintenances") ?>"><i class="fa fa-gears"></i> <span class="nav-label">Maintenance </span> <?php if (count($inspections__) > 0) { ?> <span class="label label-warning float-right"><?= count($inspections__) ?></span> <?php } ?></a>
                </li>


                <li><hr class="mp3" style="background-color: transparent; "></li>
                <li class="" id="expertise">
                    <a href="<?= $this->url($this->section, "master", "expertise") ?>"><i class="fa fa-home"></i> <span class="nav-label">Les tarifs </span> <?php if (true) { ?> <span class="label label-warning float-right"><?= 0 ?></span> <?php } ?></a>
                </li>
                <?php if ($employe->isAutoriser("master")) { ?>


                <?php } ?>

                <li><hr class="mp3" style="background-color: transparent; "></li>
                <li class="" id="caisse">
                    <a href="<?= $this->url($this->section, "caisse", "caisse") ?>"><i class="fa fa-file-text-o"></i> <span class="nav-label">La caisse </span> </a>
                </li>
                <li class="" id="tresorerie">
                    <a href="<?= $this->url($this->section, "caisse", "tresorerie") ?>"><i class="fa fa-gears"></i> <span class="nav-label">Trésorerie </a>
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