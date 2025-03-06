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
 * Récupère un user en BDD en filtrant par son id
 * @param int $id ID de l'user à rechercher
 * @return bool|array
 */
function findOneUserById(int $id): bool|array
{
    global $db;

    $query = "SELECT * FROM users WHERE id= :id";

    $sql = $db->prepare($query);
    $sql->execute([
        'id' => $id
    ]);
    return $sql->fetch();
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
        'email' => $email
    ]);
    return $sql->fetch();
}

/**
 * Création d'un utilisateur en BDD
 * @param string $firstName
 * @param string $lastName
 * @param string $email
 * @param string $password
 * @return bool Retourne true si l'utilisateur a été créé sinon false
 */

function createUser(string $firstName, string $lastName, string $email, string $password): bool
{
    global $db;

    try {
        $query = "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
        $sql = $db->prepare($query);
        $sql->execute([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_ARGON2I),
        ]);
    } catch (PDOException $e) {
        return false;
    }
    return true;
}
