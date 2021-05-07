<?php

function build_calender($month,$year){

    $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $firstDay = mkTime(0,0,0,$month,1,$year);
    $numberDays = date('t',$firstDay);
    $dateComponents = getDate($firstDay);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $dateToday = date('Y-m-d');

    $calender = "<table class ='table table-bordered'>";
    $calender.="<center><h2>$monthName $year</h2></center>";
    $calender.="<tr>";

    foreach($daysOfWeek as $day){
        $calender.="<th class='empty'>$day</th>";
    }
    $calender.= "</tr><tr>";

    if($dayOfWeek >0){
        for($i = 0; $i<$dayOfWeek;$i++){
            $calender.="<td></td>";
        }
    }

    $currentDay = 1;

    $month = str_pad($month,2,"0",STR_PAD_LEFT);

    while($currentDay <= $numberDays){

        if($dayOfWeek == 7){
            $dayOfWeek =0;
            $calender.="</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $calender.="<td><h3>$currentDay</h3></td>";
        $currentDay++;
        $dayOfWeek++;
    }

    if($dayOfWeek != 7){
        $remainingDays = 7 - $dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calender.="<td></td>";
        }
    }

    $calender.="</tr>";
    $calender.="</table>";

    echo $calender;

    
}
?>
<html>
    <head>
    <style>

 
 



    
    


    </style>
    </head>
<body>

<?php 
$dateComponents = getDate();
$month = $dateComponents['mon'];
$year = $dateComponents['year'];
echo build_calender($month,$year); 
?>

</body>