<?php
        $szam1 = $_POST['elso'];
        $szam2 = $_POST['masodik'];
        $muvelet = $_POST['Muvelet'];
        $eredmeny = 0;
        switch ($muvelet) {
            case "+":
              $eredmeny = $szam1 + $szam2;
              break;
            case "-":
              $eredmeny = $szam1 - $szam2;
              break;
            case "*":
                $eredmeny = $szam1 * $szam2;
              break;
            case "/":
                if($szam2 == 0){
                    $eredmeny = "Nullával nem lehet osztani!";
                }
                else{
                    $eredmeny = $szam1 / $szam2;
                }
              break;
            default:
              $eredmeny;
          }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Számológép</title>
</head>
<body>
<form action="szamologep.php" method="post">
    <input type="number" name="elso" value= "<?php echo $szam1; ?>">
    <select Name="Muvelet">  
        <option <?php if($muvelet == "+") echo "selected";?>> + </option>  
        <option <?php if($muvelet == "-") echo "selected";?>> - </option>  
        <option <?php if($muvelet == "*") echo "selected";?>> * </option>  
        <option <?php if($muvelet == "/") echo "selected";?>> / </option>  
    </select>
    <input type="number" name="masodik" value= "<?php echo $szam2; ?>">
    <button id="egyenlo">=</button>
    <?php echo $eredmeny ?>
    
</form>
</body>
</html>
