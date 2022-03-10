<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>

<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste de Stock</h4>
            </div>
            <!--login form Modal -->
            
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
                                                    <th>Produit</th>
                                                    <th>Quantite</th>
                                                    <th>Date mise a jour</th>
                                                    <th>Ajouter</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($inventory){
                                                    foreach($inventory as $inventory){                
                                                ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $inventory->id_produit;?></td>
                                                    <td class="text-bold-500"><?php echo $inventory->nom_produit;?></td>
                                                    <td class="text-bold-500"><?php echo $inventory->quantity; ?></td>
                                                    <td class="text-bold-500"><?php echo $inventory->inventory_update; ?></td>
                                                    <?php if (in_groups(['admin_central','admin','manager'])) { ?>

                                                    <td>
                                                        <span class="fonticon-wrap">
                                                            <i class="far fa-edit" data-bs-toggle="modal"
                                                            data-bs-target="#inlineForm<?php echo $inventory->id_produit; ?>"></i>                                                        
                                                        </span>
                                                    </td>
                                                    <div class="modal fade text-left" id="inlineForm<?php echo $inventory->id_produit; ?>" tabindex="-1" role="dialog"
                                                        aria-labelledby="edit_station<?php echo $inventory->id_produit; ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="edit_station<?php echo $inventory->id_produit; ?>">Ajouter Quantite</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <i data-feather="x">X</i>
                                                                    </button>
                                                                </div>
                                                                <form method="post" action=<?php echo site_url('Stock/index') ?>>
                                                                    <input type="hidden" name="produit_id" value="<?php echo $inventory->id_produit;?>" class="form-control">

                                                                    <div class="modal-body">
                                                                        <label>Quantite</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="quantite" class="form-control" required>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>