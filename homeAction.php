<?php # DISPLAY COMPLETE LOGGED IN PAGE.
    # Access session.
    session_start() ;

    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

    # Set page title and display header section.
    $page_title = 'Whats on' ;
    include ( 'logout.html' ) ;
	include ( 'includes/navbar.html' ) ;
	include ( 'includes/categoryBar.html' ) ;
    # Open database connection.
    require ( 'includes/connect_db.php' ) ;

?>
<div class="container">
<div class="row">
<html lang="en">
  <head>
  <style>
  .body{
	  margin 150px 150px 150px 150px;
  }
  .card{

  transition: transform .3s;
}

.card:hover{
  -ms-transform: scale(1.1); /* IE 9 */
  -webkit-transform: scale(1.1); /* Safari 3-8 */
  transform: scale(1.1); 
  z-index: 1;
}
</style>
  <link rel="icon" href="https://pics.freeicons.io/uploads/icons/png/15914627681630335518-512.png">
	<!-- Hotjar Tracking Code for http://webdev.edinburghcollege.ac.uk/~hncsoftsa4/php/login.php -->
<!-- Hotjar Tracking Code for http://webdev.edinburghcollege.ac.uk/~hncsoftsa4/php/login.php -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2746274,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/stylesheet" href="myStyle.css">
    <title>Hello, world!</title>
  </head>
  <body style="background-color:#7984a6;">
  <?php # DISPLAY COMPLETE LOGGED IN PAGE.
    # Access session.
    session_start() ;

    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

    # Set page title and display header section.
    $page_title = 'Whats on' ;
    //include ( 'logout.html' ) ;

	include ( 'includes/logout.php' ) ;
	
	

    # Open database connection.
    require ( 'includes/connect_db.php' ) ;

    # Retrieve movies from 'movie' database table.
    $q = "SELECT * FROM movie WHERE category LIKE '%action%'" ;
    $r = mysqli_query( $link, $q ) ;
    if ( mysqli_num_rows( $r ) > 0 )
    {
		
        # Display body section.
		
        while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
        {
        echo '  
				
				<div class="col-md-3 d-flex justify-content-center">
				
				<div class="card" style="width: 28rem; background-color:#dae0e5; margin: 10px,10px,10px,10px">
				
				  <img class="card-img-top" src='. $row['img'].' alt="Movie">
				  <div class="card-body">
				  <center>
					<h5 class="card-title">'.$row['movie_title'].'</h5>
					
					<a href="movie.php?id='.$row['id'].'" class="btn btn-secondary btn-lg" role="button"><img src="https://cdn3.iconfinder.com/data/icons/iconic-1/32/play_alt-512.png" width="25" height="25"></a>
					<a href="movie.php?id='.$row['id'].'" class="btn btn-secondary btn-lg" role="button"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Infobox_info_icon.svg/1200px-Infobox_info_icon.svg.png" width="25" height="25"></a> 
					</center>
				  </div>
				</div>
				
				</div>
				
				';
				
        }
		
        # Close database connection.
        mysqli_close( $link) ; 
    }

    # Or display message.
    else { echo '<p>There are currently no movies showing.</p>';}

    # Display body section.
    #echo "<h1>What's On</h1><p>You are now logged in, {$_SESSION['first_name']} {$_SESSION['last_name']} </p>";

    # Display footer section.
    include ( 'includes/footer.html' ) ;

?>

  </body>
  	<br>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<br>
</html>
<div class="container">
	<br><br>
	<br>

</div>