<?php
include "con.php";
if(isset($_POST['crop_image']))
{
    $data = $_POST['crop_image'];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $base64_decode = base64_decode($image_array_2[1]);
    $path_img = 'images/'.time().'.png';
    $imagename = ''.time().'.png';
    file_put_contents($path_img, $base64_decode);


    $stmt = $conn->prepare("INSERT INTO collection(name, description, image, owner) VALUES( ?, ?, ?, ?)");
    echo "INSERT INTO collection(name, description, image, owner) VALUES( ?, ?, ?, ?, )";
    $stmt->bind_param('sssi', $_POST['name'], $_POST['description'], $img_path, $_POST['owner']);
    $stmt->execute();
}
?>
