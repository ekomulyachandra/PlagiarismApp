<?php
//Open form
echo form_open(base_url('menu'), 'class="form-horizontal"');
?>
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg">
    <i class="fa fa-plus"></i>Add Menu
</button>
<?php
//Panggil form tambah
include('add.php');
//Closing form
echo form_close();
?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>" data-icon="<?= $this->session->flashdata('icon') ?>"></div>
<table id="example2" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Icon</th>
            <th>Create date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($menu as $m => $menu) { ?>
            <tr>
                <td><?= $m + 1; ?></td>
                <td><?= $menu->menu ?></td>
                <td><?= $menu->icon ?></td>
                <td><?= $menu->create_date ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?= base_url('menu/access/' . $menu->id) ?>" class="btn btn-info btn-sm">
                            <i class="fa fa-edit">Access</i>
                        </a>
                        <a href="<?= base_url('menu/edit/' . $menu->id) ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit">Edit</i>
                        </a>
                        <a href="<?= base_url('menu/delete/' . $menu->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you really want to delete this data ?')">
                            <i class="fa fa-trash">Delete</i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>