<?php
# Include HTML static file login.html
include ( 'includes/notLoggedUser.html' ) ;


# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $email = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$email'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php">Login</a>' ;
  }
  
  # Check for a card number.
  if (empty( $_POST[ 'card_number' ] ) )
  { $errors[] = 'Enter your card_number.' ; }
  else
  { $card_number = mysqli_real_escape_string( $link, trim( $_POST[ 'card_number' ] ) ) ; }
  
  # Check for expiry month.
  if (empty( $_POST[ 'exp_month' ] ) )
  { $errors[] = 'Enter card expiry month.' ; }
  else
  { $exp_m = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_month' ] ) ) ; }
  
  
  # Check for a expiry year.
  if (empty( $_POST[ 'exp_year' ] ) )
  { $errors[] = 'Enter your expiry year.' ; }
  else
  { $exp_y = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_year' ] ) ) ; }

# Check for a security.
  if (empty( $_POST[ 'cvv' ] ) )
  { $errors[] = 'Enter your security on back of card.' ; }
  else
  { $cvv = mysqli_real_escape_string( $link, trim( $_POST[ 'cvv' ] ) ) ; }
 # Check for date of birth.
  if (empty( $_POST[ 'd_o_b' ] ) )
  { $errors[] = 'Enter date of birth.' ; }
  else
  { $dob = mysqli_real_escape_string( $link, trim( $_POST[ 'd_o_b' ] ) ) ; }
  # Check for contact number.
  if (empty( $_POST[ 'contact_number' ] ) )
  { $errors[] = 'Enter contact_number.' ; }
  else
  { $contact_no = mysqli_real_escape_string( $link, trim( $_POST[ 'contact_number' ] ) ) ; } 

  # Check for country.
  if (empty( $_POST[ 'country_from' ] ) )
  { $errors[] = 'Enter country_from.' ; }
  else
  { $country_from = mysqli_real_escape_string( $link, trim( $_POST[ 'country_from' ] ) ) ; } 

 # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, card_number, exp_month, exp_year, cvv, d_o_b, contact_number, reg_date, country_from) VALUES ('$fn', '$ln', '$email', SHA2('$p',256), '$card_number', '$exp_m', '$exp_y', '$cvv', '$dob', '$contact_no', NOW(), '$country_from' )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>'; }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
  }
  # Or report errors.
  else 
  {
    echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p>';
    # Close database connection.
    mysqli_close( $link );
	
  }  
}
?>

<!doctype html>
<html lang="en">
<img class="landingImage" src="https://wallpapercave.com/wp/wp5483697.jpg">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://wallpaperaccess.com/full/1306884.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://wallpapercave.com/wp/SWSnJzp.jpg" alt="Second slide" object-fit="contain">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://images3.alphacoders.com/723/thumb-1920-72397.jpg" alt="Third slide"  >
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="bg-text">
  <h1 style="font-size:50px">Launch your freedom to movies!</h1>
</div>
<div class="container">
  <head>
<style>
.carousel-item{
	 filter: blur(5px);
  -webkit-filter: blur(5px);
  
}

.landingImage{
	 filter: blur(3px);
  -webkit-filter: blur(3px);
  
}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
</style>
 
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>	
<img class="landingImage" src="https://wallpapercave.com/wp/wp5483697.jpg">  
			<hr>	
			<center><div class="card" style="width:400px; background-color:#dae0e5; border-radius: 50px 50px 50px 50px; margin: 40px 40px 40px 40px; object-fit:cover;"><center>
			<div class="card-body">
			<a class="btn btn-secondary btn-lg" type="submit" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/login.php" style="width: 8rem;">Login</a>
			<a class="btn btn-secondary btn-lg" type="submit" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/register.php" style="width: 8rem;">Register</a>
			</div></center></center>
			
			<hr>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
	</body>
	</div>
</div>
</html>

<?php 
 

    # Display footer section.
    include ( 'includes/footer.html' ) ;

?>