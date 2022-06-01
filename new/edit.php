<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Customer Reord</title>
    <link rel="stylesheet" href="../bootsrap/css/bootstrap.css">

    <script type="text/javascript" src="../bootsrap/js/bootstrap.js">

    </script>
    <style media="screen">
      label { font-size:30px;}
    </style>

  </head>
  <body>


            <div class="container-fluid">
              <?php
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
                $cus_id = $_REQUEST['edit'];


                $query = "SELECT * FROM collection   WHERE id = ".$_REQUEST['edit']."" ;
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


                  <h2>Update Post Step</h2>
              <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <img src="../<?php echo $row['image']; ?>" alt="../<?php echo $row['image']; ?>" style="width:100%;">
                </div>

                <div class="col-lg-8 col-md-12  col-sm-12">



                  <br><br><br><br>

                  <form class="" action="saveedit.php?del=true" method="post">

                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">


                    <label for="" class="label">Name</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>"
                    class="form-control">

                    <label for="" class="label">Discription</label>
                    <input type="text" name="description" value="<?php echo $row['description']; ?>"
                    class="form-control">

                    <br><br>
                    <input type="submit" name="" value="Save Changes"
                      class="btn btn-success">

                    <a href="delete.php?del=<?php echo $row['id'];?>&owner=<?php echo $_REQUEST['edit'];?>&image=<?php echo $row['image']; ?>" class="btn btn-danger">Delete</a>
                    <a href="../new/" class="btn btn-primary">Cancel</a>


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





  </body>
</html>
