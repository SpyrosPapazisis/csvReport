<?php

$row = 1;

$recordsArray = array();
if (($handle = fopen("data.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    // We don't want to read the headers of the csv file
    if ($row == 1) {
      $row++;
      continue;
    }
    $row++;

    $timeDiff = dateDifference($data[3], $data[2]);
    if($timeDiff) {
      $recordsArray['stations'][$data[0]][] = $timeDiff;
      $recordsArray['bikes'][$data[1]][] = $timeDiff;
    }
    
  }
  fclose($handle);
}


$resultsArray = array();
foreach($recordsArray as $key => $value) {
  foreach($value as $itemsKey => $item) {
    // calculate the average time
    $resultsArray[$key][$itemsKey] = calculateAverageTime($item);
  }
}

// print the outcome
echo "<pre>";
print_r($resultsArray);
echo "</pre>";

// 
function dateDifference($start_time, $end_time)
{
  // return false if there is not departure datetime
  if(empty($start_time)) {
    return false;
  }

  $datetime1 = new DateTime($start_time);
  $datetime2 = (!empty($end_time)) ? new DateTime($end_time) : new DateTime('NOW');
  // calulating the difference in timestamps 
  $interval = $datetime1->diff($datetime2);
  // return the result in hours:minutes:seconds format
  return $interval->format('%H:%i:%s');
  
}

// calculate the difference between 2 timestamps
function calculateAverageTime($timesArray) {
  $total = 0;
  foreach($timesArray as $item) {
    $time = explode(":", strval($item));
    // skip if the timestamp is not in the right format
    if (count($time) !== 3) continue;
    // convert hours minutes to seconds
    $sum = $time[0]*60*60 + $time[1]*60 + $time[2];
    $total += $sum;
  }
  // get the absolute number of the division
  $averageInSeconds = ceil(abs($total/count($timesArray)));

  return gmdate("H:i:s", $averageInSeconds);
}

