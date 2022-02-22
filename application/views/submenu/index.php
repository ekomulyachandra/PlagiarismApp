<?php
//Open form
echo form_open(base_url('submenu'), 'class="form-horizontal"');
?>
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg">
    <i class="fa fa-plus"></i>Add Sub Menu
</button>
<?php
//Panggil form tambah
include('add.php');
//Closing form
echo form_close();
?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
<table id="example2" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Sub Menu</th>
            <th>Menu</th>
            <th>Url</th>
            <th>Icon</th>
            <th>Create date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($submenu as $sm => $submenu) { ?>
            <tr>
                <td><?= $sm + 1; ?></td>
                <td><?= $submenu->sub_menu ?></td>
                <td><?= $submenu->menu ?></td>
                <td><?= $submenu->url ?></td>
                <td><?= $submenu->icon ?></td>
                <td><?= $submenu->create_date ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?= base_url('submenu/edit/' . $submenu->id) ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit">Edit</i>
                        </a>
                        <a href="<?= base_url('submenu/delete/' . $submenu->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you really want to delete this data ?')">
                            <i class="fa fa-trash">Delete</i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>