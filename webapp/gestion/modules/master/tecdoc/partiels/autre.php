<div role="tabpanel" id="tab-2" class="tab-pane">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="ibox border">
                    <div class="ibox-title">
                        <h5 class="gras text-uppercase text-blue">Rechercher par le véhicule</h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <?php Native\BINDING::html("select", "marque") ?>
                        </div><br>
                        <div>
                            <?php Native\BINDING::html("select", "marque") ?>
                        </div><br>
                        <div>
                            <?php Native\BINDING::html("select", "marque") ?>
                        </div><br>
                        <div class="text-center">
                            <small>OU</small><hr class="mp0">
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Saisir le VIN du véhicule"> 
                            <span class="input-group-append"><button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button></span>
                        </div>
                    </div>
                </div>

                <div class="ibox border">
                    <div class="ibox-title">
                        <h5 class="gras text-uppercase text-blue">Image du véhicule</h5>
                    </div>
                    <div class="ibox-content">
                        <img src="http://dummyimage.com/200x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
                    </div>
                </div>

                <div class="ibox border">
                    <div class="ibox-title">
                        <h5 class="gras text-uppercase text-blue">Fiche technique du véhicule</h5>
                    </div>
                    <div class="ibox-content">
                     <table class="table table-hover margin bottom">
                        <thead>
                            <tr>
                                <th style="width: 1%" class="text-center">No.</th>
                                <th>Transaction</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td> Security doors
                                </td>
                                <td class="text-center small">16 Jun 2014</td>
                                <td class="text-center"><span class="label label-primary">$483.00</span></td>

                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td> Wardrobes
                                </td>
                                <td class="text-center small">10 Jun 2014</td>
                                <td class="text-center"><span class="label label-primary">$327.00</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            <h4 class="gras text-uppercase text-blue">Marques favorites</h4>
            <div class="row text-center">
                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>

                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>

                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>
                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>

                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>
                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>
            </div>

            <h4 class="gras text-uppercase text-blue">Toutes les marques</h4>
            <div class="row text-center">
                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>

                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>

                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>
                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>

                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>
                <div class="col-md-2">
                    <img src="http://dummyimage.com/100x100/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br>
                    <label>lorem ipsum</label>
                </div>
            </div>


            <div>
                <table class="table table-hover margin bottom">
                    <thead class="bg-blue">
                        <tr>
                            <th>Description</th>
                            <th>Année</th>
                            <th>Code moteur</th>
                            <th class="text-center">Kw</th>
                            <th class="text-center">Cv</th>
                            <th>cm<sup>3</sup></th>
                            <th>Modèle</th>
                            <th title="fiche technique" class="text-center"><i class="fa fa-information"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td> Security doors</td>
                            <td> Security doors</td>
                            <td> Security doors</td>
                            <td> Security doors</td>
                            <td class="text-center small">16 Jun 2014</td>
                            <td class="text-center"><span class="label label-primary">$483.00</span></td>
                            <td><i class="fa fa-eye"></i></td>

                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td> Wardrobes
                            </td>
                            <td class="text-center small">10 Jun 2014</td>
                            <td class="text-center"><span class="label label-primary">$327.00</span></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>