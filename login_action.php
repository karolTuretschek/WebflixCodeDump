<?php
# Access session.
session_start() ;
# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST')
{
# Open database connection.
  require ( 'connect_db.php' ) ;
# Get connection, load, and validate functions.
  require ( 'login_tools.php' ) ; 

# Check login.
  list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;
# On success set session data and display logged in page or assign an error message.
    # Retrieve movies from 'movie' database table.
    $q = "SELECT status FROM users WHERE user_id={$_SESSION['user_id']}";
	$b = "BLOCKED";
    $r = mysqli_query( $link, $q ) ;
    if ( mysqli_num_rows( $r ) > 0 )
    {
		
        # Display body section.
		
        while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
        {
			if(strcmp($q, "BLOCKED")){
					#Clear existing variables
					$_SESSION = array();
					#Destroy the session
					session_destroy();
				load($page = 'blockedPage.php');
				}
		
				
        }

    }
  if ( $check )  
  {
    # Access session.
    session_start();
    $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
    $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;

    load ( 'home.php' ) ;
  }
  # Or on failure set errors.
  else { $errors = $data; }
  #Display body section
	echo '<center><h1>Try again!</h1><p><a href="login.php">Login</a></p></center>' ;
# Close database connection.
  mysqli_close( $link ) ; 
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  </head>
  
  
		  <body style="background-color:#6495ED;">
		  
			<center><div class="card" style="width: 34rem;">
			<div class="card-body">
			
			<h1>Something went wrong!!!!</h1>
			<iframe src="https://giphy.com/embed/3ohc1ffY03hnhRUyUU" width="480" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/thinkproducts-IbOiFIJcSlHW2rgVUa"></a></p>
		  </div>
		  </div></center>
			


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </body>
</html>