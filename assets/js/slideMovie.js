
window.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.splide').forEach(slider => {
    new Splide(slider, {
      type: 'slide',
      drag: 'free',
      autoWidth: true,
      gap: '0.3rem',
      arrows: false,
      pagination: false,
      focus: false,
    }).mount();
  });
});
