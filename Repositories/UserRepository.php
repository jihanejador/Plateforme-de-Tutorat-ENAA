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
        
        $user->setPassword($row->password ?? null); 
        
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
        
        $user->setPassword($row->password ?? null); 
        
        return $user;
    }

    public function save(\Entities\User $user): bool {
        $query = "INSERT INTO users (nom, email, role, competences_maitrisees, competences_a_travailler, password) 
                  VALUES (:nom, :email, :role, :comp_m, :comp_t, :password)";
          
        $stmt = $this->pdo->prepare($query);

        $nom = $user->getNom();
        $email = $user->getEmail();
        $role = $user->getRole();
        $comp_m = $user->getCompetencesMaitrisees();
        $comp_t = $user->getCompetencesATravailler();
        $password = $user->getPassword(); 

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':comp_m', $comp_m);
        $stmt->bindParam(':comp_t', $comp_t);
        $stmt->bindParam(':password', $password); 

        return $stmt->execute();
    }
}