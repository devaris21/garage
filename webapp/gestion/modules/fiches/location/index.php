<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

            <div class="wrapper wrapper-content animated fadeInRight article">

                <div class="row justify-content-md-center">
                    <div class="col-lg-10">
                        <div class="ibox" id="test">
                            <div class="ibox-content" >
                             <div style="margin-top: -3%">
                              <div class="row">
                                <div class="col-sm-5">
                                    <div class="row">
                                        <div class="col-3">
                                            <img style="width: 120%" src="<?= $this->stockage("images", "societe", $params->image) ?>">
                                        </div>
                                        <div class="col-9">
                                            <h5 class="gras text-uppercase text-orange"><?= $params->societe ?></h5>
                                            <h5 class="mp0"><?= $params->adresse ?></h5>
                                            <h5 class="mp0"><?= $params->postale ?></h5>
                                            <h5 class="mp0">Tél: <?= $params->contact ?></h5>
                                            <h5 class="mp0">Email: <?= $params->email ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 text-right">
                                    <h2 class="text-uppercase text-green gras" style="font-size: 250%">Contrat de location</h2>
                                    <h3 class="text-uppercase">N°<?= $location->reference  ?></h3>
                                    <h5><?= datelong($location->created)  ?></h5>  
                                    <h4><small>Bon édité par :</small> <span class="text-uppercase"><?= $location->employe->name() ?></span></h4>                             
                                </div>
                            </div><hr>

                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <h3 class="m-b-xs text-uppercase"><strong>Informations sur le client</strong></h3>
                                    <h4 class="m-b-xs"><?= $location->client->name() ?></h4>
                                    <div class="font-bold"><?= $location->client->typeclient->name() ?></div>
                                    <address class="">
                                        <strong><?= $location->client->adresse ?></strong><br>
                                        <strong><?= $location->client->typepiece->name() ?> <?= $location->client->numero ?></strong><br>
                                        <strong><?= $location->client->contact ?></strong><br>
                                        <?= $location->client->email ?>
                                    </address>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mp3 border text-center" style="padding-top: 3%">
                                        <h3 class="m-b-xs text-uppercase text-green"><strong><?= $tarif->name() ?></strong></h3>
                                        <h2 class="d-inline gras text-green"><?= money($tarif->prixJournalier) ?> </h2>
                                        <span><?= $params->devise  ?> / Jour</span>
                                        <address class="m-t-md">
                                            <strong class="text-green">Forfait de <?= $tarif->kilometreJournalier ?> Kms par Jour</strong><br>
                                            <?= money($tarif->prixKilometreComplementaire) ?> <?= $params->devise  ?> / Km supplémentaire 
                                        </address>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <h3 class="m-b-xs text-uppercase"><strong>Informations sur la location</strong></h3><br>
                                    <span>Du <?= datecourt($location->started) ?></span><br>
                                    <span>au <?= datecourt($location->finished) ?> inclus (<?= dateDiffe($location->started, $location->finished) ?> jours)</span><br>
                                    <div>Lieu : <?= $location->lieu ?></div>
                                </div>
                            </div><hr>

                            <div class="row">
                                <div class="col-6">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" class="gras">Marque/Modèle :</td>
                                                <td colspan="2"><?= $location->vehicule->marque->name() ?> <?= $location->vehicule->modele ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="gras">Immatriculation :</td>
                                                <td colspan="2"><?= $location->vehicule->immatriculation ?></td>
                                            </tr>
                                            <tr>
                                                <td class="gras">Couleur :</td>
                                                <td><?= $location->vehicule->couleur ?></td>
                                                <td class="gras">Portières/Places :</td>
                                                <td><?= $info->nbPortes ?>/ <?= $info->nbPlaces ?> places</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="gras">N° chassis :</td>
                                                <td colspan="2"><?= $info->cnit ?></td>
                                            </tr>
                                            <tr>
                                                <td class="gras">Kilometrage :</td>
                                                <td><?= $location->kilometrage ?> Kms</td>
                                                <td class="gras">Niveau carburant :</td>
                                                <td><?= $location->niveaucarburant->name() ?> du reservoir</td>
                                            </tr>
                                        </tbody>
                                    </table>     
                                </div>

                                <div class="col-6 text-center">
                                    <img style="height: 250px;" src="<?= $this->stockage("images", "vehicules", $location->vehicule->image) ?>">
                                </div>
                            </div><br><br>


                            <div class="row">
                                <div class="col-6">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="gras">Assurance :</td>
                                                <td><?= $location->etatexterieur ?></td>
                                            </tr>
                                            <tr>
                                                <td class="gras">Visite technique :</td>
                                                <td><?= $location->etatexterieur ?></td>
                                            </tr>
                                            <tr>
                                                <td class="gras">Etat intérieur :</td>
                                                <td><?= $location->etatinterieur ?></td>
                                            </tr>
                                            <tr>
                                                <td class="gras">Etat extérieur :</td>
                                                <td><?= $location->etatexterieur ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Sur l'image en face, sont marqués les détails</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><?= $location->details ?></td>
                                            </tr>
                                        </tbody>
                                    </table>     
                                </div>

                                <div class="col-6 text-center">
                                    <img style="width: 100%" src="<?= $this->stockage("images", "locations", $location->image) ?>">
                                </div>
                            </div><br><br>

                            <div class="social-feed-box">
                                <div class="social-body border-bottom" style="border-color: green !important;">
                                    <p class="text-justify" style="font-size: 14px; line-height: 24px">Je soussigné(e), moi, <b><?= $location->client->name() ?></b> être d'accord avec l'etat du véhicule indiqué ci-dessus et prends la responsabilité pendant toute la durée de la location. Je m'engage à restituer le vehicule dans l'état initial et ce, le jour indiqué sur le contrat et à l'adresse qui m'a été indiqué. Dans le cas contraire, je devrais payer dans l'immédiat les frais engendrés et de ceux prévus dans les clauses du contrat de location qui m'a été remis. Je m'engage également à payer entièrement la totalité du montant dû à cette location dans les délais m'ont également été indiqué !</p>
                                </div>
                            </div>

                            <br><br>
                            <div class="row">
                                <div class="col-7">
                                    <div class="row text-center">
                                        <div class="col">
                                            <div class=" m-l-md text-dark">
                                                <small class="text-muted block">Montant total de location</small>
                                                <span class="h5 font-bold block"><?= money($location->montant) ?> <small><?= $params->devise ?></small></span>
                                            </div>
                                        </div>
                                        <div class="col text-blue border-right border-left">
                                            <small class="text-muted block">Déjà Payé</small>
                                            <span class="h5 font-bold block"><?= money($location->montant - $location->reste) ?> <small><?= $params->devise ?></small></span>
                                        </div>
                                        <div class="col text-danger border-left">
                                            <small class="text-muted block">Reste à payer</small>
                                            <span class="h5 font-bold block"><?= money($location->reste) ?> <small><?= $params->devise ?></small></span>
                                        </div>
                                    </div><hr>

                                    <div class="feed-activity-list">
                                        <?php foreach ($reglements as $key => $item) {
                                            $item->actualise(); ?>
                                            <div class="feed-element row">
                                                <div class="col-2">
                                                    <i class="fa fa-money fa-3x"></i> 
                                                </div>
                                                <div class="col-10">
                                                    <div class="media-body ">
                                                        <small class="float-right"><?= datelong($item->created)  ?></small>
                                                        <strong><?= money($item->mouvement->montant) ?> <?= $params->devise ?></strong> pour <?= $item->comment ?> <br>
                                                        <small class="text-muted">Payement par <?= $item->modepayement->name()  ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="col-5">
                                    <div class="text-right">
                                        <span><u>Signature du client</u></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>


        <button type="button" onclick="printJS({printable: 'test', type: 'pdf'})">
            Print PDF
        </button>

        <div class="row justify-content-md-center break" style="page-break-before: always;">
            <div class="col-lg-10">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="text-center article-title">
                            <span class="text-muted"><i class="fa fa-clock-o"></i> <?= datecourt(dateAjoute()); ?></span>
                            <h1>Contrat de Location de Véhicule</h1>
                        </div>
                        <dl>
                            <dt class="text-uppercase">1- Objet du présent contrat</dt><br>

                            <dd>1.1- La fourniture des renseignements portés sur le contrat est obligatoire et conditionne la suite qui pourra être donnée à la demande de location.</dd>
                            <dd>1.2- Le locataire doit avoir minimum 21 ANS et 3 ANS de permis effectif.</dd>
                            <dd>1.3- Dans l’hypothèse ou pour une cause lui incombant, le loueur ne pourrait honorer un contrat de location par la fourniture du véhicule désigné, sa responsabilité est expressément limitée, à la fourniture d’un véhicule dans la catégorie la plus proche, en fonction de ses possibilités et en cas d’impossibilité totale de fourniture, à l’équivalent du cout de la location pour la durée contractuelle prévue (base journalière H.T ) dans la limite maximale de 10 journées. Seules sont garanties les réservations confirmées par écrit du loueur ainsi que le versement des arrhes par le locataire.</dd>
                            <dd>1.4- Le loueur se réserve le droit de mettre fin à la location, sans aucune indemnité, à tout moment, en ne facturant que les journées utilisées.</dd>
                            <dd>1-5. La restitution du véhicule en parfait état et ses documents ( carte grise ou copie certifié conforme), fait seul cesser la location.
                            </dd>
                            <dd>1-6 Le locataire doit acquitter celle-ci tant que toutes ces restitutions n’interviennent pas ,même pour une cause indépendante de sa volonté (décisions judiciaires, administratives, grèves, accident, intempéries …).</dd>
                            <dd>1-7 En cas de vol du véhicule ou de perte de documents, la location cesse le jour de la production par le locataire d’une attestation officielle de perte ou de vol. Les frais de délivrance des duplicatas des documents sont à sa charge.</dd>
                            <dd>1-8 En cas de restitution dans un garage autre que celui du départ, sans accord écrit du loueur, il sera facturé au locataire tous les frais de retour du véhicule au garage de départ.</dd>
                            <dd>1-9 Le carburant est à la charge du locataire et celui-ci doit restituer le véhicule avec au moins le même niveau indiqué.</dd>
                            <dd></dd>
                        </dl>


                        <dl>
                            <dt class="text-uppercase">2- RESPONSABILITE du client</dt><br>

                            <dd>2-1 Le locataire est entièrement responsable du véhicule dans les termes des articles 1382 et 1384 du code civil, dès que le véhicule lui est remis.</dd>
                            <dd>2-2 Aucun lien de subordination n’existant entre le locataire et le loueur, la responsabilité de ce dernier ne peut être recherchée en raison d’infraction au code de la route, conformément à l’article L21 dudit code et ce tant en principal qu’en frais de justice. Le locataire remboursera au loueur tous frais de cette nature payés éventuellement en ses lieux et place, il en est de même en ce qui concerne les infractions douanières.</dd>
                            <dd>2-3 Les conducteurs autorisés agissent comme mandataires du locataire qui demeure responsable envers le loueur de l’exécution intégrale des présentes conditions.</dd>
                            <dd>2-4 Le véhicule est livré en bon état de marche et de carrosserie avec des pneumatiques en bon état et une roue de secours complète. Avant signature, l’utilisateur vérifie 
                            l’intérieur et l’extérieur du véhicule ( y compris sous le châssis )</dd>
                            <dd>2-5 En conséquence, pour le cas ou une interruption de service, un incident ou un accident résultant directement du fonctionnement du véhicule ou de l’état de ses pneumatiques, serait démontrée, la responsabilité du loueur serait limité à la fourniture d’un véhicule équivalent.</dd>
                            <dd>2-6 Le bon état du véhicule , en conformité avec le code de la route est authentifié par son acceptation par le locataire : qui après contrôle personnel signe la fiche d’inspection, il en demeure le seul responsable devant la loi. Le locataire s’oblige à restituer le dit véhicule dans l’état ou il se trouvait au départ .</dd>
                        </dl>

                        <dl>
                            <dt class="text-uppercase">3- RESPONSABILITE du locataire (<?= $params->societe ?>)</dt><br>
                            Le locataire s’engage :
                            <dd>3-1 A ne laisser conduire le véhicule que par des conducteurs autorisés dans les conditions 1-1.</dd>
                            <dd>3-2 A ne l’utiliser sur les voies propres à la circulation automobile , en bon père de famille, sans participation à des épreuves à caractère sportif telles que rallyes, reconnaissances , compétitions sur routes ou circuits , etc. … </dd>
                            <dd>3-3 A ne pas transporter des voyageurs à titre onéreux, ni en nombre supérieur à celui des places autorisées.</dd>
                            <dd>3-4 A ne pas utiliser le véhicule à d’autres fins que celles prévues par le constructeur et autorisées par les lois, arrêtés et règlements.</dd>
                            <dd>3-5 A n’apporter aucune modification mécanique ou de carrosserie, à n’enlever ni à ajouter aucune pièce mécanique ou accessoire, à n’intervenir aucun élément tel que pneumatiques sans avis express du loueur.</dd>
                            <dd>3-6 A ne pas atteler une remorque, à ne pas remorquer un autre véhicule, à se faire éventuellement remorquer que par un véhicule légalement autorisé.</dd>
                            <dd>3-7 A présenter TOUTES LES 4 SEMAINES le véhicule au loueur pour les opérations d’entretien et de vérification résultant de son usage normal. A défaut et avec accord du Loueur , le locataire s’engage à faire effectuer à ses frais par un agent officiel de la marque du véhicule et à produire les factures justificatives sur simple demande du loueur.</dd>
                            <dd>3-8 A restituer le véhicule du loueur au point de départ au plus tard le jour contractuellement prévu pour la fin de location. La vérification du véhicule s’effectuera immédiatement dans le cas ou l’état intérieur et extérieur du véhicule le permet ; dans le cas contraire ,il sera procédé aux contrôles après nettoyage. La non restitution du véhicule à l’échéance convenue fera l’objet des sanctions de l’art . 3.10 et le locataire versera une indemnité de 100 euros au loueur ainsi que les jours de location non autorisés sur la base du tarif journalier.</dd>
                            <dd>3-9 A faire la déclaration écrite dans les 48 h. de tout accident sur un constat comportant tous renseignements. sur les circonstances du sinistre, l’identité des parties et des témoins, à aviser sans délai le loueur en cas d’accident ou de vol du véhicule et à saisir les autorités de police ou de gendarmerie.</dd>
                            <dd>3-10 Toute infraction à l’une des obligations figurant aux articles 3-1 , 3-2 ,3-3, 3-4, 3-5, 3-6, 3-7, 3-8, 3-9, 6-2 , entraine de plein droit et sans délai la résiliation de la 
                                location et par conséquent la suppression de toutes garanties. Le montant du crédit du locataire restant acquis 
                            à la société à titre de clause pénale , en outre le loueur se réserve, si le locataire ne restitue pas immédiatement et volontairement le véhicule , la faculté de le reprendre en quelque lieu qu’il se trouve ; au frais du locataire, sans qu’il ait besoin de recours juridique et sans préjudice de poursuites pénales pour détournement de véhicule.</dd>
                        </dl>


                        <dl>
                            <dt class="text-uppercase">4- ASSURANCES</dt><br>
                            <dt class="text-capitalize">4-1 RESPONSABILITE CIVILE</dt>
                            <dd>4-1.1 Sous réserve des articles 4-2 , 4-3, le locataire est assuré sans limitation contre les conséquences pécuniaires dès sa responsabilité civile à raison des accidents causé aux tiers.
                                Sont exclus de cette garantie :<br>
                                Le conducteur du véhicule au moment de l’accident.<br>
                            Les accidents survenant à des objets transportés ou occasionnés par ces objets.</dd>
                            <dd>4-1.2 En cas d’accident survenu dans des circonstances comportant le non respect des engagements faisant l’objet des articles 3-1, 3-2 , 3-3, 3-4, 3-5, 3-6, 3-7, 3-8, 3-9, 6-2, le locataire reste entièrement responsable de toutes les conséquences de l’accident pour le préjudice matériel ou corporel causé à des tiers : dans un tel cas, le locataire est tenu de rembourser au loueur ou à ses assureurs le montant intégral des sommes éventuellement payées par eux.</dd>
                            <dd>4-1.3 Il n’y a pas d’assurance en cas d’accident causé par un conducteur non muni d’un permis en état de validité depuis plus de 2 ans au moins.</dd>
                            <dt class="text-capitalize">4-2 Incendie</dt>
                            <dd>4-2.1 En cas d’incendie du véhicule, le locataire devra s’acquitter d’une franchise de 400 euros. En cas d’incendie causé par des objets transportés par le locataire dans le véhicule , ce dernier aura à sa charge la valeur vénale du véhicule.</dd>
                            <dt class="text-capitalize">4-3 VOL</dt>
                            <dd>4-3.1 Seul le véhicule est assuré contre le vol ( sous le couvert d’une franchise en fonction de la catégorie louée). Il n’y a pas d’assurance des objets transportés. En cas d’accident non responsable , le locataire devra faire l’avance d’un montant de 400 euros.</dd>
                            <dd>4-3.2 Le locataire prend à sa charge les risques de vol du véhicule à la condition expresse que celui-ci restitue les documents (carte grise ou copie certifiée conforme de la carte grise) et les clefs du véhicule ( avec une franchise suivant la catégorie louée) : à défaut de restitution par le locataire des documents et des clefs du véhicule, celui ci sera tenu au paiement de la valeur vénale du véhicule.</dd>
                            <dd>4-3.3 Le vol des objets transportés, qu’elle que soit leur valeur, le pillage, le vol partiel et le vol commis par un préposé ou mandataire du locataire restent à la charge exclusive de ce dernier.</dd>
                            <dt class="text-capitalize">4-4 DEGATS AU VEHICULE</dt>
                            <dd>4-4.1 Les dégâts du véhicule consécutifs à un accident responsable ou sans tiers sont à la charge entière du locataire.</dd>
                            <dd>4-4.2 Reste dans tous les cas intégralement à la charge du locataire:<br>
                                - Les dégâts et les frais d’immobilisation consécutifs à un accident survenu sans tiers en cause ou dans les circonstances comportant le non-respect des engagements prévus aux articles 3-1, 3-2, 3-3, 3-4, 3-5, 3-6, 3-7, 3-8, 3-9, 6-2, ainsi que ceux résultant d’un choc dans un passage dont la hauteur, la largeur ou le garde au sol a été mal apprécié ( pont, tunnel, entrée d’immeuble, branche d’arbre, caniveaux, dos d’âne, ornières, radiers, éboulements, etc..du gel et du roulage à plat, du vandalisme ou du vol de la voiture, d’émeutes ou de troubles et les frais de retour du véhicule au point de départ.<br>
                            - Les dégradations intérieures du véhicule y compris les tàches sur la sellerie ; les frais de remorquage, en cas de vol , de panne « responsable » tel que panne d’essence, perte des clés, recodage de clefs suite à batterie déchargée du à l’oubli d’extinction des feux et plus généralement toute panne non imputable au loueur.</dd>
                            <dd>4-4.3 BRIS DE GLACE : Le bris de glace est couvert avec une franchise de 250 Euros.
                                Tout locataire en état d’ivresse ou sous l’emprise d’un état alcoolique, tel qu’il est défini par l’article 1-1 du code de la route, ou sous l’effet d’éléments absorbés qui modifient les réflexes indispensables à la conduite du véhicule, est déchu des garanties définies aux articles 4-1.1, 4-2.1, 4-3.1, dans les conditions prévues par la loi du 21.02.1958.
                                Le locataire ne peut invoquer l’exonération totale ou partielle de sa responsabilité pour quelque cause que ce soit, en vue de refuser ou de suspendre le paiement des sommes dont il est redevable envers le loueur.
                            Lorsque jouent les dispositions, des articles 4-2.1, 4-4.1, 4-5.2, le locataire subroge d’office le loueur de ses droits, pour l’exercice du recours contre les tiers. Pour les dégâts matériels : les frais et honoraires engagés par les recouvrements de cette indemnité sont assumés par le locataire et le loueur au prorata des sommes leur revenant. Le locataire doit communiquer au loueur dès réception toutes pièces reçues à la suite d’un accident et lui donner tous renseignements utiles. Aucune reconnaissance de responsabilité, ni transaction intervenant en dehors du loueur ne lui sont opposables.</dd>
                        </dl>


                        <dl>
                            <dt class="text-uppercase">5- VErsement</dt><br>
                            <dd>5-1 Le locataire doit verser à la prise en charge du véhicule une somme dont le montant est déterminé par les conditions du tarif en vigueur.</dd>
                            <dd>5-2 Ce versement est attribué au loueur en toute propriété à concurrence des sommes dues par le locataire, pour quelque cause que ce soit, ce qui, de convention expresse, est formellement acceptée par lui.</dd>
                            <dd>5-3 Son remboursement ne peut intervenir qu’après restitution du véhicule et solution définitive des éventuels litiges l’opposant au loueur.</dd>
                        </dl>


                        <dl>
                            <dt class="text-uppercase">6- Facturation</dt><br>
                            <dd>6-1 Les utilisations seront facturées dans les conditions du tarif en vigueur au moment de chaque location, ce qui est formellement accepté par le locataire.</dd>
                            <dd>6-2 En cas de non paiement au préalable de la location , le locataire perd les bénéfices de toutes garanties résultants 
                                des présentes conditions. En outre, il s’expose à des poursuites et à la totalité de la facture majorée d’une indemnité forfaitaire à 20% , à titre de clause pénale dans 
                            les sens prévue aux articles 1226 et suivant du code civil, sans préjudice de l’application des dispositions de l’article 3-10.</dd>
                        </dl>


                        <dl>
                            <dt class="text-uppercase">7- CONTESTATIONS</dt><br>
                            <dd>En cas de litige, sont seules compétentes les juridictions du siège social du loueur.<br>
                                Assistance :
                            Vous bénéficiez d’une assistance GROUPAMA , numéro de téléphone inscrit au dos de la vignette d’assurance, sur le porte clefs et sur l’attestation d’assurance.</dd>
                        </dl><br>

                        <div class="row text-center">
                            <div class="col-md-3">
                                <h4><u>Signature du locataire</u> <br><br><?= $params->societe ?></h4>
                            </div>
                            <div class="offset-md-6 col-md-3">
                                <h4 class="text-right"><u>Signature du client</u> <br><br><?= $location->client->name() ?><br></h4>
                            </div>
                        </div>
                        <div style="margin-top: 10%"></div>
                        <br><hr>
                        <p class="text-center"><small><i>* Nous vous prions de vérifier l'exactitude de toutes les informations qui ont été mentionnées sur cette facture avant de quitter nos locaux !</i></small></p>
                    </div>
                </div>
            </div>
        </div>



    </div>


    <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>


</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
