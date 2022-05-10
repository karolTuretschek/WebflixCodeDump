<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;
if ( isset( $_GET['tvshow_title'] ) ) $tvshow_title = $_GET['tvshow_title'] ;
include ( 'logout.html' ) ;
include ( 'includes/navbar.html' ) ;
# Open database connection.
require ( 'includes/connect_db.php' ) ;

# Retrieve selective item data from 'tvshow' database table. 
$q = "SELECT * FROM tvshows WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

  # Check if cart already contains one tvshow id.
  if ( isset( $_SESSION['cart'][$id] ) )
 { 
# Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
    echo '
		<div class="container" style="background-color: #dae0e5; border-radius: 50px 50px 50px 50px">
		<br>
            <center><b><h1 class="display-4">'.$row['tvshow_title'].'</h1></b></center>
        
            
              <div class="embed-responsive embed-responsive-16by9">

                <iframe class="embed-responsive-item" src='. $row['preview'].' 
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
               </div>
            
            
            <br>
			<p><b>&nbsp'.$row['further_info'].'</b></p>
			
			
				<hr>
                <h3>Details</h3>
				<p>
				<img src="https://cdn-icons-png.flaticon.com/512/4/4259.png" width="25" height="25" alt="icon">&nbsp'.$row['category'].'
                &nbsp<img src="http://cdn.onlinewebfonts.com/svg/img_537319.png" width="25" height="25" alt="icon">&nbsp'.$row['release'].'
				&nbsp<img src="https://upload.wikimedia.org/wikipedia/commons/c/c0/Language_icon.png" width="25" height="25" alt="icon">&nbsp'.$row['language'].'
				&nbsp<img src="https://upload.wikimedia.org/wikipedia/commons/c/c0/Language_icon.png" width="25" height="25" alt="icon">&nbsp'.$row['language'].'
				&nbsp<img src="https://static.thenounproject.com/png/3303322-200.png" width="25" height="25" alt="icon">&nbspSeasons: '.$row['seasons'].' Episodes: '.$row['episodes'].'
				</p>
                <h2>
				<hr>				
				<a href="tvshow_rev.php?tvshow_title='.$row['tvshow_title'].'"> <button type="button" class="btn btn-secondary" role="button"> Reviews</button></a>
                </h2>
                </hr> 
            
        
        ';
		
		
		
						
		
  }
else
  {
 # Or add one of this product to the cart.
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['mov_price'] ) ;
 echo '
		<div class="container" style="background-color: #dae0e5; border-radius: 50px 50px 50px 50px">
		<br>
            <center><b><h1 class="display-4">'.$row['tvshow_title'].'</h1></b></center>
        
            
              <div class="embed-responsive embed-responsive-16by9">

                <iframe class="embed-responsive-item" src='. $row['preview'].' 
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
               </div>
            
            
            <br>
			<p><b>&nbsp'.$row['further_info'].'</b></p>
			
			
				<hr>
                <h3>Details</h3>
				<p>
				<img src="https://cdn-icons-png.flaticon.com/512/4/4259.png" width="25" height="25" alt="icon">&nbsp'.$row['category'].'
                &nbsp<img src="http://cdn.onlinewebfonts.com/svg/img_537319.png" width="25" height="25" alt="icon">&nbsp'.$row['release'].'
				&nbsp<img src="https://upload.wikimedia.org/wikipedia/commons/c/c0/Language_icon.png" width="25" height="25" alt="icon">&nbsp'.$row['language'].'
				&nbsp<img src="https://upload.wikimedia.org/wikipedia/commons/c/c0/Language_icon.png" width="25" height="25" alt="icon">&nbsp'.$row['language'].'
				&nbsp<img src="https://static.thenounproject.com/png/3303322-200.png" width="25" height="25" alt="icon">&nbspSeasons: '.$row['seasons'].' Episodes: '.$row['episodes'].'
				</p>
                <h2>
				<hr>				
				<a href="tvshow_rev.php?tvshow_title='.$row['tvshow_title'].'"> <button type="button" class="btn btn-secondary" role="button"> Reviews</button></a>
                </h2>
                </hr> 
            
        
        ';
  }
}

# Close database connection.
mysqli_close($link);


# Display footer section.
include ( 'includes/footer.html' ) ;
?>
<html lang="en">
  <head>
  
<!-- Hotjar Tracking Code for http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/login.php -->
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
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  </head>
		  <body style="background-color:#dae0e5;">
  </body>
</html>