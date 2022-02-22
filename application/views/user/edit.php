<?php
//form edit open
echo form_open(base_url('user/edit/' . $user->id));
?>
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Name" name="name" value="<?= $user->name ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $user->email ?>" required>
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ?>">
        <small class="text-danger ">Minimum 6 characters or maximum 32 characters or empty</small>
    </div>
</div>
<div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
        <select class="form-control" name="role">
            <option>Select role</option>
            <?php
            foreach ($role as $r) { ?>
                <option value='<?= $r->id ?>' <?= $r->role == $user->role ? "selected" : null ?>> <?= $r->role ?></option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
        <button type="reset" class="btn btn-primary"><i class="fa fa-times"></i> Reset </button>
        <a class="btn btn-default" href="<?= base_url('user') ?>"><i class="fa fa-backward"></i> Back </a>
    </div>
</div>
<?php
echo form_close();
?>