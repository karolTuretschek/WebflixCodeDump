<?php
$page_title = 'mov-rev';
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminLogin_tools.php' ) ; load() ; }

if ( isset( $_GET['tvshow_title'] ) ) $tvshow_title = $_GET['tvshow_title'] ;
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/adminNavbar.html' ) ;
# Retrieve items from 'tvshows' database table.
$q = "SELECT * FROM tvshows" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">
<div class=container2 style="background-color: white">
<center>
	<h1>tvshows database information.<h1>
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
   <th>ID: ' . $row['id'] . ' <br>Title:' . $row['tvshow_title'] . ' </th></center>
  </tr>

  <tr>
    <td>Description: ' . $row['further_info'] . '</td>
  </tr>
  <tr>
    <td>Image source: ' . $row['img'] . '</td>
  </tr>
  <tr>
    <td>Trailer url: ' . $row['preview'] . '</td>
  </tr>
  <tr>
    <td>Category: ' . $row['category'] . '</td>
  </tr>
    <tr>
    <td>Release year: ' . $row['outon'] . '</td>
  </tr>
  <tr>
    <td>Language: ' . $row['language'] . '</td>
  </tr>
  <tr>
    <td>Seasons: ' . $row['seasons'] . '</td>
  </tr>
  <tr>
    <td>Episodes: ' . $row['episodes'] . '</td>
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
# Execute inserting into 'review' database table.
	$q = "UPDATE `tvshows` SET tvshow_title='$_POST[tvshow_title]', 
								further_info='$_POST[further_info]',
								img='$_POST[img]',
								preview='$_POST[preview]',
								category='$_POST[category]',
								language='$_POST[language]',
								seasons='$_POST[seasons]',
								episodes='$_POST[episodes]',
								outon='$_POST[outon]'
								where id='$_POST[id]'
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
				<center><h2 class="modal-title" id="rev">ADD NEW tvshows</h2>
				<h5 class="modal-title" id="rev">Provide tvshows data and press ADD tvshows to complete tvshows addition.</h5></center>
				<form action="post_actiontvhows.php" method="post" accept-charset="utf-8">
				<div class="form-check">
						<label for="tvshow_title">TV show title: </label>
						<input type="text" class="form-control" name="tvshow_title" required>
						
						<label for="further_info">Further info: </label>
						<input type="text" class="form-control" name="further_info" required>
						
						<label for="img">Img url: </label>
						<input type="text" class="form-control" name="img" required>
						
						<label for="preview">Preview url: </label>
						<input type="text" class="form-control" name="preview" required>
						
						<label for="category">Category:  </label>
						<input type="text" class="form-control" name="category" required>						
						
						<label for="language">Language:  </label>
						<input type="text" class="form-control" name="language" required>							
	
						<label for="seasons">Seasons:  </label>
						<input type="number" class="form-control" name="seasons" min="1" required>
						
						<label for="episodes">Episodes:  </label>
						<input type="number" class="form-control" name="episodes" min="1" required>
						
						<label for="outon">Release year:  </label>
						<input type="number" class="form-control" name="outon" min="1800" required>	
						
						
						
						
				<div class="form-group">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-dark" type="submit" value="ADD tvshows">
					</div>
				</div>
		</form>
      </div>
	  
	  <center><h2 class="modal-title" id="rev">EDIT TVSHOW</h2>
	  <h5 class="modal-title" id="rev">Choose tvshows ID and provide the rest of tvshows information. Complete edition by pressing UPDATE tvshows.</h2></center>
	  <form action="updatetvshowss.php" method="post" accept-charset="utf-8">
				<div class="form-check">
				
						<label for="id">ID: </label>
						<input type="number" class="form-control" name="id" required>
						
						<label for="tvshow_title">TV show title: </label>
						<input type="text" class="form-control" name="tvshow_title" required>
						
						<label for="further_info">Further info: </label>
						<input type="text" class="form-control" name="further_info" required>
						
						<label for="img">Img url: </label>
						<input type="text" class="form-control" name="img" required>
						
						<label for="preview">Preview url: </label>
						<input type="text" class="form-control" name="preview" required>
						
						<label for="category">Category:  </label>
						<input type="text" class="form-control" name="category" required>		
					
						<label for="language">Language:  </label>
						<input type="text" class="form-control" name="language" required>
	
						<label for="seasons">Seasons:  </label>
						<input type="number" class="form-control" name="seasons" min="1" required>
						
						<label for="episodes">Episodes:  </label>
						<input type="number" class="form-control" name="episodes" min="1" required>
						
						<label for="outon">Release year:  </label>
						<input type="number" class="form-control" name="outon" required>
						
						
				<div class="form-group">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-dark" type="submit" value="UPDATE tvshows">
					</div>
				</div>
		</form>
      </div>
	  
	    
	  <center><h2 class="modal-title" id="rev">DELETE tvshows</h2>
	  <h5 class="modal-title" id="rev">Choose tvshows ID and predd DELETE.</h5>
	  <h5 class="modal-title" id="rev">This process is irreverstable. Take care when deleting files.</h5></center>
	  <form action="deletetvshowss.php" method="post" accept-charset="utf-8">
				<div class="form-check">
				
						<label for="id">ID: </label>
						<input type="number" class="form-control" name="id" required

						
				<div class="form-group">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-danger" type="submit" value="DELETE tvshows">
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