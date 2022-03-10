<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="page-heading">
    <?php if($is_prix == 1){ ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <?php if(isset($latest_recette)) { ?>
                    <h4 style="text-align: center" class="card-title">Nouvelle Recette <?php echo date('Y-m-d', strtotime($latest_recette->recette_date . ' +1 day')); ?></h4>
                <?php }else{ ?>
                    <h4 style="text-align: center" class="card-title">Nouvelle Recette !</h4>

                    <?php } ?>
            </div>
            <div class="card-body">
                <form method="post" action=<?php echo site_url('Ajouter_Recette') ?>  enctype="multipart/form-data">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-sm-4">
                            <h8>Date de recette</h8>
                            <div class="form-group position-relative has-icon-left">
                                <?php if(isset($latest_recette)) { ?>
                                    <input type="date" min="<?php echo date('Y-m-d', strtotime($latest_recette->recette_date . ' +1 day')); ?>" max="<?php echo date('Y-m-d', strtotime($latest_recette->recette_date . ' +1 day')); ?>" name="recette_date" class="form-control" autocomplete="off" required>
                                <?php }else { ?>
                                    <input type="date" max="<?php echo date('Y-m-d'); ?>" name="recette_date" class="form-control" autocomplete="off" required>

                                    <?php } ?>
                                <div class="form-control-icon">
                                    <i class="bi bi-calendar"></i>
                                </div>
                            </div>

                                <?php if(!isset($latest_recette)) { ?>
                                    <h8>Cumul du Mois <i></i> des ventes CA</h8>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" min="0" name="cumul_station" class="form-control" autocomplete="off" required>
                                    </div>
                                <?php } ?>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success me-1 mb-1">Ajouter</button>
                            </div>
                        </div>
                    
                        <div class="col-5">
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span> Total Volucompteur</span>
                                        <span id="total_volucompteur_header" class="badge bg-success badge-pill badge-round ml-1">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span> Total Crédit Client </span>
                                        <span id="total_credit_header" class="badge bg-success badge-pill badge-round ml-1">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span> Total Paiement Client </span>
                                        <span id="total_paiement_header" class="badge bg-success badge-pill badge-round ml-1">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span> Total Ventes et Services </span>
                                        <span id="total_ventes_services_header" class="badge bg-success badge-pill badge-round ml-1">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span> Total Dépense </span>
                                        <span id="total_depense_header" class="badge bg-success badge-pill badge-round ml-1">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span> Total Réglement </span>
                                        <span id="total_reglement_header" class="badge bg-success badge-pill badge-round ml-1">0</span>
                                    </li>
                                    <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span> Equilibre </span>
                                        <span id="control_ca" class="badge bg-danger badge-pill badge-round ml-1">0</span>
                                    </li> -->
                                </ul>
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
                                                aria-controls="paiement" aria-selected="false">Paiement Client</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="ventes_services-tab" data-bs-toggle="tab" href="#ventes_services" role="tab"
                                                aria-controls="ventes_services" aria-selected="false">Ventes et services</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="depense-tab" data-bs-toggle="tab" href="#depense" role="tab"
                                                aria-controls="depense" aria-selected="false">Dépense</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="reg_credit_client-tab" data-bs-toggle="tab" href="#reg_credit_client" role="tab"
                                                aria-controls="reg_credit_client" aria-selected="false">Règlement Crédit Client</a>
                                        </li>
                                    </ul>
                                    <br>
                                    <br>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="volucompteur" role="tabpanel" aria-labelledby="volucompteur-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table10">
                                                    <thead>
                                                        <tr>
                                                            <th>Pompe</th>
                                                            <th>Produit</th>
                                                            <th>Prix</th>
                                                            <th>Compteur Initial</th>
                                                            <th>Compteur Final</th>
                                                            <th>Sortie</th>
                                                            <th>CA</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($volucompteurs){
                                                            $index = 0;
                                                            foreach($volucompteurs as $volucompteur){   
                                                        ?>
                                                        <tr id="<?php echo $index.'#'.preg_replace('/\s+/', '', $volucompteur->pr_nom) ?>" class="row_<?php echo preg_replace('/\s+/', '', $volucompteur->pr_nom) ?>">
                                                            <td class="text-bold-500"><?php echo $volucompteur->p_nom; ?></td>
                                                            <td><?php echo $volucompteur->pr_nom; ?></td>
                                                            <td class="text-bold-500"><input type="number" id="prix<?php echo $volucompteur->pompe_ids; ?>" name="volu_prix[]" value="<?php echo $volucompteur->pr_prix; ?>" readonly/>
                                                            <input type="hidden" name="pr_ids[]" value="<?php echo $volucompteur->pr_ids; ?>" readonly/>
                                                            <input type="hidden" name="pompe_ids[]" value="<?php echo $volucompteur->pompe_ids; ?>" readonly/>
                                                            <td><input type="text" id="compteur_initial<?php echo $volucompteur->pompe_ids; ?>" name="compteur_initial[]" value="<?php echo round($volucompteur->max_volucompteur_final,2); ?>" <?php if(isset($latest_recette)){ ?> readonly <?php } ?>/></td>
                                                            <td><input type="text" id="compteur_final<?php echo $volucompteur->pompe_ids; ?>" onchange="volucompteur(<?php echo $volucompteur->pompe_ids; ?>)" name="compteur_final[]" value="<?php echo round($volucompteur->max_volucompteur_final,2); ?>" min="<?php echo $volucompteur->compteur_final; ?>" step="any"></td>
                                                            <td><input class="c_stock-<?php echo $volucompteur->reservoir_id ?>-<?php echo str_replace(' ', '',$volucompteur->pr_nom); ?>" type="number" id="sortie<?php echo $volucompteur->pompe_ids; ?>" name="sortie[]" value="0" onchange="stock_sortie(<?php echo $volucompteur->reservoir_id; ?>,'<?php echo $volucompteur->pr_nom; ?>')" disabled/></td>
                                                            <td><input type="number" id="ca<?php echo $volucompteur->pompe_ids; ?>" name="ca[]" value="0" disabled="disabled" /></td>
                                                            <td><i class="fas fa-plus" class="btn btn-outline-success" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalLong<?php echo $volucompteur->pompe_ids; ?>"></i></td>
                                                            <td><input type="hidden" value="<?php echo $volucompteur->reservoir_id ?>"></td>
                                                        
                                                            <!--login form Modal -->
                                                            <div class="modal fade" id="exampleModalLong<?php echo $volucompteur->pompe_ids; ?>" tabindex="-1"  aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="modal-body">
                                                                                <label>Nouveau Prix <?php echo $volucompteur->pr_nom ?></label>
                                                                                <div class="form-group">
                                                                                    <input id="new_price<?php echo $volucompteur->pompe_ids; ?>" min="1" type="text" name="new_price" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 d-flex justify-content-center">
                                                                                <div class="modal-footer ">
                                                                                    <button type="button" class="btn btn-primary ml-1" onclick="add_price('<?php echo preg_replace('/\s+/', '', $volucompteur->pr_nom); ?>','<?php echo $volucompteur->pompe_ids; ?>')"
                                                                                        data-bs-dismiss="modal">
                                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                                        <span class="d-none d-sm-block">Ajouter</span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>
                                                        <?php  
                                                            $index ++;

                                                            } 
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <script>
                                                $b = 0;
                                                var class_click = [];
                                                var $n_class = 1
                                                
                                                


                                                function add_price(i,pompe){
                                                    var class_array = [];
                                                    var $new_price = $("#new_price"+pompe).val()
                                                    // alert($new_price)
                                                    
                                                    $j = 0;
                                                    $c=0;
                                                    $y = 0;
                                                    $new_id = 0;

                                                    $r = 0;

                                                    var array = [];
                                                    $( "tr[class^='row_']" ).each(function(){
                                                        if(jQuery.inArray(this.className, class_array) == -1){
                                                            class_array.push(this.className)
                                                            array.push({
                                                                class: this.className,
                                                                number: 1
                                                            });
                                                                                                                        
                                                        }else{
                                                            array[class_array.indexOf(this.className)]["number"] += 1
                                                        }
                                                    });

                                                    if(class_click.some(class_clicks => class_clicks.class === i)){
                                                        let obj1 = class_click.find(o => o.class === i);
                                                        obj1.clicks ++
                                                    }else{
                                                        class_click.push({
                                                            class: i,
                                                            clicks: 1
                                                        });
                                                    }
                                                    
                                                    
                                                    
                                                    // console.log(class_array['row_'+i])
                                                   


                                                    $('.row_'+i).each(function(){
                                                        var $f = $(this).find('td').eq(4).find('input').attr('id')
                                                        // console.log($f)
                                                        $( "#"+$f ).prop( "readonly", true );
                                                    });

                                                    for (var v = class_array.indexOf('row_'+i); v < class_array.length; v++){
                                                        $('.'+class_array[v]).each(function(index , value){
                                                            if( index == 0 && (value.id).split('#')[1] == i){
                                                            }else{
                                                                
                                                                if(array[class_array.indexOf(class_array[v])]["number"] > 1 &&  class_array[v].split('_')[1] == i){
                                                                    $new_id = (parseInt((this.id).split('#')[0]) + 1 + $y)
                                                                    this.id = $new_id  + "#" +  this.id.split('#')[1]
                                                                    $y++
                                                                    // console.log(class_array[v])
                                                                    // console.log($("."+class_array[v]).find('td').eq(4).find('input').attr('id'))
                                                                    // console.log(document.getElementsByClassName(class_array[v]).closest('tr'))
                                                                }else if(array[class_array.indexOf(class_array[v])]["number"] == 1 ||  class_array[v].split('_')[1] != i){
                                                                    $new_id = (parseInt((this.id).split('#')[0]) + $y + 1)
                                                                    
                                                                    this.id = $new_id  + "#" +  this.id.split('#')[1]
                                                                }   
                                                            }
                                                        });
                                                    }
                                                    var obj = class_click.find(o => o.class === i);

                                                    // console.log($('#table10 tr').eq(6).find('td').eq(0).text())

                                                    // console.log(obj.clicks);
                                                    $('.row_'+i).each(function(){
                                                       

                                                        var uu;
                                                        var volucompteur;
                                                        var reservoir;
                                                        var $row_id;
                                                        $r = parseInt((this.id).split('#')[0])
                                                        $row_id = parseInt($r +obj.clicks)
                                                        // console.log($r)
                                                        // console.log(this.id)


                                                        $ff =  $('.row_' + i).eq($r).attr('id')


                                                        
                                                        $('.sub_'+$r+ "_" +$n_class).each(function(){
                                                            $n_class ++
                                                            
                                                        });
                                                        console.log()
                                                        console.log($n_class)

                                                        
                                                        $uu = $('#table10 tr').eq($row_id).find('td').eq(4).find('input').val()


                                                        // $volucompteur = $('#table10 tr').eq(parseInt($row_id)).find('td').eq(1).text()
                                                        // $reservoir = $('#table10 tr').eq(parseInt($row_id)).find('td').eq(8).find('input').val()
                                                        // console.log($('#table10 tr').eq(parseInt($r)).find('td').eq(8).find('input').val())
                                                        $reservoir =  $('#table10 tr').eq(parseInt($r+1)).find('td').eq(8).find('input').val()
                                                        $volucompteur = $('#table10 tr').eq(parseInt($r+1)).find('td').eq(1).text()
                                                        $pompe_id = $('#table10 tr').eq(parseInt($r+1)).find('td').eq(2).find('input').eq(2).val()
                                                        
                                                        
                                                        var html =`<tr class ="sub_` + $r+ "_" +$n_class+`"><td></td>
                                                        <td></td>
                                                        <td><input name="sub_volu_prix_`+$n_class+`[]" id="1prix`+$row_id+`" type="text" value="`+$new_price+`" class="prix_`+$volucompteur.replace(/\s/g,'')+`_`+obj.clicks+`" onchange="inter_vol(`+$row_id+`);trial(this)" readonly></td>
                                                        <td><input name="sub_compteur_initial[]" id="1compteur_initial`+$row_id+`" type="text" value="`+$uu+`" onchange="inter_vol(`+$row_id+`)"></td>
                                                        <td><input name="sub_compteur_final_`+$n_class+`[]" id="1compteur_final`+$row_id+`" type="text" value="`+$uu+`" onchange="inter_vol(`+$row_id+`)"></td> 
                                                        <td><input class="c_stockB-`+$reservoir+`-`+$volucompteur.replace(/\s/g,'')+`" id="1sortie`+$row_id+`" type="text" onchange="stock_sortie(`+$reservoir+`,'`+$volucompteur.replace(/\s/g,'')+`')" value="0" readonly></td>
                                                        <td><input id="1ca`+$row_id+`" type="text" value="0" readonly></td>
                                                        <td><input name="sub_pompe_id[]" type="hidden" value="`+$pompe_id+`" readonly></td>
                                                        
                                                        
                                                        <td></td></tr>
                                                        `;
                                                        $('#table10 > tbody > tr').eq($r + obj.clicks).before(html);
0
                                                        
                                                        
                                                    });

                                                    if(class_array[class_array.length - 1] == 'row_' + i){
                                                        var uu;
                                                        var volucompteur;
                                                        var reservoir;
                                                        var $row_id;
                                                        var lastid = $('.row_' + i).last().attr('id');
                                                        console.log(lastid)

                                                        $r = parseInt(lastid.split('#')[0])
                                                        $row_id = parseInt($r + obj.clicks)
                                                        // console.log($r  + 1)

                                                        $reservoir =  $('#table10 tr').eq(parseInt($r+1)).find('td').eq(8).find('input').val()
                                                        $volucompteur = $('#table10 tr').eq(parseInt($r+1)).find('td').eq(1).text()
                                                        $pompe_id = $('#table10 tr').eq(parseInt($r+1)).find('td').eq(2).find('input').eq(2).val()



                                                        
                                                        $uu = $('#table10 tr').eq($row_id).find('td').eq(4).find('input').val()

                                                       

                                                        // $volucompteur = $('#table10 tr').eq(parseInt($row_id)).find('td').eq(1).text()
                                                        // $reservoir = $('#table10 tr').eq(parseInt($row_id)).find('td').eq(8).find('input:hidden').val()
                                                        // $pompe_id = $('#table10 tr').eq($row_id).find('td').eq(2).find('input').eq(2).val()
                                                        // var $vv = $("#1compteur_initial"+parseFloat(id)).closest('tr').next('tr').find('td').eq(3).find('input').attr('id')


                                                        

                                                        
                                                        var html =`<tr><td></td>
                                                        <td></td>
                                                        <td><input id="1prix`+$row_id+`" type="text" value="0" onchange="inter_vol(`+$row_id+`)"></td>
                                                        <td><input name="sub_compteur_initial[]" id="1compteur_initial`+$row_id+`" type="text" value="`+$uu+`" onchange="inter_vol(`+$row_id+`)"></td>
                                                        <td><input name="sub_compteur_final[]" id="1compteur_final`+$row_id+`" type="text" value="`+$uu+`" onchange="inter_vol(`+$row_id+`)"></td> 
                                                        <td><input class="c_stockB-`+$reservoir+`-`+$volucompteur.replace(/\s/g,'')+`" id="1sortie`+$row_id+`" type="text" onchange="stock_sortie(`+$reservoir+`,'`+$volucompteur.replace(/\s/g,'')+`')" value="0" readonly></td>
                                                        <td><input id="1ca`+$row_id+`" type="text" value="0" readonly></td>
                                                        <td><input name="sub_pompe_id[]" type="hidden" value="`+$pompe_id+`" readonly></td>
 
                                                        
                                                        
                                                        <td></td></tr>
                                                        `;
                                                        $("#table10").append(html);
                                                    }

                                                }

                                                

                                                
                                                // function trial(pp,product,clicks){
                                                //     console.log(pp)
                                                //     // $('.prix_'+product+'_'+clicks)each(function(){

                                                //     // })
                                                // }



                                                function inter_vol(id) {
                                                    var $ca_volucompteur1 = 0
                                                    var result1 = 0
                                                    var ca1 = 0
                                                    console.log("ppp")
                                                    // var class_array = [];

                                                    // $( "tr[class^='row_']" ).each(function(){
                                                    //     if(jQuery.inArray(this.className, class_array) == -1){
                                                    //         class_array.push(this.className)
                                                                                                                    
                                                    //     }
                                                    // });
                                                    // console.log(class_array)
                                                    // console.log(id)
                                                    // var obj = class_click.find(o => o.class === id);

                                                    // alert(obj)

                                                    // $('.prix_'+id)each(function(){

                                                    // })

                                                    if(parseFloat($("#1compteur_final"+id).val()) >= parseFloat($("#1compteur_initial"+id).val())){
                                                        $compteur_initial1 = $("#1compteur_initial"+id).val();
                                                        $compteur_final1 = $("#1compteur_final"+id).val();

                                                        $result1 = ($compteur_final1 - $compteur_initial1).toFixed(2)
 
                                                        $("#1sortie"+id).val($result1).change()

                                                        ca1 = $result1 * $("#1prix"+id).val()
                                                        $("#1ca"+id).val( ca1.toFixed(2));

                                                        $( "input[id^='1ca']" ).each(function(){
                                                            if(!isNaN(parseFloat($(this).val()))) {
                                                                $ca_volucompteur1 += parseFloat($(this).val());
                                                            }
                                                            
                                                        })
                                                        $( "input[id^='ca']" ).each(function(){
                                                            $ca_volucompteur1 += parseFloat($(this).val());
                                                            
                                                        })

                                                        $ca_volucompteur1 = $ca_volucompteur1.toFixed(2)

                                                        $("#somme_ca").val($ca_volucompteur1)

                                                        $("#total_volucompteur_header").html($ca_volucompteur1)

                                                        var control_ca1 = 0

                                                        control_ca1  = parseFloat($("#total_volucompteur_header").html()) - parseFloat($("#total_credit_header").html()) - parseFloat($("#total_paiement_header").html())
                                                        $("#control_ca").html(control_ca1)
                                                        // var vv = document.getElementById("compteur_initial"+parseFloat(id))
                                                        // console.log(vv.closest('tr').eq(2))
                                                        // console.log("#1compteur_initial"+parseFloat(id))
                                                        var $vv = $("#1compteur_initial"+parseFloat(id)).closest('tr').next('tr').find('td').eq(3).find('input').attr('id')
                                                        // console.log($vv)
                                                        // var nextId = $('#'+first_tr_id ).next("tr").attr("id");

                                                        // console.log($("#1compteur_initial"+parseFloat(id)).closest('tr').find('td').eq(3).find('input').val())
                                                        // console.log($("#1compteur_initial"+parseFloat(id)).closest('tr'))
                                                        if(typeof $vv != 'undefined'){
                                                            if($vv.startsWith("1compteur")) {
                                                                $("#"+$vv).val($("#1compteur_final"+id).val()).change()
                                                            }
                                                        }

                                                    }else if(parseFloat($("#1compteur_final"+id).val()) < parseFloat($("#1compteur_initial"+id).val())){

                                                        alert("Compteur Final doit etre superieur");
                                                        $("#1compteur_final"+id).val($("#1compteur_initial"+id).val()).change();
                                                    }  
                                                }

                                            </script>
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="form-group">
                                                    <input type="text" id="somme_ca" value="Somme :      " class="form-control" disabled>
                                                </div>
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
                                                            <td class="text-bold-500"><input type="number" value="<?php echo number_format($reservoir->s_stock_comptable,2, ".", ""); ?>" id="stock_initial<?php echo $reservoir->id; ?>" name="stock_initial[]" readonly/>
                                                            <input type="hidden" value="<?php echo $reservoir->produits_ids; ?>" name="produits_ids[]" readonly/>
                                                            <input type="hidden" value="<?php echo $reservoir->prix_achat; ?>" name="prix_achat[]" readonly/>
                                                            <td><input type="number" value = "0" id="entree<?php echo $reservoir->id; ?>" onchange="stock(<?php echo $reservoir->id; ?>,'Entree')" name="entree[]"></td>
                                                            <td><input type="number" value = "0" id="sortie_r<?php echo $reservoir->id; ?>" onchange="stock(<?php echo $reservoir->id; ?>,'Sortie')" name="sortie_stock[]" readonly></td>
                                                            <td class="text-bold-500"><input type="number" value="<?php echo round($reservoir->s_stock_comptable,2); ?>" id="comptable<?php echo $reservoir->id; ?>" name="comptable[]" disabled="disabled" />
                                                            <td><input type="text" id="physique<?php echo $reservoir->id; ?>" value="0" onchange="stock(<?php echo $reservoir->id; ?>,'Physique')" name="physique[]" required></td>
                                                            <td><input type="number" id="m_e<?php echo $reservoir->id; ?>" value="0" name="m_e[]" readonly/></td>
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
                                                            <!-- <th>Solde en Cours</th>
                                                            <th>Reliquat</th>
                                                            <th>Plafond</th> -->
                                                            <!-- <th>Produit</th> -->
                                                            <th>Reference</th>
                                                            <!-- <th>Qte</th> -->
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
                                            <!-- <div class="row"> -->
                                                <div class="col-3">             
                                                    <button type="button" class="btn btn-outline-success" style="width:70%" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalLong00">
                                                        Ajouter Crédit
                                                    </button>
                                                </div>
                                                <div class="col-3">     
                                                    <input type="file" name="credit_documents[]" id="upload" hidden multiple/>
                                                    <label class="label" for="upload"  style="width:70%"><i class="fas fa-file-upload"></i>  Importer fichers</label>               
                                                </div>
                                                    <!-- </div> -->
                                            <br>
                                            <br>
                                            <!--login form Modal -->
                                            <div class="modal fade" id="exampleModalLong00" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                                    <label>Montant</label>
                                                                    <div class="form-group">
                                                                        <input type="number" name="c_montant" class="form-control">
                                                                    </div>
                                                                    <!-- <label>Produit</label> -->
                                                                    <!-- <fieldset class="form-group">
                                                                        <select class="form-select" id="select_produit_credit" name="c_produit_id">
                                                                            <?php //foreach($produits as $produit) { 
                                                                                   // if($produit['categorie'] == 'Carburant') { ?>
                                                                                <option value="<?php //echo $produit['id'] ?>"> <?php //echo $produit['nom'] ?></option>
                                                                            <?php //} } ?>
                                                                        </select>
                                                                    </fieldset> -->
                                                                    <!-- <label>Quantité</label>
                                                                    <div class="form-group">
                                                                        <input type="number" value="0" name="c_quantites" class="form-control">
                                                                    </div> -->
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class="modal-footer ">
                                                                        <button type="button" class="btn btn-primary ml-1" id="ajouter_credit"
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
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="form-group">
                                                    <input type="text" id="somme_credit" value="Somme :      " class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="paiement" role="tabpanel" aria-labelledby="paiement-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th>CLIENT</th> -->
                                                            <!-- <th>REFERENCE</th> -->
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
                                            <div class="col-3">             
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalLong01" style="width:70%">
                                                    Ajouter Paiement
                                                </button>
                                            </div>
                                            <div class="col-3">     
                                                <input type="file" name="paiement_documents[]" id="upload" hidden multiple/>
                                                <label class="label" for="upload"  style="width:70%"><i class="fas fa-file-upload"></i>  Importer fichers</label>               
                                            </div>
                                            
                                            <br>
                                            <br>
                                            <!--login form Modal -->
                                            <div class="modal fade" id="exampleModalLong01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle6" aria-hidden="true">
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
                                                                    <!-- <label>Client</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" id="select_client" name="client_id">
                                                                            <?php //foreach($clients as $client){ ?>
                                                                                <option value="<?php //echo $client['id'] ?>"> <?php //echo $client['nom'] ?></option>
                                                                            <?php //} ?>
                                                                        </select>
                                                                    </fieldset> -->
                                                                    <label>Type</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" id="select_paiement" name="type_paiement">
                                                                            <?php foreach($moyens as $moyen){ ?>
                                                                                <option value="<?php echo $moyen['id'] ?>"> <?php echo $moyen['nom'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </fieldset>
                                                                    <!-- <label>Reference</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="reference" class="form-control">
                                                                    </div> -->
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
                                                                        <button type="button" class="btn btn-primary ml-1" id="ajouter_paiement"
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
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="form-group">
                                                    <input type="text" id="somme_paiement" value="Somme :      " class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="ventes_services" role="tabpanel" aria-labelledby="ventes_services-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="myTable3">
                                                    <thead>
                                                        <tr>
                                                            <th>Produit</th>
                                                            <th>Montant</th>
                                                            <th>Quantité</th>
                                                            <th>Immatricule</th>
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
                                            <div class="col-3">             
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalLong02" style="width:70%">
                                                    Ajouter Vente Service
                                                </button>
                                            </div>
                                            <div class="col-3">     
                                                <input type="file" name="v_s_documents[]" id="upload" hidden multiple/>
                                                <label class="label" for="upload"  style="width:70%"><i class="fas fa-file-upload"></i>  Importer fichers</label>               
                                            </div>
                                            <br>
                                            <br>
                                            <!--login form Modal -->
                                            <div class="modal fade" id="exampleModalLong02" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
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
                                                                                    if($produit['categorie'] != 'Carburant' && $produit['categorie'] != 'Depense') { ?>
                                                                                <option value="<?php echo $produit['id'] ?>"> <?php echo $produit['nom'] ?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                    </fieldset>
                                                                    <!-- <label>Type</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" id="select_paiement_v_s" name="type_paiement_v_s">
                                                                            <?php //foreach($moyens as $moyen){ ?>
                                                                                <option value="<?php //echo $moyen['id'] ?>"> <?php //echo $moyen['nom'] ?></option>
                                                                            <?php //} ?>
                                                                        </select>
                                                                    </fieldset> -->
                                                                    <label>Montant</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="v_s_montant" class="form-control" value="0" required>
                                                                    </div>
                                                                    <label>Immatricule</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="v_s_immatricule" class="form-control" value="0" required>
                                                                    </div>
                                                                    <label>Quantité</label>
                                                                    <div class="form-group">
                                                                        <input type="number" name="v_s_qte" class="form-control" value="0" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class="modal-footer ">
                                                                        <button type="button" class="btn btn-primary ml-1" id="ajouter_vente_service"
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
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="form-group">
                                                    <input type="text" id="somme_ventes_services" value="Somme :      " class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="depense" role="tabpanel" aria-labelledby="depense-tab-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="myTable4">
                                                    <thead>
                                                        <tr>
                                                            <th>Produit</th>
                                                            <!-- <th>Type de paiement</th> -->
                                                            <th>Quantité</th>
                                                            <th>Detail</th>
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
                                            <div class="col-3">             
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalLong03" style="width:70%">
                                                    Ajouter Dépense
                                                </button>
                                            </div>
                                            <div class="col-3">     
                                                <input type="file" name="depense_documents[]" id="upload" hidden multiple/>
                                                <label class="label" for="upload"  style="width:70%"><i class="fas fa-file-upload"></i>  Importer fichers</label>               
                                            </div>
                                            <br>
                                            <br>
                                            <!--login form Modal -->
                                            <div class="modal fade" id="exampleModalLong03" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle1">Nouvelle Dépense</h5>
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
                                                                        <select class="form-select" id="select_produit_depense" name="depense_produit_id">
                                                                            <?php foreach($produits as $produit) { 
                                                                                    if($produit['categorie'] == 'Depense') { ?>
                                                                                <option value="<?php echo $produit['id'] ?>"> <?php echo $produit['nom'] ?></option>
                                                                            <?php } } ?>
                                                                            
                                                                        </select>
                                                                    </fieldset>
                                                                    <label>Montant</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="depense_montant" class="form-control">
                                                                    </div>
                                                                   
                                                                    <!-- <label>Type</label> -->
                                                                    <!-- <fieldset class="form-group">
                                                                        <select class="form-select" id="select_paiement_depense" name="type_paiement_depense">
                                                                            <?php //foreach($moyens as $moyen){ ?>
                                                                                <option value="<?php //echo $moyen['id'] ?>"> <?php //echo $moyen['nom'] ?></option>
                                                                            <?php //} ?>
                                                                        </select>
                                                                    </fieldset> -->
                                                                    <label>Quantité</label>
                                                                    <div class="form-group">
                                                                        <input type="number" name="depense_qte" class="form-control" value="0" required>
                                                                    </div>
                                                                    <label>Detail</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="depense_detail" value=" " class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class="modal-footer ">
                                                                        <button type="button" class="btn btn-primary ml-1" id="ajouter_depense"
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
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="form-group">
                                                    <input type="text" id="somme_depense" value="Somme :      " class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="reg_credit_client" role="tabpanel" aria-labelledby="reg_credit_client-tab-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="myTable5">
                                                    <thead>
                                                        <tr>
                                                            <th>Client</th>
                                                            <th>Montant</th>
                                                            <th>Objet Reglement</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-3">             
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalLong04" style="width:70%">
                                                    Ajouter Réglement
                                                </button>
                                            </div>
                                            <div class="col-3">     
                                                <input type="file" name="reglement_documents[]" id="upload" hidden multiple/>
                                                <label class="label" for="upload"  style="width:70%"><i class="fas fa-file-upload"></i>  Importer fichers</label>               
                                            </div>
                                            <br>
                                            <br>
                                            <!--login form Modal -->
                                            <div class="modal fade" id="exampleModalLong04" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle1">Reglement Crédit</h5>
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
                                                                        <select class="form-select" id="select_client_reglement" name="reglement_client_id">
                                                                            <?php foreach($clients as $client) { ?>
                                                                                <option value="<?php echo $client['id'] ?>"> <?php echo $client['nom'] ?></option>
                                                                            <?php }  ?>
                                                                        </select>
                                                                    </fieldset>
                                                                    
                                                                    <label>Montant</label>
                                                                    <div class="form-group">
                                                                        <input type="number" name="montant_reglement" class="form-control" value="0" required>
                                                                    </div>
                                                                    <label>Objet réglement</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="objet_regelement" value=" " class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class="modal-footer ">
                                                                        <button type="button" class="btn btn-primary ml-1" id="ajouter_reglement"
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
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="form-group">
                                                    <input type="text" id="somme_reglement" value="Somme :      " class="form-control" disabled>
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
    #table1 input,#table10 input, #myTable input, #myTable0 input, #myTable3 input, #myTable4 input, #myTable5 input {
        width:100px;
        text-align:center;
        border:none;
    }
    .label{
        display: inline-block;
        background-color: #DF8025;
        color: white;
        padding: 0.5rem;
        border-radius: 0.3rem;
        cursor: pointer;
        margin-top: 0.5rem;
        text-align : center;
    }
</style>



<script>   







$(document).ready(function() {
    let $prix_c = 0;

    
        

    $('form').submit(function( event ) {
        if(parseFloat($("#control_ca").text()) > 0) {
            event.preventDefault();
            alert("La recette n'est pas equilibrée !")
        }   
        $("")
    });
    $('form input').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
        // alert($('input[name="compteur_final[]"]').val());
        // alert($('input[name="physique[]"]').val());
        // $( "input[compteur_final[]]" ).prop('type', 'date');
    });
    // var dates = [];
    // Object.values(<?php // print_r(json_encode($recette_date)); ?>).map((type) => {
    //    dates.push(Object.values(type)[0])
    // })

    // list($year, $month, $day) = explode("-", $birthday);
    // $('#day').datepicker({
    //     dateFormat: 'dd-mm-yy',
    //     minDate: new Date(2021, 09, 10)
    //     // beforeShowDay: function(date){
    //     //     var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
    //     //     return [ dates.indexOf(string) == -1 ]
    //     // }
    // });    

    
});

function volucompteur(id) {
        var $ca_volucompteur = 0
        var result = 0
        var ca = 0
        if(parseFloat($("#compteur_final"+id).val()) >= parseFloat($("#compteur_initial"+id).val())){
            $compteur_initial = $("#compteur_initial"+id).val();
            $compteur_final = $("#compteur_final"+id).val();

            $result = ($compteur_final - $compteur_initial).toFixed(2)
            $("#sortie"+id).val($result).change()

            ca = $result * $("#prix"+id).val()
            $("#ca"+id).val( ca.toFixed(2));

            $( "input[id^='ca']" ).each(function(){
                $ca_volucompteur += parseFloat($(this).val());
                
            })
            $( "input[id^='1ca']" ).each(function(){
                $ca_volucompteur += parseFloat($(this).val());
                
            })

            $ca_volucompteur = $ca_volucompteur.toFixed(2)

            $("#somme_ca").val($ca_volucompteur)

            $("#total_volucompteur_header").html($ca_volucompteur)

            var control_ca = 0

            control_ca  = parseFloat($("#total_volucompteur_header").html()) - parseFloat($("#total_credit_header").html()) - parseFloat($("#total_paiement_header").html())
            $("#control_ca").html(control_ca)

            



        }else{ 
            alert("Compteur Final doit etre superieur");
            $("#compteur_final"+id).val($("#compteur_initial"+id).val()).change();
        }

        
        
    }
    function stock_sortie(id,product){

        var $compteur_sortie_total = 0
        var $physique = 0
        var $id_class_super = ""
        var $id_class_super = ""
        var $id_class_super = ""
        var $id_class_gasoil = ""

        var $id_class = 0
        var p = ''
        product = (product).replace(/ /g, '');

        // alert(p)

        $physique = parseFloat($("#physique"+id).val());

        $( "input[class^='c_stock']" ).each(function(){
            $class = $(this).attr("class")
            if($class.endsWith("SUPERSANSPLOMB") ){
                $id_class_super = $class.split("-")[1];
            }
            if($class.endsWith("Melange") ){
                $id_class_melange = $class.split("-")[1];
            }else if($class.endsWith("Gasoil")){
                $id_class_gasoil = $class.split("-")[1];

            }
        });

        if(product == 'Melange'){
            $(".c_stock-"+id+'-'+product).each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })
            $(".c_stockB-"+id+'-'+product).each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })

            $(".c_stock-"+$id_class_super+'-'+"SUPERSANSPLOMB").each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })
            $(".c_stockB-"+$id_class_super+'-'+"SUPERSANSPLOMB").each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })
            id = $id_class_super

        }else if(product == 'SUPERSANSPLOMB'){
            $(".c_stock-"+id+'-'+product).each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })
            $(".c_stockB-"+id+'-'+product).each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })

            $(".c_stock-"+$id_class_melange+'-'+"Melange").each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })
            $(".c_stockB-"+$id_class_melange+'-'+"Melange").each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })

        }else if(product == 'Gasoil'){
            $(".c_stock-"+id+'-'+product).each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })
            $(".c_stockB-"+id+'-'+product).each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })

            $(".c_stock-"+$id_class_gasoil+'-'+"Melange").each(function(){
                $compteur_sortie_total += parseFloat($(this).val())
            })
        }
        


        

        $("#sortie_r"+id).val($compteur_sortie_total.toFixed(2)).change();       
        // $("#physique"+id).val($stock_initial - $sortie + $entree).change();
        // $("#m_e"+id).val($physique - $("#comptable"+id).val()); 
    }
    function stock(id,column){ 
        // console.log(column)


        $stock_initial = parseFloat($("#stock_initial"+id).val());
        $entree = parseFloat($("#entree"+id).val());
        $sortie = parseFloat($("#sortie_r"+id).val()).toFixed(2);
        $physique = parseFloat($("#physique"+id).val());


        if(column == 'Physique'){
            $("#comptable"+id).val($stock_initial - $sortie + $entree);
            $("#m_e"+id).val(($physique - $("#comptable"+id).val()).toFixed(2));
        }else{
            $("#comptable"+id).val($stock_initial - $sortie + $entree);
            $("#m_e"+id).val(($physique - $("#comptable"+id).val()).toFixed(2));
            $("#physique"+id).val($stock_initial - $sortie + $entree);
        }
        
        // $("#comptable"+id).val($stock_initial - $sortie + $entree);
        // $("#physique"+id).val($stock_initial - $sortie + $entree);
        // console.log($("#comptable"+id).val())
        // $("#m_e"+id).val($physique - $("#comptable"+id).val());
    }
    function change_sortie_stock(id){
        console.log(id)
        $sortie = parseFloat($("#sortie_r"+id).val($("#sortie"+id).val()));
    }


    $('#ajouter_paiement').click(function(){ 
        var row_id = $("#myTable tr").length;
        var tbody = $('#myTable').children('tbody');
        var table = tbody.length ? tbody : $('#myTable');

        $montant_net = parseFloat($("input[name=montant]").val()) - parseFloat($("input[name=commission]").val());
        // table.append(   `<tr id=`+row_id+`>
        //                     <td><input type="text" value=`+$("#select_client option:selected").html()+` disabled="disabled"></td>
        //                     <input type="hidden" name="p_client_id[]" value=`+$("#select_client option:selected").val()+`>
        //                     <td><input type="text" name="p_reference[]" value=`+$("input[name=reference]").val()+`></td>
        //                     <td><input type="text" value=`+$("#select_paiement option:selected").html()+` disabled="disabled"></td>
        //                     <input type="hidden" name="p_type_paiement[]" value=`+$("#select_paiement option:selected").val()+`>
        //                     <td><input type="text" name="p_montant[]" id=montant`+row_id+` onchange=paiement(`+row_id+`) value=`+$("input[name=montant]").val()+`></td>
        //                     <td><input type="text" name="p_commission[]" id=commission`+row_id+` onchange=paiement(`+row_id+`) value=`+$("input[name=commission]").val()+`></td>
        //                     <td><input class="totat_montant_paiement" type="text" id=montant_net`+row_id+` value=`+$montant_net+` disabled="disabled"></td>
        //                     <td><i onclick="supp_paiement(`+row_id+`)" class="fas fa-trash"></i></td>
        //                 </tr>`
        //             );  
        
        table.append(   `<tr id=`+row_id+`>
                            <td><input type="text" value="`+$("#select_paiement option:selected").html()+`" disabled="disabled"></td>
                            <input type="hidden" name="p_type_paiement[]" value=`+$("#select_paiement option:selected").val()+`>
                            <td><input type="text" name="p_montant[]" id=montant`+row_id+` onchange=paiement(`+row_id+`) value=`+$("input[name=montant]").val()+`></td>
                            <td><input type="text" name="p_commission[]" id=commission`+row_id+` onchange=paiement(`+row_id+`) value=`+$("input[name=commission]").val()+`></td>
                            <td><input class="totat_montant_paiement" type="text" id=montant_net`+row_id+` value=`+$montant_net+` disabled="disabled"></td>
                            <td><i onclick="supp_paiement(`+row_id+`)" class="fas fa-trash"></i></td>
                        </tr>`
                    );                
        var $totat_montant_paiement = 0
        $(".totat_montant_paiement").each(function() {
            $totat_montant_paiement += parseFloat($(this).val()) 
        })

        $("#somme_paiement").val("Somme :" + $totat_montant_paiement);
        $("#total_paiement_header").html($totat_montant_paiement)


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


        // let $prix_c = 0;
        // let $client_solde = 0;
        // let $client_plafond = 0;
        // var $montant_client = 0;
        var $montant_credit_total = 0;
        var $montant = 0;

        // Object.values(<?php //print_r(json_encode($clients)); ?>).map((c) => {
        // if(c['id'] == $("#c_select_clients option:selected").val()) {
        //         $client_solde = c['solde'];
        //         $client_plafond = c['plafond'];
        //     }
        // })
        // Object.values(<?php //print_r(json_encode($price_list)); ?>).map((p) => {
        //     if(p['produit_id'] == $("#select_produit_credit option:selected").val()) {
        //         $prix_c = p['liste_prix'];
        //         return $prix_c;
        //     }
        // })
            
    
        // Object.values(<?php //print_r(json_encode($produits)); ?>).map((p) => {
        // if(p['id'] == $("#select_produit_credit option:selected").val()) {
        //         $prix_c = p['prix'];
        //         return $prix_c;
        //     }
       
        // })
        
        // $montant = ($prix_c * parseFloat($("input[name=c_quantites]").val()));


        // table.append(   `<tr id=`+row_id+`>
        //                     <td><input type="text" nom="client" value=`+$("#c_select_clients option:selected").html()+` disabled="disabled"></td>
        //                     <input type="hidden" name="c_client_id1[]" value=`+$("#c_select_clients option:selected").val()+`>
        //                     <td><input class=solde_credit`+$("#c_select_clients option:selected").val()+` type="number" id=solde_credit`+row_id+` name="c_solde1[]" readonly></td>
        //                     <td><input class=reliquat_c`+$("#c_select_clients option:selected").val()+` type="number" id=reliquat_c`+row_id+` name="c_reliquat1[]" readonly></td>
        //                     <td><input type="number" value=`+$client_plafond+` id=plafond_c_id`+row_id+` name="c_plafond1[]" readonly></td>
        //                     <td><input type="text" value=`+$("#select_produit_credit option:selected").html()+` disabled="disabled"></td>
        //                     <input type="hidden" name="select_produit_credit1[]" value=`+$("#select_produit_credit option:selected").val()+`>
        //                     <input type="hidden" id=c_prix_id1`+row_id+` value=`+$prix_c+`>
        //                     <td><input type="number" name="c_reference1[]" value=`+$("input[name=c_reference]").val()+`></td>
        //                     <td><input type="number" name="c_quantite1[]" id=c_quantite`+row_id+` onchange=credit_calcul(`+row_id+`) value=`+$("input[name=c_quantites]").val()+`></td>
        //                     <td><input class=montant_credit`+$("#c_select_clients option:selected").val()+` name="c_montant1" type="number" id=c_montant`+row_id+` value=`+$montant+` readonly></td>
        //                     <td><i onclick="supp_credit(`+row_id+`)" class="fas fa-trash"></i></td>
        //                 </tr>`
        //             )

        $montant = parseFloat($("input[name=c_montant]").val())

        table.append(   `<tr id=`+row_id+`>
                            <td><input type="text" nom="client" value=`+$("#c_select_clients option:selected").html()+` disabled="disabled"></td>
                            <input type="hidden" name="c_client_id1[]" value=`+$("#c_select_clients option:selected").val()+`>
                            <td><input type="number" name="c_reference1[]" value=`+$("input[name=c_reference]").val()+`></td>
                            <td><input class=montant_credit`+$("#c_select_clients option:selected").val()+` name="c_montant1[]" type="number" id=c_montant`+row_id+` onchange=credit_calcul(`+row_id+`) value=`+$montant+`></td>
                            <td><i onclick="supp_credit(`+row_id+`)" class="fas fa-trash"></i></td>
                        </tr>`
                    )
      
        $( "input[class^='montant_credit']" ).each(function(){
            $montant_credit_total += parseFloat($(this).val())  
        })

        $("#somme_credit").val("Somme :" + $montant_credit_total);
        $("#total_credit_header").html($montant_credit_total);
        
    });
    
    function credit_calcul(id){
        
        var $montant_credit_total = 0

        $( "input[class^='montant_credit']" ).each(function(){
            $montant_credit_total += parseFloat($(this).val())  
        })

        $("#somme_credit").val("Somme :" + $montant_credit_total);
        $("#total_credit_header").html($montant_credit_total);
       
    }
    function supp_credit(id) {
        $("#myTable0 tr#"+id).remove();
        var $montant_credit_total = 0
        $( "input[class^='montant_credit']" ).each(function(){
            $montant_credit_total += parseFloat($(this).val())  
        })

        $("#somme_credit").val("Somme :" + $montant_credit_total);
        $("#total_credit_header").html($montant_credit_total);
    }

    function paiement(id){
        
        console.log($("#montant"+id).val());
        console.log($("#commission"+id).val());
        var new_montant = $("#montant"+id).val() - $("#commission"+id).val()
        if(new_montant > 0){
            $("#montant_net"+id).val(new_montant);
            
        }else{ 
            alert("La commission doit être inférieure")
            $("#commission"+id).val(0);
            $("#montant_net"+id).val($("#montant"+id).val() - $("#commission"+id).val());
        }
        var $totat_montant_paiement = 0
        $(".totat_montant_paiement").each(function() {
            $totat_montant_paiement += parseFloat($(this).val()) 
        })

        $("#somme_paiement").val("Somme :" + $totat_montant_paiement);
        $("#total_paiement_header").html($totat_montant_paiement)
        // var control_ca = 0

        // control_ca  = parseFloat($("#total_volucompteur_header").html()) - parseFloat($("#total_credit_header").html()) - parseFloat($("#total_paiement_header").html())
        // $("#control_ca").html(control_ca)
    }
    function supp_paiement(id){ 
        $("#myTable tr#"+id).remove();
        var $totat_montant_paiement = 0
        $(".totat_montant_paiement").each(function() {
            $totat_montant_paiement += parseFloat($(this).val()) 
        })

        $("#somme_paiement").val("Somme :" + $totat_montant_paiement);
        $("#total_paiement_header").html($totat_montant_paiement)
        // var control_ca = 0

        // control_ca  = parseFloat($("#total_volucompteur_header").html()) - parseFloat($("#total_credit_header").html()) - parseFloat($("#total_paiement_header").html())
        // $("#control_ca").html(control_ca)

    }
    $('#ajouter_vente_service').click(function(){ 
        var row_id = $("#myTable3 tr").length;
        var tbody = $('#myTable3').children('tbody');
        var table = tbody.length ? tbody : $('#myTable3');
        var $prix_s_v = 0
        // Object.values(<?php print_r(json_encode($produits)); ?>).map((p) => {
        // if(p['id'] == $("#select_produit_v_s option:selected").val()) {
        //         $prix_s_v = p['prix'];
        //         return $prix_s_v;
        //     }
        // })
        table.append(   `<tr id=`+row_id+`>
                            <td><input type="text" value="`+$("#select_produit_v_s option:selected").html()+`" disabled="disabled"></td>
                            <input type="hidden" name="select_produit_v_s1[]" value=`+$("#select_produit_v_s option:selected").val()+`>
                            <td><input type="number" id=prix_s_v`+row_id+` onchange=v_s_calcul(`+row_id+`) value=`+$("input[name=v_s_montant]").val()+`></td>
                            

                            <td><input type="number" name="qte_v_s1[]" id=v_s_qte_id`+row_id+` onchange=v_s_calcul(`+row_id+`) value=`+$("input[name=v_s_qte]").val()+`></td>
                            <td><input type="text" name="immatricule_v_s1[]" id=v_s_immatricule_id`+row_id+` value=`+$("input[name=v_s_immatricule]").val()+`></td>
                            <td><input class="montant_v_s" type="number" name="total_v_s[]" id=total_v_s`+row_id+` value=`+(parseFloat($("input[name=v_s_montant]").val()) * parseFloat($("input[name=v_s_qte]").val()))+` readonly></td>
                            <td><i onclick="supp_ventes_services(`+row_id+`)" class="fas fa-trash"></i></td>
                        </tr>`
                    ); 
        var $totat_montant_v_s = 0
        $(".montant_v_s").each(function() {
            $totat_montant_v_s += parseFloat($(this).val()) 
        })

        $("#somme_ventes_services").val("Somme :" + $totat_montant_v_s);
        $("#total_ventes_services_header").html($totat_montant_v_s)
    });
    function v_s_calcul(id){
        $prix = parseFloat($("#prix_s_v"+id).val());
        $qte = parseFloat($("#v_s_qte_id"+id).val()); 
        console.log($prix)
        console.log($qte)
        $("#total_v_s"+id).val($prix*$qte);

        var $totat_montant_v_s = 0
        $(".montant_v_s").each(function() {
            $totat_montant_v_s += parseFloat($(this).val()) 
        })

        $("#somme_ventes_services").val("Somme :" + $totat_montant_v_s);
        $("#total_ventes_services_header").html($totat_montant_v_s)
    }
    function supp_ventes_services(id){ 
        $("#myTable3 tr#"+id).remove();
        var $totat_montant_v_s = 0
        $(".montant_v_s").each(function() {
            $totat_montant_v_s += parseFloat($(this).val()) 
        })

        $("#somme_ventes_services").val("Somme :" + $totat_montant_v_s);
        $("#total_ventes_services_header").html($totat_montant_v_s)

    }
    // $( "#select_produit_depense" ).change(function() {
    //     console.log($("#select_produit_depense option:selected").val())
    //     if($("#select_produit_depense option:selected").val() == 'autres'){
    //         $("#depense_produit_new").removeClass('d-none');
    //         console.log("LLL")
    //     }
    // });



    $('#ajouter_depense').click(function(){ 
        var row_id = $("#myTable4 tr").length;
        var tbody = $('#myTable4').children('tbody');
        var table = tbody.length ? tbody : $('#myTable4');
        var $prix_depense = 0
        Object.values(<?php print_r(json_encode($produits)); ?>).map((p) => {
            if(p['id'] == $("#select_produit_depense option:selected").val()) {
                $prix_depense = p['prix'];
                return $prix_depense;
            }
        })

        
        table.append(   `<tr id=`+row_id+`>
                            <td><input type="text" value="`+$("#select_produit_depense option:selected").html()+`" disabled="disabled"></td>
                            <input type="hidden" name="select_produit_depense1[]" value=`+$("#select_produit_depense option:selected").val()+`>
                            <input type="hidden" id=prix_depense`+row_id+` value=`+$prix_depense+`>
                            

                            <td><input type="number" name="qte_depense[]" id=depense_qte_id`+row_id+` onchange=depense_calcul(`+row_id+`) value=`+$("input[name=depense_qte]").val()+`></td>
                            <td><input type="text" name="detail[]" id=depense_detail_id`+row_id+` value=`+$("input[name=depense_detail]").val()+`></td>
                            <td><input class="montant_depense" type="number" name="total_depense[]" id=total_depense`+row_id+` value=`+($prix_depense * parseFloat($("input[name=depense_qte]").val()))+` readonly></td>
                            <td><i onclick="supp_depense(`+row_id+`)" class="fas fa-trash"></i></td>
                        </tr>`
                    ); 
        var $totat_montant_depense = 0
        $(".montant_depense").each(function() {
            $totat_montant_depense += parseFloat($(this).val()) 
        })

        $("#somme_depense").val("Somme :" + $totat_montant_depense);
        $("#total_depense_header").html($totat_montant_depense)


    });
    function depense_calcul(id){
        $prix = parseFloat($("#prix_depense"+id).val());
        $qte = parseFloat($("#depense_qte_id"+id).val()); 
        $("#total_depense"+id).val($prix*$qte);

        var $totat_montant_depense = 0
        $(".montant_depense").each(function() {
            $totat_montant_depense += parseFloat($(this).val()) 
        })

        $("#somme_depense").val("Somme :" + $totat_montant_depense);
        $("#total_depense_header").html($totat_montant_depense)
    }
    function supp_depense(id){ 
        $("#myTable4 tr#"+id).remove();
        var $totat_montant_depense = 0
        $(".montant_depense").each(function() {
            $totat_montant_depense += parseFloat($(this).val()) 
        })
        $("#somme_depense").val("Somme :" + $totat_montant_depense);
        $("#total_depense_header").html($totat_montant_depense)

    }

    // -------------------------------------------------- Reglement Credit -----------------------------
    
    
    
    
    $('#ajouter_reglement').click(function(){ 
        var row_id = $("#myTable5 tr").length;
        var tbody = $('#myTable5').children('tbody');
        var table = tbody.length ? tbody : $('#myTable5');
        
        table.append(   `<tr id=`+row_id+`>
                            <td><input type="text" value="`+$("#select_client_reglement option:selected").html()+`" disabled="disabled"></td>
                            <input type="hidden" name="select_client_reglement1[]" value=`+$("#select_client_reglement option:selected").val()+`>
                            <td><input class="reglement" type="number" name="reglement_montant1[]" id=reglement_montant_id`+row_id+` onchange=reglement_calcul(`+row_id+`) value=`+$("input[name=montant_reglement]").val()+`></td>
                            <td><input type="text" name="objet_reglement1[]" id=objet_regelement_id`+row_id+` value=`+$("input[name=objet_regelement]").val()+`></td>
                            <td><i onclick="supp_reglement(`+row_id+`)" class="fas fa-trash"></i></td>
                        </tr>`
                    ); 
        var $totat_reglement = 0
        $(".reglement").each(function() {
            $totat_reglement += parseFloat($(this).val()) 
        })

        $("#somme_reglement").val("Somme :" + $totat_reglement);
        $("#total_reglement_header").html($totat_reglement)


    });
    
    function supp_reglement(id){ 
        $("#myTable5 tr#"+id).remove();
        var $totat_reglement = 0
        $(".reglement").each(function() {
            $totat_reglement += parseFloat($(this).val()) 
        })
        $("#somme_reglement").val("Somme :" + $totat_reglement);
        $("#total_reglement_header").html($totat_reglement)
    }
</script>
<?php }elseif ($is_prix == 0){ ?>
<script>
    alert("Veuillez Mettre A jour la liste des prix de tous les carburants")
</script>
<?php } ?>
<?= $this->endSection() ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>

<?= $this->endSection() ?>

