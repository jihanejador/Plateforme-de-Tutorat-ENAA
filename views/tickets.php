<?php

require_once '../config/Database.php';
require_once '../Enums/Statut.php';
require_once '../Entities/HelpRequest.php';
require_once '../Repositories/TicketRepository.php';

$database = new Database();
$ticketRepo = new \Repositories\TicketRepository($database->pdo);

$ticketsEnAttente = $ticketRepo->findAllPending();