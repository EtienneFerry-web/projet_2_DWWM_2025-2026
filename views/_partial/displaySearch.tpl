{if $objContent->getType() === "movie"}
    <div class="row py-2 col-12">
        <div class="col-4 text-center my-auto">
            
            <a href="{$smarty.env.BASE_URL}movie/moviePage/{$objContent->getId()}"><img src="{$smarty.env.BASE_URL}assets/img/movie/{$objContent->getPhoto()}" alt="" class="img-fluid"></a>
        </div>
        <div class="col-8 text-start">
            <a href="{$smarty.env.BASE_URL}movie/moviePage/{$objContent->getId()}" class="link"><h2>{$objContent->getNameFormat()}</h2></a>
            <p>{$objContent->getContent()}</p>
            <span class="pageMovieNote spanMovie" data-note="{$objContent->getRating()}">
                <span class="stars d-inline-block"></span>
                <span class="note d-inline-block">{$objContent->getRating()}</span>
            </span>

            <span class="movieLikes py-2 d-flex gap-1 spanMovie">
                <i class="bi bi-heart-fill"></i><span>{$objContent->getLike()}</span>
            </span>
            <span class="spanMovie text-uppercase">Film</span>
        </div>
    </div>
{elseif $objContent->getType() === "user"}
    <div class="row p-2 col-12">
        <div class="col-4 text-center my-auto">
            <a href="{$smarty.env.BASE_URL}user/userPage/{$objContent->getId()}"><img src="{$smarty.env.BASE_URL}assets/img/users/{$objContent->getPhoto()}" alt="" class="img-fluid"></a>
        </div>
        <div class="col-8 text-start">
            <a href="{$smarty.env.BASE_URL}user/userPage/{$objContent->getId()}" class="link"><h2>{$objContent->getNameFormat()}</h2></a>
            <p>{$objContent->getContent()}</p>
            <span class="spanMovie text-uppercase">Utilisateur</span>
        </div>
    </div>
{else}
    <div class="row py-2 col-12">
        <div class="col-4 text-center my-auto">
            
            <a href="{$smarty.env.BASE_URL}person/personPage/{$objContent->getId()}"><img src="{$smarty.env.BASE_URL}assets/img/person/{$objContent->getPhoto()}" alt="" class="img-fluid"></a>
        </div>
        <div class="col-8 text-start">
            <a href="{$smarty.env.BASE_URL}person/personPage/{$objContent->getId()}" class="link"><h2>{$objContent->getNameFormat()}</h2></a>
            <p>{$objContent->getContent()}</p>
            <span class="spanMovie text-uppercase">Personnalité</span>
        </div>
    </div>
{/if}