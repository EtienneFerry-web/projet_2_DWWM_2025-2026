document.addEventListener('DOMContentLoaded', function () {
    const modalBan = document.getElementById('modalBan');
    if (modalBan) {
        modalBan.addEventListener('show.bs.modal', function (event) {

            const button = event.relatedTarget;

            const userId = button.getAttribute('data-userid');
            const pseudo = button.getAttribute('data-pseudo');

            const inputId = modalBan.querySelector('#modalIdUser');
            const spanPseudo = modalBan.querySelector('#modalPseudo');

            inputId.value = userId;
            spanPseudo.textContent = pseudo;
        });
    }
});
