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

    <link rel="stylesheet" href="../css/style.css">

    <style media="screen">

      .chat_container::-webkit-scrollbar {
        width: 4px;

      }

      /* Track */
      .chat_container::-webkit-scrollbar-track {
        background: #f1f1f1;

      }
      .chat_container{
        height:80%;
      }
      /* Handle */
      .chat_container::-webkit-scrollbar-thumb {
        background: #888;
        border-radius:2px;
      }

      /* Handle on hover */
      .chat_container::-webkit-scrollbar-thumb:hover {
        background: #555;

      }

      .chat_container{
        padding-right: 10px;
      }

      .reciever{
        text-align: left;
        padding-right:150px;
      }

      .sender{
        text-align: right;
        padding-left:150px;
      }

      .chats{
        width:100%;
        margin:10px;
      }

      .thhhe{
        /* width:80%; */
        border:1px solid rgb(117, 117, 117);
        border-radius:10px;
        padding:0 10px;

      }

    </style>


  </head>
  <body>
    <!-- <i class="fa fa-arrow-left d-inline-block"></i> -->
    <div class="container-fluid  text-center">
      <div class="chat_container col-md-12 col-lg-4 offset-lg-4 "  >
        <a href="../chat" class="btn btn-primary" name="button" style="margin-top:30px;float:left;"><i class="fa fa-arrow-left"></i> Back</a>
        <button onclick="location.reload();" class="btn btn-primary" name="button" style="margin-top:30px;margin-left:10px; float:left;">Reload</button>
        <h1 class="display-3 d-inline-block"><?php echo $_REQUEST['name']; ?></h1>
      </div>

      <div class="chat_container offset-lg-4 col-lg-4 col-md-12 " id="chat" style="overflow-y:scroll; overflow-x:hidden;">

         <div  class='chats'>
           <div class='inchat reciever'>
             <div class="thhhe  lead ">
                Hello
             </div>

           </div>
         </div>

         <div  class='chats'>
           <div class='inchat sender'>
             <div class="thhhe  lead">
                hi nnukhk kuh  ji
             </div>
           </div>
         </div>

         <div  class='chats'>
           <div class='inchat lead sender'>
             <div class="thhhe">
                iuoeghoiusghioarehga oh o hoiruaehgioueghier
             </div>
           </div>
         </div>


         <div  class='chats'>
           <div class='inchat lead sender'>
             <div class="thhhe">
                iuegiuoerghoergiuerhgo
             </div>
           </div>
         </div>


         <div  class='chats'>
           <div class='inchat lead sender'>
             <div class="thhhe">
                erig ugriaguariog ug igu iourguirgf
             </div>
           </div>
         </div>





      </div>

      <div class="con">
        <div class="buttons col-md-12 col-lg-4 offset-lg-4">
          <input class="form-control d-inline col-10" type="text" name="" style="" id="msg" placeholder="Message" >
          <button type="button" class="send btn btn-primary w-100" name="button" style="">Send</button>
        </div>
      </div>
    </div>






    <div class="navdiv text-center">
      <nav class="nav offset-lg-3 col-lg-6 offset-sm-1 col-sm-10">

        <a href="../" class="nav__link ">
          <i class="fa fa-home fa-3x"></i>
          <span class="nav__text">Home</span>
        </a>

        <a href="#" class="nav__link ">
          <i class="fa fa-user fa-3x"></i>
          <span class="nav__text"><?php echo $_SESSION['name']; ?></span>
        </a>

        <a type="bvcc" href="../new/" class="nav__link ">
          <i class="fa fa-plus fa-3x"></i>
          <span class="nav__text">Edit</span>
        </a>

        <a href="../chat/" class="nav__link nav__link--active">
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
        var objDiv = document.getElementById("chat");
        objDiv.scrollTop = objDiv.scrollHeight;


        // $.ajax({
        //   type: "GET",
        //   url: "getmsg.php?chatid=<?php //echo $_REQUEST['chatid'] ?>",
        //   dataType: "html",
        //   success: function(data, status){
        //
        //     $('#chat').html(data);
        //
        //   }
        //
        // });



        $(".send").click(function(){

            let button = $(this)
            let post_id = $(button).data('postid')

            let message =  document.getElementById("msg").value;
            let chatID = '<?php echo $_REQUEST['chatid']; ?>';
            let sender = '<?php echo $_SESSION['owner-id'] ?>';
            let receiver = '<?php echo $_REQUEST['personid'] ?>';


            if(message != ""){

              $.post("send.php",{chatid:chatID, sender : sender, receiver: receiver, message:message},

              function(data, status){

                document.getElementById("msg").value = "";


                document.getElementById('chat').innerHTML += "<div  class='chats sender'><div class='inchat'> <p class='display-6'>" + message + "</p></div> </div>";
                // document.getElementById('div' + post_id).innerHTML += "<span class = 'mx-3'>" + message + "</span>";
                // document.getElementById('div' + post_id).innerHTML += prev;
                var objDiv = document.getElementById("chat");
                objDiv.scrollTop = objDiv.scrollHeight;

          });

            }
        });

        setInterval(function () {
          $.ajax({
            type: "GET",
            url: "refresh.php?chatid=<?php echo $_REQUEST['chatid'] ?>",
            dataType: "html",
            success: function(data, status){
              if(data != ""){
                let chat = $('#chat').html();
                console.log(data);
                message = "<div  class='chats reciever'>\n<p style='color:green;' >new</p>\n<div class='inchat'>\n<p class='display-6'>"+data +"\n</p>\n</div>\n</div>";
                console.log(message);
                $('#chat').html(chat + message);
                var objDiv = document.getElementById("chat");
                objDiv.scrollTop = objDiv.scrollHeight;
              }

            }

          });
          // v iv.scrollTop = objDiv.scrollHeight;
        }, 1000);



      });


    </script>

  </body>
</html>
