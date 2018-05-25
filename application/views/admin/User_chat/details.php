<br />
<div class="mediumBox">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<div class="box box-info">
				<div class="box-header admin-panel">
					<h4 style="margin-left:20px;" class="pull-left">Chat Log</h4>
				</div>
				<div class="box-body">
                    <?php
                    foreach($messages as $row){
                        ?>
                        <label><?= $row["username"]?> <small><?= $row["created_date"]?></small></label>
                        <p class='pre-line'><?= $row['message'] ?></p>
                        <br>
                        <?php
                    }
                    ?>
                    <?= $pagination ?>
				</div>
			</div>
		</div>
	</div>
</div>
