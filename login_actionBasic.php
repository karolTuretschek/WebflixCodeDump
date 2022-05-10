<?php
# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST')
{
# Open database connection.
  require ( 'connect_db.php' ) ;
# Get connection, load, and validate functions.
  require ( 'login_toolsBasic.php' ) ; 
# Check login.
  list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;
# On success set session data and display logged in page or assign an error message.
  if ( $check )  
  {
    # Access session.
    session_start();
    $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
    $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
    load ( 'homeBasic.php' ) ;
  }
  # Or on failure set errors.
  else { $errors = $data; }
  #Display body section
	echo '<center><h1>Try again!</h1><p><a href="loginBasic.php">Login</a></p></center>' ;
# Close database connection.
  mysqli_close( $link ) ; 
}
?>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
	<link rel="icon" href="https://pics.freeicons.io/uploads/icons/png/15914627681630335518-512.png">
	<script src="https://kit.fontawesome.com/6a296eb938.js" crossorigin="anonymous"></script>
	</style>
  </head>
  
  
		  <body style="background-color:#212529;">
		  
			<center><div class="card" style="width: 34rem;">
			<div class="card-body">
			
			<h1>Data processing error.</h1>
			<img src="https://cdn1.iconfinder.com/data/icons/social-object-set-2-1/74/27-512.png" alt="Error picture" width="50%" height="50%">
			<h1>Please report this to the admin.</h1>
			<center><h1>Try loggin in again!</h1><p><a href="loginBasic.php">Login</a></p></center>
			
		  </div>
		  </div></center>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </body>
</html>