<section class="content-header">
    <h1>Admin</h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>admin"><i class="fa fa-coffee"></i>Admin</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Admin</h4>
                <a href='<?php echo site_url('admin/add'); ?>' class='btn btn-info pull-right'>
                    <i class='glyphicon glyphicon-plus' ></i>Add</a>
            </div>
            <div class='panel-body'>
                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($admins as $row) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>admin/details/<?= $row['admin_id'] ?>"><?php echo $i; ?></a></td>
                                    <td><a href="<?= base_url() ?>admin/details/<?= $row['admin_id'] ?>"><?php echo $row['username']; ?></a></td>
                                    <td><button class="btn btn-danger delete-button" data-id="<?= $row['admin_id'] ?>"
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
                                <th>Username</th>
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
        if (confirm("Are you sure you want to delete this admin?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>admin/delete/" + id);
        }
    });
</script>