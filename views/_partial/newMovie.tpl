<li class="splide__slide hoverMovie">
    <a href="{$smarty.env.BASE_URL}Movie/Movie&id={$objMovie->getId()}">
        <img src="assets/img/movie/{$objMovie->getPhoto()}" loading="eager" alt="Couverture de film"/>

        <span class="movieNote spanMovie" data-note="{$objMovie->getRating()}">
            <span class="stars"></span>
        </span>

        <span class="movieLikes">
              <i class="bi bi-heart-fill"></i>{$objMovie->getLike()}
        </span>
    </a>
</li>
