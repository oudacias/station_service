<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Stations</h4>
            </div>
            <?php if (in_groups(['admin'])) { ?>
                <div class="col-12 d-flex justify-content-left ">
                                    
                    <button type="button" class="btn btn-outline-primary mx-lg-4" data-bs-toggle="modal"
                        data-bs-target="#inlineForm">
                        Ajouter Station
                    </button>
                </div>
                <br>
                <br>
                <!--login form Modal -->
                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Nouvelle Station</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form method="post" action=<?php echo site_url('Stations') ?>>
                                <div class="modal-body">
                                    <label>Nom</label>
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control" required>
                                    </div>
                                    <label>Localisation</label>
                                    <div class="form-group">
                                        <input type="text" name="localisation" class="form-control">
                                    </div>
                                    <label>Date Première recette</label>
                                    <div class="form-group">
                                        <input type="date" name="date_recette" value="<?php echo date("Y-m-d") ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="modal-footer ">
                                        <button type="button" class="btn btn-light-secondary"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Fermer</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Ajouter</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } ?>

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
                                                    <th>Nom</th>
                                                    <th>Localisation</th>
                                                    <th>Date de création</th>
                                                    <?php if (in_groups(['admin_central','admin','manager'])) { ?>
                                                        <th>Modifier</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($stations){
                                                    foreach($stations as $station){                
                                                ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $station['id'];?></td>
                                                    <td><?php echo $station['nom'];?></td>
                                                    <td class="text-bold-500"><?php echo $station['localisation'];?></td>
                                                    <td class="text-bold-500"><?php echo date('Y-m-d', strtotime($station['created_at']));?></td>
                                                    <?php if (in_groups(['admin_central','admin','manager'])) { ?>

                                                        <td>
                                                            <span class="fonticon-wrap">
                                                                <i class="far fa-edit" data-bs-toggle="modal"
                                                                data-bs-target="#inlineForm<?php echo $station['id']; ?>"></i>                                                        
                                                            </span>
                                                        </td>
                                                        <div class="modal fade text-left" id="inlineForm<?php echo $station['id']; ?>" tabindex="-1" role="dialog"
                                                            aria-labelledby="edit_station<?php echo $station['id']; ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="edit_station<?php echo $station['id']; ?>">Modifier Station</h4>
                                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <i data-feather="x">X</i>
                                                                        </button>
                                                                    </div>
                                                                    <form method="post" action=<?php echo site_url('StationsEdit') ?>>
                                                                        <input type="hidden" name="station_id" value="<?php echo $station['id'];?>" class="form-control">

                                                                        <div class="modal-body">
                                                                            <label>Nom</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name="nom" value="<?php echo $station['nom'];?>" class="form-control" required>
                                                                            </div>
                                                                            <label>Localisation</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name="localisation" value="<?php echo $station['localisation'];?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 d-flex justify-content-center">
                                                                            <div class="modal-footer ">
                                                                                <button type="button" class="btn btn-light-secondary"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Fermer</span>
                                                                                </button>
                                                                                <button type="submit" class="btn btn-primary ml-1">
                                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Modifier</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
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