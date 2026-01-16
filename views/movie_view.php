

<section class="container row mx-auto" id="movie">
    <div class="col-12 col-md-4  py-5 text-center">
        <img src="https://a.ltrbxd.com/resized/film-poster/1/1/9/7/4/9/9/1197499-marty-supreme-0-300-0-450-crop.jpg?v=b14a26bb43 2x" alt="" class="img-fluid w-75 w-md-50">
        <div class="py-3 text-center w-75 w-md-50 mx-auto">
            <span class=" spanMovie d-block"> Date de sortie : 10/01/2026 </span>
            <span class=" spanMovie d-block">NOTE :
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star"></i>
            </span>
             <span class="spanMovie d-block"><i class="bi bi-heart"></i> 7231873 </span>
        </div>

    </div>
    <div class="col-12 col-md-8 py-3 py-md-5 text-center text-md-start">
        <h1>Titre du film !</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis eum quae, inventore, tempore aliquam eveniet commodi doloremque sunt non sed ipsa illo aperiam iure perferendis quisquam ratione esse quaerat qui, eius hic. Fugiat molestiae in ad hic vel, suscipit magnam libero obcaecati voluptate pariatur, consequatur voluptatum laudantium tenetur sint dolor!</p>
        <div class="col-12 col-md-8 py-2 row" >

           <div class="col-6 pl-5 ">
                <span class="spanMovie"> Acteurs :</span>
                <ul class="list-unstyled py-2">
                    <li>Machin</li>
                    <li>Machin</li>
                    <li>Machin</li>
                    <li>Machin</li>
                </ul>
            </div>
            <div class="col-6 pl-5">
                <span class="spanMovie"> Producteur & Réalisater :</span>
                <ul class="list-unstyled py-2">
                    <li>Machin</li>
                    <li>Machin</li>
                    <li>Machin</li>
                    <li>Machin</li>
                </ul>
            </div>
            <a href="le traileeur" target="blank" class="py-2 spanMovie d-block link"> Voir le trailer &#8599;</a>
            <a id="shareMovie" class="py-2 spanMovie d-block link">Partager &#8599;</a>
        </div>
    </div>
</section>
<section  id="imgMovie" class="container py-5">
    <div class="splide">
      <div class="splide__track">
        <ul class="splide__list">
          <li class="splide__slide">
            <img src="https://dummyimage.com/300x400/000/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/500x400/555/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/300x400/000/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/500x400/555/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
        </ul>
      </div>
    </div>
</section>
<section id="addComment" class="container text-center py-5">
    <h2>Avis</h2>
    <div class="text-start py-2">
        <form method="post" class="">
            <div class="py-2">
                <label for="comment" class="form-label fw-bold">Donnez votre avis</label>
                <textarea
                    id="comment"
                    class="form-control"
                    rows="4"
                    placeholder="Écrivez votre commentaire..."
                ></textarea>
            </div>
            <div class="row align-items-center">
                <div class="col-md-8 rating user-select-none text-center text-md-start py-2">
                    <span class="spanMovie">Votre Note :
                    <i class="bi bi-star" data-value="1"></i>
                    <i class="bi bi-star" data-value="2"></i>
                    <i class="bi bi-star" data-value="3"></i>
                    <i class="bi bi-star" data-value="4"></i>
                    <i class="bi bi-star" data-value="5"></i>
                    </span>
                    <input type="hidden" name="note" id="note" value="0">

                </div>
                <div class="col-md-4 mw-100 " >
                    <input type="submit" value="Envoyer" class="btnCustom w-100">
                </div>
            </div>
        </form>
    </div>
</section>
<section id="userComment" class="container py-5">
    <h3 class="py-3">Avis utilisateur</h3>
    <div class="allComment">
        <div class="comment my-5">
            <div class="row align-items-center">
                <span class="spanMovie col-auto"><a href="index.php?ctrl=user&action=user&id=">Nom & Prenom</a></span>

                <span class="col-auto ms-auto">
                    <i class="bi bi-star" data-value="1"></i>
                    <i class="bi bi-star" data-value="2"></i>
                    <i class="bi bi-star" data-value="3"></i>
                    <i class="bi bi-star" data-value="4"></i>
                    <i class="bi bi-star" data-value="5"></i>
                </span>
            </div>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus laudantium maxime neque repellendus molestiae fugiat quod voluptatem cupiditate fugit molestias!
            </p>
        </div>

        <div class="comment my-5">
            <div class="row align-items-center">
                <span class="spanMovie col-auto"><a href="index.php?ctrl=user&action=user&id=">Nom & Prenom</a></span>

                <span class="col-auto ms-auto">
                    <i class="bi bi-star" data-value="1"></i>
                    <i class="bi bi-star" data-value="2"></i>
                    <i class="bi bi-star" data-value="3"></i>
                    <i class="bi bi-star" data-value="4"></i>
                    <i class="bi bi-star" data-value="5"></i>
                </span>
            </div>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus laudantium maxime neque repellendus molestiae fugiat quod voluptatem cupiditate fugit molestias!
            </p>
        </div>

        <div class="comment my-5">
            <div class="row align-items-center">
                <span class="spanMovie col-auto"><a href="index.php?ctrl=user&action=user&id=">Nom & Prenom</a></span>

                <span class="col-auto ms-auto">
                    <i class="bi bi-star" data-value="1"></i>
                    <i class="bi bi-star" data-value="2"></i>
                    <i class="bi bi-star" data-value="3"></i>
                    <i class="bi bi-star" data-value="4"></i>
                    <i class="bi bi-star" data-value="5"></i>
                </span>
            </div>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus laudantium maxime neque repellendus molestiae fugiat quod voluptatem cupiditate fugit molestias!
            </p>
        </div>
    </div>
</section>