<?php

session_start();
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../Enums/Statut.php';
require_once __DIR__ . '/../Entities/User.php';
require_once __DIR__ . '/../Entities/HelpRequest.php';
require_once __DIR__ . '/../Entities/Review.php';
require_once __DIR__ . '/../Repositories/TicketRepository.php';
require_once __DIR__ . '/../Repositories/UserRepository.php';

$database = new Database();
$ticketRepo = new \Repositories\TicketRepository($database->pdo);
$userRepo = new \Repositories\UserRepository($database->pdo);

if(!isset($_SESSION['user_id'])){
    $_SESSION['user_id'] = 1;
}

$action = $_GET['action'] ?? '';

try{
    if($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $ticket = new \Entities\HelpRequest();
        $ticket->setTitre(string: $_POST['titre']);
        $ticket->setDescription(string: $_POST['description']);
        $ticket->setTechnologie(string: $_POST['technologie']);
        $ticket->setStatut(\Enums\Statut::PENDING);
        $ticket->setApprenantId((int)$_SESSION['user_id']);

        $ticketRepo->save($ticket);
        header('Location: dashboard.php?success=ticket_created');
        exit();
    }
}