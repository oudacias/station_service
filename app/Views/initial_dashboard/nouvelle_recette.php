<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Nouvelle Recette</h4>
                
            </div>
            <div class="card-body">
                <form method="post" action=<?php echo site_url('Ajouter_Recette') ?>>
                    <div class="row">
                        <div class="col-sm-4">
                            <h8>Date de recette</h8>
                            <div class="form-group position-relative has-icon-left">
                                <input id="day" max="<?php echo date('Y-m-d'); ?>" name="recette_date" class="form-control" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-calendar"></i>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Ajouter</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs justify-content-end align-items-center" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="volucompteur-tab" data-bs-toggle="tab" href="#volucompteur" role="tab"
                                                aria-controls="volucompteur" aria-selected="true">Volucompteur</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="stock-tab" data-bs-toggle="tab" href="#stock" role="tab"
                                                aria-controls="stock" aria-selected="false">Stock</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="credit-tab" data-bs-toggle="tab" href="#credit" role="tab"
                                                aria-controls="credit" aria-selected="false">Crédit Client</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="paiement-tab" data-bs-toggle="tab" href="#paiement" role="tab"
                                                aria-controls="paiement" aria-selected="false">Paiement</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="ventes_services-tab" data-bs-toggle="tab" href="#ventes_services" role="tab"
                                                aria-controls="ventes_services" aria-selected="false">Ventes et services</a>
                                        </li>
                                    </ul>
                                    <br>
                                    <br>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="volucompteur" role="tabpanel" aria-labelledby="volucompteur-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>Pompe</th>
                                                            <th>Produit</th>
                                                            <th>Prix</th>
                                                            <th>Compteur Initial</th>
                                                            <th>Compteur Final</th>
                                                            <th>Sortie</th>
                                                            <th>CA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($volucompteurs){
                                                            foreach($volucompteurs as $volucompteur){                
                                                        ?>
                                                        <tr>
                                                            <td class="text-bold-500"><?php echo $volucompteur->p_nom; ?></td>
                                                            <td><?php echo $volucompteur->pr_nom; ?></td>
                                                            <td class="text-bold-500"><input type="number" id="prix<?php echo $volucompteur->pompe_ids; ?>" name="prix[]" value="<?php echo $volucompteur->pr_prix; ?>" readonly/>
                                                            <input type="hidden" name="pr_ids[]" value="<?php echo $volucompteur->pr_ids; ?>" readonly/>
                                                            <input type="hidden" name="pompe_ids[]" value="<?php echo $volucompteur->pompe_ids; ?>" readonly/>

                                                            <td><input type="number" id="compteur_initial<?php echo $volucompteur->pompe_ids; ?>" name="compteur_initial[]" value="<?php echo $volucompteur->compteur_final; ?>" readonly/></td>
                                                            <td><input type="number" id="compteur_final<?php echo $volucompteur->pompe_ids; ?>" onchange="volucompteur(<?php echo $volucompteur->pompe_ids; ?>)" name="compteur_final[]" value="<?php echo $volucompteur->compteur_final; ?>" min="<?php echo $volucompteur->compteur_final ?>"></td>
                                                            <td><input type="number" id="sortie<?php echo $volucompteur->pompe_ids; ?>" name="sortie[]" value="0" disabled="disabled" /></td>
                                                            <td><input type="number" id="ca<?php echo $volucompteur->pompe_ids; ?>" name="ca[]" value="0" disabled="disabled" /></td>
                                                        </tr>
                                                        <?php 
                                                            } 
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="stock" role="tabpanel" aria-labelledby="stock-tab">
                                        <table class="table table-striped" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>Cuve</th>
                                                            <th>Produit</th>
                                                            <th>Stock Initial</th>
                                                            <th>Entrée</th>
                                                            <th>Sortie</th>
                                                            <th>Stock Comptable</th>
                                                            <th>Stock Physique</th>
                                                            <th>Manquant ou Excedents </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($reservoirs){
                                                            foreach($reservoirs as $reservoir){                
                                                        ?>
                                                        <tr>
                                                            <td class="text-bold-500"><?php echo $reservoir->r_nom; ?></td>
                                                            <input type="hidden" name="reservoir_id[]" value="<?php echo $reservoir->id; ?>">
                                                            <td><?php echo $reservoir->pr_nom; ?></td>
                                                            <td class="text-bold-500"><input type="number" value="<?php echo $reservoir->s_stock_comptable; ?>" id="stock_initial<?php echo $reservoir->id; ?>" name="stock_initial[]" readonly/>
                                                            <input type="hidden" value="<?php echo $reservoir->id; ?>" name="reservoir_id[]" readonly/>
                                                            <input type="hidden" value="<?php echo $reservoir->produits_ids; ?>" name="produits_ids[]" readonly/>

                                                            <td><input type="number" value = "0" id="entree<?php echo $reservoir->id; ?>" onchange="stock(<?php echo $reservoir->id; ?>)" name="entree[]"></td>
                                                            <td><input type="number" value = "0" id="sortie_r<?php echo $reservoir->id; ?>" onchange="stock(<?php echo $reservoir->id; ?>)" name="sortie[]"></td>
                                                            <td class="text-bold-500"><input type="number" id="comptable<?php echo $reservoir->id; ?>" name="comptable[]" disabled="disabled" />
                                                            <td><input type="number" id="physique<?php echo $reservoir->id; ?>" value="<?php echo $reservoir->s_stock_comptable; ?>" onchange="stock(<?php echo $reservoir->id; ?>)" name="physique[]"></td>
                                                            <td><input type="number" id="m_e<?php echo $reservoir->id; ?>" onchange="stock(<?php echo $reservoir->id; ?>)" name="m_e[]"></td>
                                                        </tr>
                                                        <?php 
                                                            } 
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                        </div>
                                        <div class="tab-pane fade" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                                        <div class="table-responsive">
                                                <table class="table table-striped" id="myTable0">
                                                    <thead>
                                                        <tr>
                                                            <th>CLIENT</th>
                                                            <th>Solde en Cours</th>
                                                            <th>Reliquat</th>
                                                            <th>Plafond</th>
                                                            <th>Produit</th>
                                                            <th>Reference</th>
                                                            <th>Qte</th>
                                                            <th>Montant</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-12">             
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalLong">
                                                    Ajouter Crédit
                                                </button>
                                            </div>
                                            <br>
                                            <br>
                                            <!--login form Modal -->
                                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Nouveau Crédit</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x">x</i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- <form> -->
                                                                <div class="modal-body">
                                                                    <label>Client</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" id="c_select_clients" name="c_client_ids">
                                                                            <?php foreach($clients as $client){ ?>
                                                                                <option value="<?php echo $client['id'] ?>"> <?php echo $client['nom'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </fieldset>
                                                                    <label>Reference</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="c_reference" class="form-control">
                                                                    </div>
                                                                    <label>Produit</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" id="select_produit_credit" name="c_produit_id">
                                                                            <?php foreach($produits as $produit) { 
                                                                                    if($produit['categorie'] == 'Carburant') { ?>
                                                                                <option value="<?php echo $produit['id'] ?>"> <?php echo $produit['nom'] ?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                    </fieldset>
                                                                    <label>Quantité</label>
                                                                    <div class="form-group">
                                                                        <input type="number" value="0" name="c_quantites" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class="modal-footer ">
                                                                        <button type="button" class="btn btn-light-secondary" id="ajouter_credit"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Ajouter</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            <!-- </form> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="paiement" role="tabpanel" aria-labelledby="paiement-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>CLIENT</th>
                                                            <th>REFERENCE</th>
                                                            <th>TYPE</th>
                                                            <th>MONTANT</th>
                                                            <th>COMMISSION</th>
                                                            <th>MONTANT NET</th>
                                                            <!-- <th>QUANTITÉ</th> -->
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-12">             
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalLong6">
                                                    Ajouter Paiement
                                                </button>
                                            </div>
                                            <br>
                                            <br>
                                            <!--login form Modal -->
                                            <div class="modal fade" id="exampleModalLong6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle6" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle6">Nouveau paiement</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x">x</i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- <form> -->
                                                                <div class="modal-body">
                                                                    <label>Client</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" id="select_client" name="client_id">
                                                                            <?php foreach($clients as $client){ ?>
                                                                                <option value="<?php echo $client['id'] ?>"> <?php echo $client['nom'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </fieldset>
                                                                    <label>Type</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" id="select_paiement" name="type_paiement">
                                                                            <?php foreach($moyens as $moyen){ ?>
                                                                                <option value="<?php echo $moyen['id'] ?>"> <?php echo $moyen['nom'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </fieldset>
                                                                    <label>Reference</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="reference" class="form-control">
                                                                    </div>
                                                                    <label>Montant</label>
                                                                    <div class="form-group">
                                                                        <input type="number" name="montant" class="form-control" value="0" required>
                                                                    </div>
                                                                    <label>Commission</label>
                                                                    <div class="form-group">
                                                                        <input type="number" name="commission" class="form-control" value="0" required>
                                                                    </div>
                                                                    <!-- <label>Quantité</label>
                                                                    <div class="form-group">
                                                                        <input type="number" name="quantite" class="form-control">
                                                                    </div> -->
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class="modal-footer ">
                                                                        <button type="button" class="btn btn-light-secondary" id="ajouter_paiement"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Ajouter</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            <!-- </form> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="ventes_services" role="tabpanel" aria-labelledby="ventes_services-tab">
                                        <div class="table-responsive">
                                                <table class="table table-striped" id="myTable3">
                                                    <thead>
                                                        <tr>
                                                            <th>Produit</th>
                                                            <th>Type de paiement</th>
                                                            <th>Quantité</th>
                                                            <th>Total</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-12">             
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalLong1">
                                                    Ajouter Vente Service
                                                </button>
                                            </div>
                                            <br>
                                            <br>
                                            <!--login form Modal -->
                                            <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle1">Nouveau Vente et Service</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x">x</i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- <form> -->
                                                                <div class="modal-body">
                                                                    <label>Produit</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" id="select_produit_v_s" name="v_s_produit_id">
                                                                            <?php foreach($produits as $produit) { 
                                                                                    if($produit['categorie'] != 'Carburant') { ?>
                                                                                <option value="<?php echo $produit['id'] ?>"> <?php echo $produit['nom'] ?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                    </fieldset>
                                                                    <label>Type</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" id="select_paiement_v_s" name="type_paiement_v_s">
                                                                            <?php foreach($moyens as $moyen){ ?>
                                                                                <option value="<?php echo $moyen['id'] ?>"> <?php echo $moyen['nom'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </fieldset>
                                                                    <label>Quantité</label>
                                                                    <div class="form-group">
                                                                        <input type="number" name="v_s_qte" class="form-control" value="0" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class="modal-footer ">
                                                                        <button type="button" class="btn btn-light-secondary" id="ajouter_vente_service"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Ajouter</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            <!-- </form> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<style>
    #table1 input, #myTable input, #myTable0 input, #myTable3 input {
         width:100px;
         text-align:center;
         border:none;}
</style>
<script>    
$(document).ready(function() {
    $('form input').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
    var dates = [];
    Object.values(<?php print_r(json_encode($recette_date)); ?>).map((type) => {
       dates.push(Object.values(type)[0])
    })
    $('#day').datepicker({
        dateFormat: 'dd-mm-yy',
        maxDate: 0,
        beforeShowDay: function(date){
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [ dates.indexOf(string) == -1 ]
        }
    });    

    
});

    function volucompteur(id) {
        $compteur_initial = $("#compteur_initial"+id).val();
        $compteur_final = $("#compteur_final"+id).val();
        $("#sortie"+id).val($compteur_final - $compteur_initial);
        $("#ca"+id).val(($compteur_final - $compteur_initial) * $("#prix"+id).val());
    }
    function stock(id){ 
        $stock_initial = parseFloat($("#stock_initial"+id).val());
        $entree = parseFloat($("#entree"+id).val());
        $sortie = parseFloat($("#sortie_r"+id).val());
        $physique = parseFloat($("#physique"+id).val());
        $("#comptable"+id).val($stock_initial - $sortie + $entree);
        $("#m_e"+id).val($physique - $("#comptable"+id).val());
    }


    $('#ajouter_paiement').click(function(){ 
        var row_id = $("#myTable tr").length;
        var tbody = $('#myTable').children('tbody');
        var table = tbody.length ? tbody : $('#myTable');

        $montant_net = parseFloat($("input[name=montant]").val()) - parseFloat($("input[name=commission]").val());
        table.append(   `<tr id=`+row_id+`>
                            <td><input type="text" value=`+$("#select_client option:selected").html()+` disabled="disabled"></td>
                            <input type="hidden" name="p_client_id[]" value=`+$("#select_client option:selected").val()+`>
                            <td><input type="text" name="p_reference[]" value=`+$("input[name=reference]").val()+`></td>
                            <td><input type="text" value=`+$("#select_paiement option:selected").html()+` disabled="disabled"></td>
                            <input type="hidden" name="p_type_paiement[]" value=`+$("#select_paiement option:selected").val()+`>
                            <td><input type="text" name="p_montant[]" id=montant`+row_id+` onchange=paiement(`+row_id+`) value=`+$("input[name=montant]").val()+`></td>
                            <td><input type="text" name="p_commission[]" id=commission`+row_id+` onfocus="commission(`+row_id+`)" onchange=paiement(`+row_id+`) value=`+$("input[name=commission]").val()+`></td>
                            <td><input type="text" id=montant_net`+row_id+` value=`+$montant_net+` disabled="disabled"></td>
                            <td><i onclick="supp_paiement(`+row_id+`)" class="fas fa-trash"></i></td>
                        </tr>`
                    );                
        // var table = $("#myTable tbody");
        // var IDs = [];
        // $('#myTable').find("input").each(function () { 
        // IDs.push([this.id, $(this).val(), 3]); 
        // }); 
        // console.log(IDs); 
        //     $.each(IDs, function(key, value) { 
        //           CallFunction(value[0],value[1],value[2]);
        //    });
                
        //     function CallFunction(id,val1,val2) {
        //        console.log(id+","+val1+","+val2);
        // }
        
    });



    $('#ajouter_credit').click(function(){ 
        var row_id = $("#myTable0 tr").length;
        var tbody = $('#myTable0').children('tbody');
        var table = tbody.length ? tbody : $('#myTable0');


        let $prix_c = 0;
        let $client_solde = 0;
        let $client_plafond = 0;

        Object.values(<?php print_r(json_encode($clients)); ?>).map((c) => {
        if(c['id'] == $("#c_select_clients option:selected").val()) {
                $client_solde = c['solde'];
                $client_plafond = c['plafond'];
            }
        })
        Object.values(<?php print_r(json_encode($produits)); ?>).map((p) => {
        if(p['id'] == $("#select_produit_credit option:selected").val()) {
                $prix_c = p['prix'];
                return $prix_c;
            }
       
        })
        $montant = ($prix_c * parseFloat($("input[name=c_quantites]").val()));
        $client_solde = parseFloat($client_solde) + $montant;
        $reliquat = $client_plafond - $client_solde;


        var $current_solde = parseFloat($client_solde)
        var $inputs = $(".montant"+$("#c_select_clients option:selected").val());


        for(var i = 0; i < $inputs.length; i++){
            $current_solde += parseFloat($inputs[i].value)
        }
        // $montant_net = parseFloat($("input[name=montant]").val()) - parseFloat($("input[name=commission]").val());
        table.append(   `<tr id=`+row_id+`>
                            <td><input type="text" nom="client" value=`+$("#c_select_clients option:selected").html()+` disabled="disabled"></td>
                            <input type="hidden" name="c_client_id1[]" value=`+$("#c_select_clients option:selected").val()+`>
                            <td><input class=solde_credit`+$("#c_select_clients option:selected").val()+` type="number" id=solde_credit`+row_id+` name="c_solde1[]" value=`+$current_solde+` readonly></td>
                            <td><input type="number" id=reliquat_c`+row_id+` name="c_reliquat1[]" value=`+$reliquat+` readonly></td>
                            <td><input type="number" value=`+$client_plafond+` id=plafond_c_id`+row_id+` name="c_plafond1[]"></td>
                            <td><input type="text" value=`+$("#select_produit_credit option:selected").html()+` disabled="disabled"></td>
                            <input type="hidden" name="select_produit_credit1[]" value=`+$("#select_produit_credit option:selected").val()+`>
                            <input type="hidden" id=c_prix_id1`+row_id+` value=`+$prix_c+`>
                            <td><input type="number" name="c_reference1[]" value=`+$("input[name=c_reference]").val()+`></td>
                            <td><input type="number" name="c_quantite1[]" id=c_quantite`+row_id+` onchange=credit_calcul(`+row_id+`) value=`+$("input[name=c_quantites]").val()+`></td>
                            <td><input class=montant`+$("#c_select_clients option:selected").val()+` name="c_montant1" type="number" id=c_montant`+row_id+` value=`+$montant+` readonly></td>
                            <td><i onclick="supp_credit(`+row_id+`)" class="fas fa-trash"></i></td>
                        </tr>`
                    )
       
    });
    

    function credit_calcul(id){
        $qte = parseFloat($("#c_quantite"+id).val());
        $prix = parseFloat($("#c_prix_id"+id).val());
        $plafond = parseFloat($("#plafond_c_id"+id).val());

        Object.values(<?php print_r(json_encode($clients)); ?>).map((c) => {
        if(c['id'] == $("#c_select_clients option:selected").val()) {
                $client_solde = c['solde'];
            }
        })
        $("#c_montant"+id).val($qte * $prix);
        
        var $current_solde = parseFloat($client_solde)
        var $inputs = $(".montant"+$("#c_select_clients option:selected").val());
        for(var i = 0; i < $inputs.length; i++){
            $current_solde += parseFloat($inputs[i].value)
        }
        $(".solde_credit"+$("#c_select_clients option:selected").val()).val($current_solde);
        $("#reliquat_c"+id).val($plafond - $current_solde);
    }
    function commission(id){ 
        $b = 0;
        $('input').on('focusin', function(){
            console.log("Saving value " + $(this).val());
            $b = $(this).data('val', $(this).val());
        });
        return $b;
    }
    function paiement(id){
        rr = commission(id);
        console.log(rr);
        if($("#montant"+id).val() >= $("#commission"+id).val()){
            $("#montant_net"+id).val($("#montant"+id).val() - $("#commission"+id).val());
        }else{ 
            alert("La commission doit être inférieure")
            $("#commission"+id).val(0);
            $("#montant_net"+id).val($("#montant"+id).val() - $("#commission"+id).val());
        }
    }
    function supp_paiement(id){ 
        $("#myTable tr#"+id).remove();
    }
    $('#ajouter_vente_service').click(function(){ 
        var row_id = $("#myTable3 tr").length;
        var tbody = $('#myTable3').children('tbody');
        var table = tbody.length ? tbody : $('#myTable3');
        var $prix_s_v = 0
        Object.values(<?php print_r(json_encode($produits)); ?>).map((p) => {
        if(p['id'] == $("#select_produit_v_s option:selected").val()) {
                $prix_s_v = p['prix'];
                return $prix_s_v;
            }
        })
        console.log($("#select_produit_v_s option:selected").html());
        table.append(   `<tr id=`+row_id+`>
                            <td><input type="text" value="`+$("#select_produit_v_s option:selected").html()+`" disabled="disabled"></td>
                            <input type="hidden" name="select_produit_v_s1[]" value=`+$("#select_produit_v_s option:selected").val()+`>
                            <input type="hidden" id=prix_s_v`+row_id+` value=`+$prix_s_v+`>
                            <td><input type="text" value=`+$("#select_paiement_v_s option:selected").html()+` disabled="disabled"></td>
                            <input type="hidden" name="type_paiement_v_s1[]" value=`+$("#select_paiement_v_s option:selected").val()+`>

                            <td><input type="number" name="qte_v_s1[]" id=v_s_qte_id`+row_id+` onchange=v_s_calcul(`+row_id+`) value=`+$("input[name=v_s_qte]").val()+`></td>
                            <td><input type="number" name="total_v_s[]" id=total_v_s`+row_id+` value=`+($prix_s_v * parseFloat($("input[name=v_s_qte]").val()))+` readonly></td>
                            <td><i onclick="supp_paiement(`+row_id+`)" class="fas fa-trash"></i></td>
                        </tr>`
                    ); 
    });
    function v_s_calcul(id){
        $prix = parseFloat($("#prix_s_v"+id).val());
        $qte = parseFloat($("#v_s_qte_id"+id).val()); 
        $("#total_v_s"+id).val($prix*$qte);
    }

</script>
<?= $this->endSection() ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);


    
</script>
<?= $this->endSection() ?>

