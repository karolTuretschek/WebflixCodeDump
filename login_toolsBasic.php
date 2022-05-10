<?php 
    # Access session.
    session_start() ;

  # Open database connection.
    require ( 'includes/connect_db.php' ) ;

    # Retrieve movies from 'movie' database table.
    $q = "SELECT status FROM busers WHERE user_id={$_SESSION['user_id']}";
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

# Function to load specified or default URL.
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
# Function to check email address and password. 
function validate( $link, $email = '', $pwd = '')
{
# Initialize errors array.
  $errors = array() ; 
  # Check email field.
  if ( empty( $email ) ) 
  { $errors[] = 'Enter your email address.' ; } 
  else  { $e = mysqli_real_escape_string( $link, trim( $email ) ) ; }
# Check password field.
  if ( empty( $pwd ) ) 
  { $errors[] = 'Enter your password.' ; } 
  else { $p = mysqli_real_escape_string( $link, trim( $pwd ) ) ; }

# On success retrieve user_id, first_name, and last name from 'busers' database.
  if ( empty( $errors ) ) 
  {
    $q = "SELECT user_id, first_name, last_name FROM busers WHERE email='$e' AND pass=SHA2('$p',256)" ;  
    $r = mysqli_query ( $link, $q ) ;
    if ( @mysqli_num_rows( $r ) == 1 ) 
    {
      $row = mysqli_fetch_array ( $r, MYSQLI_ASSOC ) ;
      return array( true, $row ) ; 
    }
    # Or on failure set error message.
    else { $errors[] = 'Email address and password not found.' ; }
  }
# On failure retrieve error message/s.
  return array( false, $errors ) ; 
}


?>
