<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
  	
	<link rel="stylesheet" href="views/css/mycss.css">
</head>
<body>
	<div class="container">    
        <div id="loginbox" style="margin-top:150px;" class="mainbox col-md-5 col-md-offset-4 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                       <form action="?router=common/login&f=checklogin" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" required name="txtUsername" value="" placeholder="Username" class="form-control">
                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" required value="" name="txtPassword" placeholder="Username" class="form-control">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                     <button type="submit" name="btnLogin" class="btn btn-success">Đăng nhập</button>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                       
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
	<!-- <div class="login-form">
		<h2 style="border-bottom: 1px solid #666; margin-bottom: 10px;padding: 10px;">Login to demoboss</h2>
		<form action="?router=common/login&f=checklogin" method="post">
			<label>Username</label>
			<input type="text" required name="txtUsername" value="" placeholder="Username" class="form-control">
			<label>Password</label>
			<input type="password" required value="" name="txtPassword" placeholder="Username" class="form-control"><br>
			<button type="submit" name="btnLogin" class="btn btn-success">Đăng nhập</button>
		</form>
	</div> -->
</body>
</html>