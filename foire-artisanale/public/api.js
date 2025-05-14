async function fetchData(url) {
    let token = localStorage.getItem('jwt');

    let response = await fetch(url, {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token
        }
    });

    return await response.json();
}

// 🔥 Exemple d'utilisation pour charger les stands
fetchData('/api/controllers/StandController.php')
    .then(data => console.log("Données des stands :", data))
    .catch(err => console.error("Erreur API :", err));