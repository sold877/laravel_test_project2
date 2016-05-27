
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Clean Zone|@yield("title")</title> 
	
  

    <!-- Bootstrap core CSS -->
    {!!Html::style("assets/js/bootstrap/dist/css/bootstrap.css")!!}
	{!!Html::style("assets/fonts/font-awesome-4/css/font-awesome.min.css")!!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  
  {!!Html::style("assets/js/jquery.nanoscroller/nanoscroller.css")!!}
  {!!Html::style("assets/js/jquery.select2/select2.css")!!}
  {!!Html::style("assets/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css")!!}
  {!!Html::style("assets/js/bootstrap.switch/bootstrap-switch.css")!!}
  {!!Html::style("assets/js/jquery.easypiechart/jquery.easy-pie-chart.css")!!}
  {!!Html::style("assets/js/bootstrap.slider/css/slider.css")!!}
  {!!Html::style("assets/js/jquery.datatables/bootstrap-adapter/css/datatables.css")!!}
  {!!Html::style("assets/css/style.css")!!}

</head>
<body>

  <!-- Fixed navbar -->
  <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="fa fa-gear"></span>
        </button>
        <a class="navbar-brand" href="#"><span>Clean Zone</span></a>
      </div>
      <div class="navbar-collapse collapse">
        
    <ul class="nav navbar-nav navbar-right user-nav">
      <li class="dropdown profile_menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {!!Html::image('assets/images/avatar2.jpg')!!}Jeff Hanneman <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">My Account</a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Messages</a></li>
          <li class="divider"></li>
          <!-- <li><a href="#">Sign Out</a></li> -->
          @if(\Auth::check())
            <li><a href="{{URL::to('logout')}}">Logout</a></li>
          @else
            <li><a href="{{URL::to('login')}}">Login</a></li>
          @endif
        </ul>
      </li>
    </ul>			
    <ul class="nav navbar-nav navbar-right not-nav">
      <li class="button dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" fa fa-comments"></i></a>
        <ul class="dropdown-menu messages">
          <li>
            <div class="nano nscroller">
              <div class="content">
                <ul>
                  <li>
                    <a href="#">
                    {!!Html::image('assets/images/avatar2.jpg')!!}<span class="date pull-right">13 Sept.</span> <span class="name">Daniel</span> I'm following you, and I want your money! 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    {!!Html::image('assets/images/avatar_50.jpg')!!}<span class="date pull-right">20 Oct.</span><span class="name">Adam</span> is now following you 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      {!!Html::image('assets/images/avatar4_50.jpg')!!}<span class="date pull-right">2 Nov.</span><span class="name">Michael</span> is now following you 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                       {!!Html::image('assets/images/avatar3_50.jpg')!!}<span class="date pull-right">2 Nov.</span><span class="name">Lucy</span> is now following you 
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <ul class="foot"><li><a href="#">View all messages </a></li></ul>           
          </li>
        </ul>
      </li>
      <li class="button dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i><span class="bubble">2</span></a>
        <ul class="dropdown-menu">
          <li>
            <div class="nano nscroller">
              <div class="content">
                <ul>
                  <li><a href="#"><i class="fa fa-cloud-upload info"></i><b>Daniel</b> is now following you <span class="date">2 minutes ago.</span></a></li>
                  <li><a href="#"><i class="fa fa-male success"></i> <b>Michael</b> is now following you <span class="date">15 minutes ago.</span></a></li>
                  <li><a href="#"><i class="fa fa-bug warning"></i> <b>Mia</b> commented on post <span class="date">30 minutes ago.</span></a></li>
                  <li><a href="#"><i class="fa fa-credit-card danger"></i> <b>Andrew</b> killed someone <span class="date">1 hour ago.</span></a></li>
                </ul>
              </div>
            </div>
            <ul class="foot"><li><a href="#">View all activity </a></li></ul>           
          </li>
        </ul>
      </li>
      <li class="button"><a href="javascript:;"><i class="fa fa-microphone"></i></a></li>				
    </ul>

      </div><!--/.nav-collapse -->
    </div>
  </div>

	<div id="cl-wrapper">
		<div class="cl-sidebar">
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
				<ul class="cl-vnavigation">
					<li><a href="index-2.html"><i class="fa fa-home"></i>Dashboard</a></li>
					<li><a href="{{URL::to('image_form')}}"><i class="fa fa-home"></i>Add Image</a></li>
					<li><a href="#"><i class="fa fa-list-alt"></i>Category & Book Entry</a>
						<ul class="sub-menu">
							<li><a href="<?php echo "category_form";?>">Add Category</a></li>
							<li><a href="<?php echo "book_form"?>">Add Book</a></li>
							
						</ul>
					</li>
					<li><a href="#"><i class="fa fa-table"></i>Category & Book List</a>
						<ul class="sub-menu">
							<li><a href="{{URL::to('category_view')}}">Manage Category</a></li>
							<li><a href="{{URL::to('book_view')}}">Manage Book</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	
		<div class="container-fluid" id="pcont">
			<div class="cl-mcont">
			<div class="stats_bar">	
				@yield('content')

			</div>
			</div>
		 
		</div> 
		
	</div>

  {!!Html::script("assets/js/jquery.js")!!} 
   {!!Html::script("assets/js/jquery.nanoscroller/jquery.nanoscroller.js")!!} 
   {!!Html::script("https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false")!!} 
	{!!Html::script("assets/js/behaviour/general.js")!!} 
  {!!Html::script("assets/js/jquery.ui/jquery-ui.js")!!} 
  {!!Html::script("assets/js/behaviour/general.js")!!} 
	{!!Html::script("assets/js/jquery.sparkline/jquery.sparkline.min.js")!!} 
	{!!Html::script("assets/js/jquery.easypiechart/jquery.easy-pie-chart.js")!!} 
	{!!Html::script("assets/js/jquery.nestable/jquery.nestable.js")!!} 
	{!!Html::script("assets/js/bootstrap.switch/bootstrap-switch.min.js")!!} 
	{!!Html::script("assets/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js")!!} 
 {!!Html::script("assets/js/jquery.select2/select2.min.js")!!} 
  {!!Html::script("assets/js/skycons/skycons.js")!!} 
  {!!Html::script("assets/js/bootstrap.slider/js/bootstrap-slider.js" )!!} 
  {!!Html::script("assets/js/jquery.gritter/js/jquery.gritter.min.js" )!!}
  {!!Html::script("assets/js/jquery.datatables/jquery.datatables.min.js" )!!}
  {!!Html::script("assets/js/jquery.datatables/bootstrap-adapter/js/datatables.js" )!!}

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript
       // App.init();
        //App.dashBoard();
        App.init();
        App.dataTables();
      });
    </script>

  {!!Html::script("assets/js/bootstrap/dist/js/bootstrap.min.js")!!}
	{!!Html::script("assets/js/jquery.flot/jquery.flot.js")!!}
	{!!Html::script("assets/js/jquery.flot/jquery.flot.pie.js")!!}
	{!!Html::script("assets/js/jquery.flot/jquery.flot.resize.js")!!}
	{!!Html::script("assets/js/jquery.flot/jquery.flot.labels.js")!!}

  </body>
</html>
