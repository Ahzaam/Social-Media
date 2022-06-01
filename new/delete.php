<?php
// DELETE FROM `products` WHERE 0
session_start();
require("../con.php");
 $conn = new mysqli($dbhost, $dbusername, $dbpword, $dbdatabase);

  if($conn -> connect_error){
       echo "<pre>";
       echo $mysqli -> connect_error;
       echo "Conncetion Failed";
       echo "<pre/>";
       header("Location: new.php?status=fail");
     }else{

       $id = $_REQUEST['id'];

       $stmt = $conn->prepare("DELETE FROM `collection` WHERE  `id` = '".$_REQUEST['del']."' " );
       $stmt->execute();

       unlink("../" . $_REQUEST['image']);


       header("Location: ../new");

     }



 ?>
