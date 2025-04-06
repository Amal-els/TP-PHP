<?php
class Pokemon {
    private string $name;
    private string $url;
    private int $hp;
    private AttackPokemon $attackPokemon;
    //constructeur
public function __construct(string $nom = "",string $url="",int $hp=0,AttackPokemon $attackPokemon = null)
    {
        $this->name = $nom;
        $this->url = $url;
        $this->hp = $hp;
        $this->attackPokemon = $attackPokemon;
    }
    //getters
    public function getName():string{
        return $this->name;
    }
    public function getUrl():string{
        return $this->url;
    }
    public function getHp():int{
        return $this->hp;
    }
    public function getAttackPokemon():AttackPokemon{
        return $this->getAttackPokemon;
    }
    //setters
    public function setName(string $name){
        $this->name = $name;
    }
    public function setUrl(string $url){
        $this->url = $url;
    }
    public function setHp(string $hp){
        $this->hp = $hp;
    }
    public function setAttackPokemon(AttackPokemon $attack){
        $this->attackPokemon = $attack;
    }

    public function isDead() : bool{
        return $this->hp <=0 ;
    }

    public function attack(Pokemon &$p):int{
        $atk = rand($p->attackPokemon->attackMinimal,$p->attackPokemon->attackMaximal);

        if ($p->attackPokemon->specialAttack >1) {
                $special = rand(1,100);
                if($special<=$this->attackPokemon->probabilitySpecialAttack){
                    $atk*=$p->attackPokemon->specialAttack;
                }
        }
        $p->setHp($p->getHp()-$atk);
        return $atk;
    }

    function whoAmI(){
        include_once 'autoloader.php';
        ?>
        <div class="pokemon">
            <div class = "def">
                <?= "{$this->name}"?>
                <img src="<?=$this->url?>" alt="pokemon's image">
            </div>
            <hr>
            <div>
                <p>Points: <?= $this->hp ?></p>
            </div>
            <hr>
            <div>
                <p>Min Attack Points: <?= $this->attackPokemon->attackMinimal ?></p>
            </div>
            <hr>
            <div>
                <p>Max Attack Points: <?= $this->attackPokemon->attackMaximal ?></p>
            </div>
            <hr>
            <div>
                <p>Special Attack: <?= $this->attackPokemon->specialAttack ?></p>
            </div>
            <hr>
            <div>
                <p>Probability Special Attack: <?= $this->attackPokemon->probabilitySpecialAttack ?></p>
            </div>

        </div>
        
    <?php
    }

}