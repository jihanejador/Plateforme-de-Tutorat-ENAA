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

        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if(!$row) return null;

        $user = new User();
        $user->setId((int)$row->id);
        $user->setNom($row->nom);
        $user->setEmail($row->email);
        $user->setRole($row->role);
        $user->setCompetencesMaitrisees($row->competences_maitrisees ?? '');
        $user->setCompetencesATravailler($row->competences_a_travailler ?? '');
        return $user;
    }

    
    public function findById(int $id): ?User {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id'=> $id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if(!$row) return null;

        $user = new User();
        $user->setId((int)$row->id);
        $user->setNom($row->nom);
        $user->setEmail($row->email);
        $user->setRole($row->role);
        $user->setCompetencesMaitrisees($row->competences_maitrisees ?? '');
        $user->setCompetencesATravailler($row->competences_a_travailler ?? '');
        return $user;
    }

    public function save(User $user): bool {
        $stmt = $this->pdo->prepare("INSERT INTO users (nom, email, role, competences_maitrisees, competences_a_travailler, password) 
        VALUES (:nom, :email, :role, :competences_maitrisees, :competences_a_travailler, :password)");
        
        return $stmt->execute([
            'nom' => $user->getNom(),
            'email' => $user->getEmail(),
            'role' => $user->getRole(),
            'competences_maitrisees' => $user->getCompetencesMaitrisees() ?? '',
            'competences_a_travailler' => $user->getCompetencesATravailler() ?? '',
            'password' => $user->getPassword() 
        ]);}
}