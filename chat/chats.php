<?php
session_start();
require("../con.php");

$sql = "SELECT * FROM clients";
$result = $conn->query($sql); //

  $owner = $_SESSION['owner-id'];




while ($row = $result->fetch_assoc()){

  $id = $row['client_id'];
  $name = $row['name'];


  if($_SESSION['owner-id'] != $id){
    $checkid = "SELECT * FROM chats WHERE `chat-id` = '".$owner."cht".$id."' OR `chat-id` = '".$id."cht".$owner."'";
    $check = $conn->query($checkid);

    if($check->num_rows > 0 ){
      $chatid = $check->fetch_assoc();

      $chtid = $chatid['chat-id'];
      echo "
        <a href='chat.php?personid=$id&name=$name&chatid=$chtid'>
          <div class='chats text-left'>
            <div class='profile'>
              <i class='fa fa-user fa-2x'></i>
            </div>
            <div class='name'>
              <p class='lead'>".$row['name']."</p>
            </div>
            <input type='hidden' class='hidden' id='hid' value='hid$id'>
          </div>
        </a>";



    }else{
      $newchatid = $owner . "cht" . $id;
      $addchat = "INSERT INTO chats (`chat-id`, `chatA`, `chatB`)  VALUES ('$newchatid', '$owner', '$id')";
      $addchat = $conn->query($addchat);
      echo "
        <a href='chat.php?personid=$id&name=$name&chatid=$newchatid'>
          <div class='chats text-left'>
            <div class='profile'>
              <i class='fa fa-user fa-2x'></i>
            </div>
            <div class='name'>
              <p class='lead'>".$row['name']."</p>
            </div>
            <input type='hidden' class='hidden' id='hid' value='hid$id'>
          </div>
        </a>";

    }

  }

}

?>
