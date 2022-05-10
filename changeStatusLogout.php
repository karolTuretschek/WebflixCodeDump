<?php

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('includes/connect_db.php');
  #include ( 'logout.php' );
# Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT * FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    }
	
# On success new password into 'users' database table.
  if ( empty( $errors ) ) 
  {
    
	$q = "UPDATE users SET status ='0' WHERE user_id={$_SESSION[user_id]}";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location: home.php");
    } else {
        echo "Error updating record: " . $link->error;
    }
# Close database connection.
    include('logout.php');
	mysqli_close($link); 
    exit();
  }
# Or report errors.
  else 
  {  
    echo ' <div class="container"><div class="alert alert-dark alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
	<h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</div></div>';
    # Close database connection.
    mysqli_close( $link );
  } 
  	
}

?>