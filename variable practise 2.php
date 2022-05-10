<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Practice 2!</title>
  </head>
  <body>
    <h1>Task 2</h1>
	<?php
		$zero = 0;
		$nil = 0;
		$one = 1;
		$upr = A;
		$lwr = a;
		
		$result = ($zero == $nil)? 'TRUE' : 'FALSE';
		echo "0 == 0 is $result <br>";
		$result = ($zero == $one)? 'TRUE' : 'FALSE';
		echo "0 == 1 is $result <br>";
		$result = ($upr == $lwr)? 'TRUE' : 'FALSE';
		echo "A == a is $result <br>";
		$result = ($upr != $lwr)? 'TRUE' : 'FALSE';
		echo "A != a is $result <hr>";
		
		$result = ($one>$nil)? 'TRUE':'FALSE';
		echo "1 > 0 is a $result <br>";
		$result = ($zero>=$nil)? 'TRUE':'FALSE';
		echo "0 >= 0 is a $result <br>";
		$result = ($one<=$nil)? 'TRUE':'FALSE';
		echo "1 <= 0 is a $result <br>";
		

		

	?>
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>