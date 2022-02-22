<?php
//Open form
echo form_open(base_url('user'), 'class="form-horizontal"');
?>
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg">
    <i class="fa fa-plus"></i>Add User
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
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Create date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($user as $u => $user) { ?>
            <tr>
                <td><?= $u + 1; ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->role ?></td>
                <td><?= $user->create_date ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?= base_url('user/edit/' . $user->id) ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit">Edit</i>
                        </a>
                        <a href="<?= base_url('user/delete/' . $user->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you really want to delete this data ?')">
                            <i class="fa fa-trash">Delete</i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>