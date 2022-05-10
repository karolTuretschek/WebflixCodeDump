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
    { echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/SMirC-thumbsup.svg/2048px-SMirC-thumbsup.svg.png" alt="Thumb up" width="500" height="600"  left="50%">
'; }
  
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
	include ( 'includes/footer.html' );
  }  
}
?>

<!doctype html>
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
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script defer src="script.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
body {
  background-image: url('https://wallpapercave.com/wp/wp5483697.jpg');

}
.container{
	background-color: #212529;;
	width: 100%;
	height: auto;
	border-radius: 50px 50px 50px 50px;
}
label{
	color: white;
	font-size: 20;
}
p{
	color:lightgray;
}
h1{
	color:white;
}
</style>
   
  </head>
  <body>
  
  
  <div class="container">

	<body style="background-color:bg-light;" !important>
		<center>
		<div class="card" style="width: auto; height: auto; background-color:#212529;; border-radius: 50px 50px 50px 50px">
		<br>
		<center><h1>PREMIUM membership register</h1></center>
		<div id="error"></div>
		<form action="register.php" method="post">
		<center>
		<div class="row">
		
		<div class="col-md-4 mb-4">
		<label for="firstName">First name</label>
		<input id="first_name" type="text" class="form-control" name="first_name" size="20" minlength="2" placeholder ="John" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"required>
		</div>
		<div class="col-md-4 mb-4">
		<label for="lastName">Last name</label>
		<input type="text" class="form-control" name="last_name" size="20" placeholder ="Smith" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"required>
		</div>
		
		<div class="col-md-4 mb-4">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email" size="20" min="6" placeholder ="johnsmith@gmail.com"  value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"required>
		</div>
		 <div class="col-md-4 mb-4">		
		 <label for="password">Password</label>
		 <input type="password" class="form-control" name="pass1" minlength ="3" placeholder="**********" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>
		 </div>
		 <div class="col-md-4 mb-4">
		 <label for="confirmPassword">Confirm Password</label>
		 <input type="password" class="form-control" name="pass2" size="20" minlength ="3" placeholder="**********" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required>
		 </div>
		 <div class="col-md-4 mb-4">
		 <label for="cardNumber">Card Number</label>
		 <input type="number" class="form-control" name="card_number" size="13" placeholder ="1111222233334444" value="<?php if (isset($_POST['card_number'])) echo $_POST['card_number']; ?>"required>
		 </div>	
		 
		 <div class="col">
		 <hr>
		 <img src="https://www.starlingbank.com/static/8a241bf17418588df5a6f8cb5effd3b1/card-sort-code1.jpg" alt="Card Picture" width="75%" height="auto">	 
		 <hr>
		 <div class="row">
			<div class="col-md-4 mb-3">
		 <label for="expiryMonth">Month</label>
		 <input type="number" class="form-control" name="exp_month" size="2" placeholder ="10" min="1" max="12" value="<?php if (isset($_POST['exp_month'])) echo $_POST['exp_month']; ?>"required>
		 </div>
			<div class="col-md-4 mb-3">
		 <label for="expiry">Year</label>
		 <input type="number" class="form-control" name="exp_year" size="2" placeholder ="23" min="22" max="40" value="<?php if (isset($_POST['exp_year'])) echo $_POST['exp_year']; ?>"required>
		 </div>
	
		 <div class="col-md-4 mb-3">
		 <label for="security">Security</label>
		 <input type="number" class="form-control" name="cvv" size="3" placeholder ="666" min="001" max="999" value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>"required>

		 </div>
		 <div class="col-md-4 mb-3">
		 <label for="d_o_b">Date of birth</label>
		 <input type="date" class="form-control" name="d_o_b" size="20" max="2006-01-05" placeholder ="2006-01-05" value="<?php if (isset($_POST['d_o_b'])) echo $_POST['d_o_b']; ?>"required>

		 </div>
		 
		 <div class="col-md-4 mb-3">
		 <label for="contact_number">Contact number</label>
		 <input type="number" class="form-control" name="contact_number" size="15" placeholder ="07943567313" value="<?php if (isset($_POST['contact_number'])) echo $_POST['contact_number']; ?>"required>

		 </div>
		  <div class="col-md-4 mb-3">
		 <label for="country_from">Country</label>
		 <input type="text" class="form-control" name="country_from" size="20" placeholder ="Australia" pattern="[A-Za-z]{2,100}" value="<?php if (isset($_POST['country_from'])) echo $_POST['country_from']; ?>"required>

		 </div>
		 
		 
		 </div>

		 
		

</div>
</center>

	<input type="checkbox" id="payment" name="payment" value="99.99" required>
	<label for="payment"> I agree for an automated payment of £99.99 a year to be taken from my account.</label><br>	
	<p class="_58mv">By clicking Register, you agree to our 
	<a href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/terms.php" id="terms-link" target="_blank" rel="nofollow">Terms</a>. Learn how we collect, use and share your data in our 
	<a href="https://www.gov.uk/data-protection" id="privacy-link" target="_blank" rel="nofollow">Data Protection</a>.</p>
	  <input type="submit" class="btn btn-secondary btn-lg" value="Register">
   


	
</div>
</div>
</div>
</center>
	
		
		
</form>
		<?php
		include ( 'includes/footer.html' );
		?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
