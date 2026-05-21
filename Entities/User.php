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


}