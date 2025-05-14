document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".validate").forEach(button => {
        button.addEventListener("click", () => {
            fetch(`/api/controllers/ArtisanController.php`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ action: "validate", id: button.dataset.id })
            }).then(response => response.json()).then(data => {
                alert("Artisan validé !");
                location.reload();
            });
        });
    });

    document.querySelectorAll(".reject").forEach(button => {
        button.addEventListener("click", () => {
            fetch(`/api/controllers/ArtisanController.php`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ action: "reject", id: button.dataset.id })
            }).then(response => response.json()).then(data => {
                alert("Inscription rejetée !");
                location.reload();
            });
        });
    });

    document.querySelectorAll(".reserve").forEach(button => {
        button.addEventListener("click", () => {
            fetch(`/api/controllers/StandController.php`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ action: "reserve", id: button.dataset.id })
            }).then(response => response.json()).then(data => {
                alert("Stand réservé !");
                location.reload();
            });
        });
    });

    document.querySelectorAll(".cancel").forEach(button => {
        button.addEventListener("click", () => {
            fetch(`/api/controllers/StandController.php`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ action: "cancel", id: button.dataset.id })
            }).then(response => response.json()).then(data => {
                alert("Réservation annulée !");
                location.reload();
            });
        });
    });
});