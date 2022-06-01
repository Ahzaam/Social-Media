<?php
include "../con.php";

session_start();

if(isset($_POST['crop_image']))
{

    $data = $_POST['crop_image'];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $base64_decode = base64_decode($image_array_2[1]);
    $path_img = '../profile/images/'.time().'.png';
    $imagename = ''.time().'.png';

    $_SESSION['image'] = "profile/images/" . $imagename;

    file_put_contents($path_img, $base64_decode);

    $sql2 = "INSERT INTO collection (name, owner, description, image) VALUES ('$name', '$owner','$description', 'images/$imagename' )";
    echo $sql2;


}
?>
