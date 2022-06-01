<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../bootsrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootsrap/icon_css/all.css">
    <script type="text/javascript" src="../bootsrap/icon_js/all.js"></script>
		<script type="text/javascript" src="../bootsrap/js/bootstrap.js"></script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">

  </head>
  <body>
    <div class="container-fluid">
      <?php
      session_start();
        //search in the database for the customer record if found
        //display the details of the customer record in the following htm
        //form, otherwise display an error message - alertbox from bootstrap

        //lest connect to database
        include "../con.php";

        /*echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";*/

        //building the dynamic sql command using the cus_id passed in for
        //searching the record in the database table


        $query = "SELECT * FROM clients   WHERE client_id = ".$_SESSION['owner-id'] ."" ;

        $rs = $conn->query($query);

        //lets see how many records were founds

        if(mysqli_num_rows($rs)>0){
          //yes record is found (1)
          //now that the record is found lets display  its contents inside
          //html form below
          //$row = mysqli_fetch_array($rs);
          $row = mysqli_fetch_assoc($rs);

          //echo "<pre>";
          //print_r($row);
          //echo "</pre>";

          //echo "name : " . $row['name'];
          ?>



      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
          <img src="../images/deafult.jpg" alt="../images/deafult.jpg" style="width:100%;">
        </div>

        <div class="col-lg-8 col-md-12  col-sm-12">
            <h2>Profile</h2>


          <br><br><br><br>

          <form class="" action="saveedit.php?del=true" method="post">

            <input type="hidden" name="id" disabled value="<?php echo $row['client_id'];?>">


            <label for="" class="label">Name</label><br>
            <input type="text" name="name" value="<?php echo $row['name']; ?>"
            class="form-control">

            <label for="" class="label">Discription</label>
            <input type="text" name="description" value="<?php echo $row['email']; ?>"
            class="form-control">

            <br><br>


          </form>

          <?php
        }
        else{
          //no records were found (0)
          //echo "no records were found";
          ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Record Not Found</strong> The customer  number you entered
              not to be found in the database. please try again with another
              customer number.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <hr>
            <hr>
              <a href="../new" class="btn btn-dark">Dashboard</a>
              <a href="edit.php?edit=<?php echo $row['id'];?>" class="btn btn-danger">Try Again</a>
          </div>

          <?php
        }

       ?>


        </div><!-- end of col-8 main form content goes here -->



      </div><!-- end of row-->




      <div class="row">
        <div class="col-lg-12 col-md-12">
          <p style="text-align:center;">All Rights Reserved &reg; Copyright Ahzam &copy; 2022</p>
        </div>
      </div><!-- end of footer-->



    </div><!--end of container -->

    <div class="navdiv text-center">
      <nav class="nav offset-lg-3 col-lg-6 offset-sm-1 col-sm-10">

                <a href="../" class="nav__link ">

                  <i class="fa fa-home fa-3x"></i>
                  <span class="nav__text">Home</span>

                </a>

                <a href="#" class="nav__link nav__link--active">

                  <i class="fa fa-user fa-3x"></i>
                  <span class="nav__text"><?php echo $_SESSION['name']; ?></span>

                </a>

                <a type="bvcc" href="../new/" class="nav__link ">

                  <i class="fa fa-plus fa-3x"></i>
                  <span class="nav__text">Edit</span>

                </a>



                <a href="../chat/" class="nav__link ">

                  <i class="fa fa-comments fa-3x"></i>
                  <span class="nav__text">Chat</span>

                </a>

                <a href='../Login/logout.php' class='nav__link '>
                    <i class='fa fa-arrow-right fa-3x'></i>
                    <span class="nav__text">Log Out</span>
                </a>



      </nav>

    </div>



  </body>
</html>
