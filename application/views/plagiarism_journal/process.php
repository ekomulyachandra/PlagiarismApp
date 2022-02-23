<?php
if ($similarity >= 0 && $similarity <= 25) {
    $cardcolor = "#00a65a";
} else if ($similarity > 25 && $similarity <= 50) {
    $cardcolor = "#00c0ef";
} else if ($similarity > 50 && $similarity <= 75) {
    $cardcolor = "#3c8dbc";
} else if ($similarity > 75 && $similarity <= 100) {
    $cardcolor = "#f56954";
}
?>
<div class="row">
    <div class="col-12 col-sm-12">
        <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Similarity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Process With Journal 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Process With Journal 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Settings</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                        <div class="row">
                            <div class="col-6 col-md-6 text-center">
                                <input type="text" class="knob" value="<?= $similarity ?>" data-width="150" data-height="150" data-fgColor=<?= $cardcolor ?> data-linecap=round>
                                <div class="knob-label">Journal : <?= $title_journal2 ?></div>
                            </div>
                            <div class="col-6 col-md-6 text-center">
                                <input type="text" class="knob" value="<?= $similarity2 ?>" data-width="150" data-height="150" data-fgColor=<?= $cardcolor ?> data-linecap=round>
                                <div class="knob-label">Journal :<?= $title_journal3 ?> </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card text-dark bg-light mb-6">
                                    <div class="card-header">Preprocessing Sentence 1</div>
                                    <div class="card-body">
                                        <div style="display:block; width:100%; height:150px; overflow:auto;">
                                            <textarea name="content" class="form-control" rows="10" disabled><?= $pre1 ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card text-dark bg-light mb-6">
                                    <div class="card-header">Preprocessing Sentence 2</div>
                                    <div class="card-body">
                                        <div style="display:block; width:100%; height:150px; overflow:auto;">
                                            <textarea name="content" class="form-control" rows="10" disabled><?= $pre2 ?></textarea>
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
                                        // foreach ($fingerprint as $f) {
                                        //     echo "[" . $f . "]";
                                        // }
                                        ?>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card text-dark bg-light mb-6">
                                    <div class="card-header">Detail same pattern </div>
                                    <div class="card-body">
                                        <div style="display:block; width:100%; height:150px; overflow:auto;">
                                            <p>
                                                <?php
                                                foreach ($fingerprint as $p) {
                                                    echo "[" . $p . "]";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card text-dark bg-light mb-6">
                                    <div class="card-header">Preprocessing Sentence 1</div>
                                    <div class="card-body">
                                        <div style="display:block; width:100%; height:150px; overflow:auto;">
                                            <textarea name="content" class="form-control" rows="10" disabled><?= $pre1 ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card text-dark bg-light mb-6">
                                    <div class="card-header">Preprocessing Sentence 2</div>
                                    <div class="card-body">
                                        <div style="display:block; width:100%; height:150px; overflow:auto;">
                                            <textarea name="content" class="form-control" rows="10" disabled><?= $pre3 ?></textarea>
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
                                                foreach ($teks3gram as $ke3) {
                                                    echo "[" . $ke3 . "]";
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
                                                foreach ($teks3hash as $key3) {
                                                    echo "[" . $key3 . "]";
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
                                    <td><?= count($teks3hash) ?></td>
                                    <td><?= count($fingerprint2) ?>
                                        <br>
                                        <?php
                                        // foreach ($fingerprint as $f) {
                                        //     echo "[" . $f . "]";
                                        // }
                                        ?>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card text-dark bg-light mb-6">
                                    <div class="card-header">Detail same pattern </div>
                                    <div class="card-body">
                                        <div style="display:block; width:100%; height:150px; overflow:auto;">
                                            <p>
                                                <?php
                                                foreach ($fingerprint2 as $p2) {
                                                    echo "[" . $p2 . "]";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-12">
        <button class="btn btn-primary col-12" id="btnSaveHistory" data-id_journal1="<?= $id_journal1 ?>" data-id_journal2="<?= $id_journal2 ?>" data-id_journal3="<?= $id_journal3 ?>" data-similarity="<?= $similarity ?>" data-similarity2="<?= $similarity2 ?>" data-createby="<?= $this->session->userdata('email') ?>"><i class="fa fa-save"></i> Save </button>
    </div>
    <br>
    <div class="col-sm-12">
        <a class="btn btn-secondary col-12" href="<?= base_url('Plagiarism_Journal') ?>"><i class="fa fa-backward"></i> Back </a>
    </div>
</div>