<?php
//Open form
echo form_open_multipart(base_url('journal/upload'), 'class="form-horizontal"');
?>
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg">
    <i class="fa fa-plus"></i>Add Journal
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
            <th>Title</th>
            <th>Author</th>
            <th>Filename</th>
            <th>Create date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($journaluser as $ju => $journaluser) { ?>
            <tr>
                <td><?= $ju + 1; ?></td>
                <td><?= $journaluser->title ?></td>
                <td><?= $journaluser->author ?></td>
                <td><?= $journaluser->filename ?></td>
                <td><?= $journaluser->create_date ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?= base_url('journal/delete/' . $journaluser->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you really want to delete this data ?')">
                            <i class="fa fa-trash">Delete</i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>
<br>
<h4> All Journal </h4>
<table id="example3" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Author</th>
            <th>Filename</th>
            <th>Create date</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($journal as $j => $journal) { ?>
            <tr>
                <td><?= $j + 1; ?></td>
                <td><?= $journal->title ?></td>
                <td><?= $journal->author ?></td>
                <td><?= $journal->filename ?></td>
                <td><?= $journal->create_date ?></td>

            </tr>
        <?php } ?>
    </tbody>

</table>