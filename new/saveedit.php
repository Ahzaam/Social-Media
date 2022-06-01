<?php

require("../con.php");
  if($conn -> connect_error){
       echo "<pre>";
       echo $mysqli -> connect_error;
       echo "Conncetion Failed";
       echo "<pre/>";
       header("Location: new.php?status=fail");
     }else{

       $id = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $description = $_REQUEST['description'];

       $stmt = $conn->prepare("UPDATE collection SET name ='$name', description='$description'  WHERE `id`= $id");
       $stmt->execute();

       header("Location: ../new");

     }


 ?>
