<?= $this->extend('mazer/layouts/vertical-navbar') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">VolumCompteur </h4>
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
                                                    <th>Pompe</th>
                                                    <th>Produit</th>
                                                    <th>Prix</th>
                                                    <th>Compteur Initial</th>
                                                    <th>Compteur Final</th>
                                                    <th>Sortie</th>
                                                    <th>CA</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($volucompteurs){
                                                    foreach($volucompteurs as $volucompteur){                
                                                ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $volucompteur->p_nom; ?></td>
                                                    <td><?php echo $volucompteur->pr_nom; ?></td>
                                                    <td class="text-bold-500"><?php echo $volucompteur->pr_prix; ?></td>
                                                    <td><?php echo $volucompteur->compteur_initial; ?></td>
                                                    <td><?php echo $volucompteur->compteur_final; ?></td>
                                                    <td><?php echo $volucompteur->sortie;?></td>
                                                    <td><?php echo $volucompteur->ca;?></td>
                                                    <td>
                                                        <span class="col-12 d-flex justify-content-center">
                                                            <i class="fas fa-pen-square" data-bs-toggle="modal" data-bs-target="#editForm<?php echo $volucompteur->id; ?>"></i> &nbsp;&nbsp;
                                                            <div class="modal fade" id="editForm<?php echo $volucompteur->id; ?>" tabindex="-1" role="dialog" aria-labelledby="editForm<?php echo $volucompteur->id; ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editForm<?php echo $volucompteur->id; ?>">Stock Final</h5>
                                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <i data-feather="x"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" action=<?php echo site_url('Volucompteurs') ?>>
                                                                                <input type="hidden" value="<?php echo $volucompteur->id; ?>" name="id">
                                                                                <input type="hidden" value="<?php echo service('uri')->getSegment(2); ?>" name="recette_id">
                                                                                <div class="modal-body">
                                                                                    <label>Stock Final</label>
                                                                                    <div class="form-group">
                                                                                        <input type="number" name="compteur_final" value="<?php echo $volucompteur->compteur_final;?>"class="form-control" required>
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
                                    <input type="text" value="Somme :      <?php foreach ($sum_volucompteurs as $s) { echo($s->ca_sum);}?>"class="form-control" id="disabledInput" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>    
            </div>
            </div>
            <?= $this->endSection() ?>
                    