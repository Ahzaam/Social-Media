<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../bootsrap/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/style.css">





	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
	<script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>

	<link rel="stylesheet" href="../new/crop.js">


	<style media="screen">
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



		button[type="button"] {
			border:none;
			background-color:transparent !important;
		}
		.nav{
			min-width:350px;
		}

		.wrapper{

		}

		.profile{
			width:200px;
			height:auto;
			/* background-color:rgb(213, 213, 213); */
			margin:auto;
			border-radius:100px;

		}
		body{
			overflow:hidden;
		}

		.profile img{
			width:100%;
			height:100%;
			border-radius:100px;
			opacity: 0.7;
			transition: 0.5s;
		}
		.profile img:hover{
			opacity: 1;
			transition: 0.5s;
			cursor: pointer;
		}
		.navdiv{
			height:50px;
		}
		.cont{
			width:auto;
		}

		.fa{
			cursor:pointer;
		}
	</style>


</head>
<body>

	<div class="container" align="center">

	            <div class="row text-center">
	            <form method="post" id="form" >
	                <input type="file" style="display:none" acccept="image/jpeg,image/png"  name="crop_image" class="crop_image" id="upload_image" />

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

	                            <button type="buttonf" id="crop_and_upload" class="btn btn-primary">Save</button>
	                            <button type="buttonf" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	      </div>


<div class="container py-lg-5">

	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>

	<div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<div class="cont ">
		<div class="wrapper offset-lg-4 col-lg-4 col-md-12">
			<a href="../" style="color:black;font-size:15px;"><i class='fa fa-arrow-left'></i> Back</a>
		</div>


		<div class="wrapper text-center offset-lg-4 col-lg-4 col-md-12">
			<div class="profile">

				<?php
					if(isset($_SESSION['image'])){
						echo "<img src='../".$_SESSION['image']."'  alt='".$_SESSION['image']."' id='pimage'>";
					}else{
						echo "<img src='../profile/images/defultm.png' alt='../profile/images/defultm.png' id='pimage'>";
					}

				 ?>


				<!-- <img src="../profile/images/defultm.png" alt="../profile/images/defult.jpg" id="pimage"> -->

				<script type="text/javascript">
					let image = document.getElementById('pimage');
					image.addEventListener('click', function(){
						console.log('click');
						document.getElementById("upload_image").click()
					});
				</script>









				<!-- <script type="text/javascript">
					let image = document.getElementById('pimage');
					image.addEventListener('click', function(){
						console.log('click');
						document.getElementById("image").click()
					});
				</script> -->
			</div>
		</div>
		<div class="wrapper offset-lg-4 col-lg-4 col-md-12">



			<form id="register_form" class="form-horizontal" name="form1" method="post">
						<div class="form-group">
							<label for="email">Name:</label>
							<input type="text" class="form-control" id="name" placeholder="Name" name="name">
						</div>
						<div class="form-group">
							<label for="pwd">Email:</label>
							<input type="email" class="form-control" id="email" placeholder="Email" name="email">
						</div>

						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						</div>
						<div class="form-group">
							<label for="pwd">Reenter Password:</label>
							<input type="password" class="form-control" id="password2" placeholder="Password" name="password2">
						</div>
						<input type="button" name="save" class="btn btn-primary my-2 w-100" value="Register" id="butsave">
						<p>ALready have a account ? <span id="login" style="color:blue; cursor:pointer;">Login</span> </p>
					</form>
					<form id="login_form" name="form1" class="form-horizontal py-5 my-5" method="post" style="display:none;">

						<input type="file" name="image" class="form-control d-none" >
						<div class="form-group">
							<label for="pwd">Email:</label>
							<input type="email" class="form-control" id="email_log" placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" id="password_log" placeholder="Password" name="password">
						</div>

						<input type="button" name="save" class="btn btn-primary my-2 w-100"  value="Login" id="butlogin">
						<p>Don't have a account ? <span id="register" style="color:blue; cursor:pointer;">Register</span></p>
			</form>

		</div>


	</div>
</div>

		<script src="../js/ajax/jquery.min.js"></script>
		<script src="validate.js"></script>
		<script type="text/javascript" src="../bootsrap/icon_js/all.js"></script>
		<script type="text/javascript" src="../bootsrap/js/bootstrap.js"></script>

		<script type="text/javascript">
		$(document).ready(function(){
			var $modal = $('#modal_crop');
			var crop_image = document.getElementById('sample_image');
			var cropper;
		// 	var img = document.getElementById('sample_image');
		// //or however you get a handle to the IMG
		// 	var width = img.clientWidth;
		// 	var height = img.clientHeight;
			// console.log(width);

			$('#upload_image').change(function(event){
					var files = event.target.files;
					console.log(files);
					console.log(files[0]['name']);
					extension = files[0]['name'].split('.').pop();


					var done = function(url){

							if(extension == 'jpg' || extension == 'png' || extension == 'jpeg'){
								crop_image.src = url;
								$modal.modal('show');
							}else{
								alert('Unsupported image extension');
								// sleep(000);
								location.reload();
							}

					};
					if(files && files.length > 0)
					{
							reader = new FileReader();
							reader.onload = function(event)
							{
									done(reader.result);
							};
							reader.readAsDataURL(files[0]);
					}
			});
			$modal.on('shown.bs.modal', function() {
					cropper = new Cropper(crop_image, {
							aspectRatio: 1,
							viewMode: 3,
							preview:'.preview'
					});
			}).on('hidden.bs.modal', function(){
					cropper.destroy();
					cropper = null;
			});
			$('#crop_and_upload').click(function(){
					canvas = cropper.getCroppedCanvas({
							width:400,
							height:400
					});
					canvas.toBlob(function(blob){
							url = URL.createObjectURL(blob);
							var reader = new FileReader();
							reader.readAsDataURL(blob);
							reader.onloadend = function(){
									var base64data = reader.result;
									let formdata = $("#form").serialize();
									let description = $('#outdescription').val();
									let name = $('#outname').val();
									let owner = $('#owner').val();
									// console.log(data);
									console.log(name + "<<email || password>>. "+ description);
									$.ajax({
											url:'addimg.php',
											method:'POST',
											data:{crop_image:base64data},
											success:function(data)

											{
													console.log(data);
													location.reload();
													$modal.modal('hide');
											}

									});

							};
					});
			});
		});

		</script>



	</body>
</html>
