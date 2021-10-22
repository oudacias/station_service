<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Utilisateurs</h4>
            </div>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <div class="col-12 d-flex justify-content-left ">

                <button type="button" class="btn btn-outline-primary mx-lg-4" data-bs-toggle="modal" data-bs-target="#inlineForm">
                    Creer Un Utilisateur
                </button>
            </div>
            <br>
            <br>

            <!--login form Modal -->
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <?= $this->include('components/addnewUser.php')?>
            </div>
            <div class="card-body">
                <section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <!-- table hover -->
                                    <?= $this->include('components/loadList'); ?>
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