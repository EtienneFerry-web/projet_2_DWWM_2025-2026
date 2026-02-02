function initStars() {
    const stars = document.querySelectorAll('.rating i');
    const inputNote = document.getElementById('note');
    let antiSpam = false;

    stars.forEach(star => {
        // Logique double-clic (0.5)
        star.addEventListener('dblclick', () => {
            if (antiSpam) return;
            antiSpam = true;
            const value = parseFloat(star.dataset.value);
            inputNote.value = value - 0.5;
            stars.forEach(s => {
                const sVal = parseFloat(s.dataset.value);
                s.classList.toggle('bi-star-fill', sVal < value);
                s.classList.toggle('bi-star-half', sVal === value);
                s.classList.toggle('bi-star', sVal > value);
            });
            antiSpam = false;
        });

        // Logique clic simple (entier)
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
}


function enableEdit(reviewId) {
    const container = document.querySelector(`#comment-container-${reviewId}`);
    const currentText = container.querySelector('.comment-text').innerText;
    const currentNote = container.querySelector('.note-display').innerText;

    // On remplace le contenu par un formulaire
    container.innerHTML = `
      <form method="post" class="">
          <div class="py-2">
              <label for="comment" class="form-label fw-bold">Donnez votre avis</label>
              <textarea
                  id="comment"
                  name="com_comment"
                  class="form-control"
                  rows="4"
                  placeholder="Votre commentaire"
              >${currentText}</textarea>
          </div>
          <div class="row align-items-center">
              <div class="col-md-8 rating user-select-none text-center text-md-start py-2">
                  <span class="spanMovie">Votre Note :
                  <!--Data value for ,5 with double click-->
                  <i class="bi bi-star" data-value="1"></i>
                  <i class="bi bi-star" data-value="2"></i>
                  <i class="bi bi-star" data-value="3"></i>
                  <i class="bi bi-star" data-value="4"></i>
                  <i class="bi bi-star" data-value="5"></i>
                  </span>
                  <!--input value for rating score-->
                  <input type="hidden" name="noteRating" id="note" value="${currentNote}" class="form-control {if isset($arrError['noteRating'])} is-invalid {/if}">

              </div>
              <div method="post" class="d-block ms-auto col-auto">
                  <button type="submit" class="btn btn-dark">Enregistrer</button>
              </div>
              <div method="post" class="d-block ms-auto col-auto">
                <button type="button" class="btn btn-dark" onclick="location.reload()">annuler</button>
              </div>
          </div>
      </form>
    `;

  initStars();
}
