<?php include 'php/include/head.php' ?>
<div class="container">
    <!-- <?php $us = $db->prepare('SELECT * FROM users WHERE') ?> -->
    <?php include '../php/script/UserReg.php'; ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <form  method="post" action="account.php" class="persoInfo">
                <h3>PERSONAL INFORMATION</h3>
                <div class="form-group">
                    <span>Full Name<label>*</label></span>
                    <input type="text" name="fn" required class="form-control" value="<?php echo $_SESSION['f'] ?>">
                </div>
                <div class="form-group">
                    <span>Email Address<label>*</label></span>
                    <input type="email" name="em" required class="form-control" value="<?php echo $_SESSION['e'] ?>">
                </div>
                <div class="clear"> </div>
                <div class="form-group">
                    <span>Gender<label>*</label></span>
                    <select class="form-control" required class="form-control" name="gd">
                        <option value="Male" <?php echo$_SESSION['g'] == 'Male' ? 'selected' : '' ?> >Male</option>
                        <option value="Female" <?php echo$_SESSION['g'] == 'Female' ? 'selected' : '' ?> >Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <span>New Password<label></label></span>
                    <input type="password" name="ps" class="form-control">
                </div>
                <div class="form-group">
                    <span>Confirm New Password<label></label></span>
                    <input type="password" name="cn" class="form-control">
                </div>
                <button type="submit" name="cupd" class="btn btn-primary btn-block">Update</button>
                <p>field with (*) are required</p>
            </form>
        </div>
        <div class="col-xs-6">
            <div class="persoInfo">
                <h3>Orders</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Client</th>
                          <th>DJ</th>
                          <th>Status</th>
                          <th>Start day</th>
                          <th>End day</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $orders = $db->prepare('SELECT orders.sd, orders.status, orders.ed, users.fullname, orders.pid
                            FROM orders
                            INNER JOIN users ON users.id = orders.uid
                            WHERE uid = ? LIMIT 5');
                        $orders->execute(array($_SESSION['id']));
                        while ($o = $orders->fetch()) {
                            $dj = $db->prepare('SELECT users.fullname
                                 FROM equipments
                                 INNER JOIN users ON users.id = equipments.dj
                                 WHERE equipments.id = ?');
                            $dj->execute(array($o['pid']));
                            $d = $dj->fetch();
                            ?>
                            <tr>
                              <th scope="row">1</th>
                              <td><?php echo $o['fullname'] ?></td>
                              <td><?php echo $d['fullname'] ?></td>
                              <td><?php echo $o['status'] ?></td>
                              <td><?php echo $o['sd'] ?></td>
                              <td><?php echo $o['ed'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'php/include/foot.php' ?>
