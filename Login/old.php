<div class="container py-lg-5">

	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>

	<div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<div class="cont ">
		<div class="wrapper offset-lg-4 col-lg-4 col-md-12">
			<a href="../" style="color:black;font-size:25px;"><i class='fa fa-arrow-left'></i></a>
		</div>


		<div class="wrapper text-center offset-lg-4 col-lg-4 col-md-12">
			<div class="profile">


				<img src="../profile/images/defultm.png" alt="../profile/images/defult.jpg" id="pimage">

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
