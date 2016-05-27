<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.png">

	<title>Admin Login</title>


	<!-- Bootstrap core CSS -->

	   {!!Html::style("assets/js/bootstrap/dist/css/bootstrap.css")!!}
	{!!Html::style("assets/fonts/font-awesome-4/css/font-awesome.min.css")!!}

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- Custom styles for this template -->
	{!!Html::style("assets/css/style.css")!!}	

</head>

<body class="texture">

<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center">
				{!!Html::image('assets/images/logo.png')!!}
				Clean Zone</h3>
			</div>
			<div>
				<!-- <form style="margin-bottom: 0px !important;" class="form-horizontal" method="POST" action="/auth/login"> -->
				 <!-- {!! csrf_field() !!} -->
				 {!!Form::open(['url'=>'checklogin','class'=>'form-horizontal','style="margin-bottom: 0px !important;"'])!!}
					<div class="content">
						<h4 class="title">Login Access</h4>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										
										 <input class="form-control" placeholder="email" type="email" name="email" value="{{ old('email') }}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										
										<input type="password" class="form-control" placeholder="Password" name="password" id="password">
									</div>
								</div>
							</div>
							
					</div>
					<div class="foot">
						<button class="btn btn-default" data-dismiss="modal" type="button">Register</button>
						<button class="btn btn-primary" data-dismiss="modal" type="submit">Log me in</button>
					</div>
				</form>
				{!!Form::close()!!}
			</div>
		</div>
		<div class="text-center out-links"><a href="#">&copy; 2013 Your Company</a></div>
	</div> 
	
</div>

 {!!Html::script("assets/js/jquery.js")!!}

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

  {!!Html::script("assets/js/bootstrap/dist/js/bootstrap.min.js")!!}
	{!!Html::script("assets/js/jquery.flot/jquery.flot.js")!!}
	{!!Html::script("assets/js/jquery.flot/jquery.flot.pie.js")!!}
	{!!Html::script("assets/js/jquery.flot/jquery.flot.resize.js")!!}
	{!!Html::script("assets/js/jquery.flot/jquery.flot.labels.js")!!}
</body>
</html>
