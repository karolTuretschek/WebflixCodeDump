<?php

# Connect  on 'localhost' for userto database 'site_db'.
$link = mysqli_connect('localhost','HNCSOFTSA4','p8MDXCM79L','HNCSOFTSA4'); 
if (!$link) { 
# Otherwise fail gracefully and explain the error. 
	die('Could not connect to MySQL: ' . mysqli_error()); 
} 
#echo 'Connection OK';  
?> 
