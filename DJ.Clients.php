<?php
include 'php/include/checkDJ.php';
include 'php/include/head.php';
$djs = $db->prepare('
SELECT DISTINCT orders.uid
FROM orders
INNER JOIN equipments ON equipments.id = orders.pid
RIGHT OUTER JOIN users ON users.id = equipments.dj where orders.status = "active"');
$djs->execute();
$i = 0;
?>

<div class="main-page">
    <div class="tables">
        <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <h4>Clients list</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>gender</th>
                        <th>opt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($dj = $djs->fetch()) {
                        $cl = $db->prepare('SELECT * FROM users WHERE id = ?');
                        $cl->execute(array($dj['uid']));
                        $c = $cl->fetch();
                        if(!empty($dj['uid'])){
                            $i++;
                        ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $c['fullname'] ?></td>
                        <td><?php echo $c['email'] ?></td>
                        <td><?php echo $c['gender'] ?></td>
                        <td><div class="mail-right">
                            <div class="dropdown">
                                <a href="#"  data-toggle="dropdown" aria-expanded="false">
                                    <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
                                </a>
                                <ul class="dropdown-menu float-left">
                                    <li>
                                        <a href="viewCl.php?id=<?php echo $c['id'] ?>">
                                            <i class="fa fa-reply mail-icon"></i>
                                            View
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div></td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'php/include/footer.php' ?>
