<?= $this->extend('mazer/layouts/vertical-navbar') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Paiements </h4>
            </div>
            <div class="col-12 d-flex justify-content-left ">             
                <button type="button" class="btn btn-outline-primary mx-lg-4" data-bs-toggle="modal"
                    data-bs-target="#exampleModalLong">
                    Ajouter Payement

                </button>
            </div>
            <br>
            <br>
            <!--login form Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Nouveau payement</h5>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action=<?php echo site_url('paiements') ?>>
                                <input type="hidden" value="<?php echo service('uri')->getSegment(2); ?>" name="recette_id">
                                <div class="modal-body">
                                    <label>Client</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="client_id">
                                            <?php foreach($clients as $client){ ?>
                                                <option value="<?php echo $client['id'] ?>"> <?php echo $client['nom'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </fieldset>
                                    <label>Type</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="type_paiement">
                                            <?php foreach($moyens as $moyen){ ?>
                                                <option value="<?php echo $moyen['id'] ?>"> <?php echo $moyen['nom'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </fieldset>
                                    <label>Reference</label>
                                    <div class="form-group">
                                        <input type="text" name="reference" class="form-control" required>
                                    </div>
                                    <label>Montant</label>
                                    <div class="form-group">
                                        <input type="number" name="montant" class="form-control" required>
                                    </div>
                                    <label>Commission</label>
                                    <div class="form-group">
                                        <input type="number" name="commission" class="form-control" value="0" required>
                                    </div>
                                    <label>Quantité</label>
                                    <div class="form-group">
                                        <input type="number" name="quantite" class="form-control">
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
            </div>

<div class="card-body">
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>CLIENT</th>
                                        <th>REFERENCE</th>
                                        <th>TYPE</th>
                                        <th>MONTANT</th>
                                        <th>COMMISSION</th>
                                        <th>MONTANT NET</th>
                                        <th>QUANTITÉ</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($paiements){
                                        foreach($paiements as $paiement){                
                                    ?>
                                    <tr>
                                        <td class="text-bold-500"><?php echo $paiement->nom; ?></td>
                                        <td><?php echo $paiement->p_reference; ?></td>
                                        <td class="text-bold-500"><?php echo $paiement->type_paiement; ?></td>
                                        <td><?php echo $paiement->montant; ?></td>
                                        <td><?php echo $paiement->commission; ?></td>
                                        <td><?php echo $paiement->montant_restant;?></td>
                                        <td><?php echo $paiement->quantite;?></td>
                                        <td>
                                            <span class="col-12 d-flex justify-content-center">
                                                <i class="fas fa-pen-square" data-bs-toggle="modal" data-bs-target="#editForm<?php echo $paiement->id; ?>"></i> &nbsp;&nbsp;
                                                <div class="modal fade" id="editForm<?php echo $paiement->id; ?>" tabindex="-1" role="dialog" aria-labelledby="editForm<?php echo $paiement->id; ?>" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editForm<?php echo $paiement->id; ?>">Nouveau payement</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action=<?php echo site_url('editPaiement') ?>>
                                                                    <input type="hidden" value="<?php echo $paiement->id; ?>" name="id">
                                                                    <input type="hidden" value="<?php echo service('uri')->getSegment(2); ?>" name="recette_id">
                                                                    <div class="modal-body">
                                                                        <label>Client</label>
                                                                        <fieldset class="form-group">
                                                                            <select class="form-select" id="basicSelect" name="client_id">
                                                                                <?php foreach($clients as $client){ ?>
                                                                                    <option value="<?php echo $client['id'] ?>" <?php if($client['nom'] == $paiement->nom){?> selected <?php } ?>> <?php echo $client['nom'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </fieldset>
                                                                        <label>Reference</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="reference" value="<?php echo $paiement->p_reference;  ?>"class="form-control" required>
                                                                        </div>
                                                                        <label>Type</label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="basicSelect" name="type_paiement">
                                                                                <?php foreach($moyens as $moyen){ ?>
                                                                                    <option value="<?php echo $moyen['id'] ?>" <?php if($paiement->type_paiement == $moyen['nom']){ ?> selected <?php } ?>> <?php echo $moyen['nom'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <!-- <select class="form-select" id="basicSelect" name="type_paiement">
                                                                                <option value="<?php echo $moyen['id'] ?>" <?php if($paiement->type_paiement == 'Espece'){ ?> selected <?php } ?>>Espèce</option>
                                                                                <option <?php if($paiement->type_paiement == 'Cheque'){ ?> selected <?php } ?>>Chèque</option>
                                                                                <option <?php if($paiement->type_paiement == 'CMI'){ ?> selected <?php } ?>>CMI</option>
                                                                            </select> -->
                                                                        </div>
                                                                        <label>Montant</label>
                                                                        <div class="form-group">
                                                                            <input type="number" value="<?php echo $paiement->montant; ?>" name="montant" class="form-control" required>
                                                                        </div>
                                                                        <label>Commission</label>
                                                                        <div class="form-group">
                                                                            <input type="number" value="<?php echo $paiement->commission; ?>" name="commission" class="form-control" value="0" required>
                                                                        </div>
                                                                        <label>Quantité</label>
                                                                        <div class="form-group">
                                                                            <input type="number" value="<?php echo $paiement->quantite;?>" name="quantite" class="form-control">
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
                                                </div>
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </td>
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
                <div class="col-12 d-flex justify-content-end">
                    <div class="form-group">
                        <input type="text" value="Somme :      <?php foreach ($montant as $row) { echo($row->somme);}?>"class="form-control" id="disabledInput" disabled>
                    </div>
                </div>
            </div>
        </div>
    </section>    
</div>
</div>
<?= $this->endSection() ?>
           