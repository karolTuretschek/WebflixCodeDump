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
# Execute inserting into 'users' database table.
$q = "INSERT INTO users(first_name,last_name,email,d_o_b,contact_number,country_from,reg_date,status) 
VALUES('{$_POST[first_name]}',
'{$_POST[last_name]}',
'{$_POST[email]}',
'{$_POST[d_o_b]}',
'{$_POST[contact_number]}',
'{$_POST[country_from]}',
NOW(),
'{$_POST[status]}')";
    $r = mysqli_query ( $link, $q ) ;
# Report error on failure.
if (mysqli_affected_rows($link) != 1) 
{ 
echo '<p>Error</p>'.mysqli_error($link); } else { include('http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/adminPanelForUsers.php#'); }
header("Location: adminPanelForUsers.php");
    }
?>
