<?php
$page_title = 'my_reviews';
# Access session.
session_start() ; 
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/navbar.html' ) ;
# Retrieve items from 'mov_rev' database table.
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
<p>' . $row['message'] . '</p>
<hr>
<footer class="blockquote-footer">
<span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
<cite title="Source Title"> '. $row['post_date'].'</cite>
<br>
<div class="alert alert-secondary" role="alert">
<a  class="alert-link" href="delete_post.php?post_id='.$row['post_id'].'"> <i class="fas fa-trash-alt"></i>  Delete Post</a><br>
</footer>
</div>
			
';  
  }

  }
else { echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
<p>You have no TV Show reviews</p>
</div>
<div> ' ; }		
# Retrieve items from 'tvshow_rev' database table.
$q = "SELECT * FROM tvshow_rev WHERE id={$_SESSION[user_id]}
ORDER BY post_date DESC" ;

$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">';
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
echo '<div class="alert alert-dark" role="alert">
            <h4 class="alert-heading">' . $row['tvshow_title'] . '  </h4>
<p>' . $row['message'] . '</p>
<hr>
<footer class="blockquote-footer">
<span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
<cite title="Source Title"> '. $row['post_date'].'</cite>
<br>
<div class="alert alert-secondary" role="alert">
<a  class="alert-link" href="delete_post.php?post_id='.$row['post_id'].'"> <i class="fas fa-trash-alt"></i>  Delete Post</a><br>
</footer>
</div>
			
';  
  }

  }
else { echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
<p>You have no movie reviews</p>
</div>
<div> ' ; }	
include('includes/footer.html');
?>
