<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php




function agoLogic($timestamp){
    $time = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
    $now = strtotime($time->format('Y-m-d H:i:s'));
    $sec =floor($now - $timestamp);
    $min = floor($sec / 60);
    $hrs =floor($min / 60);
    $days = floor($hrs / 24);
    $month = floor($days / 30);
    $year = floor($month / 12);

    if($month > 12){
        return $year." years ago";
    }else if($days > 30){
        return $month." months ago";
    }elseif($hrs > 24){
        return $days." days ago";
    }else if($min > 60){
        return $hrs." hours ago";
    }else if($sec > 60){
        return $min." minutes ago";
    }else if($sec > 0){
        return $sec." seconds ago";
    }else{
        return $sec;
    }

}

$timestamp = strtotime("2023-04-19 15:00:00");

echo agoLogic($timestamp);


echo "<hr>";

// A simple example to create the date time object by now with time zone


?>