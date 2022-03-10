<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>

<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Historique de Stock</h4>
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