<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="alert alert-success" id="success-alert" style="display:none">Account Activated</div>
<div class="alert alert-danger" id="success-alert2" style="display:none">Account Dectivated</div>
<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>NOM</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>Station</th>
                <th>Activé</th>
                <th>Delete User</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($usersList) {
                foreach ($usersList as $user) {
                    if ($user->id != user_id()) {
            ?>
                        <tr>
                            <td class="text-bold-500"><?php echo $user->nom; ?></td>
                            <td><?php echo $user->prenom; ?></td>
                            <td class="text-bold-500"><?php echo $user->email; ?></td>
                            <td class="text-bold-500"><?php echo $user->username; ?></td>
                            <td>
                                <div class="btn-group mb-1">
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle me-1" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo $user->name; ?>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                            <?php if ($results) {
                                                foreach ($results as $result) {
                                                    if ($user->name != $result->name) { ?>
                                                        <a class="dropdown-item" href="<?php echo base_url('/newuser/updaterole/' . $user->id . '/' . $result->id); ?>">
                                                            <?php echo $result->name; ?></a>
                                            <?php   }
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $user->stnom; ?></td>
                            <td>
                                <div class="checkbox">
                                    <?php if ($user->active == 1) { ?>
                                        <input type="checkbox" id="checkbox1" class="form-check-input" value="<?= $user->id ?> " disabled checked> <?php } else {
                                                                                                                                            ?> <input type="checkbox" id="checkbox3" class="form-check-input" value="<?= $user->id ?>" disabled> <?php } ?>

                                </div>
                            </td>
                            <td>
                                <a href="<?php echo base_url('/newuser/deleteuser/' . $user->id); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            type:"POST",
            dataType: 'JSON',
            url : <?php base_url()?>'/newuser/getUser',
            success: function(data){
                if(data=="admin"){
                    console.log("success");
                    $('input[type=checkbox]').attr('disabled', false);
                } else console.log("fail");
            }
        })
        $(".form-check-input").change(function() {
            var vc = $(this).val();
            if ($(this).is(":checked")) {
                $.ajax({
                    type: "POST",
                    data: {
                        val: vc
                    },
                    url: <?php base_url() ?> '/newuser/activateUser',
                    success: function(data) {
                        $("#success-alert").show();
                        setTimeout(function() {
                            $("#success-alert").hide();
                        }, 5000);;
                    }
                });
            } else {
                $.ajax({
                    type: "POST",
                    data: {
                        val2: vc
                    },
                    url: <?php base_url() ?> '/newuser/deactivateUser',
                    success: function(data) {
                        $("#success-alert2").show();
                        setTimeout(function() {
                            $("#success-alert2").hide();
                        }, 5000);;
                    }
                });
            }
        });
    });
</script>