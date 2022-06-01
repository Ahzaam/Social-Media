<?php
if (isset($_POST['chatid'])){
  echo "<pre>";
  echo print_r($_POST);

  $chatid = $_POST['chatid'];
  $sender = $_POST['sender'];
  $reciever = $_POST['receiver'];
  $msg = $_POST['message'];


  $sql = "INSERT INTO chat (`chat-id`, `sender`, `reciever`, `message`) VALUES('$chatid','$sender','$reciever','$msg')";
  echo $sql;
  require("../con.php");
  $result = $conn->query($sql);

  if($result > 0 ){
    echo "success" . $result;
  }else{
    echo "fail" . $result;
  }

}

 ?>
