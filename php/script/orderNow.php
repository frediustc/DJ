<?php
if(isset($_POST['orderitnow']))
{
    function changedateformat($in)
    {
        $d = explode('/', $in);
        return $d[2] . '-' . $d[0] . '-' . $d[1] ;
    }
    $sd = changedateformat(trim(htmlspecialchars($_POST['sd'])));
    $ed = changedateformat(trim(htmlspecialchars($_POST['ed'])));
    $du = trim(htmlspecialchars($_POST['du']));
    $desc = trim(htmlspecialchars($_POST['desc']));

    $i = $db->prepare('INSERT INTO orders(pid, uid, sd, ed, description, status, duration) VALUES(?, ?, ?, ?, ?, "pending",?)');
    if($i->execute(array($_GET['id'], $_SESSION['id'], $sd, $ed, $desc, $du)))
    {
        echo '<p class="alert bg-success">Order successfully done</p>';
    }
    else {
        echo '<p class="alert bg-danger">Error</p>';
    }

}
