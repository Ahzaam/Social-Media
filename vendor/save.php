<?php

$dbhost = 'localhost';
$dbusername = 'root';
$dbpword = '';
$dbdatabase = 'db_ad';

 $conn = new mysqli($dbhost, $dbusername, $dbpword, $dbdatabase);

  if($conn -> connect_error){
       header("Location: additem.php?status=fail");
     }else{

       $name = $_POST['name'];
       $price = $_POST['price'];
       $description = $_POST['description'];
       $stock = $_POST['stock'];

       $x = $conn->query("INSERT INTO products (name, price, description, stock) VALUES('$name', '$price', '$description', '$stock')");
       if($x>0){
         header("Location: additem.php?status=pass");
       }else{
         header("Location: additem.php?status=fail");
       }

     }


 ?>
