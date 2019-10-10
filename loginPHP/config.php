<?php
$dns    ="mysql:dbname=teste;host=localhost";
$dbuser = "root";
$dbpass ="";

try{
	$pdo = new PDO($dns, $dbuser, $dbpass);
}catch(PDOException $e){
	echo "Erro: ".$e->getMessage();
	exit;
}
?>