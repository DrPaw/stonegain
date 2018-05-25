<section class="content-header">
    <h1>User Chat</h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>admin_user_chat"><i class="fa fa-coffee"></i>User Chat</a></li>
    </ol>
</section>
<br>
<section class="content content-backend">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>User Chat</h4>
            </div>
            <div class='panel-body'>
                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Username</th>
                                <th>Last Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($user_chats as $row) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>admin_user_chat/details/<?= $row['user_chat_id'] ?>" class="a-color-backend"><?php echo $i; ?></a></td>
                                    <td><a href="<?= base_url() ?>admin_user_chat/details/<?= $row['user_chat_id'] ?>" class="a-color-backend"><?= $row["user_1_username"] ?></a></td>
                                    <td><a href="<?= base_url() ?>admin_user_chat/details/<?= $row['user_chat_id'] ?>" class="a-color-backend"><?= $row["user_2_username"] ?></a></td>
                                    <td><a href="<?= base_url() ?>admin_user_chat/details/<?= $row['user_chat_id'] ?>" class="a-color-backend"><?= $row["last_active_time"] ?></a></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Username</th>
                                <th>Last Active</th>
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
        if (confirm("Are you sure you want to delete this admin?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>admin/delete/" + id);
        }
    });
</script>