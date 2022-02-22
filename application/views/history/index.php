<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
<table id="example2" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Your Journal</th>
            <th>Comparison Journal 1</th>
            <th>Similarity with journal 1</th>
            <th>Comparison Journal 2</th>
            <th>Similarity with journal 2</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($history as $h => $history) { ?>
            <tr>
                <td><?= $h + 1; ?></td>
                <td>
                    <ul class="list-unstyled" style="margin-bottom:0px;">
                        <li><strong>Title :</strong> <?= $history->title1 ?> </li>
                        <li><strong>Author :</strong> <?= $history->author1 ?> </li>
                    </ul>

                </td>
                <td>
                    <ul class="list-unstyled" style="margin-bottom:0px;">
                        <li><strong>Title :</strong> <?= $history->title2 ?> </li>
                        <li><strong>Author :</strong> <?= $history->author2 ?> </li>
                    </ul>
                </td>
                <td><?= $history->similarity ?>%</td>
                <td>
                    <ul class="list-unstyled" style="margin-bottom:0px;">
                        <li><strong>Title :</strong> <?= $history->title3 ?> </li>
                        <li><strong>Author :</strong> <?= $history->author3 ?> </li>
                    </ul>
                </td>
                <td><?= $history->similarity2 ?>%</td>

                <td>
                    <div class="btn-group">
                        <a href="<?= base_url('history/delete/' . $history->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you really want to delete this data ?')">
                            <i class="fa fa-trash">Delete</i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>