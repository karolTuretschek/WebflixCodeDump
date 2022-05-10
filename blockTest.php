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
				}else{
					load($page = 'registerBasic.php');
				}
		
				
        }

    }
?>