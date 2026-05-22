<?php 
namespace Entities;

class User{
    private ?int $id = null;
    private string $nom;
    private string $email;
    private string $role;
    private ?string $competencesMaitrisees = null;
    private ?string $competencesATravailler = null;
    private int $pointsAccumules = 0;
    private int $nbrSessionsValidees = 0;

    public function getId(): ?int {return $this->id;}
    public function setId(int $id): void { $this->id = $id;}

    public function getNom(): ?int { return $this->nom;}
    public function setNom(string $nom): void { $this->nom = $nom; }

    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void { $this->email = $email; }

    public function getRole(): string { return $this->role; } 
    public function setRole(string $role): void { $this->role = $role; }

    public function getCompetencesMaitrisees(): ?string { return $this->competencesMaitrisees; }
    public function setCompetencesMaitrisees(?string $comp): void { $this->competencesMaitrisees = $comp; }

    public function getCompetencesATravailler(): ?string { return $this->competencesATravailler; }
    public function setCompetencesATravailler(?string $comp): void { $this->competencesATravailler = $comp; }

    public function getPointsAccumules(): int { return $this->pointsAccumules; }
    public function setPointsAccumules(int $points): void { $this->pointsAccumules = $points; }

    public function getNbrSessionsValidees(): int { return $this->nbrSessionsValidees; }
    public function setNbrSessionsValidees(int $nbr): void { $this->nbrSessionsValidees = $nbr; }
}