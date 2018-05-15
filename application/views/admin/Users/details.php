<br />
<div class="mediumBox">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header admin-panel">
                    <a href="<?= site_url("admin_user/edit/" . $user['user_id']); ?>" class="pull-right a-color-backend">
                        Edit
                    </a>
                    <h4 style="margin-left:20px;" class="pull-left"><?= $user['username']?>'s Info</h4>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="active">
                                <a href="#login" data-toggle="tab">Info</a>

                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active backgroundcolor-white" id="login">
                            <table class='formTable'>
                                <tr>
                                    <th>Username</th>
                                    <td>: <?= $user['username']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: <?= $user['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>: <?= $user['country']; ?></td>
                                </tr>
                                <tr>
                                    <th>Bank Name</th>
                                    <td>: <?= $user['bank_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Bank Acc. No.</th>
                                    <td>: <?= $user['bank_account_number']; ?></td>
                                </tr>
                                <tr>
                                    <th>Preferred Online / Active Time</th>
                                    <td>: <?= date("h:i:s a", strtotime($user['preferred_time'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Preferred Threshold</th>
                                    <td>: <?= $user['preferred_threshold']; ?></td>
                                </tr>
                                <tr>
                                    <th>Referral Link</th>
                                    <td>: <?= $user['referral_link']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
