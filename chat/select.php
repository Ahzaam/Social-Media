<?php
session_start();
require("../con.php");

$owner = $_SESSION['owner-id'];
$with = $_REQUEST['personid'];


$query = "SELECT * FROM chats WHERE (chatA = '$owner' AND chatB = '$with') OR (chatA = '$owner' OR chatB = '$with')";
echo $query;
$rs = $conn->query($query);



if($rs->num_rows > 0){
  $row= $rs->fetch_assoc();
  echo "<br/>" . $chatid;
  echo "<br>have";
  header("Location:chat.php?id=$chatid");

}else{
  $newchatid = $owner . "cht" . $with;
  $addchat = "INSERT INTO chats (`chat-id`, `chatA`, `chatB`)  VALUES ('$newchatid', '$owner', '$with')";

  $addchat = $conn->query($addchat);
  echo "Not have ". $addchat;
}




?>
