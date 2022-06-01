      <?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crochat</title>
    <link rel="stylesheet" href="bootsrap/css/bootstrap.css">
    <script type="text/javascript" src="bootsrap/js/bootstrap.bundle.js"></script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->





    <link rel="stylesheet" href="bootsrap/icon_css/all.css">
    <script type="text/javascript" src="bootsrap/icon_js/all.js"></script>

    <style media="screen">
      .grid{
        height: 100%;
        text-align: left;
        border-top: 1px solid #a8a5cc;
        position: relative;
        cursor: pointer;
      }
      img{
        width: 100%;
      }
      .image{
        width: 100%;
        height: 50%;
        margin-bottom: 20px;
      }
      .buttons{
        position: absolute;
        bottom: 0%;
        width:100%;
      }
      .com{
        margin-bottom:100px;
      }
      .comments{

        height: 100px;
        /* overflow:scroll; */
        max-height: 500px;
        overflow-y: hidden;
        padding-left: 40px;

}
.comments::-webkit-scrollbar {
  width: 4px;

}

/* Track */
.comments::-webkit-scrollbar-track {
  background: #f1f1f1;

}

/* Handle */
.comments::-webkit-scrollbar-thumb {
  background: #888;
  border-radius:2px;
}

/* Handle on hover */
.comments::-webkit-scrollbar-thumb:hover {
  background: #555;

}
  .description{
    height: 100px;
  }

  #seemore{
    cursor: pointer;
  }

  .profile{
    width:40px;
    height:40px;
    display: inline-block;
    margin-rigth:10px;
    border-radius:25px;
  }
  .heading{
    overflow-x: auto;
    margin-right:20px;
  }
    </style>
  </head>

  <body>
    <?php
    include 'con.php';
    $query = "SELECT * FROM clients";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      while($det = $result->fetch_assoc()){
        $names[] = $det['name'];
        $id[] = $det['client_id'];
      }
    }

    // echo "<pre>";
    // echo print_r($names);
    // echo "<pre>";
    // echo print_r($id);

    require("vendor/autoload.php");
    $db = new MysqliDb ($dbhost, $dbusername, $dbpword, $dbdatabase);




    if (isset($_POST['like'])) {
        $post_id = $_POST['like'];
        $query = Array('likes'=>$db->inc(1));
        $db->where('id', $post_id);
        $db->update('collection', $query);

        $db->insert('likes', Array('post_id'=>$post_id));

    }
    $num = 0;
    ?>
        <!-- <a href="Login/" class="btn btn-primary">Login/Register</a> -->

    <div class="container-fluid text-left px-lg-5">
      <div class="holder mx-lg-5">

                <?php


                foreach ($names as $i) {

                  // code...
                  $query = "SELECT * FROM collection WHERE owner =$id[$num]";
                  // echo "SELECT * FROM collection WHERE owner ='$id[$num]'";
                    $num++;

                  $result = $conn->query($query);
                  if ($result->num_rows > 0) {
                    ?>
                    <hr>

                    <div class="d-inline-block">
                      <div class="d-inline-block heading profile">
                        <img type="profile" class="" src="images/deafult.jpg" alt="images/defult.jpg">
                      </div>
                      <div class="d-inline-block " style="padding-bottom:20px;">
                        <h1 class="display-5" style="margin:0;"><?php echo $i  ?>'s Posts</h1>
                      </div>

                    </div>
                    <div class="row my-5">

                    <?php

                    while($post = $result->fetch_assoc()){




                  // $posts = $db->get('collection');

                      ?>
                      <!-- <div class=""> -->
                        <div class="grid col-lg-4 col-md-12" >
                          <div class="image">
                            <img src="<?php echo $post['image'] ?>" alt="<?php echo $post['image'] ?>">
                          </div>
                          <div class="description" style="padding-left:20px;">
                            <p class="lead"><?php echo $post['name'] ?></p>
                            <p class="lead"><?php echo $post['description'] ?></p>
                          </div>
                          <input type="hidden" id="comname" value="<?php if(isset($_SESSION['name'] )){
                            echo $_SESSION['name'] ;
                          }
                          ?>">
                          <div class="com">
                            <div class="comments" id="div<?php echo $post['id'] ?>">
                              <?php
                              $allcomment = $post['comment'];
                              $comarray = explode(':;', $allcomment);

                              if($allcomment != "" ){
                                foreach($comarray as $c){
                                  $comments = explode('#', $c);
                                  $comname = $comments[0];
                                  $comcom = $comments[1];
                                  echo "<h6>$comname</h6>";
                                  echo "<span class = 'mx-3'>$comcom</span>";
                                }
                              }

                              ?>
                            </div>


                                <span class="seemore <?php echo  ($allcomment != "" )?'':'d-none'; ?>"  id="<?php echo $post['id'] ?>">See more</span>

                          </div>

                          <div class="buttons text-center py-2">
                            <?php
                            echo '<button data-postid="'.$post['id'].'" data-likes="'.$post['likes'].'" class="like btn btn-danger"><i class="fa fa-heart"></i>     '.$post['likes'].'</button>';

                         ?>
                         <input type="text" id="in<?php echo $post['id'] ?>" name="name" value="" class="form-control w-50 d-inline">
                            <button type="button" data-postid="<?php echo $post['id'] ?>" class="commentit btn btn-primary" data-tip="hhhhhh" <?php echo (isset($_SESSION['name']))?'':'disabled' ?> > <i class="fa fa-comment"></i> comment <span id="comment"></span> </button>
                          </div>
                        </div>
                      <!-- </div> -->



        <?php }}
      }
        $conn->close();
         ?>





         <div class="row">
           <div class="col-lg-12 col-md-12">
             <p style="text-align:right;">All Rights Reserved &reg; Copyright Ahzam &copy; <span id="date"><?php echo date("Y"); ?></span> </p>
           </div>
         </div>

          </div>
      </div>
    </div>
      <div class="navdiv text-center">
        <nav class="nav offset-lg-3 col-lg-6  col-sm-12">

          <?php
                if(isset($_SESSION['email'])){
                  ?>
                  <a href="#" class="nav__link nav__link--active">

                    <i class="fa fa-home fa-3x"></i>
                    <span class="nav__text">Home</span>

                  </a>

                  <a href="profile/" class="nav__link ">

                    <i class="fa fa-user fa-3x"></i>
                    <span class="nav__text"><?php echo $_SESSION['name']; ?></span>

                  </a>

                  <a href="new/" class="nav__link ">

                    <i class="fa fa-plus fa-3x"></i>
                    <span class="nav__text">Edit</span>

                  </a>



                  <a href="chat/" class="nav__link">

                    <i class="fa fa-comments fa-3x"></i>
                    <span class="nav__text">Chat</span>

                  </a>

                  <a href='Login/logout.php' class='nav__link '>
                      <i class='fa fa-arrow-right fa-3x'></i>
                      <span class="nav__text">Log Out</span>
                  </a>



                  <?php

                    }else{
                      echo "<a href='Login/' class='nav__link '>";
                      echo "<i class='fa fa-user   fa-3x'></i>";
                      echo "<span class='nav__text'>Login</span>";
                      echo "</a>";

                    }

                    ?>

        </nav>

      </div>

    <script src="js/ajax/jquery.min.js"></script>
    <script type="text/javascript">

        let com = document.querySelectorAll(".comments");
        let seemore = document.querySelectorAll(".seemore");

        for (let i = 0; i < com.length; i++){
          // let comment = grid[i].lastElementChild.id;
            seemore[i].addEventListener("click", function(){
            if(seemore[i].innerHTML =="See more"){
              com[i].style.height = "auto";
              com[i].style.overflow = "scroll";
              seemore[i].innerHTML = "hide";
            }
            else{
              com[i].style.height = "100px";
              com[i].style.overflow = "hidden";
              seemore[i].innerHTML = "See more";
            }

          });
        }


        $(".like").click(function(){
            let button = $(this)
            let post_id = $(button).data('postid')

        $.post("index.php",{ 'like' : post_id },

        function(data, status){
            $(button).html("<i class='fa fa-heart'></i> " + ($(button).data('likes')+1) + "")
            $(button).data('likes', $(button).data('likes')+1)

        });
      });




        $(".commentit").click(function(){

            let button = $(this)
            let post_id = $(button).data('postid')

            let message =  document.getElementById("in"+post_id).value;
            let name = document.getElementById('comname').value;

            if(message != ""){

              $.post("php/comment.php",{name:name, comment : message, id : post_id},

              function(data, status){
                document.getElementById("in"+post_id).value = "";

                let prev = document.getElementById('div' + post_id).innerHTML;

                document.getElementById('div' + post_id).innerHTML = "<h6>" + name + "</h6>";
                document.getElementById('div' + post_id).innerHTML += "<span class = 'mx-3'>" + message + "</span>";
                document.getElementById('div' + post_id).innerHTML += prev;


          });
            }
        });



    </script>

  </body>
</html>
