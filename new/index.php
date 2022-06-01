<?php        session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
    <script type="text/javascript" src="crop.js"></script>


    <link rel="stylesheet" href="../css/style.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="../bootsrap/icon_css/all.css">
    <script type="text/javascript" src="../bootsrap/icon_js/all.js"></script>
    <style>




    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .modal-lg{
        max-width: 1000px !important;
    }

    .fa-check-circle{
      color:rgb(28, 255, 0);
      padding-right: 15px;
    }
      label{
        padding-left: 100px;
        outline: none;
        border: none;
        font-size:20px;
        width:300px;
        height:100px;

      }

      input{
        width: 200px;
        height: 30px;

      }

      .container{
        text-align:center;
        /* padding-top: 100px; */
      }

      /* input[type="submit"],button{
        width: 240px;
        height: 40px;
        background-color: rgb(20, 171, 255);
        border: none;
        font-size:24px;
        color:white;
      } */
      /* input[type="submit"]:hover,button:hover{
        cursor: pointer;
        background-color:rgb(0, 141, 219);
      } */
      table {
        width: 100%;
      }
      th{
        text-align: left;
        border-bottom: 1px solid grey;
        font-size: 19px;
        font-weight: 10px;
      }
      td{
        text-align: left;
      }
      tr{
        margin-top:10px;
      }
      .container {

        text-align: center;
      }

      button[type="button"]{
        margin-top:50px;
        width: 200px;
        height:50px;
        background-color:rgb(52, 236, 130);
        border:none;
        font-size: 25px;
      }

      tr:hover{
        background-color:rgb(218, 217, 217);
        cursor:pointer;
      }
      button[type="buttonx"]{
        margin:10px;
      }
      input[type="textx"]{
        margin:10px ;
      }
      input[type="text"]{
        margin:0px ;
        border:none;
        outline:none;
        border-bottom:1px solid black;
      }
      a[type="edit"]{
        width:100px;
        padding:0px 12px;
        background-color:rgb(255, 18, 53);
        margin-top:100px;
      }
      img{
        width:400px;
      }
      .cropper-drag-box {
        width:100%;
      }
      a{
        text-decoration:none;
      }
    </style>
  </head>
  <body>


       <table>
         <tr>
           <th>Image</th>
           <th>Name</th>
           <th>Caption</th>
        </tr>

       <?php

            require("../con.php");
            $query = "SELECT * FROM collection WHERE owner = ".$_SESSION["owner-id"]." ";
            // echo $query;
            // echo $_SESSION["owner-id"];
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()){



                  echo "
                  <tr style='margin-top:10px;'>
                     <td><img src=../" . $row['image'] . " alt=" . $row['image']. " > </td>
                     <td>" . $row['name']       . " </td>
                     <td>" . $row['description']. " </td>
                     <td><a class='btn btn-primary' href='edit.php?edit=".$row['id']."'  >Edit </a> </td>

                  </tr>
                   ";



               }

          ?>

            <?php
               echo "";
           } else {
             echo "0 results";

           }
           $conn->close();
           // strval(); str_split()

        ?>
        <!-- <tr>
          <form class="from" action="save.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="owner" value="">
            <td><input class="mx-5 my-5" type="file" name="my_image"></td>
            <input type="text" name="name" id="name"  required placeholder="Name" >
            <input type="text" name="description" id="description" required placeholder="Caption">

            <td><input type="submit" value="Save" name="submit"></td>

          </form>
          </tr> -->

</table>

<div class="container" align="center">
<br><br><br><br>

            <br />
            <!-- <h3 align="center">Crop image before upload and insert to database using PHP Mysqli and CropperJS</h3> -->
            <br />
            <div class="row text-center">
            <form method="post" id="form" >
                <input type="file" style="display:none"  name="crop_image" class="crop_image" id="upload_image" />
                <input type="hidden" name="owner" id="owner" value="<?php echo strval($_SESSION['owner-id']) ; ?>">
                <input type="hidden" name="name" id="outname"  required placeholder="Name" >
                <input type="hidden" name="description" id="outdescription" required placeholder="Caption">
                <script type="text/javascript">function choose(){document.getElementById("upload_image").click();}</script>
            </form>
            <div class="modal fade" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container w-100">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="" id="sample_image" class="img-responsive w-100" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="text" name="inname" id="name"  required placeholder="Name" >
                            <input type="text" name="indescription" id="description" required placeholder="Caption">

                            <button type="buttonf" id="crop_and_upload" class="btn btn-primary">Save</button>
                            <button type="buttonf" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                            <script type="text/javascript">
                              window.onload = function(){
                              var name = document.getElementById("name");
                              var description = document.getElementById("description");

                              name.addEventListener('keyup',function() {

                                let vname = document.getElementById("name").value;
                                document.getElementById("outname").value = vname;

                                // let vdes = document.getElementById("description").value;
                                // document.getElementById("outdescription").value = vname;

                                console.log(vname);
                              });

                              description.addEventListener('keyup',function() {

                                // let vname = document.getElementById("name").value;
                                // document.getElementById("outname").value = vname;

                                let vdes = document.getElementById("description").value;
                                document.getElementById("outdescription").value = vdes;

                                console.log(vdes);
                              });
                            }


                            </script>

                        </div>
                    </div>
                </div>
            </div>
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
                    <span class="nav__text">Profile</span>

                  </a>

                  <button type="bvcc" href="new/" class="nav__link " id="choose" name="button" onclick="choose()" style="border: none; background-color:transparent;">

                    <i class="fa fa-plus fa-3x nav__link--active"></i>
                    <span class="nav__text ">Add Post</span>

                  </button>



                  <a href="#" class="nav__link ">

                    <i class="fa fa-comments fa-3x"></i>
                    <span class="nav__text">Chat</span>

                  </a>

                  <a href='../Login/logout.php' class='nav__link '>
                      <i class='fa fa-arrow-right fa-3x'></i>
                      <span class="nav__text">Log Out</span>
                  </a>



        </nav>

      </div>

     <?php
     if(isset($_REQUEST['status'])){
       if($_REQUEST['status'] == 'pass' || $_REQUEST['status'] == 'del'){
         ?>
         <div  class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success</strong> New record successfully created.

           <button type="buttonxc" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>

         <?php
       }else{
         ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Sorry</strong> The details you entered
             not to be saved in the database. please check your Inputs.
           <button type="buttonxc" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         <?php
       }
     }
      ?>

  </body>
</html>
