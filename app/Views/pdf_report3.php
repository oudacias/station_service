<!doctype html>
<html>
  <?php include 'report_style.php' ?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style type="text/css">
        table
        {
            width:  100%;
            
            /* border-collapse: collapse; */
            position: relative;
            empty-cells: show;
            border-spacing: 0px;

        }
        .table1, thead {
          border: 1px solid black;
        }

        th
        {
            text-align: center;
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
        
        background-color:#efefef;
        }
        
        h6{
          color: #DF8026;
        }
        h5{
          text-align:center;
        }
        </style>
        <?php $i = 0;
              $m = 0; 
              $ziz_card = 0;
              $visa = 0;
              $cheque = 0;
              $credit1 = 10;
              $credit2 = 10;
              $credit1_1 = 0;
              $bon_1 = 0;
              $sum_credit1 = 0;
              $sum_credit2 = 0;
              $credit_bon = 10;
              $lubrifiant = 10;
              $sum_lubrifiant = 0;
              $sum_services = 0;
              $sortie1 = 0;
              $sortie2 = 0;
              $total_Sortie = 0;
              $t = 1;
              
              $c1 = 0;
              $c2 = 0;

              $volucompteur_num = ceil(($volucompteurs_count[0]->v_count) /4);
              $vol_count=0;
              // $volucompteur_num = $volucompteurs_count[0]->v_count
        ?>
       
        
        <body style="padding:15px;font-size:8px !important">
        <b style="font-size:12px !important"> STATION SERVICE : <?php echo $station->nom ?></b>        <b style="margin-left:100px !important;font-size:12px !important">Rapport journalier du <?php echo $recettes->recette_date ?></b>

        <hr>
        <table cellspacing="0" style="width: 100%; text-align: center; font-size: 12px;border:red !important;">
          <tr>
            <td style="width: 35%;">
              <table cellspacing="0" style="width: 100%;font-size: 10px;border:1px solid black !important;">
                <thead>
                    <tr>
                        <td style="width: 25%;" rowspan="2" class="table-head">VoluCompteurs</td>
                        <td colspan="8" class="table-head" style="width: 50%;">SSP</td>
                    </tr>
                    <tr>
                    <?php 
                        $vcompteur1 = 0;
                        for($r=1;$r<=4;$r++){
                      //   foreach($volucompteurs as $volucompteur){ 
                      //     if($volucompteur->produit_nom == "SUPER SANS PLOMB"){ 
                      //     $vcompteur1 ++;
                      //  ?>
                        <th class="th-head" style="width:20%"><?php echo  $r ?></td>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                  <?php for($t;$t<=$volucompteur_num;$t++){ ?>
                    <tr style="border:1px solid black !important;">
                        <td style="text-align:left;border:1px solid black !important;">Compteur Initial</td>
                        <?php if(isset($volucompteurs)) { 
                         
                                for($vol_count=0;$vol_count<count($volucompteurs);$vol_count++){
                                  
                                  
                                  
                                  if($volucompteurs[$vol_count]->produit_nom =="SUPER SANS PLOMB"){
                                    print($c2 . "PPP");
                                    
                                    
                                    if($c1  < $t * 4){
                                      $c1++;
                                      $c2++;
                                      print($vol_count);
                                      // print($c2);
                                      ?><td style="border:1px solid black !important;"><?php echo round($volucompteurs[$vol_count]->compteur_initial,2);  ?></td><?php
                                      // print($volucompteurs[$vol_count]->compteur_initial);
                                    }
                                    
                                  }
                                  
                                }
                                print("LLL")
                                
                                //for($vol_count;$vol_count<count($volucompteurs);$vol_count++){
                                  // print_r($t);
                                  // if($volucompteurs[$vol_count]->produit_nom =="SUPER SANS PLOMB"){
                                  //   $c1++;
                                  //   print_r($t);
                                    
                                    
                                       ?>

                                    <?php }//}//}
                                    
                                    // if($c1  <= $t * 4){ ?>
                                      <?php //}
                                  
                                  // print($volucompteurs[$vol_count]->prix);
                               // }}}
                                
                        //         foreach($volucompteurs as $volucompteur){ 
                        //             if($volucompteur->produit_nom == "SUPER SANS PLOMB"){ 
                        //               $c1++;
                        //               if($c1  <= $t * 4){
                        //             ?>
                                       <!--<td style="border:1px solid black !important;"><?php //echo round($volucompteur->compteur_initial,2);  ?></td>
                        //               <?php //}} ?>-->
                         <?php //} } } ?>
                        <?php for($c=0; $c<=2;$c++){  ?>
                          <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                        <?php } ?>

                    </tr>
                    <tr style="border:1px solid black !important;">
                        <td style="text-align:left;border:1px solid black !important;">Compteur Final</td>
                        <?php if(isset($volucompteurs)) { 
                          $c= 0;
                                foreach($volucompteurs as $volucompteur){ 
                                    if($volucompteur->produit_nom == "SUPER SANS PLOMB"){ 
                                      $c++;
                                    ?>
                                        <td style="border:1px solid black !important;"><?php echo round($volucompteur->compteur_final,2);  ?></td>
                        <?php } } } ?>
                        <?php for($c; $c<=2;$c++){  ?>
                          <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td style="text-align:left;border:1px solid black !important;">Sorties</td>
                        <?php if(isset($volucompteurs)) { 
                          $c=0;
                                foreach($volucompteurs as $volucompteur){ 
                                    if($volucompteur->produit_nom == "SUPER SANS PLOMB"){ 
                                      $c++;
                                      $sortie1 += round(($volucompteur->compteur_final - $volucompteur->compteur_initial),2)

                                  ?>
                                        <td style="border:1px solid black !important;"><?php echo round(($volucompteur->compteur_final - $volucompteur->compteur_initial),2);  ?></td>
                        <?php } } } ?>
                        <?php for($c; $c<=2;$c++){  ?>
                          <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td style="text-align:left;border:1px solid black !important;">Regularisation</td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;border:1px solid black !important;">Ventes</td>
                        <?php if(isset($volucompteur_total)) { 
                                foreach($volucompteur_total as $total){ 
                                  if($total->produit_nom == "SUPER SANS PLOMB"){ ?>
                                  <td colspan="<?php echo $vcompteur1 ?>" style="border:1px solid black !important;"><?php echo $sortie1 ?></td>
                        <?php }}} ?>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;border:1px solid black !important;">Prix Unitaire</td>
                        <?php if(isset($volucompteurs)) { 
                                foreach($volucompteurs as $volucompteur){ 
                                    if($volucompteur->produit_nom == "SUPER SANS PLOMB"){ ?>
                                        <td colspan="<?php echo $vcompteur1 ?>" style="border:1px solid black !important;"><?php echo ($volucompteur->prix_unitaire); break;  ?></td>
                        <?php } } } ?>
                    </tr>
                    <tr>
                        <td style="text-align:left;border:1px solid black !important;">Montant produit</td>
                        <?php if(isset($volucompteur_total)) { 
                                foreach($volucompteur_total as $total){ 
                                    if($total->produit_nom == "SUPER SANS PLOMB"){ 
                                        $total_Sortie += round(($sortie1 * $volucompteur->prix_unitaire),2); ?>
                                        <td colspan="<?php echo $vcompteur1 ?>" class="table-active" style="border:1px solid black !important;"><?php echo round(($sortie1 * $volucompteur->prix_unitaire),2);  ?></td>
                        <?php } } } ?>
                    </tr>
                  </tr>
                  
                  

                </tbody>
              </table>
            </td>
            <td style="width: 60px;">
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10px;">
                <thead>
                    <tr>
                        <td class="table-head" >Melange</td>
                    </tr>
                    <tr>
                        <th class="th-head">1</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if(isset($volucompteurs)) { 
                                foreach($volucompteurs as $volucompteur){ 
                                    if($volucompteur->produit_nom == "Melange"){ 
                                    ?>
                                        <td style="border:1px solid black !important;"><?php echo $volucompteur->compteur_initial;  ?></td>
                        <?php } } } ?>
                    </tr>
                    <tr>
                        <?php if(isset($volucompteurs)) { 
                                foreach($volucompteurs as $volucompteur){ 
                                    if($volucompteur->produit_nom == "Melange"){ ?>
                                        <td style="border:1px solid black !important;"><?php echo $volucompteur->compteur_final;  ?></td>
                        <?php } } } ?>
                    </tr>
                    <tr>
                        <?php if(isset($volucompteurs)) { 
                                foreach($volucompteurs as $volucompteur){ 
                                    if($volucompteur->produit_nom == "Melange"){ ?>
                                        <td style="border:1px solid black !important;"><?php echo round(($volucompteur->compteur_final - $volucompteur->compteur_initial),2);  ?></td>
                        <?php } } } ?>
                    </tr>
                    <tr>
                        <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                    </tr>
                    <tr>
                      <?php if(isset($volucompteur_total)) { 
                              foreach($volucompteur_total as $total){ 
                                if($total->produit_nom == "Melange"){ ?>
                                <td style="border:1px solid black !important;"><?php echo(round($total->sortie_total,2)) ?></td>
                      <?php }}} ?>
                        
                    </tr>
                    <tr>
                      <?php if(isset($volucompteurs)) { 
                              foreach($volucompteurs as $volucompteur){ 
                                  if($volucompteur->produit_nom == "Melange"){ ?>
                                      <td style="border:1px solid black !important;"><?php echo ($volucompteur->prix_unitaire);  ?></td>
                      <?php } } } ?>
                    </tr>
                    <tr>
                      <?php if(isset($volucompteur_total)) { 
                              foreach($volucompteur_total as $total){ 
                                  if($total->produit_nom == "Melange"){ 
                                        $total_Sortie += round(($total->sortie_total * $total->prix_unitaire),2); ?>
                                      <td class="table-active" style="border:1px solid black !important;"><?php echo round(($total->sortie_total * $total->prix_unitaire),2) ?></td>
                      <?php } } } ?>
                    </tr>
                  </tr>
                 
                  

                </tbody>
              </table>
            </td>
            <td style="width: 25%;">
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10px">
                <thead>
                    <tr>
                        <td colspan="8" class="table-head">Gasoil</td>
                    </tr>
                    <tr>
                    <?php 
                        $vcompteur2 = 0;
                        foreach($volucompteurs as $volucompteur){ 
                          if($volucompteur->produit_nom == "Gasoil"){ 
                          $vcompteur2 ++;
                       ?>
                        <th class="th-head" style="width:20%"><?php echo $vcompteur2 ?></td>
                        <?php }} ?>
                       
                    </tr>
                </thead>
                <tbody>
                  <tr style="border:1px solid black !important;">
                        <?php if(isset($volucompteurs)) { 
                          $c=0;
                                foreach($volucompteurs as $volucompteur){ 
                                    if($volucompteur->produit_nom == "Gasoil"){ 
                                      $c++;
                                    ?>
                                        <td style="border:1px solid black !important;"><?php echo round($volucompteur->compteur_initial,2);  ?></td>
                        <?php } } } ?>
                        <?php for($c; $c<=4;$c++){  ?>
                          <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                        <?php } ?>
                    </tr>
                    <tr style="border:1px solid black !important;">
                        <?php if(isset($volucompteurs)) { 
                          $c=0;
                                foreach($volucompteurs as $volucompteur){ 
                                    if($volucompteur->produit_nom == "Gasoil"){ 
                                      $c++; 
                                ?>
                                        <td style="border:1px solid black !important;"><?php echo round($volucompteur->compteur_final,2);  ?></td>
                        <?php } } } ?>
                        <?php for($c; $c<=4;$c++){  ?>
                          <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                        <?php } ?>
                    </tr>
                    <tr style="border:1px solid black !important;">
                        <?php if(isset($volucompteurs)) {
                          $c=0; 
                                foreach($volucompteurs as $volucompteur){ 
                                    if($volucompteur->produit_nom == "Gasoil"){ 
                                      $c++ ;
                                      $sortie2 += round(($volucompteur->compteur_final - $volucompteur->compteur_initial),2)

                                ?>
                                        <td style="border:1px solid black !important;"><?php echo round(($volucompteur->compteur_final - $volucompteur->compteur_initial),2);  ?></td>
                        <?php } } } ?>
                        <?php for($c; $c<=4;$c++){  ?>
                          <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                        <td style="border:1px solid black !important;"></td>
                    </tr>
                    <tr>
                      <?php if(isset($volucompteur_total)) { 
                              foreach($volucompteur_total as $total){ 
                                if($total->produit_nom == "Gasoil"){ ?>
                                <td colspan="<?php echo $vcompteur2 ?>" style="border:1px solid black !important;"><?php echo($sortie2) ?></td>
                      <?php }}} ?>
                        
                    </tr>
                    <tr>
                      <?php if(isset($volucompteurs)) { 
                              foreach($volucompteurs as $volucompteur){ 
                                  if($volucompteur->produit_nom == "Gasoil"){ ?>
                                      <td colspan="<?php echo $vcompteur2 ?>" style="border:1px solid black !important;"><?php echo ($volucompteur->prix_unitaire); break; ?></td>
                      <?php } } } ?>
                    </tr>
                    <tr>
                      <?php if(isset($volucompteur_total)) { 
                              foreach($volucompteur_total as $total){ 
                                  if($total->produit_nom == "Gasoil"){ 
                                      $total_Sortie += round(($total->sortie_total * $total->prix_unitaire),2) ?>
                                      <td colspan="<?php echo $vcompteur2 ?>" class="table-active" style="border:1px solid black !important;"><?php echo (round($sortie2 * $volucompteur->prix_unitaire,2));  ?></td>
                      <?php } } } ?>
                    </tr>
                  </tr>
                                   

                </tbody>
              </table>
            </td>
            <td style="width: 6%;">
              <table class="table-active" cellspacing="0" style="width: 100%; text-align: left; font-size: 12px;height:20px!important;"  style="border-left:1px solid black !important;">
                <thead>
                    <tr>
                        <td rowspan="8" style="vertical-align: middle;"><b>Total </br> CARBURANT<b></td>
                    </tr>
                    <tr>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                    </tr>
                    <tr>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>                    
                    </tr>
                    <tr>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                    </tr>
                    <tr>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                    </tr>
                    <tr>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                    </tr>
                    <tr>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                    </tr>
                    <tr>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                    </tr>
                    <tr>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                      <td><br style="visibility:hidden"></td>
                    </tr>
                    
                    
                    <tr>
                      <td colspan="3"><?php echo round($total_Sortie,2); ?></td>
                    </tr>
                    
                </thead>
              </table>
              
          </tr> 
        </table>
        <!-------------------------SECOND TABLE----------------------------------------------------- -->
        <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10px;">
          <tr>
            <td style="width: 20%;">
              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 9pt;">
                <thead>
                  <tr>
                    <th scope="col" style="border:1px solid black !important;">CITERNES</th>
                    <th scope="col" style="border:1px solid black !important;">SSP</th>
                    <th scope="col" style="border:1px solid black !important;">GASOIL 10</th>
                  </tr>
                </thead>
                <tbody>
                  <tr style="border:1px solid black !important;">
                    <td style="width:200px; text-align: left;border:1px solid black !important;">Stock Initial (jaugeage)</td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_sp->stock_initial,2);  ?></td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_gasoil->stock_initial,2);  ?></td>
                  </tr>
                  <tr style="border:1px solid black !important;">
                    <td style="width:200px; text-align: left;border:1px solid black !important">Entrées</td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_sp->entree,2);  ?></td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_gasoil->entree,2);  ?></td>
                  </tr>
                  <tr style="border:1px solid black !important;">
                    <td style="width:200px; text-align: left;border:1px solid black !important">Sorties</td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_sp->sortie,2); ?></td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_gasoil->sortie,2); ?></td>
                  </tr>
                  <tr style="border:1px solid black !important;">
                    <td style="width:200px; text-align: left;border:1px solid black !important">Stock Comptable</td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_sp->stock_comptable,2);  ?></td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_gasoil->stock_comptable,2);  ?></td>
                  </tr>
                  <tr style="border:1px solid black !important;">
                    <td style="width:200px; text-align: left;border:1px solid black !important">Stock Physique (Jauge)</td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_sp->stock_physique,2);  ?></td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_gasoil->stock_physique,2);  ?></td>
                  </tr>
                  <tr style="border:1px solid black !important;">
                    <td style="width:200px; text-align: left;border:1px solid black !important">Prix Unitaire</td>
                    <td style="border:1px solid black !important;"><?php echo ($stock_sp->prix_achat);  ?></td>
                    <td style="border:1px solid black !important;"><?php echo ($stock_gasoil->prix_achat);  ?></td>
                  </tr>
                  <tr style="border:1px solid black !important;">
                    <td style="width:200px; text-align: left;border:1px solid black !important">Valeurs</td>
                    <td style="border:1px solid black !important;"><?php  echo round(($stock_sp->stock_physique * $stock_sp->prix_achat),2) ?></td>
                    <td style="border:1px solid black !important;"><?php  echo round(($stock_gasoil->stock_physique * $stock_gasoil->prix_achat),2) ?></td>
                  </tr>
                  <tr style="border:1px solid black !important;">
                    <td style="width:200px; text-align: left;border:1px solid black !important">Manquant ou Excédent</td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_sp->manquant_excedent,2);  ?></td>
                    <td style="border:1px solid black !important;"><?php echo round($stock_gasoil->manquant_excedent,2);  ?></td>
                  </tr>
                    
                  </tr>
                </tbody>
              </table>
            </td>
            <td style="width: 20%;">
              <table></table>
            </td>
            
            <td style="width: 10%;top:0px !important; left:100px!important">

              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 12px">
                <thead>
                  <tr style="border:1px solid black !important;">
                    <th scope="col" style="border:1px solid black !important;">STOCKS</th>
                    <th scope="col" style="border:1px solid black !important;">VALEURS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="border:1px solid black !important;">Carburant</td>
                    <td style="border:1px solid black !important;"><?php echo (($stock_sp->stock_physique * $stock_sp->prix_achat) + ($stock_gasoil->stock_physique * $stock_gasoil->prix_achat)) ?></td>
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Lubrifiants</td>
                    <td style="border:1px solid black !important;"></td>
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Filtres</td>
                    <td style="border:1px solid black !important;"></td>
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Gaz</td>
                    <td style="border:1px solid black !important;"></td>
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">ZizCard</td>
                    <td style="border:1px solid black !important;"></td>
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Total</td>
                    <td style="border:1px solid black !important;"></td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td style="width: 15%;">
              <table><b> LE GERANT</b></table>
            </td>
          </tr>
        </table>
        <!-------------------------THIRD TABLE----------------------------------------------------- -->
        <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10px;margin-top:20px;">
          <tr>
            <td style="width: 25%;">

              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">

                <thead>
                  <tr>
                    <th scope="col" colspan="4">LUBRIFIANT</th>
                  </tr>
                  <tr style="border:1px solid black !important;">
                    <td style="border:1px solid black !important;"><b>Designation</b></td>
                    <td style="border:1px solid black !important;"><b>Qte</b></td>
                    <td style="border:1px solid black !important;"><b>P.U</b></td>
                    <td style="border:1px solid black !important;"><b>Montant</b></td>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(isset($venteservices)) { 
                      foreach($venteservices as $service){ 
                        if($service->categorie == 'Lubrifiant'){
                          $lubrifiant--;
                          $sum_lubrifiant += $service->montant; ?>
                    <tr>
                      <td style="border:1px solid black !important;"><?php echo $service->produit_nom ; ?></td>
                      <td style="border:1px solid black !important;"><?php echo $service->qte ; ?></td>
                      <td style="border:1px solid black !important;"><?php echo $service->prix ; ?></td>
                      <td style="border:1px solid black !important;"><?php echo $service->montant ; ?></td>

                      
                    </tr>
                    
                    <?php } } }?>
                  <?php for($j=0; $j< $lubrifiant;$j++){?>
                    <tr>
                      <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                      <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                      <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                      <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>

                      
                    </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="3" style="border:1px solid black !important;">TOTAL</td>
                    <td style="border:1px solid black !important;" class="table-active"><?php echo (round($sum_lubrifiant,2));?></td>
                  </tr>
                  

                </tbody>
              </table>
            </td>
            <td style="width: 25%;">

              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">

                <thead>
                  <tr>
                    <th scope="col" colspan="2">SERVICES</th>
                  </tr>
                  <tr style="border:1px solid black !important;">
                    <td style="border:1px solid black !important;"><b>Services</b></td>
                    <td style="border:1px solid black !important;"><b>Montant</b></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="border:1px solid black !important;">Lavage</td>
                    <td style="border:1px solid black !important;">
                      <?php foreach($venteservices as $ventes){
                        if($ventes->produit_nom == 'Lavage'){
                          echo $ventes->montant;
                          $sum_services += $ventes->montant;
                      } } ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Graissage</td>
                    <td style="border:1px solid black !important;">
                      <?php foreach($venteservices as $ventes){
                        if($ventes->produit_nom == 'Graissage'){
                          echo $ventes->montant;
                          $sum_services += $ventes->montant;
                      } } ?>
                    </td>                  
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Vidange</td>
                    <td style="border:1px solid black !important;">
                      <?php foreach($venteservices as $ventes){
                        if($ventes->produit_nom == 'Vidange'){
                          echo $ventes->montant;
                          $sum_services += $ventes->montant;
                      } } ?>
                    </td>                  
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Bouteille Gaz</td>
                    <td style="border:1px solid black !important;">
                      <?php foreach($venteservices as $ventes){
                        if($ventes->produit_nom == 'Bouteille Gaz'){
                          echo $ventes->montant;
                          $sum_services += $ventes->montant;
                      } } ?>
                    </td>                  
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Filtres</td>
                    <td style="border:1px solid black !important;">
                      <?php foreach($venteservices as $ventes){
                        if($ventes->produit_nom == 'Filtres'){
                          echo $ventes->montant;
                          $sum_services += $ventes->montant;
                      } } ?>
                    </td>                  
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Pesage</td>
                    <td style="border:1px solid black !important;">
                      <?php foreach($venteservices as $ventes){
                        if($ventes->produit_nom == 'Pesage'){
                          echo $ventes->montant;
                          $sum_services += $ventes->montant;
                      } } ?>
                    </td>                  
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;">Divers</td>
                    <td style="border:1px solid black !important;">
                      <?php foreach($venteservices as $ventes){
                        if($ventes->produit_nom == 'Divers'){
                          echo $ventes->montant;
                          $sum_services += $ventes->montant;
                      } } ?>
                    </td>                  
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                    <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                    <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>

                  </tr>
                  <tr>
                    <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                    <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>

                  </tr>
                  <tr>
                    <td  style="border:1px solid black !important;">Total</td>
                    <td style="border:1px solid black !important;" class="table-active"><?php echo round($sum_services,2);?></td>
                  </tr>
                  

                </tbody>
              </table>
            </td>
            <td style="width: 50%;">

              <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">
                <tr>
                  <th scope="col" colspan="2"  style="border:1px solid black !important;">CREDITS</td>
                </tr>
                <tr>
                  <td style="width: 50%;">
                    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">  
                      <thead>
                        <tr>
                          <td style="border:1px solid black !important;"><b>Client</b></td>
                          <td style="border:1px solid black !important;"><b>Montant</b></td>
                          <td style="border:1px solid black !important;"><b>Cumul Mensuel</b></td>
                        </tr>
                      </thead>
                    <tbody>
                      <?php 
                          for($credit = 0; $credit < count($credits); $credit++){ ?>
                            <?php $credit1 --;
                                  $credit1_1 ++;
                                  $sum_credit1 += $credits[$credit]->montant;
                            ?>
                            <?php if($credit1 >= 0){ ?>
                        <tr>
                          <td style="border:1px solid black !important;"><?php echo $credits[$credit]->client_nom ; ?></td>
                          <td style="border:1px solid black !important;"><?php echo round($credits[$credit]->montant,2) ; ?></td>
                          <td style="border:1px solid black !important;"><?php echo round($credits[$credit]->cumul,2); ?></td>

                        </tr>
                        
                        <?php }else{ break ;} } 
                          if($credit1 > 0){
                            for($paiement = 0; $paiement < count($paiements); $paiement++){
                              $bon_1 ++ ;
                                if(substr( $paiements[$paiement]->moyen_nom, 0, 3 ) === "Bon")  {
                                  $credit1-- ;
                                  
                                    if($credit1 >= 0){
                                      $i += $paiements[$paiement]->montant ;?>
                          <tr>
                            <td style="border:1px solid black !important;"><?php echo $paiements[$paiement]->moyen_nom . $bon_1 ; ?></td>
                            <td style="border:1px solid black !important;"><?php echo round($paiements[$paiement]->montant,2) ; ?></td>
                            <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>

                          </tr>
                        <?php } } } } ?>
                        <?php 
                            for ($j = 0 ; $j<$credit1 ; $j++){ ?>
                          <tr>
                            <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                            <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                            <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                          </tr>
                        <?php } ?>
                      <tr>
                        <td style="border:1px solid black !important;">TOTAL</td>
                          <td class="table-active" style="border:1px solid black !important;"><?php echo round($sum_credit1 + $i,2);?></td>
                          <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                      </tr>
                      <?php  ?>
                    </tbody>
                  </td>
                </tr>
              </table>
              <td style="width: 50%;">
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">
                  <tr>
                    <td style="width: 50%;">
                      <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt;">  
                      <thead>
                      <tr>
                        <td style="border:1px solid black !important;"><b>Client</b></td>
                        <td style="border:1px solid black !important;"><b>Montant</b></td>
                        <td style="border:1px solid black !important;"><b>Cumul Mensuel</b></td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        for ($j = $credit1_1 + 1 ; $credit < count($credits); $credit++){ ?>
                          <?php $credit2 --; 
                                $sum_credit2 += $credits[$credit]->montant;
                          ?>
                          <tr>
                            <td style="border:1px solid black !important;"><?php echo $credits[$credit]->client_nom ; ?></td>
                            <td style="border:1px solid black !important;"><?php echo round($credits[$credit]->montant,2) ; ?></td>
                            <td style="border:1px solid black !important;"><?php echo round($credits[$credit]->cumul,2); ?></td>

                            
                          </tr>
                        <?php } ?>

                        <?php for($paiement = $bon_1 +1; $paiement < count($paiements); $paiement++){ ?>
                           <?php
                                if(substr( $paiements[$paiement]->moyen_nom, 0, 3 ) === "Bon")  {
                                  $credit2-- ;                                  
                                  $i += $paiements[$paiement]->montant ;
                        ?>
                        <tr>
                            <td style="border:1px solid black !important;"><?php echo $paiements[$paiement]->moyen_nom ; ?></td>
                            <td style="border:1px solid black !important;"><?php echo round($paiements[$paiement]->montant,2) ; ?></td>
                            <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>

                          </tr>
                        <?php } }  ?>

                        <?php for($j = 0; $j < $credit2; $j++){?>
                          <tr>
                            <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                            <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                            <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                          </tr>
                          <?php } ?>
                      <tr>
                        <td style="border:1px solid black !important;">TOTAL</td>
                        <td class="table-active" style="border:1px solid black !important;"><?php echo $sum_credit2 + $m;?></td>
                          <td style="border:1px solid black !important;"><br style="visibility:hidden"></td>
                      </tr>
                      <?php  ?>
                    </tbody>
                  </tr>
                </table>
              </td>
            </td>
          </table>       
        </table>
      </td>     
    </tr>
  </table>
  <table>
    <tr>
      <td style="margin-top:20px;width: 18%;">
        <table style="margin-top:20px;width: 100%; text-align: center; font-size: 10px;">
          <tr style="border: 1px solid">
            <td style="border: 1px solid"><b>Ziz Card</b></td>
            <td style="border:1px solid black !important;"><?php foreach($paiements as $p){ 
                  if($p->moyen_nom == 'Ziz Card'){  
                    echo round($p->montant,2);
                    $ziz_card = $p->montant;
                  } }  ?>
            </td>
          </tr>
          <tr>
            <td style="border:1px solid black !important;"><b>VISA</b></td>
            <td style="border:1px solid black !important;"><?php foreach($paiements as $p){ 
                  if($p->moyen_nom == 'VISA'){  
                    echo round($p->montant,2);
                    $visa = $p->montant;
                  } }  ?>
            </td>
          </tr>
          <tr>
            <td style="border:1px solid black !important;"><b>Cheques</b></td>
            <td style="border:1px solid black !important;"><?php foreach($paiements as $p){ 
                  if($p->moyen_nom == 'Cheque'){  
                    echo round($p->montant,2);
                    $cheque = $p->montant;
                  } }  ?>
            </td>
          </tr>
        </table>
      </td>
      <td style="margin-top:20px;width: 7%;"></td>
      <td>
        <table style="margin-top:20px; text-align: center; font-size: 10px;width:108%">
          <tr>
            <td style="border: 1px solid"><b>Recette Brute</b></td>
            <?php $recette_brutte = round((array_sum(array_column($volucompteur_total, 'total')) + (array_sum(array_column($venteservices, 'montant')) )),2) ?>
            <td style="border:1px solid black; !important"><?php echo round($recette_brutte,2); ?></td>
          </tr>
          <tr>
            <td style="border: 1px solid"><b>Total credits</b></td>
            <?php $total_credit = round( $sum_credit1 + $i + $sum_credit2 + $m,2) ?>
            <td style="border:1px solid black !important;"><?php echo round($total_credit,2) ?></td>
          </tr>
          <tr style="border:1px solid !important">
            <td style="border:1px solid !important;border-bottom: 1px solid #494949"><b>Recette Nette</b></td>
            <?php $recette_nette = $recette_brutte - $total_credit; ?>
            <td style="border:1px solid black !important;"><?php echo round($recette_nette,2) ?></td>
          </tr>
          <tr>
            <td><br style="visibility:hidden"></td>
            <td><br style="visibility:hidden"></td>
          </tr>
          <tr>
              <td style="border:1px solid black !important;"><b>Recette a verser</b></td>
              <?php $rectte_verse = $recette_nette - $ziz_card - $visa - $cheque ?>
              <td style="border:1px solid black !important;"><?php echo round($rectte_verse,2) ?></td>
          </tr>
        </table>
      </td>
      <td style="margin-top:20px;width: 11%;"></td>
      <td>
      <td>
        <table style="margin-top:20px;width: 100%; text-align: center; font-size: 10px">
          <tr style="border:1px solid black !important">
            <td style="border:1px solid black !important"><b>Reglement credits</b></td>
            <td style="border:1px solid black !important;"><?php echo round($reglements->montant,2); ?></td>
          </tr>
          <tr>
            <td><br style="visibility:hidden"></td>
            <td><br style="visibility:hidden"></td>
          </tr>
          <tr>
            <td style="border: 1px solid black"><b>Cumul mensuel des ventes CA</b></td>
            <td style="border:1px solid black !important;"><?php echo round($volucompteur_total_mensuel,2); ?></td>
          </tr>
          <tr>
            <td style="border: 1px solid"><b>Cumul mensuel des credits</b></td>
            <td style="border:1px solid black !important;"><?php echo round($credit_mensuel->total,2) ?></td>
          </tr>
          <tr>
            <td style="border: 1px solid"><b>Cumul mensuel des recettes verses</b></td>
            <td style="border:1px solid black !important;"><?php echo round($volucompteur_total_mensuel + $ventes_mensuel->total - $credit_mensuel->total - $paiement_mensuel->total  ,2); ?></td>
          </tr>
          
        </table>          
      </td>
    </tr>
  </table>

            
</html>