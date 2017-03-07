<?php

	try{
 		include '../inc/connessione.inc.php';

		$firme = strval($_GET['firme']);
		$sql = 'SELECT r.id,
						       c.nome AS classe,
						       CONCAT_WS(" ", i.nome, i.cognome) AS insegnante,
						       m.nome AS materia,
						       m.codice AS codice,
						       r.ora,
						       r.data,
						       GROUP_CONCAT(DISTINCT IF(a.assente && a.entra_esce != "e",CONCAT(al.nome, " ", al.cognome, " [", a.id_alunno, "]"), NULL)
					                    ORDER BY al.nome DESC SEPARATOR ",<br> ") AS assenti,
					       GROUP_CONCAT(DISTINCT IF(a.entra_esce = "e", CONCAT(al.nome, " ", al.cognome, " [", a.id_alunno, "]", " -> ", a.orario),NULL)
					                    ORDER BY al.nome DESC SEPARATOR ",<br>") AS entrata,
					       GROUP_CONCAT(DISTINCT IF(a.entra_esce = "u", CONCAT(al.nome, " ", al.cognome, " [", a.id_alunno, "]", " -> ",a.orario),NULL)
					                    ORDER BY al.nome DESC SEPARATOR ",<br> ") AS uscita
						FROM `registro` r
						JOIN classe c ON r.id_classe = c.id
						JOIN insegnante i ON r.id_insegnante = i.id
						JOIN materia m ON r.id_materia = m.id
						JOIN assenti a ON a.id_registro = r.id
						JOIN alunno al ON al.id = a.id_alunno ';
						
		// prende il valore firme dal url e a seconda del valore esegue una query
		switch ($firme) {
			case 'oggi':
				$sql .= ('WHERE r.data = CURDATE()
						GROUP BY r.ora');
				break;

			case 'ora':
				$sql .= ('WHERE r.data = CURDATE()
						  AND r.ora >= ADDDATE(CURTIME(), INTERVAL -1 HOUR)
						  AND r.ora <= CURTIME()
						GROUP BY r.ora');
				break;

			case '7g':
				$sql .= 'WHERE r.data BETWEEN ADDDATE(CURDATE(), INTERVAL -7 DAY) AND CURDATE()
						GROUP BY r.ora
						ORDER BY r.data,r.ora';
				break;

			case 'vecchie':
				$sql .= ('GROUP BY r.ora
						ORDER BY r.data,r.ora LIMIT 10000');
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