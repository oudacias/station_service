
<link rel="stylesheet" href="/assets/css/bootstrap.css">
<div class="container">
	<div class="row">
		<div class="col-sm-6 offset-sm-3">

			<div class="card">
				<h2 class="card-header"></h2>
				<div class="card-body">
					<div class="row justify-content-center">
						<img src="/assets/images/logo/logo_ziz.jpeg" style="width:330px" alt="Logo" srcset="">
					</div>
					<br>
					<br>
					<form action="<?= route_to('login') ?>" method="post">
						<div class="modal-body">
							<?= csrf_field() ?>
							<div class="form-group">
								<label for="login">Nom ou Email</label>
								<input type="text" class="form-control" name="login" value="<?php echo $login; ?>" readonly>
							</div>
							<div class="form-group">
								<label for="login">Mot de passe</label>
								<input type="password" class="form-control" name="password" value="<?php echo $password ?>"  readonly>
							</div>
						    <label>Selectionnez la station</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="basicSelect" name="station_id">
                                    <?php foreach($stations as $station){ ?>
                                        <option value="<?php echo $station['id'] ?>"> <?php echo $station['nom'] ?></option>
                                    <?php } ?>
                                </select>
                            </fieldset>
                        </div>
						<br>
						<div class="row justify-content-center">
							<div class="col-3">
								<button type="submit" class="btn btn-primary"><?=lang('Auth.loginAction')?></button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

