<?php
namespace Entities;

use Exception; 

class Review{
    private ?int $id = null;
    private int $note;
    private ?string $commentaire = null;
    private int $helpRequestId;

    public function setNote(int $note): void {
        if ($note < 1 || $note > 5) {
            throw new Exception("La note doit etre obligatoirement entre 1 et 5 etoiles.");
        }
        $this->note = $note;
    }
    public function getNote(): int { return $this->note; }
    public function getId(): ?int { return $this->id; }
    public function setId(int $id): void { $this->id = $id; }
    public function getCommentaire(): ?string { return $this->commentaire; }
    public function setCommentaire(?string $comm): void { $this->commentaire = $comm; }
    public function getHelpRequestId(): int { return $this->helpRequestId; }
    public function setHelpRequestId(int $id): void { $this->helpRequestId = $id; }
}