<?php
session_start();
$sql = "SELECT * FROM chat WHERE `chat-id` = '" . $_REQUEST['chatid'] . "'  AND status ='unread'";

require("../con.php");

$result = $conn->query($sql);
$owner = $_SESSION['owner-id'];
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    if($row['sender'] != $owner){
      $read = "UPDATE chat SET status = 'read'";
      $tick = $conn->query($read);

          echo $row['message'];

    }
  }
}

 ?>
