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
# Execute inserting into 'review' database table.
$q = "UPDATE users SET first_name='$_POST[first_name]', 
								last_name='$_POST[last_name]',
								email='$_POST[email]',
								d_o_b='$_POST[d_o_b]',
								contact_number='$_POST[contact_number]',
								country_from='$_POST[country_from]',
								reg_date='$_POST[reg_date]',
								status='$_POST[status]'
								where user_id='$_POST[user_id]'
								";
    $r = mysqli_query ( $link, $q ) ;
# Report error on failure.
if (mysqli_affected_rows($link) != 1) 
{ 
echo '<p>Error</p>'.mysqli_error($link); } else { include('http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/adminPanelForUsers.php'); }
header("Location: adminPanelForUsers.php");
    }
?>
