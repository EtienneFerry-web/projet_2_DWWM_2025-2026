<li class="splide__slide hoverMovie">
    <a href="index.php?ctrl=movie&action=movie&id={$objMovie->getId()}">
        <img src="assets/img/movie/{$objMovie->getPhoto()}" loading="eager" alt="Couverture de film"/>

        <span class="movieNote spanMovie" data-note="{$objMovie->getRating()}">
            <span class="stars"></span>
        </span>

        <span class="movieLikes">
              <i class="bi bi-heart-fill"></i>{$objMovie->getLike()}
        </span>
    </a>
</li>
