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
}