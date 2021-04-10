<?php
try
{
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=wdpbl', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{
	echo $ex->getMessage();
}
?>