<?php
namespace Entities;

use Exception; 

class Review{
    private ?int $id = null;
    private int $note;
    private ?string $commentaire = null;
    private int $helpRequestId;

    public function setNote(int $note): void {
        if ($notr < 1 || $note > 5) {
            throw new Exception("La note doit etre obligatoirement entre 1 et 5 etoiles.");
        }
        $this->note = $note;
    }
}