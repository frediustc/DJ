<?php

if(isset($_GET['id'])){
    require '../include/db.php';
    //accept
    if(isset($_GET['accept'])){
        $update = $db->prepare('UPDATE orders SET status = "active" WHERE id = ?');
    }
    //delete
    if(isset($_GET['delete'])){
        $update = $db->prepare('DELETE FROM orders WHERE id = ?');
    }
    //denied
    if(isset($_GET['denied'])){
        $update = $db->prepare('UPDATE orders SET status = "denied" WHERE id = ?');
    }

    $update->execute(array($_GET['id']));
}
header('location:'. $_SERVER['HTTP_REFERER']);
