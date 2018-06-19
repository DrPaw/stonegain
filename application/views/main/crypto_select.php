<div class="col-sm-6">
	<div class="row">
		<div class="col-md-3 col-xs-4 sub-padding">
			<span class="font-weight-bold">Select your crypto</span>
		</div>
		<div class="col-md-9 col-xs-8 sub-padding font-color-user">
			<select id="crypto-select" class="form-control" name="crypto_id">
				<option value="0">None</option>
				<?php
                foreach($crypto as $row){
                    if($type == "sell"){
                        ?>
					<option value="<?= $row['crypto_id'] ?>">
						<?= $row['crypto'] ?>
					</option>
					<?php
                    } else if($type == "buy"){
                        ?>
						<option value="<?= $row['account_resource_id'] ?>">
							<?= $row['currency'] ?>
						</option>
						<?php
                    }
                }
            ?>
			</select>
			<input type="hidden" name="type" value="<?= $type ?>">
		</div>
	</div>
</div>
<div id="crypto-details-refresh" class="col-sm-6">
	<div class="row">
		<div class="col-xs-4 sub-padding">
			Total Balance:
		</div>
		<div class="col-xs-4 sub-padding">
			Locked Amount:
		</div>
		<div class="col-xs-4 sub-padding">
			Available Balance:
		</div>
	</div>
</div>