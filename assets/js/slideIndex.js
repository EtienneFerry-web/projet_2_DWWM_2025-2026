document.addEventListener('DOMContentLoaded', function () {
  new Splide('.splide', {
    type: 'loop',
    drag: 'free',
    focus: false,
    perPage: 6,
    gap: '2px',
    pagination: false,
    arrows: false,
    autoWidth: true,
    autoHeight: false,
    preloadPages: 3,
    clones: 8,
    lazyLoad: false,
    updateOnMove: true,
    breakpoints: {
      1024: { perPage: 4, gap: '0.5rem' },
      768:  { perPage: 2, gap: '0.5rem' },
    },
    autoScroll: { speed: 1 },
  }).mount(window.splide.Extensions);
});



document.querySelectorAll(".movieNote").forEach(movie => {
    const note = parseFloat(movie.dataset.note);
    const starsContainer = movie.querySelector(" .stars");

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
});
