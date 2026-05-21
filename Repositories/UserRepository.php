<?php
namespace Repositories;

use PDO;
use Entities\User;

class UserRepository {
    private PDO $pdo;


    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function findByEmail(string $email): ?User {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email'=> $email]);
    }
}