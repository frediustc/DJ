<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location: logout.php');
}
switch ($_SESSION['u']) {
    case 1:
        header('location: Shop/');
        break;
    case 2:
        header('location: DJ.Dashboard.php');
        break;
}
