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
                <tr><td><b>STATION SERVICE : <?php echo ($station->nom);  ?></b></td></tr>
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
        
       <h5>Rapport Journalier du <?php echo ($recettes->recette_date) ?></h5>
        
        <hr>
        <h6 style="margin-top:20px;">Volucompteurs :</h6>

        <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10px">
          <tr>
            <td style="width: 33%;">
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10px">
                <thead>
                  <tr>
                    <td colspan="4" class="table-head">GASOIL</td>
                  </tr>
                  <tr>
                    <th class="th-head" scope="col">Pompe</th>
                    <th class="th-head" scope="col">Compt Initial</th>
                    <th class="th-head" scope="col">Compt Final</th>
                    <th class="th-head" scope="col">Sorties</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(isset($volucompteurs)) { 
                      foreach($volucompteurs as $volucompteur){ 
                        if($volucompteur->produit_nom == "Gasoil"){ ?>
                    <tr>
                      <td><?php echo $volucompteur->pompe_id ; ?></td>
                      <td><?php echo $volucompteur->compteur_initial ; ?></td>
                      <td><?php echo $volucompteur->compteur_final ; ?></td>
                      <td><?php echo ($volucompteur->compteur_final - $volucompteur->compteur_initial) ; ?></td>
                    </tr>
                    
                  <?php } }?>
                  <tr>
                    <td colspan="4" class="table-active">
                      <?php foreach($volucompteur_total as $total){ 
                              if($total->produit_nom == "Gasoil"){  ?>  
                                P.U : <?php echo ($total->prix_unitaire ." - ". round($total->sortie_total,2) ."(litres) - ". round($total->total,2) . "(Dhs)"); ?>
                      <?php }}?>
                    </td>
                  </tr>
                
                <?php } ?>
                  

                </tbody>
              </table>
            </td>
            <td style="width: 33%;top:0px !important">
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">
              <thead>
                  <tr>
                    <td colspan="4" class="table-head">MELANGE</th>
                  </tr>
                  <tr>
                    <th class="th-head" scope="col">Pompe</th>
                    <th class="th-head" scope="col">Compt Initial</th>
                    <th class="th-head" scope="col">Compt Final</th>
                    <th class="th-head" scope="col">Sorties</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(isset($volucompteurs)) { 
                      foreach($volucompteurs as $volucompteur){ 
                        if($volucompteur->produit_nom == "Melange"){ ?>
                    <tr>
                      <th><?php echo $volucompteur->pompe_id ; ?></th>
                      <th><?php echo $volucompteur->compteur_initial ; ?></th>
                      <th><?php echo $volucompteur->compteur_final ; ?></th>
                      <th><?php echo ($volucompteur->compteur_final - $volucompteur->compteur_initial) ; ?></th>
                    </tr>
                  <?php } }?>
                  <tr>
                    <td colspan="4" class="table-active">
                      <?php foreach($volucompteur_total as $total){ 
                              if($total->produit_nom == "MELANGE"){  ?>  
                                P.U : <?php echo ($total->prix_unitaire ." - ". round($total->sortie_total,2) ."(litres) - ". round($total->total,2) . "(Dhs)"); ?>
                      <?php }}?>
                    </td>
                  </tr>
                
                <?php } ?>
                </tbody>
              </table>
            </td>
            <td style="width: 33%;top:0px !important">
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">
                <thead>
                  <tr>
                    <td colspan="4" class="table-head">SUPER SANS PLOMB</td>
                  </tr>
                  <tr>
                    <th class="th-head" scope="col">Pompe</th>
                    <th class="th-head" scope="col">Compt Initial</th>
                    <th class="th-head" scope="col">Compt Final</th>
                    <th class="th-head" scope="col">Sorties</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(isset($volucompteurs)) { 
                      foreach($volucompteurs as $volucompteur){ 
                        if($volucompteur->produit_nom == "SUPER SANS PLOMB"){ ?>
                    <tr>
                      <th><?php echo $volucompteur->pompe_id ; ?></th>
                      <th><?php echo $volucompteur->compteur_initial ; ?></th>
                      <th><?php echo $volucompteur->compteur_final ; ?></th>
                      <th><?php echo ($volucompteur->compteur_final - $volucompteur->compteur_initial) ; ?></th>
                    </tr>
                    <?php } }?>
                  <tr>
                    <td colspan="4" class="table-active">
                      <?php foreach($volucompteur_total as $total){ 
                              if($total->produit_nom == "SUPER SANS PLOMB"){  ?>  
                                P.U : <?php echo ($total->prix_unitaire ." - ". round($total->sortie_total,2) ."(litres) - ". round($total->total,2) . "(Dhs)"); ?>
                      <?php }}?>
                    </td>
                  </tr>
                
                <?php } ?>
                </tbody>
              </table>
            </td>
          </tr>
          <td colspan="3" class="table-active">
            Total Carburant  : <?php echo round(array_sum(array_column($volucompteur_total, 'total')),2); ?>
          </td>
        </table>
        <!-------------------------SECOND TABLE----------------------------------------------------- -->
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
                    <td><?php echo round($stock_gasoil->stock_initial,2);  ?></td>
                    <td><?php echo round($stock_sp->stock_initial,2);  ?></td>
                  </tr>
                  <tr>
                    <td style="width:200px; text-align: left">Entrées</td>
                    <td><?php echo round($stock_gasoil->entree,2);  ?></td>
                    <td><?php echo round($stock_sp->entree,2);  ?></td>
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
                    <td><?php echo ($stock_gasoil->prix_achat);  ?></td>
                    <td><?php echo ($stock_sp->prix_achat);  ?></td>
                  </tr>
                  <tr>
                    <td style="width:200px; text-align: left">Valeurs</td>
                    <td><?php  echo round(($stock_gasoil->stock_physique * $stock_gasoil->prix_achat),2) ?></td>
                    <td><?php  echo round(($stock_sp->stock_physique * $stock_sp->prix_achat),2) ?></td>
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
            <td style="width: 30%;top:0px !important">
            <h6 style="width: 100%; text-align: left;">Service :</h6>

              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10px">
                <thead>
                  <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
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
            <td style="width: 30%;top:0px !important">
            <h6 style="width: 100%; text-align: left;">Dépenses :</h6>
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10px">
                <thead>
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
                    <td colspan="2" class="table-active">
                        Total Services : <?php echo (array_sum(array_column($depenses, 'montant')));?>
                      </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </td>
          </tr>
        </table>
        <!-------------------------THIRD TABLE----------------------------------------------------- -->
        <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10px;margin-top:20px;">
          <tr>
            <td style="width: 40%;">
            <h6 style="width: 100%; text-align: left;">Credit :</h6>

              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">

                <thead>
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
                  <tr>
                    <td colspan="2" class="table-active">
                        Total Credit : <?php echo (array_sum(array_column($credits, 'montant')));?>
                      </td>
                  </tr>
                <?php } ?>
                  

                </tbody>
              </table>
            </td>
            <td style="width: 30%;top:0px !important">
            <h6 style="width: 100%; text-align: left;"> Bons </h6>
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10px">
              
                <thead>
                  <tr>
                    <th scope="col">Bon</th>
                    <th scope="col">Montant</th>
                  </tr>
                </thead>
                <tbody>
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
                    <td colspan="2" class="table-active">
                      Total Bon : <?php echo ($i);?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </td>
            
          </tr>
        </table>
        <table style="margin-top:20px;width: 100%; text-align: center; font-size: 10px">
          <tr style="border: 1px solid">
            <td><b>Attarik :</b></td>
            <td><?php foreach($paiements as $p){ 
                  if($p->moyen_nom == 'Attarik'){  
                    echo $p->montant;
                    $attarik = $p->montant;
                 } }  ?>
            </td>
            <td><b>VISA :</b></td>
            <td><?php foreach($paiements as $p){ 
                  if($p->moyen_nom == 'VISA'){  
                    echo $p->montant;
                    $visa = $p->montant;
                 } }  ?>
            </td>
            <td><b>CHEQUE :</b></td>
            <td><?php foreach($paiements as $p){ 
                  if($p->moyen_nom == 'Cheque'){  
                    echo $p->montant;
                    $cheque = $p->montant;
                 } }  ?>
            </td>
            <td style="border: 1px solid"><b>Recette Brut :</b></td>
            <td style="border: 1px solid"><b>Montant à déduire :</b></td>
            <td style="border: 1px solid"><b>Recette Nette :</b></td>
            <tr>
            
              <td colspan="6"></td>
              <td style="border: 1px solid"><?php echo round((array_sum(array_column($volucompteur_total, 'total')) + (array_sum(array_column($venteservices, 'montant')) )),2); ?></td>
              <td style="border: 1px solid"><?php echo round((array_sum(array_column($credits, 'montant')) + array_sum(array_column($depenses, 'montant')) + $i + $attarik + $visa + $cheque),2);?></td>
              <td style="border: 1px solid"><?php echo round((array_sum(array_column($volucompteur_total, 'total')) + (array_sum(array_column($venteservices, 'montant')) )),2);?></td>
            </tr>
          </tr>
        </table>

            
</html>