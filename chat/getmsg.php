<?php
session_start();
$sql = "SELECT * FROM chat WHERE `chat-id` = '" . $_REQUEST['chatid'] . "'";

require("../con.php");

$result = $conn->query($sql);
$owner = $_SESSION['owner-id'];
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    if($row['sender'] == $owner){

      echo "
    <div  class='chats sender'>
      <div class='inchat'>
        <p class='display-6'>".
          $row['message'] ."
        </p>
      </div>
    </div>
    ";

  }else{
    echo "
  <div  class='chats reciever'>
    <div class='inchat'>
      <p class='display-6'>".
        $row['message'] ."
      </p>
    </div>
  </div>
  ";
  }


  }
}

 ?>

 <?php
 $sql = "SELECT * FROM chat WHERE `chat-id` = '" . $_REQUEST['chatid'] . "'";

 require("../con.php");

 $result = $conn->query($sql);
 $owner = $_SESSION['owner-id'];
 if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
     if($row['sender'] == $owner){

       echo "
     <div  class='chats sender'>
       <div class='inchat'>
         <p class='display-6'>".
           $row['message'] ."
         </p>
       </div>
     </div>
     ";

   }else{
     echo "
   <div  class='chats reciever'>
     <div class='inchat'>
       <p class='display-6'>".
         $row['message'] ."
       </p>
     </div>
   </div>
   ";
   }


   }
 }

  ?>
