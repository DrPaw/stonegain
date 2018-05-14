<div class="mediumBox">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <div class="box box-default">
                <div class="box-header">
                    Edit Admin
                </div>
                <div class="box-body">
                    <form id="user_form" method="POST" action="<?php echo site_url("admin/edit"); ?>/<?= $admin["admin_id"] ?>" >
                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Username</label>
                                <input type="text" class="form-control" required name="username" placeholder="username" value="<?= $admin["username"] ?>">
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
                        window.location = "<?= site_url(); ?>admin/details/<?= $admin["admin_id"] ?>";
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