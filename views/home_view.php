
    <section id="hero" class=" container  row mx-auto py-5">
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center text-md-start  py-5">
            <h1>Bienvenue sur give me five</h1>
            <p class="py-3">N'hésitez a vous connecter ou vous créer un compte pour accéder a plus de fonctionnalité donnez votre avis sur nos film !</p>
            <div>
                <a href="index.php?ctrl=user&action=login" class="btnCustom">Se connecter</a>
                <a href="index.php?ctrl=user&action=createAccount" class="btnCustom ">S'incrire</a>
            </div>
        </div>

        <div class="col-12 col-md-6 text-center py-5 logo">
            <img src="assets/img/logo_givemefive.png" alt="icon du site">
        </div>
    </section>
    <section id="newMovie" class="container-fluid py-5 text-center">
      <h2>Les Nouveautés du mois</h2>

      <div class="splide py-5">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide hoverMovie">
             <a href="index.php?ctrl=content&action=movie&id=">
                 <img src="https://a.ltrbxd.com/resized/film-poster/1/1/9/7/4/9/9/1197499-marty-supreme-0-300-0-450-crop.jpg?v=b14a26bb43 2x" />
                 <span>Like</span>
                 <span>Note</span>
             </a>
            </li>
            <li class="splide__slide hoverMovie">
                <a href="index.php?ctrl=content&action=movie&id=">
                    <img src="https://a.ltrbxd.com/resized/film-poster/1/1/9/7/4/9/9/1197499-marty-supreme-0-300-0-450-crop.jpg?v=b14a26bb43 2x" />
                    <span>Like</span>
                    <span>Note</span>
                </a>
            </li>
            <li class="splide__slide hoverMovie">
                <a href="index.php?ctrl=content&action=movie&id=">
                    <img src="https://a.ltrbxd.com/resized/film-poster/1/1/9/7/4/9/9/1197499-marty-supreme-0-300-0-450-crop.jpg?v=b14a26bb43 2x" />
                    <span>Like</span>
                    <span>Note</span>
                </a>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <section id="addMovie" class="container text-center py-5">
        <h2>Ajoutez un film</h2>
        <p class="mx-auto py-3">Vous vous pouvez ajouter un nouveau film a condition qui soit sourcer etc etc bla bla Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, possimus cupiditate esse ducimus soluta earum?</p>
        <a href="index.php?ctrl=content&action=addMovie" class="btnCustom ">Ajoutez un film</a>
    </section>
