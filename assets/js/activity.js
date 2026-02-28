let lastUpdate = 0;
const bufferTime = 60000;

function pingServer() {
    const now = Date.now();

    if (now - lastUpdate > bufferTime) {

        fetch('http://localhost/GiveMeFive/user/userActivity')
            .then(response => response.text())
            .then(data => {
              console.log(data);
                if (data=== "logout") {
                  alert("Votre session a expiré pour inactivité. Vous allez être redirigé.");
                  window.location.href = "http://localhost/GiveMeFive/user/logout";
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
