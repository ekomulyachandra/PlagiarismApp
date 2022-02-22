<?php
if ($similarity == 0) {
    $cardcolor = "info";
} else if ($similarity >= 0 && $similarity <= 25) {
    $cardcolor = "primary";
} else if ($similarity > 25 && $similarity <= 50) {
    $cardcolor = "success";
} else if ($similarity > 50 && $similarity <= 75) {
    $cardcolor = "warning";
} else if ($similarity > 75 && $similarity <= 100) {
    $cardcolor = "danger";
}
?>
<div class="row">
    <div class="alert alert-<?= $cardcolor ?>" role="alert" style="width: 100%;">
        <h4 class="alert-heading">Similarity : <?= $similarity ?>% </h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card text-dark bg-light mb-6">
            <div class="card-header">Preprocessing Sentence 1</div>
            <div class="card-body">
                <div style="display:block; width:100%; height:150px; overflow:auto;">
                    <textarea name="content" class="form-control" rows="10"><?= $pre1 ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-dark bg-light mb-6">
            <div class="card-header">Preprocessing Sentence 2</div>
            <div class="card-body">
                <div style="display:block; width:100%; height:150px; overflow:auto;">
                    <textarea name="content" class="form-control" rows="10"><?= $pre2 ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-dark bg-light mb-6">
            <div class="card-header">K-Gram Sentence 1</div>
            <div class="card-body">
                <div style="display:block; width:100%; height:150px; overflow:auto;">
                    <p>
                        <?php
                        foreach ($teks1gram as $ke1) {
                            echo "[" . $ke1 . "]";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-dark bg-light mb-6">
            <div class="card-header">K-Gram Sentence 2</div>
            <div class="card-body">
                <div style="display:block; width:100%; height:150px; overflow:auto;">
                    <p>
                        <?php
                        foreach ($teks2gram as $ke2) {
                            echo "[" . $ke2 . "]";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card text-dark bg-light mb-6">
            <div class="card-header">Hash Sentence 1</div>
            <div class="card-body">
                <div style="display:block; width:100%; height:150px; overflow:auto;">
                    <p>
                        <?php
                        foreach ($teks1hash as $key1) {
                            echo "[" . $key1 . "]";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-dark bg-light mb-6">
            <div class="card-header">Hash Sentence 2</div>
            <div class="card-body">
                <div style="display:block; width:100%; height:150px; overflow:auto;">
                    <p>
                        <?php
                        foreach ($teks2hash as $key2) {
                            echo "[" . $key2 . "]";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Amount Hash Sentence 1</th>
                <th>Amount Hash Sentence 2</th>
                <th>Same patttern</th>
            </tr>
        </thead>
        <tbody>
            <td><?= count($teks1hash) ?></td>
            <td><?= count($teks2hash) ?></td>
            <td><?= count($fingerprint) ?>
                <br>
                <?php
                foreach ($fingerprint as $f) {
                    echo "[" . $f . "]";
                }
                ?>
            </td>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-sm-12">
        <a class="btn btn-primary col-12" href="<?= base_url('text') ?>"><i class="fa fa-backward"></i> Back </a>
    </div>
</div>