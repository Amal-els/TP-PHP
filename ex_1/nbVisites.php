<?php
include 'Session.php';
$s = new Session();
function gererVisites() {
    global $s;
    // première visite 
    $nbVisite = $s->get('nbVisite');
    if (!$nbVisite){
        $s->set('nbVisite', 1);
        echo "<h4>Bienvenu c'est votre première visite</h4>";
    } else {
    // néme visite
        $s->set('nbVisite', $s->get('nbVisite')+1);
        echo "<h4>Merci pour votre fidélité c'est votre {$s->get('nbVisite')}eme visite</h4>"; 
    }
}

function reinitialiserSession(){
    global $s;
    if (isset($_POST['reset_session'])) {
        $s->destroy();
    }
}

