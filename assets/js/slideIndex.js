document.addEventListener('DOMContentLoaded', function () {
  new Splide('.splide', {
    type: 'loop',
    drag: 'free',
    focus: false,
    perPage: 6,
    gap: '4px',
    pagination: false,
    arrows: false,
    autoWidth: false,
    autoHeight: false,
    breakpoints: {
      1024: { perPage: 4, gap: '0.5rem' },
      768:  { perPage: 2, gap: '0.5rem' },
    },
    autoScroll: { speed: 0.3 },
  }).mount(window.splide.Extensions);
});
