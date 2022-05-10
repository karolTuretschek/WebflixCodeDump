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
# Execute inserting into 'tvshows' database table.
$q = "UPDATE tvshows SET tvshow_title='$_POST[tvshow_title]', 
								further_info='$_POST[further_info]',
								img='$_POST[img]',
								preview='$_POST[preview]',
								category='$_POST[category]',
								language='$_POST[language]',
								seasons='$_POST[seasons]',
								episodes='$_POST[episodes]',
								outon='$_POST[outon]'
								WHERE id='$_POST[id]'
								";
    $r = mysqli_query ( $link, $q ) ;
# Report error on failure.
if (mysqli_affected_rows($link) != 1) 
{ 
echo '<p>Error</p>'.mysqli_error($link); } else { include('http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/adminPanelForShows.php'); }
header("Location: adminPanelForShows.php");
    }
?>
