<?= $this->extend('mazer/layouts/vertical-navbar1') ?>

<?= $this->section('content') ?>

<div class="page-heading" style="text-align: center;">
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nombre de Stations</h4>
                    </div>
                    <div class="card-body">
                        <?php echo($stations->c); ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nombre de Clients</h4>
                    </div>
                    <div class="card-body">
                        <?php echo($clients->c); ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Prix Gasoil</h4>
                    </div>
                    <div class="card-body">
                    <?php echo($prix_gasoil->prix) . 'DH'; ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Prix Super Sans Blomb</h4>
                    </div>
                    <div class="card-body">
                    <?php echo($prix_sp->prix) . 'DH'; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>