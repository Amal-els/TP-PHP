<?php
class PokemonFeu extends Pokemon{
    public function __construct(string $nom = "",string $url="",int $hp=0,AttackPokemon $attackPokemon = null){
        parent::__construct($nom,$url,$hp,$attackPokemon);
    }
    public function attack(Pokemon &$p):int{
        $atk = parent::attack($p);
        $atk = efficace($p,'PokemonPlante','PokemonEau',$atk);
        return $atk;  
    }
}