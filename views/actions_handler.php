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