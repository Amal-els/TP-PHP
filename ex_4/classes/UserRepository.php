<?php
include_once 'autoloader.php';

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('users');
    }
}

$utilisateur = new UserRepository();
echo 'findAll() : <br>';
var_dump($utilisateur->findAll());
echo '<br>findById(1) : <br>';
var_dump($utilisateur->findById(1)); 
echo '<br>create user : <br>';   
$id = $utilisateur->create(['username'=>'Amel', 'email'=>"amel@gmail.com", 'role'=>"etudiant"]);
var_dump($utilisateur->findAll());
echo '<br>delete user : <br>';
echo "<br>$id";
$utilisateur->delete($id);
var_dump($utilisateur->findAll());
echo '</pre>';