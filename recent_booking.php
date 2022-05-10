<?php
$page_title = 'Booking History ';
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/logout.html' ) ;
# Retrieve items from 'booking' database table.
$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}
ORDER BY booking_date DESC
LIMIT 1" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">
<div class="card bg-light mb-3">
	     <div class="row no-gutters">
	         <div class="col-md-4">
		<img width="256" class="img-fluid" alt="QR Code " src="img/qrcode.png">
	         </div>
	         <div class="col-md-8">
	         <div class="card-body">
	';
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
	<ul class="list-group list-group-flush">
	  <li class="list-group-item">
	    <div class="form-group row">
           	    <label for="booking ref" class="col-sm-12 col-form-label">
	     Booking Reference:  #EC1000' . $row['booking_id'] . '</label> 
	    </div>
             </li>
	 <li class="list-group-item">
	      <div class="form-group row">
	       <label for="booking ref" class="col-sm-12 col-form-label">
		Total Paid:   &pound ' . $row['total'] . ' 
	       </label>
	      </div>
	    </li>
          </ul>
    <hr>
<div class="card-footer">
   <small>'  . $row['booking_date'] . '</small>
</div>
</div>
</div>			
';
  }
# Close database connection.
  mysqli_close( $link ) ; 
}
include('includes/footer.html');
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