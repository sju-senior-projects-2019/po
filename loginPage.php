<html>
<head> 
	<title>Login Page</title> 
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="http://localhost/homePage.php">The Appointment Scheduler</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="http://localhost/homePage.php">Home</a></li>
        <li><a href="http://localhost/apptAdded.php">Schedule Appointment</a></li>
        <li><a href="http://localhost/doctorAdded.php">Doctors</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="http://localhost/loginPage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
	<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 loginbox"> 
		<div class="panel panel-info" > 
			<div class="panel-heading"> 
				<div class="panel-title"> Sign In </div> 
			</div> 
			<div class="panel-body panel-pad"> 
				<div id="login-alert" class="alert alert-danger col-sm-12 login-alert"></div> 
				<form id="loginform" class="form-horizontal" role="form">
					<div class="input-group margT25"> 
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-user"></i>
						</span> 
						<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email"> 
					</div> 
					<div class="input-group margT25"> 
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
						<input id="login-password" type="password" class="form-control" name="password" placeholder="password"> 
					</div> 
					<div class="form-group margT10"> 
					<!-- Button --> 
						<div class="col-sm-12 controls"> 
							<a id="btn-login" href="#" class="btn btn-block btn-success">Login </a> 
						</div> 
					</div> 
					<div class="form-group"> 
						<div class="col-md-12 control"> 
							<div class="no-acc"> 
								Don't have an account? 
								<a href="http://localhost/patientAdded.php" onClick="$('#loginbox').hide(); $('#signupbox').show()"> Sign Up As Patient Here </a> 
							</div> 
						</div> 
					</div> 
				</form> 
			</div> 
		</div> 
	</div>
</div> 
</body> 
</html>