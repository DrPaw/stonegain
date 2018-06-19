<br />
<div class="mediumBox">
	<div class="row">
		<div class="col-padding-50 col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<form id="user_form" method="POST" action="<?php echo site_url(" user/edit_profile "); ?>">
				<div class="box-header admin-panel">
					<h4 class="pull-left">Basic Information</h4>
					<a href="<?= site_url('user/profile')?>" class="btn btn-danger pull-right hidden-xs hidden-sm">
						cancel
					</a>
					<a href="<?= site_url('user/profile')?>" class="btn btn-danger pull-right hidden-lg hidden-md">
						<i class="fa fa-close"></i>
					</a>
				</div>
				<div class="box">
					<div class="box-body">
						<div class="tab-content">
							<div class="tab-pane active backgroundcolor-white" id="login">
								<div class='font-size-medium col-xs-12 col-sm-12 no-margin no-padding'>
									<div class="line-padding-10 font-size-xlarge">
										<?= $user['username']; ?>
									</div>
									<div class="row">
										<div class="line-padding-10 col-lg-3 col-md-3 col-xs-12 col-sm-12">Password
											<small>* leave empty to keep old password</small>
										</div>
										<div class="line-padding-10 col-lg-9 col-md-9 col-xs-12 col-sm-12">
											<input type="password" class="form-control input-border" name="password" placeholder="password">
										</div>
									</div>
									<div class="row">
										<div class="line-padding-10 col-lg-3 col-md-3 col-xs-12 col-sm-12">Confirm Password
											<small>* leave empty to keep old password</small>
										</div>
										<div class="line-padding-10 col-lg-9 col-md-9 col-xs-12 col-sm-12">
											<input type="password" class="form-control input-border" name="password2" placeholder="confirm password">
										</div>
									</div>
									<div class="row">
										<div class="line-padding-10 col-lg-3 col-md-3 col-xs-12 col-sm-12">Email
											<small>*</small>
										</div>
										<div class="line-padding-10 col-lg-9 col-md-9 col-xs-12 col-sm-12">
											<input type="text" class="form-control input-border" required name="email" value="<?= $user['email'] ?>">
										</div>
									</div>
									<div class="row">
										<div class="line-padding-10 col-lg-3 col-md-3 col-xs-12 col-sm-12">Country
											<small>*</small>
										</div>
										<div class="line-padding-10 col-lg-9 col-md-9 col-xs-12 col-sm-12">
											<input type="text" class="form-control input-border" required name="country" value="<?= $user['country'] ?>">
										</div>
									</div>
									<div class="row">
										<div class="line-padding-10 col-lg-3 col-md-3 col-xs-12 col-sm-12">Bank Name
											<small>*</small>
										</div>
										<div class="line-padding-10 col-lg-9 col-md-9 col-xs-12 col-sm-12">
											<input type="text" class="form-control input-border" required name="bank_name" value="<?= $user['bank_name'] ?>">
										</div>
									</div>
									<div class="row">
										<div class="line-padding-10 col-lg-3 col-md-3 col-xs-12 col-sm-12">Bank Account No
											<small>*</small>
										</div>
										<div class="line-padding-10 col-lg-9 col-md-9 col-xs-12 col-sm-12">
											<input type="text" class="form-control input-border" required name="bank_account_number" value="<?= $user['bank_account_number'] ?>">
										</div>
									</div>
									<div class="row">
										<div class="line-padding-10 col-lg-3 col-md-3 col-xs-12 col-sm-12">Preferred Online/ Active Time
											<small>*</small>
										</div>
										<div class="line-padding-10 col-lg-9 col-md-9 col-xs-12 col-sm-12">
											<input type="time" class="form-control input-border" required name="preferred_time" value="<?= $user['preferred_time'] ?>">
										</div>
									</div>
									<div class="row">
										<div class="line-padding-10 col-lg-3 col-md-3 col-xs-12 col-sm-12">Preferred Threshold
											<small>*</small>
										</div>
										<div class="line-padding-10 col-lg-9 col-md-9 col-xs-12 col-sm-12">
											<input type="number" class="form-control input-border" required name="preferred_threshold" value="<?= $user['preferred_threshold'] ?>">
										</div>
									</div>
									<div class="row">
										<div class="line-padding-10 col-lg-3 col-md-3 col-xs-12 col-sm-12"></div>
										<div class="line-padding-10 col-lg-9 col-md-9 col-xs-12 col-sm-12">
											<input type="submit" value='save' class="btn btn-primary pull-right">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
