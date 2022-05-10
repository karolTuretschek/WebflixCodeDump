<?php
$page_title = 'my_reviewsBasic';
# Access session.
session_start() ; 
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/navbarBasic.html' ) ;
# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM mov_rev WHERE id={$_SESSION[user_id]}
ORDER BY post_date DESC" ;

$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">';
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
echo '<div class="alert alert-dark" role="alert">
            <h4 class="alert-heading">' . $row['movie_title'] . '  </h4>
<p>Rating:  ' . $row['rate'] . ' &#9734</p>
<p>' . $row['message'] . '</p>
<hr>
<footer class="blockquote-footer">
<span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
<cite title="Source Title"> '. $row['post_date'].'</cite>
<br>
<div class="alert alert-secondary" role="alert">
<a  class="alert-link" href="delete_postBasic.php?post_id='.$row['post_id'].'"> <i class="fas fa-trash-alt"></i>  Delete Post</a><br>
</footer>
</div>
			
';  
  }

  }
else { echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
<p>Error loading data or no data is availabe to display</p>


</div>
<div> ' ; }		
include('includes/footer.html');
?>
