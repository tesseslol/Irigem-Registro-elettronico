<?php

	try{
		include '../inc/connessione.inc.php';

		$calendario = strval($_GET['calendario']);
		$sql = 'SELECT r.id,
							CONCAT_WS(" ", i.nome, i.cognome) AS insegnante,
							c.nome AS classe ,
							m.nome AS materia, 
							m.codice  , s.giorno,
							CONCAT_WS("-", s.ora, s.ora_fine) AS orario
						FROM `calendario` r 
						JOIN classe c ON r.id_classe = c.id 
						JOIN insegnante i ON r.id_insegnante = i.id 
						JOIN materia m ON r.id_materia = m.id 
						JOIN settimana s ON r.id_settimana = s.id ';

		// prende il valore calendario dal url e a seconda del valore esegue una query sql
		
		switch ($calendario) {
			case 'oggi':
				$sql .= ('WHERE r.data = CURDATE()
						GROUP BY r.data');
				break;

			case 'ora':
				$sql .= ('WHERE r.data = CURDATE()
						  AND s.ora <= CURTIME()
						  AND s.ora_fine >= CURTIME()
						GROUP BY s.ora');
				break;

			case '7g':
				$sql .= ('WHERE r.data BETWEEN ADDDATE(CURDATE(), INTERVAL -7 DAY) AND CURDATE()
						GROUP BY s.ora
						ORDER BY r.data,s.ora');
				break;

			case 'vecchie':
				$sql .= ('GROUP BY s.ora
						ORDER BY r.data,s.ora LIMIT 10000');
				break;
		}
		
		
		$risultati = $pdo -> query($sql);

		$hey = $risultati -> fetchAll();
		$valore = json_encode($hey);
		print_r($valore);

 	}catch(PDOException $e){
 		$server_error = "Errore nel Server." . $e->getMessage();
		echo $server_error;
		exit();
 	}
		
	
?>