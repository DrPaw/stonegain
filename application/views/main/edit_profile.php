<br />
<div class="mediumBox">
    <div class="row">
        <div class="col-padding-50 col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <form id="user_form" method="POST" action="<?php echo site_url("user/edit_profile"); ?>" >
                <div class="box-header admin-panel">
                    <h4 class="pull-left">Basic Information</h4>
                    <a href="<?= site_url("user/profile")?>" class="btn btn-danger pull-right">
                        cancel
                    </a>
                </div>
                <div class="box">
                    <div class="box-body">
                        <div class="tab-content">
                            <div class="tab-pane active backgroundcolor-white" id="login">
                                <table class='formTable font-size-medium col-lg-12 col-md-12 col-xs-12 col-sm-12'>
                                    <tr>
                                        <th class="line-padding-10 font-size-xlarge"><?= $user['username']; ?></th>
                                    </tr>
                                    <tr>
                                        <th class="line-padding-10 col-padding-0 col-lg-3 col-md-3 col-xs-3 col-sm-3">Password<small>* leave empty to keep old password</small></th>
                                        <td class="line-padding-10 col-lg-10 col-md-10 col-xs-9 col-sm-9"><input type="password" class="form-control input-border" name="password" placeholder="password" style="width: 50%;"></td>
                                    </tr>
                                    <tr>
                                        <th class="line-padding-10 col-padding-0 col-lg-3 col-md-3 col-xs-3 col-sm-3">Confirm Password<small>* leave empty to keep old password</small></th>
                                        <td class="line-padding-10 col-lg-10 col-md-10 col-xs-9 col-sm-9"><input type="password" class="form-control input-border" name="password2" placeholder="confirm password" style="width: 50%;"></td>
                                    </tr>
                                    <tr>
                                        <th class="line-padding-10 col-padding-0 col-lg-3 col-md-3 col-xs-3 col-sm-3">Email <small>*</small></th>
                                        <td class="line-padding-10 col-lg-9 col-md-9 col-xs-9 col-sm-9"><input type="text" class="form-control input-border" required name="email" value="<?= $user["email"] ?>" style="width: 50%;"></td>
                                    </tr>
                                    <tr>
                                        <th class="line-padding-10 col-padding-0 col-lg-3 col-md-3 col-xs-3 col-sm-3">Country <small>*</small></th>
                                        <td class="line-padding-10 col-lg-9 col-md-9 col-xs-9 col-sm-9"><input type="text" class="form-control input-border" required name="country" value="<?= $user["country"] ?>" style="width: 50%;"></td>
                                    </tr>
                                    <tr>
                                        <th class="line-padding-10 col-padding-0 col-lg-3 col-md-3 col-xs-3 col-sm-3">Bank Name <small>*</small></th>
                                        <td class="line-padding-10 col-lg-9 col-md-9 col-xs-9 col-sm-9"><input type="text" class="form-control input-border" required name="bank_name" value="<?= $user["bank_name"] ?>" style="width: 50%;"></td>
                                    </tr>
                                    <tr>
                                        <th class="line-padding-10 col-padding-0 col-lg-3 col-md-3 col-xs-3 col-sm-3">Bank Account No <small>*</small></th>
                                        <td class="line-padding-10 col-lg-9 col-md-9 col-xs-9 col-sm-9"><input type="text" class="form-control input-border" required name="bank_account_number" value="<?= $user["bank_account_number"] ?>" style="width: 50%;"></td>
                                    </tr>
                                    <tr>
                                        <th class="line-padding-10 col-padding-0 col-lg-3 col-md-3 col-xs-3 col-sm-3">Preferred Online/ Active Time <small>*</small></th>
                                        <td class="line-padding-10 col-lg-9 col-md-9 col-xs-9 col-sm-9"><input type="time" class="form-control input-border" required name="preferred_time" value="<?= $user["preferred_time"] ?>" style="width: 50%;"></td>
                                    </tr>
                                    <tr>
                                        <th class="line-padding-10 col-padding-0 col-lg-3 col-md-3 col-xs-3 col-sm-3">Preferred Threshold <small>*</small></th>
                                        <td class="line-padding-10 col-lg-9 col-md-9 col-xs-9 col-sm-9"><input type="number" class="form-control input-border" required name="preferred_threshold" value="<?= $user["preferred_threshold"] ?>" style="width: 50%;"></td>
                                    </tr>
                                    <tr>
                                        <th class="line-padding-10 col-padding-0 col-lg-3 col-md-3 col-xs-3 col-sm-3"></th>
                                        <td class="line-padding-10 col-lg-9 col-md-9 col-xs-9 col-sm-9"><input type="submit" value='save' class="btn btn-success pull-right"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
