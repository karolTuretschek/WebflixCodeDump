<?php 
# Include HTML static file login.html
#include ( 'includes/test1.html' ) ;
include ( 'includes/notLoggedUser.html' ) ;
# DISPLAY COMPLETE LOGIN PAGE.
# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
 
}
?>


<!doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="https://pics.freeicons.io/uploads/icons/png/15914627681630335518-512.png">
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

    <!-- Bootstrap CSS
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     -->
	<style>
body {
  background-image: url('https://wallpapercave.com/wp/wp5483697.jpg');

}
.container{
	background-color: #212529;
	width: 100%;
	height: 100%;
	border-radius: 50px 50px 50px 50px;
}
.card{
	position: fixed;
	top: 50%;
	left: 50%;
	-webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.row{
	position: relative;
	left: 25%;
}
p1{
	position: relative;
	left: 83%;
	color:red;
}

</style>
  </head>
  
		  <body>
			
<div class="card" style="width: 34rem; height: auto; background-color:#dae0e5; border-radius: 50px 50px 50px 50px">
	<center>		<div class="card-body">
			<h1>Choose your subscription option</h1>
			<br><br>
<div class=row>			
													
			<center><a><a class="btn btn-secondary btn-lg" type="submit" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/register.php" style="width: 8rem;">Premium</a></center>
				
			<h1>&nbsp;&nbsp;<h1>
													
			<center><a class="btn btn-secondary btn-lg" type="submit" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/registerBasic.php" style="width: 8rem;">Basic</a></center>

</div>			
			<hr>
			<br>
			<p>Already registered?</p>
			<a class="btn btn-secondary btn-lg" type="submit" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/loginMain.php" style="width: 8rem;">Login</a>			
			<br>
		  </div>
		  </center>
		  </div>
			
				

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </body>
</html>
<?php 
 

    # Display footer section.
    include ( 'includes/footer.html' ) ;

?>