<?php

require_once '/app/config/mysql.php';

/**
 * Récupère tous les utilisateurs en BDD
 * 
 * @return array
 */

function findAllUsers(): array
{
    global $db;

    // $query="SELECT * FROM users";
    // $sql=$db->query($query);
    // return $sql->fetchAll();
    return $db
        ->query('SELECT *FROM users')
        ->fetchAll();
}

/**
 * Récupère un user en BDD en filtrant par son email
 * @param string $email Email de l'user à rechercher
 * @return bool|array
 */
function findOneUserByEmail(string $email): bool|array
{
    global $db;

    $sql = $db->prepare("SELECT * FROM users WHERE email=:email");
    $sql->execute([
        'email' => $email]);
    return $sql->fetch();
}
