<?php
// app/controllers/InscriptionController.php
require '../models/Artisan.php';

$artisan = new Artisan();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nom' => $_POST['nom'],
        'email' => $_POST['email'],
        'produit' => $_POST['produit']
    ];

    if ($artisan->inscrire($data)) {
        header("Location: /success");
    } else {
        echo "Erreur lors de l’inscription.";
    }
}
?>
<!DOCTYPE html>
<!DOCTYPE php>
<php lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inscrivez-vous à la Foire Artisanale pour exposer vos créations artisanales et rejoindre les artisans locaux soutenus par le MINAC.">
    <meta name="keywords" content="foire artisanale, inscription artisans, MINAC, artisanat local">
    <meta property="og:title" content="Inscription des Artisans - Foire Artisanale">
    <meta property="og:description" content="Rejoignez la Foire Artisanale en vous inscrivant pour présenter vos créations uniques.">
    <meta property="og:image" content="/image/2019-04-25_foumban-artisanat_9950_k.jpg">
    <title>Inscription des Artisans - Foire Artisanale MINAC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <h1 class=" flex items-center text-sm font-normal leading-tight">
                <img src="/assets/image/minac.png" alt="logo MINAC" class="w-16 h-16 mr-2 object-contain">
                Ministère des Arts <br> et de la Culture
            </h1>
            <a href="index.php" class="text-indigo-500 hover:text-indigo-600 font-semibold" aria-label="Retour à la page d'accueil">Retour à l'accueil</a>
        </div>
    </header>

    <!-- Formulaire -->
    <div class="container mx-auto p-6 max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Inscription des Artisans</h1>
        <form id="inscription-form" class="bg-white p-6 rounded-lg shadow-md" action="/submit-inscription" method="POST">
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required aria-describedby="prenom-error">
                <p id="prenom-error" class="text-red-500 text-sm mt-1 hidden">Veuillez entrer votre prénom.</p>
            </div>
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                <input type="text" id="nom" name="nom" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required aria-describedby="nom-error">
                <p id="nom-error" class="text-red-500 text-sm mt-1 hidden">Veuillez entrer votre nom.</p>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" aria-describedby="email-error">
                <p id="email-error" class="text-red-500 text-sm mt-1 hidden">Veuillez entrer un email valide.</p>
            </div>
            <div class="mb-4 relative">
                <label for="mot_de_passe" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required minlength="8" aria-describedby="mot_de_passe-error">
                <button type="button" id="toggle-password" class="absolute right-2 top-10 text-gray-500 hover:text-gray-700" aria-label="Afficher/masquer le mot de passe">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
                <p id="mot_de_passe-error" class="text-red-500 text-sm mt-1 hidden">Le mot de passe doit contenir au moins 8 caractères.</p>
            </div>
            <div class="mb-4">
                <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Téléphone (facultatif)</label>
                <input type="tel" id="telephone" name="telephone" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" pattern="[0-9]{10}" aria-describedby="telephone-error">
                <p id="telephone-error" class="text-red-500 text-sm mt-1 hidden">Veuillez entrer un numéro de téléphone valide (10 chiffres).</p>
            </div>
            <div class="mb-4">
                <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">Adresse (facultatif)</label>
                <textarea id="adresse" name="adresse" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" rows="4"></textarea>
            </div>
            <button type="submit" id="submit-btn" class="w-full bg-indigo-500 text-white p-2 rounded-lg hover:bg-indigo-600 transition duration-200 disabled:bg-gray-400 disabled:cursor-not-allowed">S'inscrire</button>
        </form>
        <p class="text-center mt-4 text-gray-600">
            Déjà inscrit ? <a href="profil.php" class="text-indigo-500 hover:text-indigo-600">Connectez-vous</a>
        </p>
    </div>

    <script>
        // Afficher/masquer le mot de passe
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('mot_de_passe');
        togglePassword.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            togglePassword.querySelector('svg').classList.toggle('hidden');
        });

        // Validation du formulaire
        const form = document.getElementById('inscription-form');
        const submitBtn = document.getElementById('submit-btn');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            let isValid = true;

            // Réinitialiser les messages d'erreur
            document.querySelectorAll('.text-red-500').forEach((el) => el.classList.add('hidden'));

            // Valider chaque champ
            if (!form.prenom.value) {
                document.getElementById('prenom-error').classList.remove('hidden');
                isValid = false;
            }
            if (!form.nom.value) {
                document.getElementById('nom-error').classList.remove('hidden');
                isValid = false;
            }
            if (!form.email.value || !form.email.value.match(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/)) {
                document.getElementById('email-error').classList.remove('hidden');
                isValid = false;
            }
            if (!form.mot_de_passe.value || form.mot_de_passe.value.length < 8) {
                document.getElementById('mot_de_passe-error').classList.remove('hidden');
                isValid = false;
            }
            if (form.telephone.value && !form.telephone.value.match(/[0-9]{10}/)) {
                document.getElementById('telephone-error').classList.remove('hidden');
                isValid = false;
            }

            if (isValid) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Envoi en cours...';
                // Simuler une soumission (remplacer par une requête API réelle)
                setTimeout(() => {
                    alert('Inscription réussie !');
                    form.reset();
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'S\'inscrire';
                }, 1000);
            }
        });
    </script>
    <!-- Footer amélioré -->
    <footer class="w-full bg-gray-200 py-6 mt-8 rounded-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- Informations -->
                <div class="text-center md:text-left">
                    <p class="text-sm">
                        <span class="gradient-text">MINAC</span> - Tous droits réservés © 2025
                    </p>
                    <p class="text-sm text-gray-600 mt-1">Ministère des Arts et de la Culture</p>
                </div>
                <!-- Liens utiles -->
                <div class="flex flex-col md:flex-row gap-4">
                    <a href="index.php" class="text-sm text-indigo-600 hover:text-indigo-800 transition">Accueil</a>
                    <a href="profil.php" class="text-sm text-indigo-600 hover:text-indigo-800 transition">À propos</a>
                    <a href="stand.php" class="text-sm text-indigo-600 hover:text-indigo-800 transition">Stands</a>
                </div>
                <!-- Réseaux sociaux -->
                <div class="flex gap-4 justify-center md:justify-end">
                    <a href="#" class="text-gray-600 hover:text-indigo-600 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.717 0-4.92 2.203-4.92 4.917 0 .386.045.762.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.732-.666 1.585-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.062c0 2.385 1.693 4.374 3.946 4.827-.413.112-.847.171-1.297.171-.317 0-.626-.03-.927-.086.627 1.956 2.444 3.379 4.6 3.419-1.68 1.319-3.809 2.105-6.102 2.105-.396 0-.788-.023-1.175-.068 2.187 1.402 4.768 2.212 7.548 2.212 9.056 0 14.01-7.496 14.01-13.986 0-.214-.005-.426-.014-.637.962-.695 1.8-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-indigo-600 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.675 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</php>