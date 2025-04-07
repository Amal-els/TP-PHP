<?php
class PokemonPlante extends Pokemon{
    public function __construct(string $nom = "",string $url="",int $hp=0,AttackPokemon $attackPokemon = null){
        parent::__construct($nom,$url,$hp,$attackPokemon);
    }
    public function attack(Pokemon &$p):int{
        $atk = parent::attack($p);
        $atk = efficace($p,'PokemonEau','PokemonFeu',$atk);
        return $atk; 
    } 
}