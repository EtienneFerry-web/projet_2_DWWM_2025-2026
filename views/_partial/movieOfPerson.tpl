<div class="col-6 col-md-3 p-1 hoverMovie">
    <a href="{$smarty.env.BASE_URL}movie/moviePage&id={$objMovie->getId()}">
        <img src="{$smarty.env.BASE_URL}assets/img/movie/{$objMovie->getPhoto()}" loading="eager" alt="Couverture de film" class="img-fluid"/>

        <span class="movieNote moviePerson spanMovie" data-note="{$objMovie->getRating()}">
            <span class="stars"></span>
        </span>

        <span class="movieLikes">
              <i class="bi bi-heart-fill"></i>{$objMovie->getLike()}
        </span>
    </a>
</div>
