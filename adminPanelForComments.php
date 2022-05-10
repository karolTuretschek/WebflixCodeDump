<?php
$page_title = 'mov-rev';
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminLogin_tools.php' ) ; load() ; }

if ( isset( $_GET['name'] ) ) $name = $_GET['name'] ;
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/adminNavbar.html' ) ;
# Retrieve items from 'category' database table.
$q = "SELECT * FROM category" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">
<div class=container2 style="background-color: white">
<center>
	<h1>Category database information.<h1>
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
   <th>ID: ' . $row['category_id'] . ' <br>Title: ' . $row['cat_name'] . ' </th></center>
  </tr>

  <tr>
    <td>Description: ' . $row['description'] . '</td>
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
				<center><h2 class="modal-title" id="rev">ADD NEW category</h2>
				<h5 class="modal-title" id="rev">Provide category data and press ADD category to complete category addition.</h5></center>
				<form action="post_actioncategory.php" method="post" accept-charset="utf-8">
				<div class="form-check">
						<label for="cat_name">Category name: </label>
						<input type="text" class="form-control" name="cat_name" required>
						
						<label for="description">Description: </label>
						<input type="text" class="form-control" name="description" required>
						
				<div class="form-group">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-dark" type="submit" value="ADD category">
					</div>
				</div>
		</form>
      </div>
	  
	  <center><h2 class="modal-title" id="rev">EDIT TVSHOW</h2>
	  <h5 class="modal-title" id="rev">Choose category ID and provide the rest of category information. Complete edition by pressing UPDATE category.</h2></center>
	  <form action="updatecategory.php" method="post" accept-charset="utf-8">
				<div class="form-check">
				
						<label for="category_id">Category ID: </label>
						<input type="text" class="form-control" name="category_id" required>
						
						<label for="cat_name">Category name: </label>
						<input type="text" class="form-control" name="cat_name" required>
						
						<label for="description">Description: </label>
						<input type="text" class="form-control" name="description" required>

						
				<div class="form-group">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-dark" type="submit" value="UPDATE category">
					</div>
				</div>
		</form>
      </div>
	  
	    
	  <center><h2 class="modal-title" id="rev">DELETE category</h2>
	  <h5 class="modal-title" id="rev">Choose user ID and predd DELETE.</h5>
	  <h5 class="modal-title" id="rev">This process is irreversable. Take care when deleting files.</h5></center>
	  <form action="deletecategory.php" method="post" accept-charset="utf-8">
				<div class="form-check">
				
						<label for="category_id">Category ID: </label>
						<input type="text" class="form-control" name="category_id" required

						
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