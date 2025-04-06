<?php
function efficace(&$p,$plus,$moins,$atk):int{
    if (is_a($p,$plus)) {
        $p->setHp($p->getHp()-$atk);    
        $atk*=2;
    }
    elseif (is_a($p,$moins)) {
        $atk*=0.5;
        $p->setHp($p->getHp()+0.5*$atk);
    }
    return $atk;
}