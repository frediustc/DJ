<?php $count = $db->prepare('SELECT
(SELECT COUNT(id) FROM users WHERE usertype = 1) AS cc,
(SELECT COUNT(id) FROM users WHERE usertype = 2) AS cd,
(SELECT COUNT(id) FROM equipments) AS ce,
(SELECT COUNT(id) FROM orders) AS co
');
$count->execute();
$c = $count->fetch();
 ?>
<ul class="nav" id="side-menu">
    <li>
        <a href="Admin.Dashboard.php" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
    </li>
    <li>
        <a href="Admin.Clients.php"><i class="fa fa-users nav_icon"></i>Clients<span class="nav-badge"><?php echo $c['cc'] ?></span> </a>
    </li>
    <li>
        <a href="Admin.DJ.php"><i class="fa fa-user nav_icon"></i>DJ <span class="nav-badge"><?php echo $c['cd'] ?></span> </a>
    </li>
    <li>
        <a href="Admin.Equipments.php"><i class="fa fa-list nav_icon"></i>Equipements <span class="nav-badge"><?php echo $c['ce'] ?></span> </a>
    </li>

    <li>
        <a href="Admin.Orders.php"><i class="fa fa-envelope nav_icon"></i>Orders<span class="nav-badge"><?php echo $c['co'] ?></span></a>
    </li>
</ul>
