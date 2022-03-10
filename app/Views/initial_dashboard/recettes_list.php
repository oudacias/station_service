<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Recettes</h4>
            </div>
            
            <div class="card-body">
                <section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Station</th>
                                                    <!-- <th>Recette Brute</th>
                                                    <th>Total credits</th>
                                                    <th>Recette NET</th> -->
                                                    <th>Date de Recette</th>
                                                    <th>Modifier</th>
                                                    <th>Valider</th>
                                                    <th>Voir</th>
                                                    <th>Date Saisie</th>
                                                    <th>Date Validation</th>
                                                    <th>Rapport</th>
                                                    <th>Documents</th>
                                                    <!-- <th>Rapport 2</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($recettes){
                                                    foreach($recettes as $recettes){                
                                                ?>
                                                <tr>
                                                    <td><?php echo $recettes->station_nom;?></td>
                                                    <!-- <td class="text-bold-500"><?php //echo round($recettes->recette_brutte,2);?></td>
                                                    <td class="text-bold-500"><?php //echo round($recettes->montant_a_deduire,2);?></td>
                                                    <td class="text-bold-500"><?php //echo round(($recettes->recette_brutte - $recettes->montant_a_deduire),2);?></td> -->
                                                    <td class="text-bold-500"><?php echo $recettes->recette_date;?></td>
                                                    <?php if($recettes->valide == False) { ?>
                                                        <td><a href="/Recettes/editRecette/<?php echo $recettes->recette_id; ?>"><i class="fas fa-pen-square"></a></td>
                                                        <td><a href="/Recettes/validateRecette/<?php echo $recettes->recette_id; ?>"><i class="far fa-check-square"></i></a></td>
                                                    <?php }else{ ?>
                                                        <td><i class="fas fa-ban"></i></a></td>
                                                        <td><i class="fas fa-ban"></i></a></td>
                                                    <?php } ?>
                                                    
                                                    <td><a href="/Recettes/voirRecette/<?php echo $recettes->recette_id; ?>"><i class="far fa-eye"></i></a></td>
                                                    <td><?php echo $recettes->created_at; ?></td>
                                                    <td><?php echo $recettes->validation_date; ?></td>
                                                    <td class="text-bold-500"><a href="/PdfController/Rapport/<?php echo $recettes->recette_id ?>">Rapport</td>
                                                    <!-- <td class="text-bold-500"><a href="/PdfController/Rapport/<?php //echo $recettes->recette_id ?>">Rapport</td> -->
                                                    <td><i class="fas fa-download"></i></td>
                                                </tr>
                                                <?php 
                                                    } 
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
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