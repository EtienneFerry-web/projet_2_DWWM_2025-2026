let lastUpdate = 0;
const bufferTime = 10000; // 5 minutes

function pingServer() {
    const now = Date.now();

    if (now - lastUpdate > bufferTime) {
        // 1. On lance l'appel
        fetch('index.php?ctrl=user&action=userActivity')
            .then(response => response.text()) // 2. On récupère le texte du "echo"
            .then(data => {
              console.log(data);
                if (data=== "logout") {
                  alert("Votre session a expiré pour inactivité. Vous allez être redirigé.");
                  // La redirection ne s'exécute qu'APRÈS le clic sur OK
                  window.location.href = "index.php?ctrl=user&action=logout";
                } else {
                    console.log("Session prolongée");
                }
            })
            .catch(err => console.error("Erreur de connexion", err));

        lastUpdate = now;
    }
}

window.addEventListener('mousemove', pingServer);
window.addEventListener('keydown', pingServer);
