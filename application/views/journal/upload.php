<?php
//form save open
echo form_open(base_url('journal/save'));
?>
<input type="text" class="form-control" name="filename" value="<?= $filename ?>" required hidden>
<input type="text" class="form-control" name="user" value="<?= $user ?>" required hidden>
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Title" name="title" required>
    </div>
</div>
<div class="form-group row">
    <label for="author" class="col-sm-2 col-form-label">Author</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Author" name="author" required>
    </div>
</div>
<div class="form-group row">
    <label for="content" class="col-sm-2 col-form-label">Content</label>
    <textarea name="content" class="form-control" rows="10"><?= $text ?></textarea>
</div>
<div class="form-group row">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> Save </button>
        <a class="btn btn-danger col-12" href="<?= base_url('journal/cancel') ?>"><i class="fa fa-cancel"></i> Cancel </a>
    </div>
</div>

<?php
echo form_close();
?>