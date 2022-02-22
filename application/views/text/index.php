<form action="<?= base_url('text/process') ?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
                <label>Sentence 1</label>
                <textarea name="text1" class="form-control" rows="4" placeholder="Enter ..." value="<?= set_value('text1') ?>"></textarea>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Sentence 2</label>
                <textarea name="text2" class="form-control" rows="4" placeholder="Enter ..." value="<?= set_value('text2') ?>"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!-- textarea -->
            <div class="form-group">
                <label>K-Gram</label>
                <input type="text" class="form-control" placeholder="K-Gram" name="kgram">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary col-12">Check</button>
            </div>
        </div>
    </div>
</form>