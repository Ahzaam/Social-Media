<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chat</title>
    <link rel="stylesheet" href="../bootsrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootsrap/icon_css/all.css">
    <script type="text/javascript" src="../bootsrap/icon_js/all.js"></script>
		<script type="text/javascript" src="../bootsrap/js/bootstrap.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/style.css">

    <style media="screen">
      .chats{
        height:60px;
        background-color:;
        cursor:pointer;
        margin-bottom: 10px;
        border-bottom: 1px solid rgb(142, 142, 142);
        text-align:left;

      }

      .chats:hover{
        background-color:rgb(223, 219, 219);
      }

      .chat_container{
        margin:auto;
      }

      .profile, img{
        width:50px;
        height:50px;
        display: inline-block;
        float:left;
        /* margin:5px 0 0 0; */
        background-color:rgb(147, 147, 147);
        border-radius:25px;
        /* padding:6px 0 0 10px; */
        padding:0;
        color:white;
      }

      .name{
        padding:10px;
        margin-left:50px;
      }
      a{
        text-decoration:none;
        color:black;
      }

      a:hover{
        color:black;
      }
    </style>

  </head>
  <body>
    <div class="container  text-center">
      <h1 class="display-3">Chats</h1>
    </div>
    <div class="container px-5 text-center">
      <div class="chat_container col-lg-4 col-md-12 " id="chats">


        <?php

        require("../con.php");

        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql); //

          $owner = $_SESSION['owner-id'];




        while ($row = $result->fetch_assoc()){

          $id = $row['client_id'];
          $name = $row['name'];
          $image = $row['image'];

          if($image == ""){
            $image = "../profile/images/defultm.png";
          }else{
              $image = "../" . $image;
          }

          if($_SESSION['owner-id'] != $id){
            $checkid = "SELECT * FROM chats WHERE `chat-id` = '".$owner."cht".$id."' OR `chat-id` = '".$id."cht".$owner."'";
            $check = $conn->query($checkid);

            if($check->num_rows > 0 ){
              $chatid = $check->fetch_assoc();

              $chtid = $chatid['chat-id'];
              echo "
                <a href='some.php?personid=$id&name=$name&chatid=$chtid'>
                  <div class='chats text-left'>
                    <div class='profile'>
                      <img src='$image' alt='$image' >
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
                <a href='some.php?personid=$id&name=$name&chatid=$newchatid'>
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



      </div>
    </div>






    <div class="navdiv text-center">
      <nav class="nav offset-lg-3 col-lg-6 offset-sm-1 col-sm-10">

        <a href="../" class="nav__link ">
          <i class="fa fa-home fa-3x"></i>
          <span class="nav__text">Home</span>
        </a>

        <a href="../profile/" class="nav__link ">
          <i class="fa fa-user fa-3x"></i>
          <span class="nav__text"><?php echo $_SESSION['name']; ?></span>
        </a>

        <a type="bvcc" href="../new/" class="nav__link ">
          <i class="fa fa-plus fa-3x"></i>
          <span class="nav__text">Edit</span>
        </a>

        <a href="#" class="nav__link nav__link--active">
          <i class="fa fa-comments fa-3x"></i>
          <span class="nav__text">Chat</span>
        </a>

        <a href='../Login/logout.php' class='nav__link '>
            <i class='fa fa-arrow-right fa-3x'></i>
            <span class="nav__text">Log Out</span>
        </a>


      </nav>
    </div>
    <script type="text/javascript" src="../js/ajax/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        // $.ajax({
        //   type: "GET",
        //   url: "chats.php",
        //   dataType: "html",
        //   success: function(data, status){
        //     $('#chats').html(data);
        //     console.log(data);
        //   }
        // });

        // let id_s = document.querySelectorAll(".chats");
        // for (var i = 0; i < id_s.length; i++){
        //   id_s[i].addEventListener("click", function(){
        //
        //   });
        // }
      });


    </script>

  </body>
</html>
