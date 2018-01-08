<?php
session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Session Handling, Posts and Gets</title>
<link rel="stylesheet" type="text/css" href="pagestyles.css" media="screen" />

</head>
<body>
	<div id="heading">
		Session Handling, Posts and Gets
	</div>
	<div class="subheading">
		<p>This program takes a username and two strings.</p>
		<p>Once entered the strings can be concatenated and checked if one string is contained inside the other on the following page</p>
	</div>
	<div class="errorMessage">
<?php
if($_SESSION['errorval'] === 1){
	echo "<p>Please fill in all values.</p>";
	$_SESSION['errorval'] = 0;
}
?>
	</div>
	<div>

		<form method = "post" action="session.php">

			<fieldset>
				<legend>Username</legend>
				<p>Username: <input type="text" name="username" /></p>
				<p>First String: <input type="text" name="stringx" /></p>
				<p>Second String: <input type="text" name="stringy" /></p>
			</fieldset>
			<input type="submit" name="submit" value="Go play with strings!"/>
		</form>
	</div>
</body>
</html>
