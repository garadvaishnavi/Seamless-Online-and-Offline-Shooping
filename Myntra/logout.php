<?php // line added to turn on color syntax highlight

session_start();
unset($_SESSION['name']);
unset($_SESSION['uid']);
unset($_SESSION['email']);
header('Location: index.php');
  
?>
<html>
<head>
	<title>Shop&Safe</title>
</head>
</html>