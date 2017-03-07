<?php 

	$user = (!empty($_POST['user']) ? trim($_POST['user']) : "");
	$pass = (!empty($_POST['password']) ? sha1(trim($_POST['password'])) : "");

	
 	try{
 		

 		include '../inc/connessione.inc.php';
			
		$sql = ("SELECT * FROM login WHERE user= :user AND password = :password limit 1");
		$risultati = $pdo -> prepare($sql);
		$risultati -> bindValue(':user',$user);
		$risultati -> bindValue(':password',$pass);
		$risultati -> execute();
		$hey = $risultati -> fetchAll();
		
		if ($risultati -> rowCount() == 1 ) {
			session_start();
			$_SESSION["id"] = $hey[0][0];
			$_SESSION["diritti"] = $hey[0][3];
			$_SESSION["utente"] = $hey[0][1];
			switch ($hey[0][3]) {
				case 'i':
					header("location: ../insegnanti/");
					exit();
					break;
				case 's':
					header("location: ../segreteria/");
					exit();
					break;
				default:
					$html = "Credenziali omesse contattare l'amministrazione";
					include 'index.php';
					exit();
					break;
			}	
		} else {
			$html = "Credenziali erratte";
			include 'index.php';
			exit();
		}
 	}catch(PDOException $e){
 		$server_error = "Errore nel Server" . $e->getMessage();
		include 'index.php';
		exit();
 	}
 ?>
