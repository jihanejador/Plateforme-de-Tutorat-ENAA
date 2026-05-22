<?php
session_start();

if(!isset ($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../Enums/Statut.php';
require_once __DIR__ . '/../Entities/HelpRequest.php';
require_once __DIR__ . '/../Repositories/TicketRepository.php';

$database = new Database();
$ticketRepo = new \Repositories\TicketRepository($database->pdo);

$tickets = $ticketRepo->findAllPending();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Plateforme de Tutorat ENAA - Tableau de Bord</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <nav class="bg-indigo-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-wide">✨ PeerSync ENAA</h1>
            <span class="bg-indigo-700 px-3 py-1 rounded text-sm font-medium">Mode Démo : POO Strict</span>
        </div>
    </nav>

    <div class="container mx-auto my-8 p-4 grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 h-fit">
            <h2 class="text-xl font-bold text-gray-800 mb-4">🚨 Demander du Support</h2>
            
            <form action="actions_handler.php?action=create" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sujet du blocage</label>
                    <input type="text" name="titre" required placeholder="ex: Bloqué sur la POO..." 
                           class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description précise</label>
                    <textarea name="description" rows="3" required placeholder="Explique ton problème ici..." 
                              class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Technologie</label>
                    <select name="technologie" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        <option value="PHP">PHP</option>
                        <option value="MySQL">MySQL</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="Tailwind CSS">Tailwind CSS</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition">
                    Publier la demande
                </button>
            </form>
        </div>

        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-2xl font-bold text-gray-800">📋 Fil d'entraide instantané</h2>

            <?php if (empty($tickets)): ?>
                <div class="bg-white p-8 text-center text-gray-500 rounded-xl shadow-sm border">
                    Aucune demande d'aide en attente. Tout est fluide ! 🎉
                </div>
            <?php else: ?>
                <div class="space-y-4">
                    <?php foreach ($tickets as $ticket): ?>
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <span class="inline-block bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-1 rounded mb-2">
                                        🚀 <?= htmlspecialchars($ticket->getStatut()) ?>
                                    </span>
                                    <h3 class="text-xl font-bold text-gray-900"><?= htmlspecialchars($ticket->getTitre()) ?></h3>
                                    <p class="text-gray-600 mt-2 text-sm"><?= htmlspecialchars($ticket->getDescription()) ?></p>
                                </div>
                                <span class="bg-gray-100 text-gray-800 text-sm font-medium px-3 py-1 rounded-full">
                                    <?= htmlspecialchars($ticket->getTechnologie()) ?>
                                </span>
                            </div>

                            <div class="mt-6 pt-4 border-t border-gray-100 flex flex-wrap gap-4 justify-between items-center">
                                <a href="actions_handler.php?action=assign&ticket_id=<?= $ticket->getId() ?>" 
                                   class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                                    🤝 Aider cet apprenant
                                </a>

                                <form action="actions_handler.php?action=resolve" method="POST" class="bg-gray-50 p-3 rounded-lg flex items-center gap-2 border">
                                    <input type="hidden" name="ticket_id" value="<?= $ticket->getId() ?>">
                                    <select name="note" required class="text-sm border rounded p-1">
                                        <option value="5">⭐ 5/5</option>
                                        <option value="4">⭐ 4/5</option>
                                        <option value="3">⭐ 3/5</option>
                                        <option value="2">⭐ 2/5</option>
                                        <option value="1">⭐ 1/5</option>
                                    </select>
                                    <input type="text" name="commentaire" required placeholder="Merci ! (Avis)" class="text-sm border rounded p-1 w-32">
                                    <button type="submit" class="bg-indigo-600 text-white text-xs px-3 py-1.5 rounded hover:bg-indigo-700">
                                        Résoudre
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

</body>
</html>