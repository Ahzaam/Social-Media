<?php

if(isset($_POST['comment'])){
  $msg = $_POST['comment'];
  $id = $_POST['id'];
  $name= $_POST['name'];



  $select = "SELECT * FROM collection WHERE id = $id";

  require("../con.php");
  $comments = mysqli_query($conn, $select);

  $row = $comments->fetch_assoc();

  $old = $row['comment'];

  if($old != ""){
    $breaker = ":;";
  }else{
    $breaker = "";
  }

  $new = $old.  $breaker . $name . "#" . $msg  ;



  $insert = "UPDATE collection SET comment = '$new' WHERE id = $id";

  $suc = mysqli_query($conn, $insert);


}

 ?>
