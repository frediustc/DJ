
<?php include 'php/include/head.php' ?>
<?php include 'php/script/UserReg.php' ?>
<?php
$dj = $db->prepare('SELECT * FROM users WHERE id = ?');
$dj->execute(array($_GET['id']));
$d = $dj->fetch();
 ?>
<div class="main-page">
    <div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Update DJ Details :</h4>
            </div>
            <div class="form-body">
                <form method="post" action="Admin.DJ.Edit.php?id=<?php echo $_GET['id'] ?> ">
                    <div class="form-group">
                        <label>FullName</label>
                        <input type="text" class="form-control" required name="fn" value="<?php echo $d['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" required name="em" value="<?php echo $d['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" required name="gd">
                            <option value="Male" <?php echo $d['gender'] == 'Male' ? 'selected' : '' ?> >Male</option>
                            <option value="Female" <?php echo $d['gender'] == 'Female' ? 'selected' : '' ?> >Female</option>
                        </select>
                    </div>
                    <button type="submit" name="updateDJ" class="btn btn-default">update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'php/include/footer.php' ?>
