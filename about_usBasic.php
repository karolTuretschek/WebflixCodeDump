<?php # DISPLAY COMPLETE LOGGED IN PAGE.
    # Access session.
    session_start() ;

    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_toolsBasic.php' ) ; load() ; }

    # Set page title and display header section.
    $page_title = 'About us' ;
    //include ( 'logout.html' ) ;

	include ( 'includes/navbarBasic.html' ) ;
	
	

    # Open database connection.
    require ( 'includes/connect_db.php' ) ;

?>
<div class="container">
<div class="row">
<html lang="en">
  <head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
.w3-container2{
	background-color:#212529;
	color: #212529;
	z-index: 1;
	font-size: 1;
}
</style>
  
  
  
  
	  <!-- Hotjar Tracking Code for My site -->
	<script>
		(function(h,o,t,j,a,r){
			h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			h._hjSettings={hjid:2728596,hjsv:6};
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
	
	
	
	
	<h2>Animated Collapsibles</h2>

<p>A Collapsible:</p>
<button class="collapsible">What do we do?</button>
<div class="content">
  <p><b><br>Webflix is a new online streming service localed in Edinburgh which allows its viewers to access variety of TV programmes, films and documentaries.</b></p>
</div>

<div class="w3-container2">
  <p>Separator</p>
</div>
<button class="collapsible">Is the service free?</button>
<div class="content">
  <p><b><br>Yes! Users can subscribe to Webflix for free. Those who choose to become Premium will have access to more features. Premium costs £99.99 a year.</b></p>
</div>
<div class="w3-container2">
  <p>Separator</p>
</div>
<button class="collapsible">Whan devices does Webflix support?</button>
<div class="content">
  <p><b><br>All of them! We don't want to tell you how you should watch your favourite movies. Whether it is a phone, tablet, laptop or PC out website is suitable for any device.</b></p>
</div>
<div class="w3-container2">
  <p>Separator</p>
</div>
<button class="collapsible">What can I watch on Webflix?</button>
<div class="content">
  <p><b><br>At present we provide movies, TV programmes and documentaries from all genres. In future we will expand and provide childen friendly zone. Stay tuned for that!</b></p>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>			
  </body>
</html>
<div class="container">
<div class="row">
<div class="col-md-12 d-flex justify-content-center">
</div>
<?php 

    # Display footer section.
    include ( 'includes/footer.html' ) ;

?>
</div>
</div>