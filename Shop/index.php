<?php include 'php/include/head.php' ?>

<?php

$prod = $db->prepare('SELECT equipments.*, users.fullname, users.id AS uid
    FROM equipments
    INNER JOIN users ON users.id = equipments.dj
    ORDER BY id DESC');
$prod->execute();
 ?>

<!--- start-content---->
<div class="content">
<div class="wrap">
<!-- <div class="content-left">

        <div class="content-left-bottom-grid">
            <h2>Hot</h2>
            <h4>Boys Football:</h4>
            <div class="content-left-bottom-grids">
                <div class="content-left-bottom-grid1">
                    <img src="images/foot-ball.jpg" title="football" />
                    <h5><a href="details.html">Nike Strike PL Hi-Vis</a></h5>
                    <span> Football</span>
                    <label>&#163; 375</label>
                </div>
                <div class="content-left-bottom-grid1">
                    <img src="images/jarse.jpg" title="jarse" />
                    <h5><a href="details.html">Nike Strike PL Hi-Vis</a></h5>
                    <span> Football</span>
                    <label>&#163; 375</label>
                </div>
            </div>
        </div>
</div> -->
<div class="content-right">
    <div class="product-grids">
        <?php while ($p = $prod->fetch()) { ?>
        <div class="product-grid ">
            <div class="product-grid-head">
                <p><?php echo strtoupper($p['name']) ?></p>
            </div>
            <div class="product-pic">
                <a href="details.php?id=<?php echo $p['id'] ?>"><img src="../images/equip/eq_<?php echo $p['id'] ?>.jpg" alt="<?php echo $p['name'] ?>" /></a>
                <p>
                    <a href="details.php?id=<?php echo $p['id'] ?>"><?php echo $p['description'] ?></a>
                    <span>DJ: <?php echo $p['fullname'] ?></span>
                </p>
            </div>
            <div class="product-info">
                <div class="product-info-cust">
                    <a href="details.php?id=<?php echo $p['id'] ?>">Details</a>
                </div>
                <div class="product-info-price">
                    <a href="details.php?id=<?php echo $p['id'] ?>"><?php echo $p['price'] ?>Ghc </a>
                </div>
                <div class="clear"> </div>
            </div>
        </div>

        <?php } ?>
        <div class="clear"> </div>
    </div>
</div>
<div class="clear"> </div>
</div>
</div>
</div>
<?php include 'php/include/foot.php'; ?>
