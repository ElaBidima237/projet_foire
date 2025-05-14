document.getElementById('login-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    let response = await fetch('/api/controllers/AuthController.php', {
        method: 'POST',
        body: formData
    });

    let result = await response.json();

    if (result.token) {
        localStorage.setItem('jwt', result.token); // 🔐 Stockage sécurisé du token
        window.location.href = "/dashboard-admin.php"; // Redirection après connexion
    } else {
        alert("Connexion échouée !");
    }
});
document.getElementById('inscription-form').addEventListener('submit', function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch('/views/artisan/artisan-inscription.php', {
        method: "POST",
        body: formData
    }).then(response => response.text()).then(data => {
        if (data.includes("Erreur")) {
            alert("Problème lors de l'inscription !");
        } else {
            window.location.href = "/success";
        }
    });
});