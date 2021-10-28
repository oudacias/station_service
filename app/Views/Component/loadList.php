<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="alert alert-success" id="success-alert" style="display:none">Compte Activé</div>
<div class="alert alert-danger" id="success-alert2" style="display:none">Compte Désactivé</div>
<div class="table-responsive">
                                        <table class="table" id="table1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Login</th>
                <th>Role</th>
                <th>Station</th>
                <th>Activé</th>
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
                                <?php if ($results) { ?>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" onchange="location = this.value;">
                                            <?php foreach ($results as $result) { ?>
                                                <option value="<?php echo base_url('/newuser/updaterole/' . $user->id . '/' . $result->id); ?>" <?php  if ($user->name == $result->name) { ?> selected <?php } ?>><?php echo $result->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </fieldset>
                                <?php } ?>
                            </td>
                            <?php if($user->name == 'admin_central'){; ?>
                                <td>*</td>
                            <?php }else{ ?>
                                <td><?php echo $user->stnom;} ?></td>
                            <td>
                                <div class="checkbox">
                                    <?php if ($user->active == 1) { ?>
                                        <input type="checkbox" id="checkbox1" class="form-check-input" value="<?= $user->id ?> " disabled checked> <?php } else {                                                                                                         
                                            ?> 
                                        <input type="checkbox" id="checkbox3" class="form-check-input" value="<?= $user->id ?>" disabled> <?php } ?>
                                </div>
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
                        }, 1000);;
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
                        }, 1000);;
                    }
                });
            }
        });
    });
</script>