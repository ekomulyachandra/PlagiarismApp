<?php
//form edit open
echo form_open(base_url('menu/edit/' . $menu->id));
?>

<div class="form-group row">
    <label for="menu" class="col-sm-2 col-form-label">Menu</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Menu" name="menu" value="<?= $menu->menu ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Icon</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Icon" name="icon" value="<?= $menu->icon ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
        <button type="reset" class="btn btn-primary"><i class="fa fa-times"></i> Reset </button>
        <a class="btn btn-default" href="<?= base_url('menu') ?>"><i class="fa fa-backward"></i> Back </a>
    </div>
</div>
<?php
echo form_close();
?>