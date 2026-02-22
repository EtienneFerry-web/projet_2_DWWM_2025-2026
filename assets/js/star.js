const stars = document.querySelectorAll('.rating i');
const inputNote = document.querySelectorAll('#note');
const noteAverage = document.getElementById('average');
const noteForm = document.getElementById('deleteNoteForm');
let antiSpam = false
let time;

const urlParams = new URLSearchParams(window.location.search);
const movieId = urlParams.get('id');

// Fonction pour initialiser les étoiles en fonction de la valeur des inputs
function initializeStars() {
  // Récupérer la première valeur d'input disponible
  let currentValue = null;
  inputNote.forEach(input => {
    if (input.value && !currentValue) {
      currentValue = parseFloat(input.value);
    }
  });

  if (currentValue !== null && currentValue > 0) {
    // Mettre à jour l'affichage des étoiles selon la valeur
    stars.forEach(s => {
      const starValue = parseFloat(s.dataset.value);


      if (currentValue % 1 === 0.5 && starValue === Math.ceil(currentValue)) {
        s.classList.remove('bi-star', 'bi-star-fill');
        s.classList.add('bi-star-half');
      } else if (starValue <= currentValue) {
        s.classList.remove('bi-star', 'bi-star-half');
        s.classList.add('bi-star-fill');
      } else {
        s.classList.remove('bi-star-fill', 'bi-star-half');
        s.classList.add('bi-star');
      }
    });
  }
}

// Initialiser les étoiles au chargement de la page
document.addEventListener('DOMContentLoaded', initializeStars);

stars.forEach(star => {
  star.addEventListener('click', (e) => {

    clearTimeout(time);
    noteForm.classList.remove('d-none', 'd-block');
    const rect = star.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const isHalf = x < rect.width / 2;

    let value = parseFloat(star.dataset.value);
    if (isHalf) {
      value -= 0.5;
    }

    updateNote(value);

    time = setTimeout(() => {
      insertNote(value);
    }, 500);


    stars.forEach(s => {
      const dataValue = parseFloat(s.dataset.value);

      s.classList.remove('bi-star-fill', 'bi-star-half', 'bi-star');

      if (dataValue <= value) {
        s.classList.add('bi-star-fill');
      } else if (dataValue - 0.5 === value) {
        s.classList.add('bi-star-half');
      } else {
        s.classList.add('bi-star');
      }
    });
  });
});

function updateNote(value) {
  inputNote.forEach(input => {
      input.value = value;
  });
}

async function insertNote(value) {
  try {
        const response = await fetch(`index.php?ctrl=movie&action=note&id=${movieId}`, {
            method: 'POST', // methode Post
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ intNote: value })
        });
        console.log("rq envoyer");
        if (!response.ok) {
            throw new Error(`Erreur HTTP : ${response.status}`);
        }

        const data = await response.json();



        noteAverage.textContent = Number.parseFloat(data.average).toFixed(2);
        updateAvg(data.average)

      } catch (erreur) {
          console.error("Un problème est survenu lors de la récupération :", erreur.message);
      }
}

document.getElementById('shareMovie').addEventListener('click', (e) => {

  navigator.clipboard.writeText(window.location.href);
  e.target.textContent = "URL copiée !";


  setTimeout(() => {
    e.target.innerHTML = "PARTAGER &#8599;";
  }, 1500);
});

function updateAvg(value) {

    const note = parseFloat(value);
    const starsContainer = document.querySelector(" .stars");

    starsContainer.innerHTML = "";

    for (let i = 1; i <= 5; i++) {
      const star = document.createElement("i");

      if (note >= i) {
        star.className = "bi bi-star-fill";
      } else if (Math.round(note) >= i - 0.5) {
        star.className = "bi bi-star-half";
      } else {
        star.className = "bi bi-star";
      }

      starsContainer.appendChild(star);
    }

}
