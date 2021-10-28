<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Clients</h4>
            </div>
            <div class="col-12 d-flex justify-content-left ">
                                
                <button type="button" class="btn btn-outline-primary mx-lg-4" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    Ajouter Client
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
                            <h4 class="modal-title" id="myModalLabel33">Nouveau Client</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="post" action=<?php echo site_url('Clients') ?>>
                            <div class="modal-body">
                                <label>Nom</label>
                                <div class="form-group">
                                    <input type="text" name="nom" class="form-control" required>
                                </div>
                                <label>Station</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="station_id">
                                        <?php foreach($stations as $station){ ?>
                                            <option value="<?php echo $station['id'] ?>"> <?php echo $station['nom'] ?></option>
                                        <?php } ?>
                                    </select>
                                </fieldset>
                                <!-- <label>Plafond</label>
                                <div class="form-group">
                                    <input type="number" name="plafond" class="form-control">
                                </div> -->
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
                                                    <th>NOM</th>
                                                    <!-- <th>PLAFOND</th>
                                                    <th>SOLDE</th>
                                                    <th>RELIQUAT</th> -->
                                                    <th>Station</th>
                                                    <th>Historique</th>
                                                    <th>ACTIF</th>
                                                    <th>DÉ / BLOQUER</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($clients){
                                                    foreach($clients as $client){                
                                                ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $client->nom;?></td>
                                                    <!-- <td><?php //echo $client['plafond'];?></td> -->
                                                    <!-- <td class="text-bold-500"><?php //echo $client['solde'];?></td> -->
                                                    <!-- <td><?php //echo $client['reliquat'];?></td> -->
                                                    <td><?php echo $client->station_nom;?></td>
                                                    <td><a href="/Configuration/Clients/Historique/<?php echo $client->client_id;?>"><i class="far fa-file-alt"></i></a></td>
                                                    <td><?php if($client->actif == 1) { ?>                                
                                                        <span id="actif<?php echo $client->id ?>" class="badge bg-success">Actif</span>
                                                        <td><i id="ban_id<?php echo $client->id ?>" onclick="ban(<?php echo $client->id?>)" class="fas fa-ban"></i></td>
                                                        <?php }else{ ?>
                                                            <span id="actif<?php echo $client->id ?>" class="badge bg-danger">Bloqué</span>
                                                            <td><i id="ban_id<?php echo $client->id ?>" onclick="ban(<?php echo $client->id?>)" class="fas fa-check-circle"></i></td>

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