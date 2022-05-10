<?php # PROCESS REVIEW POST.
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] = 'POST')
  {
# Open database connection.
    require ( 'includes/connect_db.php' ) ;
# Execute inserting into 'category' database table.
$q = "INSERT INTO users(name,description) 
VALUES('{$_POST[name]}',
'{$_POST[description]}')";
    $r = mysqli_query ( $link, $q ) ;
# Report error on failure.
if (mysqli_affected_rows($link) != 1) 
{ 
echo '<p>Error</p>'.mysqli_error($link); } else { include('http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/adminPanelForCategory.php#'); }
header("Location: adminPanelForCategory.php");
    }
?>
