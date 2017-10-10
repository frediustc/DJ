<!--left-fixed -navigation-->
<div class=" sidebar" role="navigation">
    <div class="navbar-collapse">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <?php switch ($_SESSION['u']) {
                case 2:
                    include 'php/include/DJ.menu.php';
                    break;
                case 3:
                    include 'php/include/admin.menu.php';
                    break;
            } ?>
            <!-- //sidebar-collapse -->
        </nav>
    </div>
</div>
<!--left-fixed -navigation-->
