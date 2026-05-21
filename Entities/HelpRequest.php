<?php
namespace Entities;

use Enums\Statut;
use Exception;

class HelpRequest {
    private ?int $id = null;
    private string $titre;
    private string $description;
    private string $technologie;
    private Statut $statut;
    private string $dateCreation;
    private int $apprenantId;
    private ?int $tuteurId = null;

    public function assignTo(User $tutor): void{
        if($tutor->getId() === $this->apprenantId){
            throw new Exception("Un tuteur ne peut pas s assigner sa propre demande d aide.");
        }
        $this->tuteurId = $tutor->getId();
        $this->statut = Statut::ASSIGNED;
    }
    public function getId(): ?int{ return $this->id; }
    public function setId(int $id): void { $this->id = $id; }

    public function getTitre(): string { return $this->titre; }
    public function setTitre(string $titre): void { $this->titre = $titre; }

    public function getDescription(): string { return $this->description; }
    public function setDescription(string $desc): void { $this->description = $desc; }

    public function getTechnologie(): string { return $this->technologie; }
    public function setTechnologie(string $tech): void { $this->technologie = $tech; }

    public function getStatut(): Statut { return $this->statut; }
    public function setStatut(Statut $statut): void { $this->statut = $statut; }

    public function getApprenantId(): int { return $this->apprenantId; }
    public function setApprenantId(int $id): void { $this->apprenantId = $id; }

    public function getTuteurId(): ?int { return $this->tuteurId; }
    public function setTuteurId(?int $id): void { $this->tuteurId = $id; }
}