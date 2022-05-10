<?php
$page_title = 'mov-rev';
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminLogin_tools.php' ) ; load() ; }

if ( isset( $_GET['user_id'] ) ) $user_id = $_GET['user_id'] ;
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/adminNavbar.html' ) ;
# Retrieve items from 'users' database table.
$q = "SELECT * FROM users" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">
<div class=container2 style="background-color: white">
<center>
	<h1>Users database information.<h1>
	<hr>
   <h3>Take extra care when processing new data.<h3>
   <h3>Deleted data cannot be restored.<h3>
   </div></center>
';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
   echo '
   
   <table style="background-color: white; width: 100%">
  <tr>
   <th>ID: ' . $row['user_id'] . ' <br>Title:' . $row['email'] . ' </th></center>
  </tr>

  <tr>
    <td>First name: ' . $row['first_name'] . '</td>
  </tr>
  <tr>
    <td>Last name: ' . $row['last_name'] . '</td>
  </tr>
  <tr>
    <td>Email: ' . $row['email'] . '</td>
  </tr>
  <tr>
    <td>Date of birth: ' . $row['d_o_b'] . '</td>
  </tr>
    <tr>
    <td>Contact number: ' . $row['contact_number'] . '</td>
  </tr>
  <tr>
    <td>Country: ' . $row['country_from'] . '</td>
  </tr>
  <tr>
    <td>Join date: ' . $row['reg_date'] . '</td>
  </tr>
  <tr>
    <td>Status: ' . $row['status'] . '</td>
  </tr>
</table>

';  
  }
echo '<br><button type="button" class="btn btn-secondary btn-lg btn-block" role="button" data-toggle="modal" data-target="#rev">EDIT DATABASE</button><br>
' ;
  }
else { 
echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
	<p>There are currently no reviews for this tvshows.</p>
<br>	<button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add tvshows Review</button><br>
</div>
<div>  ' ; }
?>
<?php
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminLogin_tools.php' ) ; load() ; }
# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] = 'POST')
  {
# Open database connection.
    require ( 'includes/connect_db.php' ) ;
# Execute inserting into 'users' database table.
	$q = "UPDATE `users` SET first_name='$_POST[first_name]', 
								last_name='$_POST[last_name]',
								email='$_POST[email]',
								d_o_b='$_POST[d_o_b]',
								contact_number='$_POST[contact_number]',
								country_from='$_POST[country_from]',
								reg_date='$_POST[reg_date]',
								status='$_POST[status]'
								where user_id='$_POST[user_id]'
								";
	  $r = mysqli_query ( $link, $q ) ;
}

?>
<div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center><h2 class="modal-title" id="rev">EDIT DATABASE PANEL</h2></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                # DISPLAY POST MESSAGE FORM.
                # Display form.
                echo '
				<center><h2 class="modal-title" id="rev">ADD NEW USER</h2>
				<h5 class="modal-title" id="rev">Provide user data and press ADD user to complete user addition.</h5></center>
				<form action="post_actionusers.php" method="post" accept-charset="utf-8">
				<div class="form-check">
						<label for="first_name">First name: </label>
						<input type="text" class="form-control" name="first_name" required>
						
						<label for="last_name">Last name: </label>
						<input type="text" class="form-control" name="last_name" required>
						
						<label for="email">Email: </label>
						<input type="email" class="form-control" name="email" required>
						
						<label for="d_o_b">Date of birth: </label>
						<input type="date" class="form-control" name="d_o_b" max="2006-01-05" required>
						
						<label for="contact_number">Contact number:  </label>
						<input type="number" class="form-control" name="contact_number" required>						
						
						<label for="country_from">Country from:  </label>
						<input type="text" class="form-control" name="country_from" required>							
							
						<label for="status">Status:  </label>
						<input type="text" class="form-control" name="status" value="0" disabled required>													
						
						
				<div class="form-group">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-dark" type="submit" value="ADD user">
					</div>
				</div>
		</form>
      </div>
	  
	  <center><h2 class="modal-title" id="rev">EDIT USER</h2>
	  <h5 class="modal-title" id="rev">Choose user ID and provide the rest of user information. Complete edition by pressing UPDATE user.</h2></center>
	  <form action="updateusers.php" method="post" accept-charset="utf-8">
				<div class="form-check">
				
						<label for="user_id">User ID: </label>
						<input type="number" class="form-control" name="user_id" required>
						
						<label for="first_name">First name: </label>
						<input type="text" class="form-control" name="first_name" required>
						
						<label for="last_name">Last name: </label>
						<input type="text" class="form-control" name="last_name" required>
						
						<label for="email">Email: </label>
						<input type="email" class="form-control" name="email" required>
						
						<label for="d_o_b">Date of birth: </label>
						<input type="date" class="form-control" name="d_o_b" max="2006-01-05" required>
						
						<label for="contact_number">Contact number:  </label>
						<input type="number" class="form-control" name="contact_number" required>						
						
						<label for="country_from">Country from:  </label>
						<input type="text" class="form-control" name="country_from" required>							
	
						
						<label for="status">Status:  </label>
						<input type="text" class="form-control" name="status" disabled value="0" required>		
						
						
				<div class="form-group">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-dark" type="submit" value="UPDATE user">
					</div>
				</div>
		</form>
      </div>
	  
	    
	  <center><h2 class="modal-title" id="rev">DELETE user</h2>
	  <h5 class="modal-title" id="rev">Choose user ID and predd DELETE.</h5>
	  <h5 class="modal-title" id="rev">This process is irreversable. Take care when deleting files.</h5></center>
	  <form action="deleteuser.php" method="post" accept-charset="utf-8">
				<div class="form-check">
				
						<label for="user_id">User ID: </label>
						<input type="number" class="form-control" name="user_id" required

						
				<div class="form-group">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-danger" type="submit" value="DELETE user">
					</div>
				</div>
		</form>
      </div>
	  
	  
	  
    ';




# Close database connection.
mysqli_close( $link ) ;
include ( 'includes/footer.html' ) ;
?>
    
	
	
		</div>
      </div><!--Close body-->
    </div><!--Close modal-body-->
  </div><!-- Close modal-fade-->
  
  <html lang="en">
  <head>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 14px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 4px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  </head>
		  <body style="background-color:#6495ED;">
			
  </body>
</html>