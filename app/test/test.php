<?php
/* inclusioni */
include "json.php"; // contiene la variabile-array calendario
include "core.php"; // contiene la classe CoreFunction

/**
* @DISCLAIMER::
*  Per funzionare correttamente bisogna cavare via il tempo massimo di esecuzione del codice
*
* @TODO:: ## ALGORITMO CALENDARIO ##
*    Dati importanti generici:
*      - Data inizio/fine Scuola
*      - Giorni festivi
*      - Quando si fanno 8h con quella classe?
*      - Il Weekend si và a scuola?
*
*    Dati Importanti Prof:
*      - Nome professore
*      - Materie e codice materia
*      - Ore materie per classi
*      - Punteggio materie per classe
*      - Assenze Prof
*
*    Algoritmo calcolo importanza:
*      - Ore totali materia classe(ore) + disponibilità(5-8 per gg) + preferenze sul giorno(5-8 per gg)
*    Come distribuire al meglio le ore:
*        Si prenderanno in considerazione il numero totali di settimane disponibili e il numero di ore dell'anno scolastico poi si farà una media per classe
*
*    Esp funzionamento Algoritmo Backend (passaggi):
*      1) Sql estrapolerà il json
*      2) Salvataggio json in una cartella con la dicitura ANNO/MESE/GIORNO_JSON (Implementare)
*      3) Il json verrà passato ad un algoritmo che determinerà l'importanza di una materia per quella classe
*      4) Ora l'algoritmo genererà l'orario prendendo in considerazione l'imporanza della classe -> poi il professore(ORD_PROF) -> festivi -> asssenze prof
*          ->  verifica le ore massime della giornata -> inserimento dato e incremento giorno -> ricicla
*
*    Che dati dovranno essere salvati nel database?
*      -
*
*    funzionamento Frontend:
*      - Il progetto finale prevede che la segreteria immetta dentro dei form tutte le informazioni dei professori e che le possa ricambiare
*      - Ci sarà una configurazione rapida e una super ???
*      - Lettura di un json (il meno datato) e auto-configurare delle form(per evitare di riscrivere tutto)
*
*    FAQS::
*      Sarà possibile gestire delle eccezioni riguardanti ad un range di orario (esp: il prof xx stò a casa la 1° e la 3° ora)???
*
*
*/

/* Impostazioni */
$ORD_PROF = ["0", "1", "2", "3", "4", "5"];
$INSEGNANTI = $CALENDARIO["insegnanti"];
$FESTIVI = $CALENDARIO["festivi"];
$RIPOSO = $FESTIVI["giorni"]["riposo"];
$RIENTRO_CLASSE = $CALENDARIO["rientro"]["classe"];
$ORARIO = $CALENDARIO["orari_scuola"];
$DATE_SCUOLA = $ORARIO["classe"];
$LEZIONI = $ORARIO["orario"]["lezioni"];

$NR_GIORNI_RIPOSO = count($RIPOSO);
$NR_CLASSI = $CALENDARIO["nr_classi"];
$NR_FESTIVI = count($FESTIVI["data"]);
$NR_PROF = count($INSEGNANTI);

// @TODO algoritmo calcolo importanza professori
for ($prof = 0; $prof < $NR_PROF; $prof++) {
  for ($classroom = 1; $classroom < $NR_CLASSI + 1; $classroom++) {
    $insegnante = new InsegnanteMateria($prof, $INSEGNANTI, $classroom);
    $scuola = new Scuola($DATE_SCUOLA, $classroom);
    $rientro = new Rientro($RIENTRO_CLASSE, $classroom);
    $todayReti = new Today($scuola -> inizioReti, $RIPOSO, $rientro -> inizioReti, $rientro -> fineReti, $rientro -> giorniReti, $insegnante -> assenze);
    $todayMulti = new Today($scuola -> inizioMulti, $RIPOSO, $rientro -> inizioMulti, $rientro -> fineMulti, $rientro -> giorniMulti, $insegnante -> assenze);

    // calcolo percentuale punteggio
    $punteggio_ore_totali_reti = round($insegnante -> oreTotaliReti * 100 / $scuola -> oreAnnualiReti);
    // calcolo assenze professore
    $contatoreAssenze = 0;
    while (isSameDay($todayReti -> data, $scuola -> fineReti)) {
      if ($todayReti -> festivo == false && $todayReti -> riposo == false && $todayReti -> profAssente) {
        if ($todayReti -> rientro) {
          $todayHour = $rientro -> oreReti;
        } else {
          $todayHour = 5;
        }
        $contatoreAssenze += $todayHour;
      }
      $todayReti -> addOneDay();
    }
    $punteggio_ore_assenze_reti = round($contatoreAssenze * 100 / $scuola -> oreAnnualiReti);
    $insegnante -> punteggioReti = $punteggio_ore_assenze_reti + $punteggio_ore_totali_reti % 100;
  }
}
// @TODO algoritmo riordinamento importanza professori
/*
// algoritmo che posiziona i professori
for ($prof = 0; $prof < $NR_PROF; $prof++) {
  for ($classroom = 1; $classroom < $NR_CLASSI + 1; $classroom++) {
    $insegnante = new InsegnanteMateria($prof, $INSEGNANTI, $classroom);
    $scuola = new Scuola($DATE_SCUOLA, $classroom);
    $rientro = new Rientro($RIENTRO_CLASSE, $classroom);
    $todayReti = new Today($scuola -> inizioReti, $RIPOSO, $rientro -> inizioReti, $rientro -> fineReti, $rientro -> giorniReti, $insegnante -> assenze);
    $todayMulti = new Today($scuola -> inizioMulti, $RIPOSO, $rientro -> inizioMulti, $rientro -> fineMulti, $rientro -> giorniMulti, $insegnante -> assenze);

    // ciclo per la classe reti
    while (isSameDay($todayReti -> data, $scuola -> fineReti)) {
      if ($todayReti -> festivo == false && $todayReti -> riposo == false) {
        if ($todayReti -> rientro) {
          $todayHour = $rientro -> oreReti;
        } else {
          $todayHour = 5;
        }
        $currentHour = $LEZIONI[0];
        // cicla per l'orario
        for ($i = 0; getDifferencesBeetweenHours($currentHour, $LEZIONI[0]) == $todayHour; $i++) {
          if ($i == 3 && $i == 6) {
            continue;
          } elseif ($todayHour == $i) {
            break 1;
          }
          $currentHour = $LEZIONI[$i + 1];
        }
      }
      $todayReti -> addOneDay();
    }

    // ciclo per la classe multi

  }
}
*/
// questa classe può essere ottimizzata -> prof
class Insegnante {
  function __construct($insegnante, $insegnanti, $classe) {
    $this -> prof = $insegnanti[$insegnante];
    $this -> materia = $this -> prof["materia"];
    $this -> preferenze = $this -> materia["preferenze"];
    $this -> sezione = $this -> materia["classe"][$classe];
    $this -> reti = $this -> sezione["reti"];
    $this -> multi = $this -> sezione["multi"];
    $this -> assenze = $this -> prof["assenze"]["data"];
  }
}

class InsegnanteMateria extends Insegnante {
  function __construct($insegnante, $insegnanti, $classe) {
    parent::__construct($insegnante, $insegnanti, $classe);
    // materia
    $this -> codiceMateria = $this -> materia["codice"];
    $this -> nomeMateria = $this -> materia["nome"];
    // nr totali ore classe e punteggio che ha quella classe
    $this -> oreTotaliReti = $this -> reti["ore"];
    $this -> oreTotaliMulti = $this -> multi["ore"];
    $this -> punteggioReti = $this -> reti["punteggio"];
    $this -> punteggioMulti = $this -> multi["punteggio"];
    // preferenze orario
    $this -> preferenzeOre = $this -> preferenze["ore"]["classe"][$classe];
    $this -> preferenzeGiorni = $this -> preferenze["giorni"]; // array
  }
}

// classe con tutte le variabili riferite alla Scuola
class Classe {
  function __construct($array, $classe) {
    $this -> sezione = $array[$classe];
    $this -> multi = $this -> sezione["multi"];
    $this -> reti = $this -> sezione["reti"];
  }
}

// inizio/fine rientro della scuola e nr totale ore
class Rientro extends Classe {
  function __construct($rientro, $classe) {
    parent::__construct($rientro, $classe);
    // reti
    $this -> inizioReti = $this -> reti["data"]["inizio"];
    $this -> fineReti = $this -> reti["data"]["fine"];
    $this -> giorniReti = $this -> reti["giorni"];
    $this -> oreReti = $this -> reti["ore"];
    // multi
    $this -> inizioMulti = $this -> multi["data"]["inizio"];
    $this -> fineMulti = $this -> multi["data"]["fine"];
    $this -> giorniMulti = $this -> multi["giorni"];
    $this -> oreMulti = $this -> multi["ore"];
  }
}

// inizio/fine scuola e nr° settimane totali
class Scuola extends Classe {
  function __construct($Scuola, $classe) {
    parent::__construct($Scuola, $classe);
    // reti
    $this -> oreAnnualiReti = $this -> reti["ore_annuali"];
    $this -> inizioReti = $this -> reti["inizio"];
    $this -> fineReti = $this -> reti["fine"];
    // multi
    $this -> oreAnnualiMulti = $this -> multi["ore_annuali"];
    $this -> inizioMulti = $this -> multi["inizio"];
    $this -> fineMulti = $this -> multi["fine"];
  }
}

class Today {
  function __construct ($data, $rest, $inizio_rientro, $fine_rientro, $rientro, $assenze_professore = null, $restProf = null) {
    $this -> data = $data;
    $this -> rest = $rest;
    $this -> rientr = $rientro;
    $this -> inizio_rientro = $inizio_rientro;
    $this -> fine_rientro = $fine_rientro;
    $this -> assenze_professore = $assenze_professore;
    $this -> restProf = $restProf;

    $this -> giorno = getWeekday($data);
    $this -> festivo = isHoliday($data);
    $this -> riposo = isDayOfRest($data, $rest);

    if ($assenze_professore !== null) {
      $this -> profAssente = isAbsenceDay($data, $assenze_professore);
    }
    if ($restProf !== null) {
      $this -> riposoProf = isDayOfRest($data, $restProf);
    }
    $this -> rientro = isReentryDay($data, $inizio_rientro, $fine_rientro, $rientro);
  }

  function addOneDay () {
    $this -> data = calculateDate($this -> data, 1);
    $this -> giorno = getWeekday($this -> data);
    $this -> festivo = isHoliday($this -> data);
    $this -> riposo = isDayOfRest($this -> data, $this -> rest);
    if ($this -> assenze_professore !== null) {
      $this -> profAssente = isAbsenceDay($this -> date, $this -> assenze_professore);
    }
    if ($this -> restProf !== null) {
      $this -> riposoProf = isDayOfRest($this -> data, $this -> restProf);
    }
    $this -> rientro = isReentryDay($this -> data, $this -> inizio_rientro, $this -> fine_rientro, $this -> rientr);
  }
}
