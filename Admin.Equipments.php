<?php include 'php/include/checkAdmin.php'; ?>
<?php include 'php/include/head.php';
$eqs = $db->prepare('SELECT equipments.*, users.fullname, users.id AS uid
    FROM equipments
    INNER JOIN users ON users.id = equipments.dj
    ORDER BY creation DESC');
$eqs->execute();
$i = 0;
?>

<div class="main-page">
    <p><a href="Admin.Equipment.Add.php" class="btn btn-primary btn-lg">Add Equipments</a></p>
    <div class="tables">
        <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <h4>Equipments lists</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Previous</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>DJ</th>
                        <th>Opt.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($eq = $eqs->fetch()) { $i++; ?>
                    <tr>
                        <th scope="row"><img src="images/equip/eq_<?php echo $eq['id'] ?>.jpg" alt="prev Image" class="prevImg"></th>
                        <td><?php echo $eq['name'] ?></td>
                        <td><?php echo $eq['description'] ?></td>
                        <td><?php echo $eq['price'] ?></td>
                        <td>
                            <a href="viewDJ.php?id=<?php echo $eq['uid'] ?>">
                                <?php echo $eq['fullname'] ?>
                            </a>
                        </td>
                        <td><div class="mail-right">
                            <div class="dropdown">
                                <a href="#"  data-toggle="dropdown" aria-expanded="false">
                                    <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
                                </a>
                                <ul class="dropdown-menu float-left">
                                    <li>
                                        <a href="viewEq.php?id=<?php echo $eq['id'] ?>">
                                            <i class="fa fa-reply mail-icon"></i>
                                            View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Admin.Equipment.Edit.php?id=<?php echo $eq['id'] ?>" title="">
                                            <i class="fa fa-download mail-icon"></i>
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="php/script/deleteEquipement.php?id=<?php echo $eq['id'] ?>" class="font-red" title="">
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
