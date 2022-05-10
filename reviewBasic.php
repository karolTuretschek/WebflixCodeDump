<?php
$page_title = 'User Reviews ';
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/navbarBasic.html' ) ;
# Display body section, retrieving from 'mov_rev' database table.
#$q = "SELECT * FROM mov_rev ORDER BY post_date DESC" ;

$q = "SELECT mov_rev.post_id,mov_rev.movie_title, mov_rev.id, mov_rev.first_name, mov_rev.last_name, mov_rev.message, mov_rev.post_date, movie.img
FROM mov_rev
INNER JOIN movie ON  mov_rev.movie_title=movie.movie_title
ORDER BY mov_rev.post_date DESC";
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  echo '<div class="container">';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '			
	<div class="alert alert-dark" role="alert">
	<div class = "row">
	 <div class="col">
  <center><img src=' . $row['img'] . '   alt="Avatar" style="width:60%"></center>
  </div>
  <div class="col">
	   <center><h4 class="alert-heading"><b>' . $row['movie_title'] . '  </b></h4></center>
	   
	   
	   

  
  <div class="container">

</div>
	   <div class="col">
     
    
	
	    
		<div class="alert alert-secondary" role="alert">
		<br>
		<p><b>' . $row['message'] . '<b></p>		
				</footer>
				</div>
     <hr>
<footer class="blockquote-footer">
  <span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
  <cite title="Source Title"> '. $row['post_date'].'</cite></footer></div></div></div></div> '
  
  ;   }
echo '  ' ;
  }
else { echo ' <div class="container">
	          <div class="alert alert-secondary" role="alert">
	         <p>There are currently no movie reviews.</p>
<a href="post.php><button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button></a>
           </div>
	        <div>';}
?>

<!-- Modal review-->
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
			<!-- Hotjar Tracking Code for http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/login.php -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2746274,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
  </body>
</html>
<?php
    # Display footer section.
    include ( 'includes/footer.html' ) ;

?>