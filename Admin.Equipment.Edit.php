<?php include 'php/include/checkAdmin.php'; ?>
<?php include 'php/include/head.php' ?>
<?php include 'php/script/equipment.php' ?>
<?php $sel = $db->prepare('SELECT * FROM equipments WHERE id = ?');
$sel->execute(array($_GET['id']));
$e = $sel->fetch();
?>
<div class="main-page">
    <div class="forms">
            <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                <div class="form-title">
                    <h4>Update Equipment :</h4>
                </div>
                <div class="form-body">
                    <form method="post" action="Admin.equipment.Edit.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>name</label>
                            <input type="text" class="form-control" required name="name" value="<?php echo $e['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <textarea class="form-control" required name="desc"><?php echo $e['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input type="text" class="form-control" required name="price" value="<?php echo $e['price']; ?>">
                        </div>
                        <div class="form-group">
                            <label>DJ</label>
                            <?php $djs = $db->prepare('SELECT * FROM users WHERE usertype = 2 ORDER BY fullname');
                            $djs->execute();
                             ?>
                            <select class="form-control" required name="dj">
                                <?php while ($dj = $djs->fetch()) { ?>
                                <option value="<?php echo $dj['id'] ?>" <?php echo $e['dj'] == $dj['id'] ? 'selected' : '' ?> ><?php echo $dj['fullname'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>picture</label>
                            <input type="file" class="form-control" name="pic">
                        </div>
                        <button type="submit" name="update" class="btn btn-default">Update Equipment</button>
                    </form>
                </div>
            </div>
    </div>
</div>

<?php include 'php/include/footer.php' ?>
