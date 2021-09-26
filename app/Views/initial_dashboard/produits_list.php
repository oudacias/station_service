<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Produits</h4>
            </div>
            <div class="col-12 d-flex justify-content-left ">
                <button type="button" class="btn btn-outline-primary mx-lg-4" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    Ajouter Produit
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
                            <h4 class="modal-title" id="myModalLabel33">Nouveau Produit</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="post" action=<?php echo site_url('Produits') ?>>
                            <div class="modal-body">
                                <label>Nom</label>
                                <div class="form-group">
                                    <input type="text" name="nom" class="form-control" required>
                                </div>
                                <label>Categorie</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="categorie">
                                        <option>Carburant</option>
                                        <option>Ventes et services</option>
                                    </select>
                                </fieldset>
                                <label>Prix</label>
                                <div class="form-group">
                                    <input type="text" name="prix" class="form-control" required>
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
                                                    <th>Categorie</th>
                                                    <th>Prix</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($produits){
                                                    foreach($produits as $produit){                
                                                ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $produit['id'];?></td>
                                                    <td><?php echo $produit['nom'];?></td>
                                                    <td class="text-bold-500"><?php echo $produit['categorie'];?></td>
                                                    <td class="text-bold-500"><?php echo $produit['prix'];?></td>
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