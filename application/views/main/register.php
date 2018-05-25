<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 container1 margintop-55">
     <div class="panel-heading font-size-xlarge">
        Register
    </div>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger alert-dismissable">
                <?php echo $error; ?>
            </div>
        <?php }; ?>
    <div class='panel-body'>
        <form action="<?= base_url() ?>Access/register" method="post">
            <div class="input-group" style="width: 100%;">
                <span class='input-group-addon' style='vertical-align:top; width:200px; text-align: left;'>Username <small>*</small></span>
                <input name='username' type="text" class="form-control" placeholder='username' required />
            </div>
            <div class="input-group" style='margin-top : 2%; width: 100%;'>
                <span class='input-group-addon' style="; width:200px; text-align: left;">Password <small>*</small></span>
                <input name='password' type="password" placeholder='password' class="form-control" required />
            </div>
            <div class="input-group" style='margin-top : 2%; width: 100%;'>
                <span class='input-group-addon' style="; width:200px; text-align: left;">Confirm Password <small>*</small></span>
                <input name='password2' type="password" placeholder='confirm password' class="form-control" required />
            </div>
            <div class="input-group" style='margin-top : 2%; width: 100%;'>
                <span class='input-group-addon' style='vertical-align:top; width:200px; text-align: left;'>Email <small>*</small></span>
                <input name='email' type="text" class="form-control" placeholder='email'required />
            </div>
            <div class="input-group" style='margin-top : 2%; width: 100%;'>
                <span class='input-group-addon' style='vertical-align:top; width:200px; text-align: left;'>Country <small>*</small></span>
                <input name='country' type="text" class="form-control" placeholder='country' required />
            </div>
            <div class="input-group" style='margin-top : 2%; width: 100%;'>
                <span class='input-group-addon' style='vertical-align:top; width:200px; text-align: left;'>Bank Name <small>*</small></span>
                <input name='bank_name' type="text" class="form-control" placeholder='bank name' required />
            </div>
            <div class="input-group" style='margin-top : 2%; width: 100%;'>
                <span class='input-group-addon' style='vertical-align:top; width:200px; text-align: left;'>Bank Account Number <small>*</small></span>
                <input name='bank_account_number' type="text" class="form-control" placeholder='bank account number'required />
            </div>
            <div class="input-group" style='margin-top : 2%; width: 100%;'>
                <span class='input-group-addon' style='vertical-align:top; width:200px; text-align: left;'>Preferred Online/ Active Time <small>*</small></span>
                <input name='preferred_time' type="time" class="form-control" placeholder='preferred online / active time'/>
            </div>
             <div class="input-group" style='margin-top : 2%; width: 100%;'>
                <span class='input-group-addon' style='vertical-align:top; width:200px; text-align: left;'>Preferred threshold <small>*</small></span>
                <input name='preferred_threshold' type="text" class="form-control" placeholder='preferred threshold'/>
            </div> 
            <div class="input-group" style='margin-top : 2%; width: 100%;'>
                <span class='input-group-addon' style='vertical-align:top; width:200px; text-align: left;'>Referral Link</span>
                <input name='referral_link' type="text" class="form-control" placeholder='referral link'/>
            </div>
            <div class ="button-container" style='margin-top : 2%; width: 100%;'>
                <input type="submit" value='register' class="btn btn-default pull-right" style='margin-top : 3%;margin-left: 5%;margin-bottom : 5%;'>
            </div>
         </form>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>