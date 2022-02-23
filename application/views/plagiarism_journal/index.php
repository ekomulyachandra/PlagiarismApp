<form action="<?= base_url('plagiarismjournal/process') ?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Your Journal</label>
                <select class="form-control select2bs4" name="journal1" required>
                    <option value="0">Select Journal</option>
                    <?php
                    foreach ($journaluser as $ju) {
                        echo "<option value='$ju->id' >$ju->title</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Comparison journal 1</label>
                <select class="form-control select2bs4" name="journal2" required>
                    <option value="0">Select Journal</option>
                    <?php
                    foreach ($journals as $j) {
                        echo "<option value='$j->id'>$j->title</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Comparison journal 2</label>
                <select class="form-control select2bs4" name="journal3" required>
                    <option value="0">Select Journal</option>
                    <?php
                    foreach ($journals as $j) {
                        echo "<option value='$j->id'>$j->title</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <!-- <div class="row"> -->
    <!-- <div class="col-sm-3"> -->
    <!-- textarea -->
    <!-- <div class="form-group">
                <label>K-Gram</label>
                <input type="text" class="form-control" placeholder="K-Gram" name="kgram">
            </div> -->
    <!-- </div> -->

    <!-- </div> -->
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary col-12">Check</button>
            </div>
        </div>
    </div>
</form>