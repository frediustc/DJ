<?php
$step1 = true;
$step2 = false;
if(isset($_POST['step1'])){
    $datas = array();
    $name = htmlspecialchars(trim($_POST['name']));
    $desc = htmlspecialchars(trim($_POST['desc']));
    $price = htmlspecialchars(trim($_POST['price']));
    $dj = htmlspecialchars(trim($_POST['dj']));
    $correct = true;

    //check if the Full Name format is correct (letter within 2 and 5 char)
    if(!preg_match('/^[a-zA-Z0-9 ]{5,32}$/', $name)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Name!</strong> 5 - 32 letters, numbers & spaces only</div>';
    }

    //check if the Full Name format is correct (letter within 2 and 5 char)
    if(!preg_match('/^[0-9]+((\.)?[0-9]+)?$/', $price)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Price!</strong> Wrong format</div>';
    }

    if(strlen($desc) < 6 || strlen($desc) > 200){
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Description!</strong> 6 - 200 characters</div>';
    }

    //if all is alright ($correct === true) we insert the value
    if($correct){
        $data = array(
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            'dj' => $dj
        );
        $step1 = false;
        $step2 = true;
    }
}
if(!empty($_FILES)){
echo "string";
$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'images/equip';   //2

$tempFile = $_FILES['file']['tmp_name'];          //3

$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

$targetFile =  $targetPath. $_FILES['file']['name'];  //5

move_uploaded_file($tempFile,$targetFile); //6

}
