<section class="content-header padding-15">
    <h1>User</h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>userList"><i class="fa fa-user"></i>User</a></li>
    </ol>
</section>
<br>
<section class="content content-backend">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>User</h4>
                <a href='<?php echo site_url('userList/add'); ?>' class='btn btn-info pull-right'>
                    <i class='glyphicon glyphicon-plus' ></i>Add</a>
            </div>
            <div class='panel-body'>
                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Bank Name</th>
                                <th>Bank Acc. No.</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($users as $row) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>userList/details/<?= $row['user_id'] ?>" class="a-color-backend"><?php echo $i; ?></a></td>
                                    <td><a href="<?= base_url() ?>userList/details/<?= $row['user_id'] ?>" class="a-color-backend"><?php echo $row['username']; ?></a></td>
                                    <td><a href="<?= base_url() ?>userList/details/<?= $row['user_id'] ?>" class="a-color-backend"><?php echo $row['email']; ?></a></td>
                                    <td><a href="<?= base_url() ?>userList/details/<?= $row['user_id'] ?>" class="a-color-backend"><?php echo $row['country']; ?></a></td>
                                    <td><a href="<?= base_url() ?>userList/details/<?= $row['user_id'] ?>" class="a-color-backend"><?php echo $row['bank_name']; ?></a></td>
                                    <td><a href="<?= base_url() ?>userList/details/<?= $row['user_id'] ?>" class="a-color-backend"><?php echo $row['bank_account_number']; ?></a></td>
                                    <?php
                                        if ($row['deleted'] == "0"){
                                            ?>
                                            <td><button class="btn btn-danger delete-button" data-id="<?= $row['user_id'] ?>"
                                                <i class="fa fa-trash"></i>Block</button></td>
                                    <?php
                                        }
                                        ?>
                                    <?php
                                        if ($row['deleted'] == "1") {
                                            ?>
                                                <td><a href="<?= base_url() ?>userList/details/<?= $row['user_id'] ?>" class="a-color-backend">Blocked</a></td>
                                    <?php
                                        }
                                        ?>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Bank Name</th>
                                <th>Bank Acc. No.</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).on('click', '.delete-button', function (e) {
        if (confirm("Are you sure you want to delete this user?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>userList/delete/" + id);
        }
    });
</script>