<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PeerSync ENAA - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center font-sans">

    <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-indigo-600">✨ Rejoindre PeerSync</h1>
            <p class="text-gray-500 mt-2">Créez votre compte apprenant ou tuteur</p>
        </div>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'email_exists'): ?>
            <div class="bg-amber-100 text-amber-700 p-3 rounded-lg text-sm mb-4 text-center font-medium">
                ⚠️ Cet email est déjà utilisé !
            </div>
        <?php endif; ?>

        <form action="actions_handler.php?action=register" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                <input type="text" name="nom" required placeholder="ex: Reda El Alami"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adresse Email</label>
                <input type="email" name="email" required placeholder="votre.nom@enaa.ma"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Votre Rôle</label>
                <select name="role" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="APPRENANT">Apprenant (Besoin d'aide)</option>
                    <option value="TUTEUR">Tuteur (Peut aider)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" name="password" required placeholder="Créez votre mot de passe"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Vos Compétences (ex: PHP, JS, MySQL)</label>
                <input type="text" name="competences" placeholder="ex: PHP, Tailwind CSS"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition shadow-sm">
                S'inscrire
            </button>
        </form>

        <p class="text-sm text-center text-gray-500 mt-4">
            Déjà inscrit ? <a href="login.php" class="text-indigo-600 font-semibold hover:underline">Se connecter</a>
        </p>
    </div>

</body>
</html>