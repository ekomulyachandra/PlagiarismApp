<?php
//form edit open
echo form_open(base_url('submenu/edit/' . $submenu->id));
?>

<div class="form-group row">
    <label for="menu" class="col-sm-2 col-form-label">Menu</label>
    <div class="col-sm-10">
        <select class="form-control" name="menu">
            <option>Select Menu</option>
            <?php
            foreach ($menu as $m) {
                echo "<option value='$m->id'>$m->menu</option>";
            }
            ?>
            <?php
            foreach ($menu as $m) { ?>
                <option value='<?= $m->id ?>' <?= $m->menu == $submenu->menu ? "selected" : null ?>> <?= $m->menu ?></option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="submenu" class="col-sm-2 col-form-label">Sub Menu</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Sub Menu" name="sub_menu" value="<?= $submenu->sub_menu ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">Url</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Url" name="url" value="<?= $submenu->url ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Icon" name="icon" value="<?= $submenu->icon ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
        <button type="reset" class="btn btn-primary"><i class="fa fa-times"></i> Reset </button>
        <a class="btn btn-default" href="<?= base_url('submenu') ?>"><i class="fa fa-backward"></i> Back </a>
    </div>
</div>
<?php
echo form_close();
?>