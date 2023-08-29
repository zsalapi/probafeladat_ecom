<?php
/*
  $startTime : benyújtási idő pontos dátumk év-hónap-nap óra:perc:másodperc
  $runningTime : átfutási idő órában
  $dueDate : sikeres visszatérés esetén a határidő ebben adjuk át
  */

function CalculateDueDate($startTime, $runningTime) {
	
    $lostHours = 0;
    
    date_default_timezone_set('Europe/Budapest');
    
    //bemenet ellenőrzése
    if(!strtotime($startTime)){
        echo("Kezdő időpontként dátumot fogadunk csak el! pl. 2023-08-25 12:23:12  (Hétfő-Péntek 9-17 óra között)");
        return false;    
    }
    if(!is_int($runningTime)){
        echo("Csak egész számot adhatsz meg itt! (egész órák)");
        return false;
    }
    
    //kezdő időpont ellenőrzése
    if(date("l", strtotime($startTime))=="Saturday"){
        echo("Csak munkaidőben lehet a kezdő időpont a szombat nem megfelelő! (Hétfő-Péntek 9-17 óra között)");
        return false;
    }
    if(date("l", strtotime($startTime))=="Sunday"){
        echo("Csak munkaidőben lehet a kezdő időpont a vasárnap nem megfelelő! (Hétfő-Péntek 9-17 óra között)");
        return false;
    }
    if((date("H", strtotime($startTime)) > 17) and (date("i", strtotime($startTime)) > 0) and (date("s", strtotime($startTime)) > 0))
    {
        echo("A kezdő időpont munkaidőn belül lehetnek csak utánna nem! (Hétfő-Péntek 9-17 óra között)");
        return false;
    }
    if((date("H", strtotime($startTime)) < 9)) {
        echo("A kezdő időpont munkaidőn belül lehetnek csak előtte nem! (Hétfő-Péntek 9-17 óra között)");
        return false;
    }

   //péntek esetén az elveszett órák
   if(date("l", strtotime($startTime))=="Friday"){
        $lostHours = 17 - date("H", strtotime($startTime)); 
    }
    $runningTime = $runningTime - $lostHours;

    //hozzáadandó idő számításához szükségesek
    $weeks = (int)($runningTime / 40);                
    $days = (int) (($runningTime-$weeks*40) / 8);
    $hours = (int) ($runningTime-(($weeks*40) + ($days * 8)));

    //hozzáadandó idő számítása
    $totalWeekTime = ($weeks * 40) + ($weeks * 128); //munka + pihenés a többinél is  5*16+48
    $totalDaysTime = ($days * 8) + ($days * 16);
    
    $total = $totalWeekTime + $totalDaysTime + $hours + $lostHours;
    $finalDatum = strtotime("+$total hours", strtotime($startTime));
        
    //ha NEM péntek van de átnyúlik a másik napra
    if((date("l", strtotime($startTime))!=("Friday")) and ((date("H", strtotime($finalDatum)) > 17) and (date("i", strtotime($finalDatum)) > 0) and (date("s", strtotime($finalDatum) > 0))))
    {
        $total2 = 16 + $total;
        //számolnunk kell a hétvgével
        $finalDatum2 = strtotime("+$total2 hours", strtotime($startTime));
        $dueDate = date("Y-m-d H:i:s", $finalDatum2);
        return $dueDate;  
    }   
    //ha péntek van és átnyúlik jövőhét hétfőre
    if((date("l", strtotime($startTime))==("Friday")) or ((date("H", strtotime($finalDatum)) > 17) and (date("i", strtotime($finalDatum)) > 0) and (date("s", strtotime($finalDatum) > 0))))
    {
       $total2 = 64 + $total;
       //számolnunk kell a hétvgével
       $finalDatum2 = strtotime("+$total2 hours", strtotime($startTime));
       $dueDate = date("Y-m-d H:i:s", $finalDatum2);
       return $dueDate;  
    }

    $dueDate = date("Y-m-d H:i:s", $finalDatum);

    return $dueDate;	
}
?>