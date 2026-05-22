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

    if($action === 'assign'){
        $ticketId = (int)$_GET['ticket_id'];

        $_SESSION['user_id'] = 3;
        $tuteurObj = $userRepo->findById(3);

        $ticket = new \Entities\HelpRequest();
        $ticket->setId($ticketId);
        $ticket->setApprenantId(1);
        $ticket->assignTo($tuteurObj);

        $ticketRepo->update($ticket);
        header('Location: dashboard.php?success=ticket_assigned');
        exit();
    }

    if($action === 'resolve' && $_SERVER['REQUEST_METHOD'] ==='POST'){
        $ticketId = (int)$_POST['ticket_id'];
        $note = (int)$_POST['note'];
        $commentaire = $_POST['commentaire'];

        $ticket = new \Entities\HelpRequest();
        $ticket->setId($ticketId);
        $ticket->setStatut(\Enums\Statut::RESOLVED);
        $ticket->setTuteurId(3); //lie au tuteur youssef
        $ticketRepo->update($ticket);
    }
}