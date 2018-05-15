<div class="mediumBox">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <div class="box box-default">
                <div class="box-header">
                    Edit User
                </div>
                <div class="box-body">
                    <form id="user_form" method="POST" action="<?php echo site_url("admin_user/edit"); ?>/<?= $user["user_id"] ?>" >
                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Username</label>
                                <input type="text" class="form-control" required name="username" placeholder="username" value="<?= $user["username"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Email</label>
                                <input type="text" class="form-control" required name="email" placeholder="email" value="<?= $user["email"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Country</label>
                                <input type="text" class="form-control" required name="country" placeholder="country" value="<?= $user["country"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Bank Name</label>
                                <input type="text" class="form-control" required name="bank_name" placeholder="bank name" value="<?= $user["bank_name"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Bank Acc. No.</label>
                                <input type="text" class="form-control" required name="bank_account_number" placeholder="bank account number" value="<?= $user["bank_account_number"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Preferred Online / Active Time</label>
                                <input type="time" class="form-control" required name="preferred_time" placeholder="preferred online / active time" value="<?= $user["preferred_time"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Preferred Threshold</label>
                                <input type="number" class="form-control" required name="preferred_threshold" placeholder="preferred threshold" value="<?= $user["preferred_threshold"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Referral Link</label>
                                <input type="text" class="form-control" name="referral_link" placeholder="referral link" value="<?= $user["referral_link"] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Password<small>* leave empty to keep old password</small></label>
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Confirm Password<small>* leave empty to keep old password</small></label>
                                <input type="password" class="form-control" name="password2" placeholder="confirm password">
                            </div>
                        </div>
                        <br />
                        <input type="submit" class="btn btn-flat btn-info pull-right" value="edit">


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loader-wrapper" class="loader-wrapper hidden">
    <div class="loader">
    </div>
    <strong class="loader-font">Please wait...</strong>
</div>

<script>
    function form_submit(form) {
        var data = new FormData(form);
        var url = $(form).attr("action");
        $.ajax({
            url: url,
            data: data,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                if (data.status) {
                    $("body").loadingModal({
                        text: "Successfully added"
                    });
                    setTimeout(function () {
                        window.location = "<?= site_url(); ?>admin_user/details/<?= $user["user_id"] ?>";
                                            }, 1500);
                                        } else {
                                            $(".user_form_alert").html(data.message);
                                            $(".user_form_alert").removeClass("hidden");
                                        }
                                    },

                                    dataType: "JSON"
                                });
                            }

                            $(document).ready(function () {
                                var user_form = document.getElementById("user_form");

                                user_form.addEventListener("submit", function (e) {
                                    e.preventDefault();
                                    form_submit(user_form);
                                });

                            });

</script>