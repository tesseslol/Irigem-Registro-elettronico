<?php
	// cambiare le credenziali qui ("mysql:host=localhost;dbname= nome_tabella","nome_mysql","password_mysql"")
	
	$pdo = new PDO("mysql:host=localhost;dbname=registro","root","");
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo -> exec("SET NAMES 'utf8'");

?>