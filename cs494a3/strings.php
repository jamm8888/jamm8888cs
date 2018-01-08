<?php
	session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<?php 	
	// if there is no valid session
	if((session_id() && !$_SESSION['username']) || isset($_POST['destroyBtn'])){

		// destroy the session 
		session_destroy();
		
		/*
		Meta refresh information
		http://www.pixel2life.com/forums/index.php?/topic/80-redirecting-in-php-without-using-header/
		*/
		// direct to input.php
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=input.php">'; 
	}
?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Session Handling, Posts and Gets</title>
		<link rel="stylesheet" type="text/css" href="pagestyles.css" media="screen">

	</head>
<body>
<?php

	// ensure existing values in session are not malicious
	$_SESSION['username'] = htmlspecialchars($_SESSION['username']);
	$_SESSION['stringx'] = htmlspecialchars($_SESSION['stringx']);
	$_SESSION['stringy'] = htmlspecialchars($_SESSION['stringy']);
?>
	<div id="heading">
		Session Handling, Posts and Gets
	</div>
	<div>
		<p>Welcome <span class="dynamicData"><?php echo $_SESSION['username'];?></span>, lets string your strings <span class="dynamicData"><?php echo $_SESSION['stringx']?></span> and <span class="dynamicData"><?php echo $_SESSION['stringy']?></span>!</p>
	</div>

	<div>
		<form method="GET" action="strings.php">
			<input type="hidden" name="op" value="conxy">
			<input type="submit" value="Concatenate x and y">
		</form>
		<form method="GET" action="strings.php">
			<input type="hidden" name="op" value="conyx">
			<input type="submit" value="Concatenate y and x">
		</form>
		<form method="GET" action="strings.php">
			<input type="hidden" name="op" value="substr">
			<input type="submit" value="Check for Substring">
		</form>
		<form method="POST" action="strings.php">
			<input type="submit" name="destroyBtn" value="Destroy Session">
		</form>
	</div>
	<div>
		<?php
			// if there is an operation to perform
			if($_GET['op']){
				
				// convert to special chars to avoid running malicious input
				$op = htmlspecialchars($_GET['op']); // do error checking here 
				
				// check the op code is valid
				if($op==="conxy"){
				
					// concatenate x and y
					echo "</br>" . $_SESSION['stringx'] . " concatenated with " . $_SESSION['stringy'] . " is " . $_SESSION['stringx'] . $_SESSION['stringy'];
				
				} else if($op === "conyx"){
				
					// concatenate y and x
					echo "</br>" . $_SESSION['stringy'] . " concatenated with " . $_SESSION['stringx'] . " is " . $_SESSION['stringy'] . $_SESSION['stringx'];
				
				} else if($op === "substr"){
				
					/* 
					http://stackoverflow.com/questions/4366730/how-to-check-if-a-string-contains-specific-words
					*/
					
					echo "</br>" . $_SESSION['stringx'];
					
					// check if stringx is a substring of y
					if(strpos($_SESSION['stringy'], $_SESSION['stringx']) !== false){
						echo " IS ";
					} else {
						echo " IS NOT ";
					}
					
					echo " a substring of " . $_SESSION['stringy'] . "<br>";
					
					echo $_SESSION['stringy'];
					
					// check if y is a substring of x
					if(strpos($_SESSION['stringx'], $_SESSION['stringy']) !== false){
						echo " IS ";
					} else {
						echo " IS NOT ";
					}
					
					echo " a substring of " . $_SESSION['stringx'];
					
				} else {
				
					// let user know the op code was invalid
					echo 'Incorrect op code';
				}
			} 
		?>
	</div>
</body>
</html>
	
