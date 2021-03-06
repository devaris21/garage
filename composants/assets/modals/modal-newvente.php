
<div class="modal inmodal fade" id="modal-newvente" style="z-index: 9999999999">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nouvelle vente de pièces</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer la vente</small>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5 class="text-uppercase">Les produits de la commande</h5>
                            <div class="pull-right" style="margin-top: -1%">
                                <input type="text" class="form-control" name="search" placeholder="Rechercher une pièce...">
                            </div>
                        </div>
                        <div class="ibox-content"><br>
                            <div class="table-responsive">
                                <table class="table  table-striped">
                                    <tbody class="commande">
                                        <!-- rempli en Ajax -->
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    <?php foreach (Home\PRODUIT::getAll() as $key => $produit) { ?>
                                      <button class="btn btn-white dim newproduit2" data-id="<?= $produit->getId() ?>" data-toggle="tooltip" title="<?= $produit->description ?>"><?= $produit->name(); ?></button>
                                  <?php }  ?>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <div class="col-md-4 ">
                <div class="ibox"  style="background-color: #eee">
                    <div class="ibox-title" style="padding-right: 2%; padding-left: 3%; ">
                        <h5 class="text-uppercase">Finaliser la commande</h5>
                    </div>
                    <div class="ibox-content"  style="background-color: #fafafa">
                        <form id="formCommande">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <label>Mode de payement <span style="color: red">*</span> </label>                                
                                <div class="input-group">
                                    <?php Native\BINDING::html("select", "modepayement"); ?>
                                </div>
                            </div><br>
                            <div class="no_modepayement_facultatif">
                                <div>
                                    <label>Montant avancé<span style="color: red">*</span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-money"></i></span><input type="text" value="0" min="0" name="avance" class="form-control">
                                    </div>
                                </div>
                            </div><br>
                            <div class="modepayement_facultatif">
                                <div>
                                    <label>Structure d'encaissement<span style="color: red">*</span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bank"></i></span><input type="text" name="structure" class="form-control">
                                    </div>
                                </div><br>
                                <div>
                                    <label>N° numero dédié<span style="color: red">*</span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span><input type="text" name="numero" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="client_id" value="<?= getSession("client_id") ?>">
                        </form><br>
                        <h5><span>Total </span> <span class="pull-right montant">0 Fcfa </span></h5>
                        <h5><span>TVA (<?= $params->tva ?> %)</span> <span class="pull-right tva">0 Fcfa </span></h5>
                        <h2 class="font-bold total text-right total">0 Fcfa</h2>
                        <hr/>
                        <button onclick="validerCommande()" class="btn btn-primary btn-block dim"><i class="fa fa-check"></i> Valider la commande</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>


