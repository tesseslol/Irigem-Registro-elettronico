<?php 
	$user = (!empty($_POST['user']) ? trim($_POST['user']) : "");
	$pass = (!empty($_POST['password']) ? sha1(trim($_POST['password'])) : "");
	$diritti = (!empty($_POST['diritti']) ? trim($_POST['diritti']) : "");

 	try{
 		
 		include '../inc/connessione.inc.php';
		
		if (!empty($user) && !empty($pass)){
			
			$sql = ("INSERT INTO login (user,password,diritti) VALUES (:user,:password,:diritti)");
			$risultati = $pdo -> prepare($sql);
			$risultati -> bindValue(':user',$user);
			$risultati -> bindValue(':password',$pass);
			$risultati -> bindValue(':diritti',$diritti);
			$risultati -> execute();
			header("location: index.php");

		}else{
			header("location: index.php");
			exit();
		}
 	}catch(PDOException $e){
 		$server_error = "Errore nel Server" . $e->getMessage();
		include 'index.php';
		exit();
 	}
 ?>
