
<?php include 'php/include/head.php';
$djs = $db->prepare('SELECT * FROM users WHERE usertype = 1 ORDER BY fullname');
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
                    <?php while ($dj = $djs->fetch()) { $i++; ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $dj['fullname'] ?></td>
                        <td><?php echo $dj['email'] ?></td>
                        <td><?php echo $dj['gender'] ?></td>
                        <td><div class="mail-right">
                            <div class="dropdown">
                                <a href="#"  data-toggle="dropdown" aria-expanded="false">
                                    <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
                                </a>
                                <ul class="dropdown-menu float-left">
                                    <li>
                                        <a href="viewCl.php?id=<?php echo $dj['id'] ?>">
                                            <i class="fa fa-reply mail-icon"></i>
                                            View
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'php/include/footer.php' ?>
