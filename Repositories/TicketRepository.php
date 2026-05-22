<?php
namespace Repositories;

use PDO;
use Entities\HelpRequest;
use Entities\Review;
use Enums\Statut;

class TicketRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function save(HelpRequest $ticket): bool {
        $stmt = $this->pdo->prepare("INSERT INTO help_requests (titre, description, technologie, statut, apprenant_id)
        VALUES (:titre, :description, :technologie, :statut, :apprenant_id)");
        return $stmt->execute([
            'titre'=> $ticket->getTitre(),
            'description'=> $ticket->getDescription(),
            'technologie'=> $ticket->getTechnologie(),
            'statut'=> $ticket->getStatut(),
            'apprenant_id'=> $ticket->getApprenantId()
        ]);
    }

    public function findAllPending(): array {
        $stmt = $this->pdo->query("SELECT * FROM help_requests 
        WHERE statut = 'PENDING' 
        ORDER BY date_creation DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

        $tickets = [];
        foreach ($rows as $row){
            $ticket = new HelpRequest();
            $ticket->setId((int)$row->id);
            $ticket->setTitre($row->titre);
            $ticket->setDescription($row->description);
            $ticket->setTechnologie($row->technologie);
            $ticket->setStatut(Statut::from($row->statut));
            $ticket->setApprenantId((int)$row->apprenant_id);
            $tickets[] = $ticket;
        }
        return $tickets;
    }

    public function update(HelpRequest $ticket): bool{
        $stmt = $this->pdo->prepare("UPDATE help_requests SET statut = :statut, tuteur_id = :tuteur_id 
        WHERE id = :id");
        return $stmt->execute([
            'statut'=> $ticket->getStatut()->value,
            'tuteur_id'=> $ticket->getTuteurId(),
            'id' => $ticket->getId()
        ]);
    }

    public function saveReview(Review $review): bool{
        $stmt = $this->pdo->prepare("INSERT INTO reviews (note, commentaire, help_request_id)
        VALUES (:note, :commentaire, :help_request_id)");
        return $stmt->execute([
            'note' => $review->getNote(),
            'commentaire' => $review->getCommentaire(),
            'help_request_id' => $review->getHelpRequestId()
        ]);
    }
}