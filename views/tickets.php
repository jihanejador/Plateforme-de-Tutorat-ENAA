<?php

require_once '../config/Database.php';
require_once '../Enums/Statut.php';
require_once '../Entities/HelpRequest.php';
require_once '../Repositories/TicketRepository.php';

$database = new Database();
$ticketRepo = new \Repositories\TicketRepository($database->pdo);

$ticketsEnAttente = $ticketRepo->findAllPending();
?>

<div class="grid grid-cols-1 gap-4">
    <?php foreach ($ticketsEnAttente as $ticket): ?>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-bold"><?= htmlspecialchars($ticket->getTitre()) ?></h2>
            <p class="text-gray-600"><?= htmlspecialchars($ticket->getDescription()) ?></p>
            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">  
                <?= htmlspecialchars($ticket->getTechnologie()) ?>
            </span>
        </div>
        <?php endforeach; ?>
</div>