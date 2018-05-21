<section class="content col-lg-12 col-md-12 col-xs-12 col-sm-12 col-padding-0 line-padding-0">
	<div class="col-lg-1 col-md-1 col-xs-12 col-sm-12 padding-top-10"></div>
	<div class="col-lg-10 col-md-10 col-xs-12 col-sm-12 padding-top-10">
		<div class="col-lg-10 col-md-10 col-xs-10 col-sm-12 padding-top-12">
			<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 sub-padding">
				<select name="referrer_id" class="form-control">
					<option value="0">Advertisement</option>
				</select>
			</div>
			<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 sub-padding">
				<select name="referrer_id" class="form-control">
					<option value="0">Malaysia</option>
				</select>
			</div>
			<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 sub-padding">
				<select name="referrer_id" class="form-control">
					<option value="0">Currency</option>
				</select>
			</div>
			<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 sub-padding">
				<select name="referrer_id" class="form-control">
					<option value="0">Payment Method</option>
				</select>
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-xs-10 col-sm-12 padding-top-12">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
				<input type="submit" class="btn btn-info pull-center search-btn form-control" value="Search">
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 line-padding-10">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-border-gray">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr class="border-bottom-black">
							<th colspan="2">Username</th>
							<th>Credit</th>
							<th>Payment Method</th>
							<th>Limits</th>
							<th>Prices</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
        foreach ($user_listing as $row) {
            ?>
							<tr>
								<th class="font-weight-400">
									<img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<div>
										<?= $row["username"] ?>
									</div>
									<?php
        if ($row["quick_sell"] == 1) {
            ?>
										<div class="quick-seller col-padding-10">quick seller</div>
										<?php

        }
        ?>
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<div>Trade 429|Rating 98%</div>
									<div class="font-color-user">Average Release Time: 6 mins</div>
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<?= $row["payment_method"] ?>
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<?= $row["limit_from"] ?>-
										<?= $row["limit_to"] ?> MYR</th>
								<th class="font-weight-400 price-color" style="padding-top:16px">
									<?= $row["price_after"] ?> MYR</th>
								<th style="padding-top:16px">
									<a href="<?= base_url() ?>user_listing/buy/<?= $row['user_listing_id'] ?>" class="btn btn-info pull-center line-padding-10 search-btn">BUY</a>
								</th>
							</tr>
							<?php

    }
    ?>
					</tbody>
				</table>
			</div>
			<?= $this->page_data["pagination"] ?>
		</div>
	</div>
	<div class="col-lg-1 col-md-1 col-xs-12 col-sm-12 padding-top-10"></div>
</section>
