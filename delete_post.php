<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM mov_rev WHERE id={$_SESSION[user_id]}
ORDER BY post_date DESC" ;
if ( isset( $_GET['post_id'] ) ) $post_id = $_GET['post_id'] ;
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/logout.html' ) ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  }
else { echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
<p>You have no movie reviews</p>
</div>
<div> ' ; }
$sql = "DELETE FROM mov_rev WHERE post_id='$post_id'";
 if ($link->query($sql) === TRUE) {
       header("Location: my_reviews.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }
			
include('includes/footer.html');
?>
