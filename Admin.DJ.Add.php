<?php include 'php/include/checkAdmin.php'; ?>
<?php include 'php/include/head.php' ?>
<?php include 'php/script/UserReg.php' ?>

<div class="main-page">
    <p><a href="Admin.DJ.php" class="btn btn-primary btn-lg">View DJ List</a></p>
    <div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Add New DJ :</h4>
            </div>
            <div class="form-body">
                <form method="post" action="Admin.DJ.Add.php">
                    <div class="form-group">
                        <label>FullName</label>
                        <input type="text" class="form-control" required name="fn">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" required name="em">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" required name="gd">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" required name="psw">
                        <p class="help-block">between 6 - 16 characters.</p>
                    </div>
                    <div class="form-group">
                        <label>Confirm</label>
                        <input type="password" class="form-control" required name="cn">
                    </div>
                    <button type="submit" name="insDJ" class="btn btn-default">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'php/include/footer.php' ?>
