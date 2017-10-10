<?php include 'php/include/checkDJ.php'; ?>
<?php include 'php/include/head.php';
$eqs = $db->prepare('SELECT equipments.*, users.fullname, users.id AS uid
    FROM equipments
    INNER JOIN users ON users.id = equipments.dj
    WHERE dj = ? ORDER BY creation DESC');
$eqs->execute(array($_SESSION['id']));
$i = 0;
?>

<div class="main-page">
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
                    </tr>
                </thead>
                <tbody>
                    <?php while ($eq = $eqs->fetch()) { $i++; ?>
                    <tr>
                        <th scope="row"><img src="images/equip/eq_<?php echo $eq['id'] ?>.jpg" alt="prev Image" class="prevImg"></th>
                        <td><?php echo $eq['name'] ?></td>
                        <td><?php echo $eq['description'] ?></td>
                        <td><?php echo $eq['price'] ?>Ghc</td>
                        <td>
                            <?php echo $eq['fullname'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'php/include/footer.php' ?>
