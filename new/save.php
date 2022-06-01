<?php
include "../con.php";

if(isset($_POST['crop_image']))
{
    $name = $_POST['name'];
    $owner = $_POST['owner'];
    $description = $_POST['description'];

    $data = $_POST['crop_image'];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $base64_decode = base64_decode($image_array_2[1]);
    $path_img = '../images/'.time().'.png';
    $imagename = ''.time().'.png';


    file_put_contents($path_img, $base64_decode);
    $sql2 = "INSERT INTO collection (name, owner, description, image) VALUES ('$name', '$owner','$description', 'images/$imagename' )";
    $conn->query($sql2);
}
?>
