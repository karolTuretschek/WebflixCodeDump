<?php

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_toolsBasic.php' ) ; load() ; }
# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('includes/connect_db.php');
  #include ( 'logout.php' );
# Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT * FROM busers WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    }
	
# On success new password into 'users' database table.

$user_status = "SELECT status FROM busers WHERE user_id={$_SESSION[user_id]}";
echo $user_status;
  if (strcmp($user_status, "0")) 
  {
    
	$q = "UPDATE busers SET status ='1' WHERE user_id={$_SESSION[user_id]}";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location: home.php");
    } else {
        echo "Error updating record: " . $link->error;
    }
# Close database connection.
 
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