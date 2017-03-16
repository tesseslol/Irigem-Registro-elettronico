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
$ORD_PROF = ["0","1","2","3","4","5"];
$INSEGNANTI = $CALENDARIO["insegnanti"];
$FESTIVI = $CALENDARIO["festivi"];
$RIPOSO = $FESTIVI["giorni"]["riposo"];
$RIENTRO_CLASSE = $CALENDARIO["rientro"]["classe"];
$DATE_SCUOLA = $CALENDARIO["date_scuola"]["classe"];
$ORARIO = $CALENDARIO["orario"]["lezioni"];

$NR_GIORNI_RIPOSO = count($RIPOSO);
$NR_CLASSI = count($CALENDARIO["nr_classi"]);
$NR_FESTIVI = count($FESTIVI["data"]);
$NR_PROF = count($INSEGNANTI);

// @TODO algoritmo calcolo importanza professori
for ($prof = 0; $prof < $NR_PROF; $prof++) {
  for ($classroom = 1; $classroom < $NR_CLASSI + 1; $classroom++) {
    $classe = new InsegnanteMateria($prof, $INSEGNANTI, $classroom);
    $scuola = new Scuola($DATE_SCUOLA, $classroom);
  }
}

// algoritmo che posiziona i professori
for ($prof = 0; $prof < $NR_PROF; $prof++) {
  for ($classroom = 1; $classroom < $NR_CLASSI + 1; $classroom++) {
    $classe = new InsegnanteMateria($prof, $INSEGNANTI, $classroom);
    $scuola = new Scuola($DATE_SCUOLA, $classroom);
    $rientro = new Rientro($RIENTRO_CLASSE, $classroom);
    $todayReti = new Today($scuola -> inizioReti, $rientro -> giorniReti, $FESTIVI);
    $todayMulti = new Today($scuola -> inizioMulti, $rientro -> giorniMulti, $FESTIVI);
    // ciclo per la classe reti
    while (isSameDay($todayReti, $scuola -> fineReti)) {
      if ($todayReti -> festivo === false && $todayReti -> riposo === false) {
        $reentry = isReentryDay($todayReti -> data, $rientro -> inizioReti, $rientro -> fineReti, $todayReti -> giorno());
        if ($reentry) {
          $todayHour = $rientro -> oreReti;
        } else {
          $todayHour = 5;
        }
        $currentHour = $ORARIO[0];
        // cicla per l'orario
        for ($i = 0; getDifferencesBeetweenHours($currentHour, $ORARIO[0]) == $todayHour; $i++) {
          if ($i == 3 && $i == 6) {
            continue;
          } elseif ($todayHour == $i) {
            break 1;
          }
          $currentHour = $ORARIO[$i + 1];
        }
      }
      $todayReti -> addOneDay();
    }

    // ciclo per la classe multi

  }
}

// questa classe può essere ottimizzata -> prof
class Insegnante {
  function __construct($insegnante, $insegnanti, $classe) {
    $this -> prof = $insegnanti[$insegnante];
    $this -> materia = $this -> prof["materia"];
    $this -> preferenze = $this -> materia["preferenze"] || null;
    $this -> sezione = $this -> materia["classe"][$classe] || null;
    $this -> reti = $this -> sezione["reti"] || null;
    $this -> multi = $this -> sezione["multi"] || null;
  }
}

class InsegnanteMateria extends Insegnante {
  function __construct($insegnante, $insegnanti, $classe) {
    parent::__construct($insegnante, $insegnanti, $classe);
    // materia
    $this -> codiceMateria = $this -> materia["codice"];
    $this -> nomeMateria = $this -> materia["nome"];
    // nr totali ore classe e punteggio che ha quella classe
    $this -> oreTotaliReti = $this -> reti["ore"] || 0;
    $this -> oreTotaliMulti = $this -> multi["ore"] || 0;
    $this -> punteggioReti = $this -> reti["punteggio"] || 0;
    $this -> punteggioMulti = $this -> multi["punteggio"] || 0;
    // preferenze orario
    $this -> preferenzeOre = $this -> preferenze["ore"]["classe"][$classe] || null;
    $this -> preferenzeGiorni = $this -> preferenze["giorni"] || null; // array
  }

  /**
  * Algoritmo calcolo importanza:
  * - Ore totali materia classe(ore) + disponibilità(5-8 per gg) + preferenze sul giorno(5-8 per gg)
  * Come distribuire al meglio le ore:
  * Si prenderanno in considerazione il numero totali di settimane disponibili e il numero di ore dell'anno scolastico poi si farà una media per classe
  * Dati per l'algoritmo:
  * - tot settimane
  * - tot ore
  * - inizio scuola
  * - fine scuola
  * - giorni rientro
  * - inizio rientro
  * - fine rientro
  * - materie ore
  */
  function calcoloPunteggio($tot_ore, $disp, $preferenzeGiorni) {
    return $tot_ore + $disp + $preferenzeGiorni;
  }
  /**
  *
  * @param $settings array con tutte le impostazioni
  *
  * @Example parameters
  * $reti = [
  *    "scuola" => [
  *      "oreTotali" => $scuola -> oreTotaliReti,
  *      "settimane" => $scuola -> settimaneReti,
  *      "inizioScuola"  => $scuola -> inizioScuola,
  *      "fineScuola"    => $scuola -> fineScuola
  *    ],
  *    "rientro" => [
  *      "giorni"     => $rientro -> giorni,
  *      "inizioReti" => $rientro -> inizioReti,
  *      "fineReti"   => $rientro -> fineReti,
  *    ],
  *    "classe" => [
  *      "oreTotaliA" => $classe -> oreTotaliReti,
  *      "oreTotaliB" => $classe -> oreTotaliReti
  *    ]
  * ];
  *
  * $multi = [
  *    "scuola" => [
  *      "oreTotali" => $scuola -> oreTotaliMulti,
  *      "settimane" => $scuola -> settimaneMulti,
  *      "inizioScuola"  => $scuola -> inizioScuola,
  *      "fineScuola"    => $scuola -> fineScuola
  *    ],
  *    "rientro" => [
  *      "giorni"     => $rientro -> giorni,
  *      "inizioReti" => $rientro -> inizioMulti,
  *      "fineReti"   => $rientro -> fineMulti,
  *    ],
  *    "classe" => [
  *      "oreTotaliA" => $classe -> oreTotaliMulti,
  *      "oreTotaliB" => 0
  *    ]
  * ];
  * VerificaOreSettimaneTotali($multi);
  */
  function VerificaOreSettimaneTotali($settings) {

  }
}

// classe festivi
class Festivi {
  function __construct($festivi) {
    $this -> data = $festivi["data"];
    $this -> giorniRiposo = $festivi["giorni"] || null; // array
  }
  function feste($index) {
    $this -> feste = $this -> data[$index];
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
    $this -> inizioReti = $this -> reti["inizio"];
    $this -> fineReti = $this -> reti["fine"];
    // multi
    $this -> inizioMulti = $this -> multi["inizio"];
    $this -> fineMulti = $this -> multi["fine"];
  }
}

class Today {
  function __construct ($date, $rest) {
    $this -> data = $date;
    $this -> rest = $rest;
    $this -> giorno = getWeekday($date);
    $this -> festivo = isHoliday($date);
    $this -> riposo = isDayOfRest($date, $rest);
  }

  function addOneDay ($rest) {
    $this -> data = calculateDate($this -> data, 1);
    $this -> rest = $rest;
    $this -> giorno = getWeekday($date);
    $this -> festivo = isHoliday($date);
    $this -> riposo = isDayOfRest($date, $rest);
  }
}
