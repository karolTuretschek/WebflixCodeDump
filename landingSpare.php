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
<head>
<title>Title</title>
<link rel="icon" type="image/jgp" href="/img/icon.jpg"/>
<style>
body {
  background-image: url('https://wallpapercave.com/wp/wp5483697.jpg');
  colour: white;

}
.container{
	background-color: #212529;
	width: 100%;
	
	border-radius: 50px 50px 50px 50px;
	
}
h1{
	color: white;
	z-index: 1;
}
h2{
	color: white;
	z-index: 1;
}

.w3-container2{
	background-color:grey;
	color: grey;
	z-index: 1;
	font-size: 3;
}
</style>
<script>
function onYouTubeIframeAPIReady() {
  var player;
  player = new YT.Player('player', {
    videoId: 'https://www.youtube.com/embed/Eb9BfisJ6FA?controls=0',
    playerVars: { 'autoplay': 1, 'controls': 0 },
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange,
      'onError': onPlayerError
    }
  });
}
</script>
</head>
<body> 
<div class="container">	
<center>
<div class="w3-container">
<br>
<br>
<h1>Watch movies on demand.</h1>
<h2>Join as premium user for only £9.99 a month or as basic user for FREE.</h2>
<h2>Be part of webflix today.</h2>
<br>
<div class="w3-container2">
  <p>Separator</p>
</div>
<h1>On large devices</h1>
<a href="https://imgur.com/i6uF0iY"><img src="https://i.imgur.com/i6uF0iY.gif" title="source: imgur.com" /></a>
<br>
<br>
</div>
<div class="w3-container2">
  <p>Separator</p>
</div>
<br>
<div class="w3-container">
<h1>And on smaller ones</h>
<a href="https://imgur.com/oG5FK39"><img src="https://i.imgur.com/oG5FK39.gif" title="source: imgur.com" style="height: 450px"/></a>
<br>
</div>
<br>
<div class="w3-container2">
  <p>Separator</p>
</div>
			<div class="card" style="width:400px; background-color:#dae0e5; border-radius: 50px 50px 50px 50px; margin: 40px 40px 40px 40px; object-fit:cover;">
			
			<div class="card-body">
			<a class="btn btn-secondary btn-lg" type="submit" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/loginMain.php" style="width: 8rem;">Login</a>
			<a class="btn btn-secondary btn-lg" type="submit" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/registerMain.php" style="width: 8rem;">Register</a>
			</div>
			</center>
	</div>
	</body>
	</div>
</div>
</html>
<?php 
 

    # Display footer section.
    include ( 'includes/footer.html' ) ;

?>