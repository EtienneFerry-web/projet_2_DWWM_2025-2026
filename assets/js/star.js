
const stars = document.querySelectorAll(' .rating i');
const inputNote = document.getElementById('note');
let antiSpam = false;

window.addEventListener('DOMContentLoaded', () => {
  // On convertit en nombre pour pouvoir faire des calculs
  let value = Number(inputNote.value);

  if (value === 1 || value === 2 || value === 3 || value === 4 || value === 5) {
    stars.forEach(s => {

      s.classList.remove('bi-star-half');
      s.classList.toggle('bi-star-fill', Number(s.dataset.value) <= value);
      s.classList.toggle('bi-star', Number(s.dataset.value) > value);

    });
  } else {
    stars.forEach(s => {

      s.classList.toggle('bi-star', Number(s.dataset.value) > Math.ceil(value));
      s.classList.toggle('bi-star-fill', Number(s.dataset.value) <= Math.floor(value));
      s.classList.toggle('bi-star-half', Number(s.dataset.value) === Math.ceil(value));
    });
  }
});







stars.forEach(star => {
  star.addEventListener('dblclick', () => {

    if (antiSpam) return;
    antiSpam = true;

    const value = star.dataset.value;
      inputNote.value = value - 0.5;

    stars.forEach(s => {

      s.classList.toggle('bi-star-fill', s.dataset.value < value);
      s.classList.toggle('bi-star-half', s.dataset.value === value);
      s.classList.toggle('bi-star', s.dataset.value > value);

      });
    antiSpam = false;
  });


  star.addEventListener('click', () => {

    if (antiSpam) return;
    antiSpam = true;

    const value = star.dataset.value;
    inputNote.value = value;

    stars.forEach(s => {

      s.classList.remove('bi-star-half');
      s.classList.toggle('bi-star-fill', s.dataset.value <= value);
      s.classList.toggle('bi-star', s.dataset.value > value);

    });
    antiSpam = false;
  });
});

document.getElementById('shareMovie').addEventListener('click', (e) => {

  navigator.clipboard.writeText(window.location.href);
  e.target.textContent = "URL copiée !";


  setTimeout(() => {
    e.target.innerHTML = "PARTAGER &#8599;";
  }, 1500);
});
