<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel33">Nouvel Utilisateur</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">


                    <form action="<?= route_to('/newuser') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="email"><?= lang('Auth.email') ?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" value="<?= old('email') ?>">
                        </div>

                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>">
                        </div>

                        <div class="form-group">
                            <label for="firstname">Prenom</label>
                            <input type="text" class="form-control <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>" name="firstname" value="<?= old('firstname') ?>">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Nom</label>
                            <input type="text" class="form-control <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>" name="lastname" value="<?= old('lastname') ?>">
                        </div>

                        <div class="form-group">
                            <label for="password"><?= lang('Auth.password') ?></label>
                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="input-group-text" for="inputGroupSelect01">Role</label>
                                <select class="form-select" name="role">
                                    <option value="" selected>Choix...</option>
                                    <?php if ($results) {
                                        foreach ($results as $result) { ?>
                                            <option class="form-control" id="inputGroupSelect01" value="<?= $result->name ?>">
                                                <?php echo $result->name; ?></option>
                                    <?php
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="input-group-text" for="inputGroupSelect02">Station</label>
                                <select class="form-select" name="station">
                                    <option value="" selected>Choix...</option>
                                    <?php if ($results2) {

                                        foreach ($results2 as $result) {

                                    ?>
                                            <option class="form-control" id="inputGroupSelect02" value="<?= $result->id ?>"><?php echo $result->nom; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>


                        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                    </form>
                    <hr>

                    <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('/') ?>"><?= lang('Auth.signIn') ?></a></p>

                </div>
            </div>
        </div>
    </div>
</div>