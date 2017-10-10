<?php $count = $db->prepare('SELECT
(SELECT COUNT(orders.uid)
FROM orders
INNER JOIN equipments ON equipments.id = orders.pid
RIGHT OUTER JOIN users ON users.id = equipments.dj where orders.status = "active") AS cc,
(SELECT COUNT(equipments.id) FROM equipments INNER JOIN users ON users.id = equipments.dj WHERE dj = ?) AS ce,
(SELECT COUNT(orders.id)
FROM orders
INNER JOIN users ON users.id = orders.uid
INNER JOIN equipments ON equipments.id = orders.pid
WHERE status = "active" AND equipments.dj = ?) AS co
');
$count->execute(array($_SESSION['id'], $_SESSION['id']));
$c = $count->fetch();
 ?>
<ul class="nav" id="side-menu">
    <li>
        <a href="DJ.Dashboard.php" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
    </li>
    <li>
        <a href="DJ.Clients.php"><i class="fa fa-users nav_icon"></i>Clients<span class="nav-badge"><?php echo $c['cc'] ?></span> </a>
    </li>
    <li>
        <a href="DJ.Equipments.php"><i class="fa fa-list nav_icon"></i>Equipements <span class="nav-badge"><?php echo $c['ce'] ?></span> </a>
    </li>

    <li>
        <a href="DJ.Orders.php"><i class="fa fa-envelope nav_icon"></i>Orders<span class="nav-badge"><?php echo $c['co'] ?></span></a>
    </li>
</ul>
