<?php # PROCESS REVIEW POST.
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminLogin_tools.php' ) ; load() ; }
# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] = 'POST')
  {
# Open database connection.
    require ( 'includes/connect_db.php' ) ;
# Execute inserting into 'tvshow_rev' database table.
$q = "INSERT INTO tvshow_rev(id,first_name,last_name,tvshow_title, message, post_date) 
VALUES('{$_SESSION[user_id]}',
'{$_SESSION[first_name]}',
'{$_SESSION[last_name]}',
'{$_POST[tvshow_title]}',
'{$_POST[message]}',NOW() )";
    $r = mysqli_query ( $link, $q ) ;
# Report error on failure.
if (mysqli_affected_rows($link) != 1) 
{ 
echo '<p>Error</p>'.mysqli_error($link); } else { include('reviewShows.php'); }
header("Location: reviewShows.php");
    }
?>
