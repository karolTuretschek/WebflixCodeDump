<html lang="en">
  <head>
  <style>
.nav-item:hover {
  background-color: #6d7072;
}
</style>
  <link rel="icon" href="https://pics.freeicons.io/uploads/icons/png/15914627681630335518-512.png">
  <!-- Hotjar Tracking Code for http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/login.php -->
<script src="https://kit.fontawesome.com/6a296eb938.js" crossorigin="anonymous"></script>
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
    <title>Webflix</title>
	<link href="homeStyleSheet.css" rel="stylesheet">
  </head>
  
<div class="background-colour-thing">
  <body style="background-color:#212529">
	<nav class="navbar navbar-expand-lg navbar-light" style="background-image: linear-gradient(#000000, #212529);position: sticky;top: 0; width:100%; z-index: 2;">
	
  <a class="navbar-brand" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/home.php" style="color:red;"><i class="fa-solid fa-film"><b> Webflix</b></a></i>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
	<li class="nav-item dropdown">
        <a class="navbar-brand" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;"><i class="fa-solid fa-caret-down"><b> Browse</b></a></i>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/home.php#"><b>Movies</b></a>
		<a class="dropdown-item" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/tvshows.php#"><b>TV Shows</b></a>
		<hr>
          <a class="dropdown-item" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/review.php#"><b>Movies reviews</b></a>
		  <a class="dropdown-item" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/tvshow_rev.php?tvshow_title"><b>TV shows reviews</b></a>
          <a class="dropdown-item" href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/my_reviews"><b>My reviews</b></a>
        </div>
      </li>
      <li class="nav-item">
        <a class="navbar-brand" href="userBasic.php" style="color:white;"><i class="fa-solid fa-gears"><b> User Account</b><span class="sr-only">(current)</span></a></i>
      </li>
      <li class="nav-item">
        <a class="navbar-brand"  href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/about_us.php" style="color:white;"><i class="fa-solid fa-circle-info"><b> About us</b></a></i>
      </li>
	  <li class="nav-item">
        <a class="navbar-brand"  href="http://webdev.edinburghcollege.ac.uk/~HNCSOFTSA4/PHP/coming_soon.php" style="color:white;"><i class="fa-solid fa-hourglass"><b> Coming soon</b></a></i>
      </li>	  
	  <form action="changeStatusLogout.php" method="post">
				  <script>
			function myFunction() {
			  document.getElementById("clickChange").style.color = "red";
			}
			</script>
			<p><input id="clickChange" class="btn btn-secondary btn-lg" onclick="myFunction()" type="submit" value="Log out" style="text-align: center; padding: 0 0;"></p>			
			</form>
	 
    </ul>
    
  </div>
</nav>
	
  </body>
  </div>
</html>