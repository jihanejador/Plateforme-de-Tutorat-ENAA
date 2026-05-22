<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_nom']) && isset($_SESSION['user_role'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PeerSync ENAA - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center font-sans">

    <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-indigo-600">✨ PeerSync ENAA</h1>
            <p class="text-gray-500 mt-2">Connectez-vous pour accéder à l'entraide</p>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded-lg text-sm mb-4 text-center font-medium">
                ❌ Email ou mot de passe incorrect.
            </div>
        <?php endif; ?>

        <form action="actions_handler.php?action=login" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adresse Email</label>
                <input type="email" name="email" required placeholder="apprenant@enaa.ma"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" name="password" required placeholder="••••••••"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition shadow-sm">
                Se connecter
            </button>
        </form>

        <div class="mt-6 text-xs text-center text-gray-400 bg-gray-50 p-2.5 rounded-lg border border-dashed">
            💡 <strong>Comptes de Démo :</strong><br>
            Tuteur: tuteur@enaa.ma | Password: 123456<br>
            Apprenant: apprenant@enaa.ma | Password: 123456
        </div>
    </div>

</body>
</html>