<?= $this->extend('mazer/layouts/vertical-navbar') ?>

<?= $this->section('content') ?>
<div class="page-heading">
<section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <p>Liste des Volucompteurs </p>
                    </div>
                    <div class="card-content">
                        
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Produit</th>
                                        <th>Prix Unitaire</th>
                                        <th>Valeur initiale</th>
                                        <th>Valeur finale</th>
                                        <th>Dernière MAJ</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($volucompteurs)) : ?>
                                        <?php foreach ($volucompteurs as $volucompteur) :?>
                                            <?php if(isset($volucompteur["id"], $volucompteur["produit"], $volucompteur["prix_unitaire"], $volucompteur["valeur_initiale"], $volucompteur["valeur_finale"], $volucompteur["created_date"], $volucompteur["updated_date"])) : ?>
                                                <tr>
                                                    <td class="text-bold-500"><?= $volucompteur["id"]?></td>
                                                    <td class="text-bold-500"><?= $volucompteur["produit"]?></td>
                                                    <td contenteditable="true"><?= $volucompteur["prix_unitaire"]?></td>
                                                    <td contenteditable="true"><?= $volucompteur["valeur_initiale"]?></td>
                                                    <td contenteditable="true"><?= $volucompteur["valeur_finale"]?></td>
                                                    <td ><?= $volucompteur["updated_date"]?></td>
                                                    <td></td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>

                                    <!-- invisible row border -->
                                    <tr>
                                        <td></td>
                                        <td class="invisible">  Invisible Cell </td>
                                    </tr>
                                <!--
                                    <tr>
                                        <td class="text-bold-500">Michael Right</td>
                                        <td>$15/hr</td>
                                        <td class="text-bold-500">UI/UX</td>
                                        <td>Remote</td>
                                        <td>Austin,Taxes</td>
                                        <td><a href="#"><i
                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="mail"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Morgan Vanblum</td>
                                        <td>$13/hr</td>
                                        <td class="text-bold-500">Graphic concepts</td>
                                        <td>Remote</td>
                                        <td>Shangai,China</td>
                                        <td><a href="#"><i
                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="mail"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Tiffani Blogz</td>
                                        <td>$15/hr</td>
                                        <td class="text-bold-500">Animation</td>
                                        <td>Remote</td>
                                        <td>Austin,Texas</td>
                                        <td><a href="#"><i
                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="mail"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Ashley Boul</td>
                                        <td>$15/hr</td>
                                        <td class="text-bold-500">Animation</td>
                                        <td>Remote</td>
                                        <td>Austin,Texas</td>
                                        <td><a href="#"><i
                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="mail"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Mikkey Mice</td>
                                        <td>$15/hr</td>
                                        <td class="text-bold-500">Animation</td>
                                        <td>Remote</td>
                                        <td>Austin,Texas</td>
                                        <td><a href="#"><i
                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="mail"></i></a></td>
                                    </tr>
                                -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-end">
                <a href="/volucompteurs"><button class="btn btn-danger me-1 mb-1">Annuler changements</button></a>                
                <button class="btn btn-primary me-1 mb-1">Affecter valeurs initiales</button>
                <button class="btn btn-success me-1 mb-1">Valider Données</button>
            </div>                                                            
        </div>
    </section>
</div>
<?= $this->endSection() ?>