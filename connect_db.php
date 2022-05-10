<?php
$link = mysqli_connect ('localhost','HNCSOFTSA4','p8MDXCM79L','HNCSOFTSA4');
if (!$link){
		die ('Could not connect to MySQL: ' . mysqli_error());
}
echo 'Connection OK';
?>
