<?php 
require_once "../class/Pokemon.php";?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Battle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
    <div class="alert alert-info" role="alert">
  Les Combattants
</div>
        <div class="mt-5 p-3 bg-white shadow rounded">
            <?php
            $i =1;
                while (!$charizard->isDead() && !$blastoise->isDead()) {
            $hp1 =$blastoise->getHp();
            $hp2 =$charizard->getHp();
            $dam1=$charizard->attack($blastoise);
            $dam2=$blastoise->attack($charizard);
                    if ($blastoise->isDead()) {
                        rounds($blastoise,$charizard,$hp1,$hp2,$dam1,$dam2,$i);
                        lastround($blastoise,$charizard,$blastoise->getHp(),$charizard->getHp(),$dam1,$dam2,$i);
                        echo "<div class='col-md-5 text-center p-3' style='background-color: lightgreen; border-radius: 0;'>
    <div class='card shadow' style='background-color: lightgreen;'>
        <div style='background-color: lightgreen;'>
            <img src='{$charizard->getUrl()}' class='card-img-top' alt='{$charizard->getName()}' style='background-color: lightgreen;'>
        </div>
        <div class='card-body'>
            <h5 class='card-title'>Le vainqueur est</h5>
        </div>
    </div>
</div>

";
                        break;

                    }
                    if ($charizard->isDead()) {
                        rounds($blastoise,$charizard,$hp1,$hp2,$dam1,$dam2,$i);
                        lastround($blastoise,$charizard,$blastoise->getHp(),$charizard->getHp(),$dam1,$dam2,$i);
                        echo "<div class='col-md-5 text-center p-3' style='background-color: lightgreen; border-radius: 0;'>
    <div class='card shadow' style='background-color: lightgreen;'>
        <div style='background-color: lightgreen;'>
            <img src='{$blastoise->getUrl()}' class='card-img-top' alt='{$blastoise->getName()}' style='background-color: lightgreen;'>
        </div>
        <div class='card-body'>
            <h5 class='card-title'>Le vainqueur est</h5>
        </div>
    </div>
</div>";
                        
                        break;
                    }
                    rounds($blastoise,$charizard,$hp1,$hp2,$dam1,$dam2,$i);
                }
            ?>
        </div>
    </div>
</body>
</html>
