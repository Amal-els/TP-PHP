<?php
require_once "../class/AttackPokemon.php";
require_once "../class/PokemonEau.php";
require_once "../class/PokemonFeu.php";
require_once "../class/PokemonPlante.php";

function lastround(Pokemon $blastoise, Pokemon $charizard, int $hp1, int $hp2, int $dam1, int $dam2, int &$i) {
    echo" <table class='table table-bordered border-primary'>
<thead>
<tr>
<th scope='col'>{$blastoise->getName()} 
{$blastoise->getCard()}</th>
<th scope='col'>{$charizard->getName()}  
{$charizard->getCard()}</th>
</tr>
</thead>
<tbody>
<tr>
<th scope='row'>Points: " . ($hp1) . "</th>
<th scope='row'>Points: " . ($hp2) . "</th>
<tr>
<th scope='row'>Min attack points : {$blastoise->getAttackPokemon()->attackMinimal} </th>
<th scope='row'>Min attack points : {$charizard->getAttackPokemon()->attackMinimal}</th>
</tr>
<tr>
<th scope='row'>Max attack points : {$blastoise->getAttackPokemon()->attackMaximal}</th>
<th scope='row'>Max attack points : {$charizard->getAttackPokemon()->attackMaximal}</th>
</tr>
<tr>
<th scope='row'>Special Attack : {$blastoise->getAttackPokemon()->specialAttack}</th>
<th scope='row'>Special Attack : {$charizard->getAttackPokemon()->specialAttack}</th>
</tr>
<tr>
<th scope='row'>Prpbability Special Attack : {$blastoise->getAttackPokemon()->probabilitySpecialAttack}</th>
<th scope='row'>Probability Special Attack : {$charizard->getAttackPokemon()->probabilitySpecialAttack}</th>
</tr>
</tbody>
</table>";}

function rounds(Pokemon $blastoise, Pokemon $charizard, int $hp1, int $hp2, int $dam1, int $dam2, int &$i) {
    echo" <table class='table table-bordered border-primary'>
<thead>
<tr>
<th scope='col'>{$blastoise->getName()} 
{$blastoise->getCard()}</th>
<th scope='col'>{$charizard->getName()}  
{$charizard->getCard()}</th>
</tr>
</thead>
<tbody>
<tr>
<th scope='row'>Points: " . ($hp1) . "</th>
<th scope='row'>Points: " . ($hp2) . "</th>
<tr>
<th scope='row'>Min attack points : {$blastoise->getAttackPokemon()->attackMinimal} </th>
<th scope='row'>Min attack points : {$charizard->getAttackPokemon()->attackMinimal}</th>
</tr>
<tr>
<th scope='row'>Max attack points : {$blastoise->getAttackPokemon()->attackMaximal}</th>
<th scope='row'>Max attack points : {$charizard->getAttackPokemon()->attackMaximal}</th>
</tr>
<tr>
<th scope='row'>Special Attack : {$blastoise->getAttackPokemon()->specialAttack}</th>
<th scope='row'>Special Attack : {$charizard->getAttackPokemon()->specialAttack}</th>
</tr>
<tr>
<th scope='row'>Prpbability Special Attack : {$blastoise->getAttackPokemon()->probabilitySpecialAttack}</th>
<th scope='row'>Probability Special Attack : {$charizard->getAttackPokemon()->probabilitySpecialAttack}</th>
</tr>
</tbody>
</table>
<div class='alert alert-danger' role='alert'>

<p>round  $i </p> ";
$i++ ;
echo"
<div class='alert alert-success' role='alert'>
<table class='table-secondary w-100'>
<tr>
<td class='table-secondary'> {$dam2}</td>
<td class='table-secondary'>{$dam1}</td> 
</tr>
</table>
</div></div>" ;
}