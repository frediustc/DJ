
<?php include 'php/include/head.php' ?>

<div class="main-page">
    <div class="inbox-page row">
        <h4>Pending Orders</h4>
        <?php
        $orders = $db->prepare('
            SELECT orders.sd, orders.id, orders.ed, orders.duration, users.fullname, orders.pid, equipments.name, equipments.description, equipments.price
            FROM orders
            INNER JOIN users ON users.id = orders.uid
            INNER JOIN equipments ON equipments.id = orders.pid
            WHERE status = "pending"');
        $orders->execute();
        while ($o = $orders->fetch()) {
            $period = $o['sd'] == $o['ed'] ? $o['sd'] : $o['sd'] . ' to ' . $o['ed'];
            $dj = $db->prepare('SELECT users.fullname
                 FROM equipments
                 INNER JOIN users ON users.id = equipments.dj
                 WHERE equipments.id = ?');
            $dj->execute(array($o['pid']));
            $d = $dj->fetch();
            ?>

        <div class="inbox-row widget-shadow">
            <div class="mail"><img src="images/equip/eq_<?php echo $o['pid'] ?>.jpg" alt="<?php echo $o['name'] ?>"/></div>
            <div class="mail mail-name"><h6> <?php echo $o['fullname'] ?> </h6></div>
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $o['id'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $o['id'] ?>">
                <div class="mail"><p><?php echo $o['name'] ?> </p></div>
            </a>
            <div class="mail-right">
                <div class="dropdown">
                    <a href="#"  data-toggle="dropdown" aria-expanded="false">
                        <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
                    </a>
                    <ul class="dropdown-menu float-right">
                        <li>
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $o['id'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $o['id'] ?>">
                                <i class="fa fa-reply mail-icon"></i>
                                Details
                            </a>
                        </li>
                        <li>
                            <a href="php/script/deniedOpt.php?id=<?php echo $o['id'] ?>&accept=true" title="">
                                <i class="fa fa-download mail-icon"></i>
                                Accept
                            </a>
                        </li>
                        <li>
                            <a href="php/script/deniedOpt.php?id=<?php echo $o['id'] ?>&denied=true" class="font-red" title="">
                                <i class="fa fa-trash-o mail-icon"></i>
                                Decline
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mail-right"><p><?php echo $period ?></p></div>
            <div class="clearfix"> </div>
            <div id="collapse<?php echo $o['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="mail-body">
                    <p>Description: <?php echo $o['description'] ?></p>
                    <p>From <mark><?php echo $o['sd'] ?></mark> to <mark><?php echo $o['ed'] ?></mark></p>
                    <p>DJ: <mark><?php echo $d['fullname'] ?></mark></p>
                    <p>Total price: <mark><?php echo (double)$o['duration'] * (double)$o['price'] ?>Ghc</mark></p>
                </div>
            </div>
        </div>
        <?php } $orders->closeCursor(); ?>
    </div>
    <div class="inbox-page row">
        <h4>Accepted Orders</h4>
        <?php
        $orders = $db->prepare('
            SELECT orders.sd, orders.id, orders.ed, orders.duration, users.fullname, orders.pid, equipments.name, equipments.description, equipments.price
            FROM orders
            INNER JOIN users ON users.id = orders.uid
            INNER JOIN equipments ON equipments.id = orders.pid
            WHERE status = "active"');
        $orders->execute();
        while ($o = $orders->fetch()) {
            $period = $o['sd'] == $o['ed'] ? $o['sd'] : $o['sd'] . ' to ' . $o['ed'];
            $dj = $db->prepare('SELECT users.fullname
                 FROM equipments
                 INNER JOIN users ON users.id = equipments.dj
                 WHERE equipments.id = ?');
            $dj->execute(array($o['pid']));
            $d = $dj->fetch();
            ?>

            <div class="inbox-row widget-shadow">
                <div class="mail"><img src="images/equip/eq_<?php echo $o['pid'] ?>.jpg" alt="<?php echo $o['name'] ?>"/></div>
                <div class="mail mail-name"><h6> <?php echo $o['fullname'] ?> </h6></div>
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $o['id'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $o['id'] ?>">
                    <div class="mail"><p><?php echo $o['name'] ?> </p></div>
                </a>
                <div class="mail-right">
                    <div class="dropdown">
                        <a href="#"  data-toggle="dropdown" aria-expanded="false">
                            <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
                        </a>
                        <ul class="dropdown-menu float-right">
                            <li>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $o['id'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $o['id'] ?>">
                                    <i class="fa fa-reply mail-icon"></i>
                                    Details
                                </a>
                            </li>
                            <li>
                                <a href="php/script/deniedOpt.php?id=<?php echo $o['id'] ?>&denied=true" class="font-red" title="">
                                    <i class="fa fa-trash-o mail-icon"></i>
                                    Decline
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mail-right"><p><?php echo $period ?></p></div>
                <div class="clearfix"> </div>
                <div id="collapse<?php echo $o['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                    <div class="mail-body">
                        <p>Description: <?php echo $o['description'] ?></p>
                        <p>From <mark><?php echo $o['sd'] ?></mark> to <mark><?php echo $o['ed'] ?></mark></p>
                        <p>DJ: <mark><?php echo $d['fullname'] ?></mark></p>
                        <p>Total price: <mark><?php echo (double)$o['duration'] * (double)$o['price'] ?>Ghc</mark></p>
                    </div>
                </div>
            </div>
        <?php } $orders->closeCursor(); ?>
    </div>
    <div class="inbox-page row">
        <h4>Declined Orders</h4>
        <?php
        $orders = $db->prepare('
            SELECT orders.sd, orders.id, orders.ed, orders.duration, users.fullname, orders.pid, equipments.name, equipments.description, equipments.price
            FROM orders
            INNER JOIN users ON users.id = orders.uid
            INNER JOIN equipments ON equipments.id = orders.pid
            WHERE status = "denied"');
        $orders->execute();
        while ($o = $orders->fetch()) {
            $period = $o['sd'] == $o['ed'] ? $o['sd'] : $o['sd'] . ' to ' . $o['ed'];
            $dj = $db->prepare('SELECT users.fullname
                 FROM equipments
                 INNER JOIN users ON users.id = equipments.dj
                 WHERE equipments.id = ?');
            $dj->execute(array($o['pid']));
            $d = $dj->fetch();
            ?>

            <div class="inbox-row widget-shadow">
                <div class="mail"><img src="images/equip/eq_<?php echo $o['pid'] ?>.jpg" alt="<?php echo $o['name'] ?>"/></div>
                <div class="mail mail-name"><h6> <?php echo $o['fullname'] ?> </h6></div>
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $o['id'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $o['id'] ?>">
                    <div class="mail"><p><?php echo $o['name'] ?> </p></div>
                </a>
                <div class="mail-right">
                    <div class="dropdown">
                        <a href="#"  data-toggle="dropdown" aria-expanded="false">
                            <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
                        </a>
                        <ul class="dropdown-menu float-right">
                            <li>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $o['id'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $o['id'] ?>">
                                    <i class="fa fa-reply mail-icon"></i>
                                    Details
                                </a>
                            </li>
                            <li>
                                <a href="php/script/deniedOpt.php?id=<?php echo $o['id'] ?>&accept=true" title="">
                                    <i class="fa fa-download mail-icon"></i>
                                    Accept
                                </a>
                            </li>
                            <li>
                                <a href="php/script/deniedOpt.php?id=<?php echo $o['id'] ?>&delete=true" class="font-red" title="">
                                    <i class="fa fa-trash-o mail-icon"></i>
                                    Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mail-right"><p><?php echo $period ?></p></div>
                <div class="clearfix"> </div>
                <div id="collapse<?php echo $o['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                    <div class="mail-body">
                        <p>Description: <?php echo $o['description'] ?></p>
                        <p>From <mark><?php echo $o['sd'] ?></mark> to <mark><?php echo $o['ed'] ?></mark></p>
                        <p>DJ: <mark><?php echo $d['fullname'] ?></mark></p>
                        <p>Total price: <mark><?php echo (double)$o['duration'] * (double)$o['price'] ?>Ghc</mark></p>
                    </div>
                </div>
            </div>
        <?php } $orders->closeCursor(); ?>
    </div>
</div>

<?php include 'php/include/footer.php' ?>
