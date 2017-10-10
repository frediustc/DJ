<?php

if(isset($_GET['id'])){
    require '../include/db.php';

    //delete
    $update = $db->prepare('DELETE FROM users WHERE id = ?');
    $update->execute(array($_GET['id']));
}
header('location:'. $_SERVER['HTTP_REFERER']);
