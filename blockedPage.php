<?php	
	#Access session
	session_start();
	#Redirect if not logged in.
	if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }	
	# Set page title and display header section.
	$page_title = 'Home' ;
	include ( 'includes/notLoggedUser.html' ) ;
	#Clear existing variables
	$_SESSION = array();
	#Destroy the session
	session_destroy();
	#Display body section
	#echo '<center><h1>Goodbye!</h1><p><a href="login.php">Login</a></p></center>' 
?>
<html lang="en">
  <head>
  <style>
  body {
  background-image: url('https://wallpapercave.com/wp/wp5483697.jpg');

}
.container{
	background-color: #212529;
	width: 100%;
	height: 100%;
	border-radius: 50px 50px 50px 50px;
}
.card{
	position: fixed;
	top: 50%;
	left: 50%;
	-webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
	height: 80%;
	width: 80%;
}
.card-body{

	top: 50%;
	left: 50%;
}
h1{
	color: red;
	
}
h2{
	color: red;
	
}
</style>
	<link rel="icon" href="https://pics.freeicons.io/uploads/icons/png/15914627681630335518-512.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
		  						
			<div class="card" style="background-color:#212529; border-radius: 50px 50px 50px 50px">
			<div class="card-body">
			<br><br><br><br>
			<center>
			<h1>Your account has been blocked.</h1>
			<h1>For more information send email to webflixinquiries@webflix.com.</h1>
			<h2>Never include sensitive information in emails. We will never ask you for your password. Keep your password safe.</h2>
			     <form action="login.php" method="post">
				<p><input class="btn btn-secondary btn-lg" type="submit" value="Login" style="width: 16rem;"></p>				
				</form>
				</center>
		    </div>
		    </div>
			
			
				

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </body>	


</html>
<?php
	# Display footer section.
include ( 'includes/footer.html' ) ;
?>