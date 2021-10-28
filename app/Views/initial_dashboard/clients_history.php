<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Historique Client</h4>
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
                                                    <th>NOM</th>
                                                    <th>Recette</th>
                                                    <th>ID Recette</th>
                                                    <th>Montant</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($clients){
                                                    foreach($clients as $client){                
                                                ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $client->client_nom;?></td>
                                                    <td><?php echo $client->recette_date;?></td>
                                                    <td><a href="/PdfController/Rapport/<?php echo $client->recette_id; ?>"><?php echo $client->recette_id;?></td>
                                                    <td><?php echo $client->montant;?></td>
                                                    
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
    function ban(id,ban){
            var className = $("#ban_id"+id).attr("class");
            var actif = 0;
            var text = "Bloqué"            
            if(className == 'fas fa-check-circle'){
                actif = 1;
                text = "Actif"
                $("#ban_id"+id).toggleClass("fa-check-circle fa-ban");
                $("#actif"+id).toggleClass("bg-success bg-danger");
            }else if(className == 'fas fa-ban'){
                $("#ban_id"+id).toggleClass("fa-ban fa-check-circle");
                $("#actif"+id).toggleClass("bg-danger bg-success");
            }
            var client_id = id;
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('/activateClient')?>",
                dataType : "JSON",
                data : {client_id:client_id , actif:actif},
                success: function(data){
                    // $("#actif"+id).toggleClass( "bg-success", "bg-danger" );
                    // $("#actif"+id).toggleText('Initial', 'Secondary');
                    $("#actif"+id).text(text);
                }
            });
            return false;
        }
 
</script>









<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>