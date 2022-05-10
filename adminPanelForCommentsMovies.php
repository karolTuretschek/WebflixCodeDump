<?php
$page_title = 'DB Panel for mov_rev';
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminLogin_tools.php' ) ; load() ; }

if ( isset( $_GET['name'] ) ) $name = $_GET['name'] ;
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/adminNavbar.html' ) ;
# Retrieve items from 'mov_rev' database table.
$q = "SELECT * FROM mov_rev" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">
<div class=container2 style="background-color: white">
<center>
	<h1>Movie review database information.<h1>
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
   <th>Post ID: ' . $row['post_id'] . ' <br>Title: ' . $row['movie_title'] . ' </th></center>
  </tr>

  <tr>
    <td>User Id: ' . $row['id'] . '</td>
  </tr>
  
  <tr>
    <td>First name: ' . $row['first_name'] . '</td>
  </tr>
  
  <tr>
    <td>Last name: ' . $row['last_name'] . '</td>
  </tr>
  
  <tr>
    <td>Post date: ' . $row['post_date'] . '</td>
  </tr>
  
  <tr>
    <td>Review: ' . $row['message'] . '</td>
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
# Execute inserting into 'category' database table.
	$q = "UPDATE `category` SET cat_name='$_POST[cat_name]', 
								description='$_POST[description]',
								where category_id='$_POST[category_id]'
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
			
	  

	    
	  <center><h2 class="modal-title" id="rev">DELETE review</h2>
	  <h5 class="modal-title" id="rev">Choose Post ID and predd DELETE.</h5>
	  <h5 class="modal-title" id="rev">This process is irreversable. Take care when deleting files.</h5></center>
	  <form action="deleteMoviesReview.php" method="post" accept-charset="utf-8">
				<div class="form-check">
				
						<label for="post_id">Post ID: </label>
						<input type="number" class="form-control" name="post_id" required

						
				<div class="form-group">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-danger" type="submit" value="DELETE category">
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