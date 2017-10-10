
<?php include 'php/include/head.php';
$djs = $db->prepare('SELECT * FROM users WHERE usertype = 2 ORDER BY fullname');
$djs->execute();
$i = 0;

?>

<div class="main-page">
    <p><a href="Admin.DJ.Add.php" class="btn btn-primary btn-lg">Add DJ</a></p>
    <div class="tables">
        <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <h4>DJ lists</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>gender</th>
                        <th>Equiped</th>
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
                        <?php
                        $c = $db->prepare('SELECT COUNT(*) AS c FROM equipments WHERE dj = ?');
                        $c->execute(array($dj['id']));
                        $_c = $c->fetch();
                         ?>
                        <td>
                            <a href="viewDJEq.php?id=<?php echo $dj['id'] ?>">
                                <?php echo $_c['c'] ?>
                            </a>
                        </td>
                        <td><div class="mail-right">
                            <div class="dropdown">
                                <a href="#"  data-toggle="dropdown" aria-expanded="false">
                                    <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
                                </a>
                                <ul class="dropdown-menu float-left">
                                    <li>
                                        <a href="view.DJ.php?id=<?php echo $dj['id'] ?>">
                                            <i class="fa fa-reply mail-icon"></i>
                                            View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Admin.DJ.Edit.php?id=<?php echo $dj['id'] ?>" title="">
                                            <i class="fa fa-download mail-icon"></i>
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="deleteDJ.php?id=<?php echo $dj['id'] ?>" class="font-red" title="">
                                            <i class="fa fa-trash-o mail-icon"></i>
                                            Delete
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
