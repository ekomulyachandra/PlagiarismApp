<div class="flash-data" data-title="<?= $this->session->flashdata('title') ?>" data-icon="<?= $this->session->flashdata('icon') ?>" data-text="<?= $this->session->flashdata('text') ?>"> </div>
<table id="example2" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Role</th>
            <th>Access</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $r => $roles) { ?>
            <tr>
                <td><?= $r + 1; ?></td>
                <td><?= $roles->role ?></td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?= check_access($roles->id, $menu_id) ?> data-role="<?= $roles->id ?>" data-menu="<?= $menu_id ?>">
                        <label class="form-check-label" for="flexCheckDefault">

                        </label>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>