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
}