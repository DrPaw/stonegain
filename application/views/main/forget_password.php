<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 container1 margintop-55">
	<?php if (isset($error)) { ?>
	<div class="alert alert-danger alert-dismissable col-xs-12 col-sm-12 col-md- col-lg-12">
		<?php echo $error ?>
	</div>
	<?php }; ?>
	<?php if (isset($success)) { ?>
	<div class="alert alert-success alert-dismissable col-xs-12 col-sm-12 col-md- col-lg-12">
		<?php echo $success ?>
	</div>
	<?php }; ?>
	<div class="panel-heading font-size-xlarge">
		Forget Password
	</div>
	<div class='panel-body'>
		<form action="<?= base_url() ?>access/forget_password" method="post">
			<div class="input-group">
				<span class='input-group-addon' style='vertical-align:top;'>
					<i class='fa fa-envelope'></i>
				</span>
				<input name='email' type="email" class="form-control" placeholder='email' />
			</div>
			<div class="button-container">
				<input type="submit" value='Submit' class="btn btn-primary pull-right" style='margin-top : 3%;margin-left: 5%;margin-bottom : 5%;'>
			</div>
		</form>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>