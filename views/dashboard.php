<?php
session_start();
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../Enums/Status.php';
require_once __DIR__ . '/../Entities/HelpRequest.php';
require_once __DIR__ . '/../Repositories/TicketRepository.php';

$database = new Databasr();
$ticketRepo = new \Repositories\TicketRepository($database->pdo);

$ticket = $ticketRepo->findAllPending();
?>
