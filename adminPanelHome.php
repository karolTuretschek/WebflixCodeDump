<?php
$page_title = 'mov-rev';
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminLogin_tools.php' ) ; load() ; }

if ( isset( $_GET['tvshow_title'] ) ) $tvshow_title = $_GET['tvshow_title'] ;
# Open database connection.
require ( 'includes/connect_db.php' ) ;
include ( 'includes/adminNavbar.html' ) ;
# Retrieve items from 'tvshows' database table.
$q = "SELECT * FROM tvshows" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">
<div class=container2 style="background-color: white">
<center>
	<h1>ADMIN DATABASE PANEL<h1>
	<hr>
   <h3>Take extra care when processing new data.<h3>
   <h3>Use the navigation bar on top on the screen to access specific tables in database.<h3>
   <h3><b>Deleted data cannot be restored.</b><h3>
   </div></center>
'; }

?>
<?php
# Access session.
session_start() ; 
include ( 'includes/footer.html' ) ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminLogin_tools.php' ) ; load() ; }
# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] = 'POST')
  {
# Open database connection.
    require ( 'includes/connect_db.php' ) ;
# Execute inserting into 'review' database table.
	$q = "UPDATE `tvshows` SET tvshow_title='$_POST[tvshow_title]', 
								further_info='$_POST[further_info]',
								img='$_POST[img]',
								preview='$_POST[preview]',
								category='$_POST[category]',
								language='$_POST[language]',
								seasons='$_POST[seasons]',
								episodes='$_POST[episodes]',
								outon='$_POST[outon]'
								where id='$_POST[id]'
								";
	  $r = mysqli_query ( $link, $q ) ;
}

?>
<div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center><h2 class="modal-title" id="rev">EDIT DATABASE PANEL</h2></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
    
	
	
		</div>
      </div><!--Close body-->
    </div><!--Close modal-body-->
  </div><!-- Close modal-fade-->
  
  <html lang="en">
  <head>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 14px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 4px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  </head>
		  <body style="background-color:#6495ED;">
			
  </body>
</html>