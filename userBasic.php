<?php 
# DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'User Area ' ;
include('includes/navbarBasic.html');

# Access session.
session_start() ; 

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_toolsBasic.php' ) ; load() ; }


# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'busers' database table.
	$q = "SELECT * FROM busers WHERE user_id={$_SESSION[user_id]}" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
  
  echo '
	<div class="container">
	  <div class="row">
  ';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
	<div class="col-sm">
	  <div class="alert alert-dark" alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>	
	  <h1>'  . $row['first_name'] . ' '  . $row['last_name'] . '<strong>  </h1> 
	   User ID : EC2021/'  . $row['user_id'] . ' 
	   <hr>
	   Email :  '  . $row['email'] . '
	  <hr>
	  Registration Date :  '  . $row['reg_date'] . ' 
	  <hr>
	  <!-- Button trigger modal -->
	<button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#password">
		<i class="fa fa-edit"></i>  Change Password
	</button>
	 </div>
    </div>
	
    
	';
  }
	
  # Close database connection.
  #mysqli_close( $link ) ; 
}
else { echo '<h3>No user details.</h3>

' ; }
		
		
	





		# Display footer section.
		include ( 'includes/footer.html' ) ; 
		?>
		
		
		
	<!--  =============================
=====    Modal Change Password   =======
	=================================== -->	 

	
<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="change-password.php" method="post">
            <div class="form-group">
                <input type="text" 
					   name="email" 
					   class="form-control" 
					   placeholder="Confirm Email" 				
					   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>

            </div>
            <div class="form-group">
                <input type="text" 
				       name="pass1" 
					   class="form-control" 
					   placeholder="New Password"
					   value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>

            </div>
            <div class="form-group">
                <input type="text" 
					   name="pass2" 
					   class="form-control" 
					   placeholder="Confirm New Password"
					   value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required>

            </div>
				<div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="btnChangePassword" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
      </div><!--Close body-->
    </div><!--Close modal-body-->
  </div><!-- Close modal-fade-->
  
  <!--  =============================
=====    Modal Change Card   =======
	=================================== -->	 
<div class="modal fade" id="card" tabindex="-1" role="dialog" aria-labelledby="card" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="change-card.php" method="post">
            <div class="form-group">
                <input type="text" 
					   name="email" 
					   class="form-control" 
					   placeholder="Confirm Email" 				
					   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>

            </div>
            <div class="form-group">
                <input type="text" 
				       name="card_number" 
					   class="form-control" 
					   placeholder="New Card Number"
					   value="<?php if (isset($_POST['card_number'])) echo $_POST['card_number']; ?>" required>

            </div>
            <div class="form-group">
                <input type="text" 
					   name="exp_month" 
					   class="form-control" 
					   placeholder="New Expiry Month"
					   value="<?php if (isset($_POST['exp_month'])) echo $_POST['exp_month']; ?>" required>

            </div>
			<div class="form-group">
                <input type="text" 
					   name="exp_year" 
					   class="form-control" 
					   placeholder="New Expiry Year"
					   value="<?php if (isset($_POST['exp_year'])) echo $_POST['exp_year']; ?>" required>

            </div>
			<div class="form-group">
                <input type="text" 
					   name="cvv" 
					   class="form-control" 
					   placeholder="New CVV"
					   value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>" required>

            </div>
				<div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="btnChangePassword" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
      </div><!--Close body-->
    </div><!--Close modal-body-->
  </div><!-- Close modal-fade-->
  