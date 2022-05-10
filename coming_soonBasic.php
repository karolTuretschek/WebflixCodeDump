<?php # DISPLAY COMPLETE LOGGED IN PAGE.
    # Access session.
    session_start() ;

    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_toolsBasic.php' ) ; load() ; }

    # Set page title and display header section.
    $page_title = 'Whats on' ;
    //include ( 'logout.html' ) ;

	include ( 'includes/navbarBasic.html' ) ;
	
	

    # Open database connection.
    require ( 'includes/connect_db.php' ) ;

?>
<div class="container">
<div class="row">
<html lang="en">
  <head>
  
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
  
  <body style="background-color:#6495ED;">
	
  </body>
</html>
<div class="container">
<div class="row">
<div class="col-md-12 d-flex justify-content-center">

</div>
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
    $q = "SELECT * FROM movie" ;
    $r = mysqli_query( $link, $q ) ;
    if ( mysqli_num_rows( $r ) > 0 )
    {
		
        # Display body section.
		
      
        echo '  
				
				<div class="col-md-6 d-flex justify-content-center">
				
				<div class="card" style="width: 18rem; background-color:#dae0e5; margin: 10px,10px,10px,10px">
				  <img class="card-img-top" src="https://m.media-amazon.com/images/I/41SJM70fMpL._AC_.jpg" alt="Movie">
				  <div class="card-body">
					<center><h5 class="card-title">Availabe soon!</h5></center>
					<a href="https://m.media-amazon.com/images/I/41SJM70fMpL._AC_.jpg"></a> 
				  </div>
				</div>
				
				</div>
				
				
				<div class="col-md-6 d-flex justify-content-center">
				
				<div class="card" style="width: 18rem; background-color:#dae0e5; margin: 10px,10px,10px,10px">
				  <img class="card-img-top" src="https://i.pinimg.com/originals/04/4f/73/044f7316c81a344650f056bbb8b98006.jpg" alt="Movie">
				  <div class="card-body">
					<center><h5 class="card-title">Availabe soon!</h5></center>
					<a href="https://i.pinimg.com/originals/04/4f/73/044f7316c81a344650f056bbb8b98006.jpg"></a> 
				  </div>
				</div>
				
				</div>
				
				';
				
        
		
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
</div>
</div>