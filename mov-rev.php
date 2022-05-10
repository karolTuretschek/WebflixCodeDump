<?php
$page_title = 'mov-rev';
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

if ( isset( $_GET['movie_title'] ) ) $movie_title = $_GET['movie_title'] ;
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/navbar.html' ) ;
# Retrieve items from 'mov_rev' database table.
$q = "SELECT * FROM mov_rev WHERE movie_title LIKE '%{$_GET[movie_title]}%'" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
   echo '<div class="alert alert-dark" role="alert">
	<h4 class="alert-heading">' . $row['movie_title'] . '  </h4>
	<p>' . $row['message'] . '</p>
	<hr>
	<footer class="blockquote-footer">
	<span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
	<cite title="Source Title"> '. $row['post_date'].'</cite>
	</footer>
	</div>
';  
  }
echo '<br><button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button><br>' ;
  }
else { 
echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
	<p>There are currently no reviews for this movie.</p>
<br>	<button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button><br>
</div>
<div>  ' ; }
?>
<div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rev">Movie Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                # DISPLAY POST MESSAGE FORM.
                # Display form.
                echo '
				<form action="post_action.php" method="post" accept-charset="utf-8">
				<div class="form-check">
					<label for="mov_title">Movie Title: </label>
						<input type="text" class="form-control" name="movie_title" required>
					<label for="rate">Rate Movie: </label>
				
				<div class="form-group">
					<label for="comment">Comment:</label>
					<textarea class="form-control" rows="5" id="message" name="message" required></textarea>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-dark" type="submit" value="Post Review">
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  </head>
		  <body style="background-color:#6495ED;">
			
  </body>
</html>