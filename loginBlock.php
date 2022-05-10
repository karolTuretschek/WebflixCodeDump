<?php
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
 # Access session.
    session_start();


  # Open database connection.
    require ( 'includes/connect_db.php' ) ;

    # Retrieve movies from 'movie' database table.
    $q = "SELECT status FROM busers WHERE email={$_SESSION['email']}";



  if ( strcmp($q, "BLOCKED"))  
  {

    $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
    $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
    load ($page =  'blockedPage.php' ) ;
  }else{

    $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
    $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
    load ($page =  'register.php' ) ;
  }
  function load( $page = 'loginBasic.php' )
{
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL.
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page ;
  # Execute redirect then quit. 
  header( "Location: $url" ) ; 
  exit() ;
}
  # Or on failure set errors.
  else { $errors = $data; }
  #Display body section
	echo '<center><h1>Try again!</h1><p><a href="login.php">Login</a></p></center>' ;
# Close database connection.
  mysqli_close( $link ) ; 
}
?>