
<?php include 'php/include/head.php' ?>
<?php include 'php/script/equipement.php' ?>

<div class="main-page">
    <p><a href="Admin.Equipments.php" class="btn btn-primary btn-lg">View Equipment List</a></p>
    <div class="forms">
        <?php if ($step1): ?>
            <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                <div class="form-title">
                    <h4>Add New Equipment (step 1):</h4>
                </div>
                <div class="form-body">
                    <form method="post" action="Admin.equipment.Add.php">
                        <div class="form-group">
                            <label>name</label>
                            <input type="text" class="form-control" required name="name">
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <textarea class="form-control" required name="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input type="text" class="form-control" required name="price">
                        </div>
                        <div class="form-group">
                            <label>DJ</label>
                            <?php $djs = $db->prepare('SELECT * FROM users WHERE usertype = 2 ORDER BY fullname');
                            $djs->execute();
                             ?>
                            <select class="form-control" required name="dj">
                                <?php while ($dj = $djs->fetch()) { ?>
                                <option value="<?php echo $dj['id'] ?>"><?php echo $dj['fullname'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <button type="submit" name="step1" class="btn btn-default">next</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($step2): ?>
            <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                <div class="form-title">
                    <h4>Add New Equipment (step 2):</h4>
                </div>
                <div class="form-body">
                    <form method="post" action="Admin.equipment.Add.php" class="dropzone" enctype="multipart/form-data">

                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'php/include/footer.php' ?>
