<?php
class CoreFunct {
  /**
   * Verifica se la data immessa è una giornata di vacanza
   *
   * @param  date    $date Data per il confronto
   * @return boolean       Ritorna true se è un giorno di vacanza
   */
  public function isHoliday($date) {
    for ($i=0; $i < $NR_FESTIVI; $i++) {
      $inizio = $CALENDARIO["festivi"]["data"][$i]["inizio"];
      $fine = $CALENDARIO["festivi"]["data"][$i]["fine"];
      while (isSameDay($inizio, $fine)) {
        $inizio = date('Y-m-d', strtotime($inizio . ' +1 day'));
        if (isSameDay($inizio, $date)) {
          return true;
          break 2;
        }
      }
    }
  }
  /**
   * Verifica se la data immessa è una giornata di riposo
   *
   * @param  date    $rest Data di riposo per il confronto
   * @param  date    $date Data per il confronto
   * @return boolean         Ritorna true se è un giorno di riposo
   */
  public function isDayOfRest($rest, $date) {
    for ($i = 0; i < $NR_GIORNI_RIPOSO; $i++) {
      if (getWeekdayInItaly($date) == $rest[$i]) {
        return true;
        break 1;
      }
    }
  }
  /**
   * Verifica se le date immesse sono le stesse
   *
   * @param  date  $day1 Data per il confronto
   * @param  date  $day2 Data per il confronto
   * @return boolean       Ritorna vero se le due date sono uguali
   */
  public function isSameDay($day1, $day2) {
    return $day1 === $day2;
  }
  /**
   * Verifica se la lunghezza del array è uguale al numero
   *
   * @param  array   $array  Un array
   * @param  number  $number Il numero per il confronto
   * @return boolean           Ritorna vero se il numero è uguale al numero della lunghezza dell'array
   */
  public function isSameNumberInArray($array, $number) {
    return count($array) === $number;
  }
  /**
   * Ritorna il numero della giornata della settimana
   *
   * @param  date   $date Data da convertire
   * @return number       Ritorna il numero della settimana
   */
  public function getWeekday($date) {
    return date('w', strtotime($date));
  }
  /**
   * Ritorna il numero della giornata della settimana in Italiano
   *
   * @param  date   $date Data da convertire
   * @param  array  $lang L'array con la settimana in Italiano
   * @return number         Ritorna il giorno della settimana in Italiano
   */
  public function getWeekdayInItaly($date, $lang) {
    return $lang[date('w', strtotime($date))];
  }
}

?>
