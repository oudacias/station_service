<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Reservoirs</h4>
            </div>
            <div class="col-12 d-flex justify-content-left ">
                                
                <button type="button" class="btn btn-outline-primary mx-lg-4" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    Ajouter Reservoirs
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
                            <h4 class="modal-title" id="myModalLabel33">Nouveau Reservoir</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="post" action=<?php echo site_url('Reservoirs') ?>>
                            <div class="modal-body">
                                <label>Nom</label>
                                <div class="form-group">
                                    <input type="text" name="nom" class="form-control" required>
                                </div>
                                <label>Stock Initial</label>
                                <div class="form-group">
                                    <input type="number" name="stock_initial" class="form-control">
                                </div>
                                <label>Produit</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="produit_id">
                                        <?php foreach($produits as $produit){ ?>
                                            <option value="<?php echo $produit['id'] ?>"> <?php echo $produit['nom'] ?></option>
                                        <?php } ?>
                                    </select>
                                </fieldset>
                                <label>Station</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="station_id">
                                        <?php foreach($stations as $station){ ?>
                                            <option value="<?php echo $station['id'] ?>"> <?php echo $station['nom'] ?></option>
                                        <?php } ?>
                                    </select>
                                </fieldset>
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
                                                    <th>NOM</th>
                                                    <th>Stock initial</th>
                                                    <th>Produit</th>
                                                    <th>Station</th>
                                                    <th>Actif</th>
                                                    <?php if (in_groups(['admin_central','admin','manager'])) { ?>
                                                        <th>ACTION</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($reservoirs){
                                                    foreach($reservoirs as $reservoir){                
                                                ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $reservoir->id;?></td>
                                                    <td class="text-bold-500"><?php echo $reservoir->r_nom;?></td>
                                                    <td><?php echo $reservoir->stock_initial ;?></td>
                                                    <td class="text-bold-500"><?php echo $reservoir->p_nom;?></td>
                                                    <td><?php echo $reservoir->s_nom ;?></td>
                                                    <td><?php echo $reservoir->actif ;?></td>
                                                    <?php if (in_groups(['admin_central','admin','manager'])) { ?>
                                                        <td>
                                                            <span class="fonticon-wrap">
                                                                <i class="far fa-edit" data-bs-toggle="modal"
                                                                data-bs-target="#inlineForm<?php echo $reservoir->id;?>"></i>                                                        
                                                            </span>
                                                        </td>
                                                        <div class="modal fade text-left" id="inlineForm<?php echo $reservoir->id;?>" tabindex="-1" role="dialog"
                                                            aria-labelledby="edit_station<?php echo $reservoir->id;?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="edit_station<?php echo $reservoir->id;?>">Modifier Reservoir</h4>
                                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <i data-feather="x">X</i>
                                                                        </button>
                                                                    </div>
                                                                    <form method="post" action=<?php echo site_url('ReservoirsEdit') ?>>
                                                                        <input type="hidden" name="reservoir_id" value="<?php echo $reservoir->id;?>" class="form-control" required>

                                                                        <div class="modal-body">
                                                                            <label>Nom</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name="nom" value="<?php echo $reservoir->r_nom;?>" class="form-control" required>
                                                                            </div>
                                                                            <label>Stock Initial</label>
                                                                            <div class="form-group">
                                                                                <input type="number" step="any" name="stock_initial" value="<?php echo $reservoir->stock_initial;?>" class="form-control">
                                                                            </div>
                                                                            <label>Produit</label>
                                                                            <fieldset class="form-group">
                                                                                <select class="form-select" id="basicSelect" name="produit_id">
                                                                                    <?php foreach($produits as $produit){ ?>
                                                                                        <option value="<?php echo $produit['id'] ?>" <?php if($produit['nom'] == $reservoir->p_nom){ ?> selected <?php }  ?>> <?php echo $produit['nom'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </fieldset>
                                                                            <label>Station</label>
                                                                            <fieldset class="form-group">
                                                                                <select class="form-select" id="basicSelect" name="station_id">
                                                                                    <?php foreach($stations as $station){ ?>
                                                                                        <option value="<?php echo $station['id'] ?>" <?php if($station['nom'] == $reservoir->s_nom){ ?> selected <?php }  ?>> <?php echo $station['nom'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </fieldset>
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