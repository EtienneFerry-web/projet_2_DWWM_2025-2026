document.querySelectorAll('.edit-comment').forEach(button => {
  button.addEventListener('click', () => {

    // On remonte jusqu’au bloc de la review
    const reviewBlock = button.closest('.comment-content');

    // Texte du commentaire
    const commentText = reviewBlock.querySelector('p').innerText;

    // Note (via data-note)
    const note = reviewBlock
      .querySelector('.pageMovieNote')
      .dataset.note;

    console.log('Commentaire :', commentText);
    console.log('Note :', note);

  });
});
