<?php

/**
 * Verifica se la data immessa è una giornata di vacanza
 *
 * @param  date    $date Data per il confronto
 * @return boolean       Ritorna true se è un giorno di vacanza
 */
function isHoliday ($date) {
  $result = false;
  for ($i=0; $i < $NR_FESTIVI; $i++) {
    $inizio = $CALENDARIO["festivi"]["data"][$i]["inizio"];
    $fine = $CALENDARIO["festivi"]["data"][$i]["fine"];
    while (isSameDay($inizio, $fine)) {
      $inizio = date('Y-m-d', strtotime($inizio . ' +1 day'));
      if (isSameDay($inizio, $date)) {
        $result = true;
        break 2;
      }
    }
  }
  return result;
}
/**
 * Verifica se la data immessa è una giornata di riposo (esempio giorno di riposo: sabato)
 *
 * @param  date    $rest Data di riposo per il confronto
 * @param  date    $date Data per il confronto
 * @return boolean         Ritorna true se è un giorno di riposo
 */
function isDayOfRest ($rest, $date) {
  $result = false;
  for ($i = 0; i < $NR_GIORNI_RIPOSO; $i++) {
    if (getWeekdayInItaly($date) == $rest[$i]) {
      $result = true;
      break 1;
    }
  }
  return result;
}

function isReentryDay ($data, $inizio, $fine, $rientro) {
  if ($inizio <= $date && $fine >= $date) {
    if (getWeekdayInItaly($date) == $rientro) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}
/**
 * Verifica se le date immesse sono le stesse
 *
 * @param  date  $day1 Data per il confronto
 * @param  date  $day2 Data per il confronto
 * @return boolean       Ritorna vero se le due date sono uguali
 */
function isSameDay ($day1, $day2) {
  return $day1 === $day2;
}
/**
 * Verifica se la lunghezza del array è uguale al numero
 *
 * @param  array   $array  Un array
 * @param  number  $number Il numero per il confronto
 * @return boolean           Ritorna vero se il numero è uguale al numero della lunghezza dell'array
 */
function isSameNumberInArray ($array, $number) {
  return count($array) === $number;
}
/**
 * Ritorna il numero della giornata della settimana
 *
 * @param  date   $date Data da convertire
 * @return number       Ritorna il numero della settimana
 */
function getWeekday ($date) {
  return date('w', strtotime($date));
}
/**
 * Ritorna il numero della giornata della settimana in Italiano
 *
 * @param  date   $date Data da convertire
 * @param  array  $lang L'array con la settimana in Italiano
 * @return number         Ritorna il giorno della settimana in Italiano
 */
function getWeekdayInItaly ($date) {
  $WEEK = ["domenica", "lunedì", "martedì", "mercoledì", "giovedì", "venerdì", "sabato"];
  return $WEEK[date('w', strtotime($date))];
}

/**
 * [getMinDate description]
 * @param  [type] $dates [description]
 * @return [type]        [description]
 */
function getMinDate ($dates) {
  $mostRecent = 0;
  foreach($dates as $date){
    $curDate = strtotime($date);
    if ($curDate < $mostRecent) {
      $mostRecent = $curDate;
    }
  }
  return $mostRecent;
}

/**
 * [getMaxDate description]
 * @param  [type] $dates [description]
 * @return [type]        [description]
 */
function getMaxDate ($dates) {
  $mostRecent = 0;
  foreach($dates as $date){
    $curDate = strtotime($date);
    if ($curDate > $mostRecent) {
      $mostRecent = $curDate;
    }
  }
  return $mostRecent;
}

function getDateFormat ($date) {
  return date('Y-m-d', strtotime($date));
}

function calculateDate ($date, $number) {
  return date('Y-m-d', strtotime($date . "+" . $number . ' day'));
}

function getTimeFormat ($time) {
  return date('H:i', strtotime($time));
}

function calculateTime ($time, $number) {
  return date('H:i', strtotime($time . "+" . $number . ' minutes'));
}

function getWeekFormat ($time) {
  return date('W', strtotime($time));
}

function getDifferencesBeetweenDates ($date1, $date2) {
  $date1 = strtotime($date1);
  $date2 = strtotime($date2);
  if ($date1 > $date2) {
    $diff =  $date1 - $date2;
  } else {
    $diff =  $date2 - $date1;
  }
  return floor($diff / (60 * 60 * 24));
}

function getDifferencesBeetweenTimes ($date1, $date2) {
  $date1 = strtotime($date1);
  $date2 = strtotime($date2);
  if ($date1 > $date2) {
    $diff =  $date1 - $date2;
  } else {
    $diff =  $date2 - $date1;
  }
  return sprintf("%02d", floor(($diff / (60 * 60)) % 24)) . ":" . sprintf("%02d", floor(($diff / 60) % 60));
}

function getTotalWeek ($date1, $date2) {
  $result = getDifferencesBeetweenDates($date1, $date2);
  return intval($result / 7);
}
?>
