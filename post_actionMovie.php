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
# Execute inserting into 'movie' database table.
$q = "INSERT INTO movie(movie_title,further_info,img,preview,category,language,duration,outon) 
VALUES('{$_POST[movie_title]}',
'{$_POST[further_info]}',
'{$_POST[img]}',
'{$_POST[preview]}',
'{$_POST[category]}',
'{$_POST[language]}',
'{$_POST[duration]}',
'{$_POST[outon]}')";
    $r = mysqli_query ( $link, $q ) ;
# Report error on failure.
if (mysqli_affected_rows($link) != 1) 
{ 
echo '<p>Error</p>'.mysqli_error($link); } else { include('http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/adminPanelForMovies.php'); }
header("Location: adminPanelForMovies.php");
    }
?>
