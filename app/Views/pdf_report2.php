<!doctype html>
<html>
  <?php include 'report_style.php' ?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style type="text/css">
        table
        {
            width:  100%;
            border:none;
            border-collapse: collapse;
            position: relative;
        }
        th
        {
            text-align: center;
            border: solid 1px #eee;
            background: #4DA338;
            color: white
        }
        .table-head{
          background: #4DA338;
          color: white
        }
        .th-head{
          background: #DF8026;
          color: white
        }
        td
        {
            text-align: center;
            vertical-align: text-top;
        }
        .dataTable td{
        padding:10px 5px;
        background-color:#efefef;
        }
        .dataTable th{
        padding:10px 5px;
        }
        h6{
          color: #DF8026;
        }
        h5{
          text-align:center;
        }
        tr:nth-child(2n){
            background-color: #DFC0A1;
        }
        </style>
        <?php $i = 0; 
              $attarik = 0;
              $visa = 0;
              $cheque = 0;
        ?>
        <table>
          <tr>
            <td>
              <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10px">
                <tr><td><b>ZIZ DISTRIBUTION</b></td></tr>
                <tr><td><b>STATION SERVICE :</b></td></tr>
              </tr></table>
              
            </td>
            <?php
              $path = '../public/assets/images/logo/logo_ziz.jpeg';
              $type = pathinfo($path, PATHINFO_EXTENSION);
              $data = file_get_contents($path);
              $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
              ?>
            <td><img src="<?php echo $base64?>" width="100px" style="margin-left: 200px !important"/></td>
            <!-- <td><img src="/assets/images/logo/logo_ziz.jpeg" alt="" style="margin-left: 800px !important"></td> -->
          </tr>
        </table>
        
       <h5>Rapport Journalier du <?php //echo ($recettes->recette_date) ?></h5>
        
        <hr>
        <h6 style="margin-top:20px;">Volucompteurs :</h6>

        <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10px">
            <tr>
                <td style="width: 33%;">
                    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10px">
                        <thead>
                        <tr>
                            <th rowspan="2" class="table-head">volucompteurs</th>
                            <th colspan="3" class="th-head" scope="col">Super Sans Plomb</th>
                            <th colspan="3" class="th-head" scope="col">Melange</th>
                            <th colspan="3" class="th-head" scope="col">Gasoil 10</th>
                            <td></td>
                        </tr>
                            <th class="th-head" scope="col">1</th>
                            <th class="th-head" scope="col">2</th>
                            <th class="th-head" scope="col">3</th>
                            <th class="th-head" scope="col">1</th>
                            <th class="th-head" scope="col">2</th>
                            <th class="th-head" scope="col">3</th>
                            <th class="th-head" scope="col">1</th>
                            <th class="th-head" scope="col">2</th>
                            <th class="th-head" scope="col">3</th>
                            <td></td>
                        <tr>    
                            <td>Sorties</td>
                            <?php foreach ($volucompteurs as $v){ ?>
                                  <?php if($v->produit_nom == "SUPER SANS PLOMB") { ?>
                                    <td><?php echo ($v->compteur_final - $v->compteur_initial) ; ?></td>
                                    <td></td>
                                    <td></td>
                                    <?php }} ?>
                                  <?php foreach ($volucompteurs as $v){ ?>
                                    <?php if($v->produit_nom == "Melange") { ?>
                                      <td><?php echo ($v->compteur_final - $v->compteur_initial) ;  ?></td>
                                      <td></td>
                                      <td></td>
                                      <?php }} ?>
                                  <?php foreach ($volucompteurs as $v){ ?>

                                <?php if($v->produit_nom == "Gasoil") { ?>
                                        <td><?php echo ($v->compteur_final - $v->compteur_initial) ;  ?></td>
                                        <td></td>
                                        <td></td>
                                        <?php }} ?>

                            

                        </tr>
                        <tr>    
                            <td>Regularisation</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>    
                            <td>Ventes</td>
                            <?php foreach ($volucompteurs as $v){ ?>
                                  <?php if($v->produit_nom == "SUPER SANS PLOMB") { ?>
                                    <td><?php echo ($v->compteur_final - $v->compteur_initial) ; ?></td>
                                    <td></td>
                                    <td></td>
                                    <?php }} ?>
                                  <?php foreach ($volucompteurs as $v){ ?>
                                    <?php if($v->produit_nom == "Melange") { ?>
                                      <td><?php echo ($v->compteur_final - $v->compteur_initial) ;  ?></td>
                                      <td></td>
                                      <td></td>
                                      <?php }} ?>
                                  <?php foreach ($volucompteurs as $v){ ?>

                                <?php if($v->produit_nom == "Gasoil") { ?>
                                        <td><?php echo ($v->compteur_final - $v->compteur_initial) ;  ?></td>
                                        <td></td>
                                        <td></td>
                                        <?php }} ?>

                            <td colspan="3">Total Carburant</td>

                        </tr>
                        <tr>    
                            <td>Prix Unitaire</td>
                            <?php foreach ($volucompteurs as $v){ ?>
                                  <?php if($v->produit_nom == "SUPER SANS PLOMB") { ?>
                                    <td><?php echo ($v->prix) ; ?></td>
                                    <td></td>
                                    <td></td>
                                    <?php }} ?>
                                  <?php foreach ($volucompteurs as $v){ ?>
                                    <?php if($v->produit_nom == "Melange") { ?>
                                      <td><?php echo ($v->prix) ;  ?></td>
                                      <td></td>
                                      <td></td>
                                      <?php }} ?>
                                  <?php foreach ($volucompteurs as $v){ ?>

                                <?php if($v->produit_nom == "Gasoil") { ?>
                                        <td><?php echo ($v->prix) ;  ?></td>
                                        <td></td>
                                        <td></td>
                                        <?php }} ?>


                        </tr>
                        <tr>    
                            <td></td>
                            <?php foreach ($volucompteurs as $v){ ?>
                                <?php if($v->produit_nom == "SUPER SANS PLOMB") { ?>
                                  <td><?php echo (($v->compteur_final - $v->compteur_initial) * $v->prix ) ;  ?></td>

                                    <td>0</td>
                                    <td>0</td>
                                    <?php }} ?>


                            <?php foreach ($volucompteurs as $v){ ?>

                                <?php if($v->produit_nom == "Melange") { ?>
                                        <td><?php echo (($v->compteur_final - $v->compteur_initial) * $v->prix ) ;  ?></td>
                                <td></td>
                                <td></td>
                                <?php }} ?>
                                <?php foreach ($volucompteurs as $v){ ?>

                                <?php if($v->produit_nom == "Gasoil") { ?>
                                        <td><?php echo (($v->compteur_final - $v->compteur_initial) * $v->prix ) ; ?></td>
                                <td></td>
                                <td></td>
                                <?php }} ?>
                        </tr>
                        <tr>

                            <td>Montant Produit</td>
                            <?php foreach ($volucompteurs as $v){ ?>

                            <?php if($v->produit_nom == "SUPER SANS PLOMB") { ?>
                                <td colspan="6"><?php echo (($v->compteur_final - $v->compteur_initial) * $v->prix ) ;  ?></td>
                            <?php }elseif($v->produit_nom == "MELANGE") { ?>
                                <td colspan="3"><?php echo (($v->compteur_final - $v->compteur_initial) * $v->prix ) ;  ?></td>
                            <?php }elseif($v->produit_nom == "Gasoil") { ?>
                                <td colspan="3"><?php echo (($v->compteur_final - $v->compteur_initial) * $v->prix ) ; } ?></td>                            
                            <?php } ?>
                            <td><?php echo(round($volucompteur_total->total,2)) ?></td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
        </table>
        <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10px;margin-top:20px;">
        

          <tr>
            <td style="width: 40%;">
            <h6 style="width: 100%; text-align: left;">Citernes :</h6>
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">
                <thead>
                  <tr>
                    <th scope="col" style="background-color:white"></th>
                    <th scope="col">GA</th>
                    <th scope="col">SP</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="width:200px; text-align: left">Stock Initial (jaugeage)</td>
                    <td><?php echo ($stock_gasoil->stock_initial);  ?></td>
                    <td><?php echo ($stock_sp->stock_initial);  ?></td>
                  </tr>
                  <tr>
                    <td style="width:200px; text-align: left">Entrées</td>
                    <td><?php echo ($stock_gasoil->entree);  ?></td>
                    <td><?php echo ($stock_sp->entree);  ?></td>
                  </tr>
                  <tr>
                    <td style="width:200px; text-align: left">Sorties</td>
                    <td><?php echo round($stock_gasoil->sortie,2); ?></td>
                    <td><?php echo round($stock_sp->sortie,2); ?></td>
                  </tr>
                  <tr>
                    <td style="width:200px; text-align: left">Stock Comptable</td>
                    <td><?php echo round($stock_gasoil->stock_comptable,2);  ?></td>
                    <td><?php echo round($stock_sp->stock_comptable,2);  ?></td>
                  </tr>
                  <tr>
                    <td style="width:200px; text-align: left">Stock Physique</td>
                    <td><?php echo round($stock_gasoil->stock_physique,2);  ?></td>
                    <td><?php echo round($stock_sp->stock_physique,2);  ?></td>
                  </tr>
                  <tr>
                    <td style="width:200px; text-align: left">Prix Unitaire</td>
                    <td><?php echo ($stock_gasoil->prix);  ?></td>
                    <td><?php echo ($stock_sp->prix);  ?></td>
                  </tr>
                  <tr>
                    <td style="width:200px; text-align: left">Valeurs</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td style="width:200px; text-align: left">Manquants ou Excédents</td>
                    <td><?php echo round($stock_gasoil->manquant_excedent,2);  ?></td>
                    <td><?php echo round($stock_sp->manquant_excedent,2);  ?></td>
                  </tr>
                    
                  </tr>
                </tbody>
              </table>
            </td>
        </table>
        <table>
        <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10px;margin-top:20px;">
            <tr>
            <td>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10px">
                    <thead>
                        <tr>
                            <th scope="col" colspan="3">Service</th>
                        </tr>
                    </thead>
                        <tr>
                            <td>
                                <table>
                                    <td>Lubrifiants</td>
                                    <td>Qte</td>
                                    <td>P.U</td>
                                    <td>Montant</td>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <td>Filtres</td>
                                    <td>Mnt</td>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <th>Divers</th>
                                    <th></th>
                                    <th></th>
                                    <tbody>
                                        <tr>
                                            <td>Lavage</td>
                                            <td style="width:50px"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Graissage</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Vidange</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Carte Attarik</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Compteur d'eau</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="3">Reglement Credit </th>
                                        </tr>
                                        <tr>
                                            <td> - </td>
                                            <td> - </td>
                                            <td> - </td>
                                        </tr>
                                        <tr>
                                            <td> - </td>
                                            <td> - </td>
                                            <td> - </td>
                                        </tr>
                                        <tr>
                                            <td> - </td>
                                            <td> - </td>
                                            <td> - </td>
                                        </tr>
                                        
                                    </thead>
                                </table>
                            </td>
                        </tr>
                    <tbody>
                        <?php 
                        if(isset($venteservices)) { 
                            foreach($venteservices as $v){ ?>
                                <tr>
                                    <td><?php echo $v->produit_nom ; ?></td>
                                    <td><?php echo $v->montant ; ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="2" class="table-active">
                                    Total Services : <?php echo (array_sum(array_column($venteservices, 'montant')));?>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </td>
            <td style="width: 40%;">
            

              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">
                <thead>
                    <tr>
                    <th scope="col" colspan="3">Credits</th>
                    </tr>
                  <tr>
                    <th scope="col">Client</th>
                    <th scope="col">Montant</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(isset($credits)) { 
                      foreach($credits as $credit){ ?>
                    <tr>
                      <td><?php echo $credit->client_nom ; ?></td>
                      <td><?php echo $credit->montant ; ?></td>
                    </tr>
                    
                    <?php } ?>
                <?php } ?>             
                  <?php 
                    if(isset($paiements)) { 
                      
                      foreach($paiements as $p){ ?>
                        <?php if(substr( $p->moyen_nom, 0, 3 ) === "Bon")  { $i += $p->montant ;?>
                    <tr>
                      <td><?php echo $p->moyen_nom ; ?></td>
                      <td><?php echo $p->montant ; ?></td>
                    </tr>
                  <?php } } ?>
                  <tr>
                    <td class="table-active">Total</td>
                    <td><?php echo(array_sum(array_column($credits, 'montant')) +  $i);  ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </td>
            <td>
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10px">
                <thead>
                    <tr>
                        <th scope="col" colspan="3">Depenses</th>
                    </tr>
                  <tr>
                    <th scope="col">Detail</th>
                    <th scope="col">Montant</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(isset($depenses)) { 
                      foreach($depenses as $d){ ?>
                    <tr>
                      <td><?php echo $d->produit_nom ; ?></td>
                      <td><?php echo $d->montant ; ?></td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td class="table-active">
                        Total :
                    </td>
                    <td class="table-active">
                        <?php echo (array_sum(array_column($depenses, 'montant')));?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </td>
            
          </tr>
        </table>
        </table>

            
        
        
        

            
</html>