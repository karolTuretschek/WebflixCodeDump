<?php
$page_title = 'Booking History ';
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/logout.html' ) ;
# Display body section, retrieving from 'booking_contents' database table.
$q = "SELECT * FROM booking ORDER BY booking_date DESC" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0)
{
  echo '<div class="container">';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '<div class="alert alert-dark" role="alert">
	   <h4 class="alert-heading">Total amount paid: £' . $row['total'] . '  </h4>
	    <p>Booking date:  ' . $row['booking_date'] . '</p>
		<div class="alert alert-secondary" role="alert">
		Booking id: ' . $row['booking_id'] . '
		<br>
		User id: ' . $row['user_id'] . '
				</footer>
				</div>
  </div>  ';   }
  }
else { echo ' <div class="container">
	          <div class="alert alert-secondary" role="alert">
	         <p>Nothing to display or error</p>
           </div>
	        <div>';}
# Close database connection.
mysqli_close( $link ) ;
include ( 'includes/footer.html' ) ;
?>
  
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  </head>
		  <body style="background-color:#6495ED;">
			
  </body>
</html>
