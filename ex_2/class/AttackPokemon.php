<?php
class AttackPokemon {
    public function __construct(float $attackMinimal, float $attackMaximal, float $specialAttack, int $probabilitySpecialAttack) {
        $this->attackMinimal = $attackMinimal;
        $this->attackMaximal = $attackMaximal;
        $this->specialAttack = $specialAttack;
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }
    
    public function getAttackMaximal(){
        return $this->attackMaximal;
    }
    public function getSpecialAttack(){
        return $this->specialAttack;
    }
    public function getProbabilitySpecialAttack(){
        return $this->probabilitySpecialAttack;
    }
   

}