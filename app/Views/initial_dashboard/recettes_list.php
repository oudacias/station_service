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
                                                    <th>ID</th>
                                                    <th>Station</th>
                                                    <th>Recette Brut</th>
                                                    <th>Montant a déduire</th>
                                                    <th>Recette NET</th>
                                                    <th>Date de Recette</th>
                                                    <th>Modifier</th>
                                                    <th>Rapport</th>
                                                    <!-- <th>Rapport 2</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($recettes){
                                                    foreach($recettes as $recettes){                
                                                ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $recettes->recette_id;?></td>
                                                    <td><?php echo $recettes->station_nom;?></td>
                                                    <td class="text-bold-500"><?php echo round($recettes->recette_brutte,2);?></td>
                                                    <td class="text-bold-500"><?php echo round($recettes->montant_a_deduire,2);?></td>
                                                    <td class="text-bold-500"><?php echo round(($recettes->recette_brutte - $recettes->montant_a_deduire),2);?></td>
                                                    <td class="text-bold-500"><?php echo $recettes->recette_date;?></td>
                                                    <td><a href="/Recettes/editRecette/<?php echo $recettes->recette_id; ?>"><i class="fas fa-pen-square"></a></td>
                                                    <td class="text-bold-500"><a href="/PdfController/Rapport/<?php echo $recettes->recette_id ?>">Rapport</td>
                                                    <!-- <td class="text-bold-500"><a href="/PdfController/Rapport/<?php //echo $recettes->recette_id ?>">Rapport</td> -->
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