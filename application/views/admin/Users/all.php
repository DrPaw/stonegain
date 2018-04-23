<section class="content-header padding-15">
    <h1>Users</h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>userList"><i class="fa fa-user"></i>Users</a></li>
    </ol>
</section>
<br>
<section class="content content-backend">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Users</h4>
            </div>
            <div class='panel-body'>
                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($users as $row) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>users/details/<?= $row['user_id'] ?>" class="a-color-backend"><?php echo $i; ?></a></td>
                                    <td><a href="<?= base_url() ?>users/details/<?= $row['user_id'] ?>" class="a-color-backend"><?php echo $row['username']; ?></a></td>
                                    <td><a href="<?= base_url() ?>users/details/<?= $row['user_id'] ?>" class="a-color-backend"><?php echo $row['email']; ?></a></td>
                                    <td><button class="btn btn-danger delete-button" data-id="<?= $row['user_id'] ?>"
                                            <i class="fa fa-trash"></i>Delete</button></td>
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
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>