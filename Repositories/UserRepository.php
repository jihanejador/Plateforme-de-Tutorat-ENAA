<?php
namespace Repositories;

use PDO;
use Entities\User;

class UserRepository {
    private PDO $pdo;


    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
}