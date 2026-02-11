console.log('rechargement');
const searchForm = document.querySelector('#formSearch');
const searchBar = document.getElementById('searchBar');
const sugesContainer = document.getElementById('suggestions');
let historique = JSON.parse(localStorage.getItem('allSearch')) || [];
let timer;

searchForm.addEventListener('submit', function (e) {
  if (searchBar.value.trim() === '') {
    e.preventDefault();
    searchBar.classList.add('is-invalid');
  }
});


if (searchBar.value.trim() !== '') {
  saveSearch(searchBar.value)
}
searchForm.addEventListener('click', function (e) {
  e.stopPropagation(); // Ajoute bien les parenthèses !
  console.log('input');
});
// 2. Fermer si on clique n'importe où ailleurs
document.addEventListener('click', () => {
  searchBar.style.borderRadius = '24px';
  sugesContainer.style.display = 'none';
  console.log('document');
});

// 3. Gérer le focus (pour afficher l'historique)
searchBar.addEventListener('focus', () => {

    if (searchBar.value.trim() === '') {

        if (historique.length > 0) {

            affichSuggestion(historique);

        }
    } else {
      searchData()
    }
});



searchBar.addEventListener('input', () => {

  searchBar.classList.remove('is-invalid');
  console.log('test');
  clearTimeout(timer);
  if (searchBar.value.trim() !== '') {

    if (!sugesContainer.querySelector('.ellipsis-loader')) {
        sugesContainer.innerHTML = `<div class="suggestion-item ellipsis-loader">
                                      <span></span><span></span><span></span>
                                    </div>`;
                                    }
    timer = setTimeout(() => {
      searchData();
    }, 300);
  } else {
    affichSuggestion(historique);
  }
});

function affichSuggestion(content) {
  sugesContainer.innerHTML = ''
  sugesContainer.style.display = 'flex';
  searchBar.style.borderRadius = '24px 24px 0 0';
  if (content.length > 0) {
    content.forEach(index => {

      const div = document.createElement('div');
      div.classList.add('suggestion-item');
      div.id = 'divSugesstion';

      if (index['type'] === 'movie') {
        div.innerHTML = `<i class="bi bi-film fs-4"></i>    ${index['label']}`;
      } else if(index['type'] === 'person'){
        div.innerHTML = `<i class="bi-star-fill fs-4"></i>    ${index['label']}`;
      } else if(index['type'] === 'user'){
        div.innerHTML = `<i class="bi bi-person fs-4"></i>    ${index['label']}`;
      } else{
        div.innerHTML = `<i class="bi bi-clock-history fs-4"></i>    ${index['label']}`;
      }



      sugesContainer.appendChild(div);

    });
    clickContent();
  } else {
    sugesContainer.innerHTML = "<div class='suggestion-item text-center'>Aucun Resultat trouvé ! </div>";
  }

}

function clickContent() {
  const divSug = sugesContainer.querySelectorAll('#divSugesstion');
  divSug.forEach(e => {
    e.addEventListener('click', () => {
      searchBar.value = e.textContent;
      searchForm.submit();
    });
  });
}


function saveSearch(keyword) {

  console.log(historique);

  if (!historique.some(item => item.label === keyword)) {
    historique.unshift({ label: keyword });
  }

  localStorage.setItem('allSearch', JSON.stringify(historique.slice(0, 5)));

}


function searchData(){
  fetch(`index.php?ctrl=search&action=autoComplete&keywords=${encodeURIComponent(searchBar.value)}`) //encodeURIComponent Permet d'encode les espace ou caractére spécial & = %26 et php pourra le décoder et remettre &
    .then(res => res.json())
    .then(data => {
      affichSuggestion(data);
    });
}
