<!DOCTYPE html>
<html>
<head>
    <title>Esedékességi idő kalkulátor</title>
</head>
<body>
    <h1>Esedékességi idő kalkulátor - Manual Teszt</h1>
    <h5>Formátum: év-hónap-nap óra:perc:másodperc pl.: 2023-08-25 16:23:12</h5>
    <h5>Átfutási idő órában: pl.: 124</h5>
    <form action="manual_test.php" method="post">
    <input type="text" name="time"><br>
    <input type="text" name="runningTime">
    <input type="submit" value="Elküld">
    </form>
    <p>
    <?php
      include 'CalculateDueDate.php';
      //$startTime="2023-08-25 16:23:12";
      //$startTime="2023-08-28 14:0:0";
      if(isset($_POST['time']) and isset($_POST['runningTime'])){     
         echo ("Start: ".$_POST['time']);
         echo ("<br>");
         echo ("Esedékességi idő: ".CalculateDueDate($_POST['time'], $_POST['runningTime']));
      }	
    ?>
    </p>
</body>
</html> 
