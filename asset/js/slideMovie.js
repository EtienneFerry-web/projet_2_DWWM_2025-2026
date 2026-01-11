
window.addEventListener('DOMContentLoaded', () => {
  new Splide('.splide', {
      type: 'slide',
      drag: 'free',
      autoWidth: true,
      gap: '0.3rem',
      arrows: false,
      pagination: false,
      focus: false,
    }).mount();
});
