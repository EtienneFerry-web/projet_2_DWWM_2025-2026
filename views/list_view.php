
<section id="listFilter" class="container text-center text-lg-start row py-5 mx-auto">
	<h1 >Liste film</h1>
	<div class="col-12 col-lg-3 p-3 ">

        <div class="accordion d-block d-lg-none" id="filtersAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFilters">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilters">
                        Filtres
                    </button>
                </h2>
                <div id="collapseFilters" class="accordion-collapse collapse" data-bs-parent="#filtersAccordion">
                    <div class="accordion-body">
                        <?php include '_partial/filtersList.php'; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-none d-lg-block">
            <h4 class="mb-3">Filtres</h4>
            <?php include '_partial/filtersList.php'; ?>
        </div>
	</div>

	<div class="col-12 col-lg-9 p-3 scrollList">
 <div class="row py-2">
            <div class="col-4 text-center my-auto">
                <a href="index.php?ctrl=content&action=movie&id="><img src="https://a.ltrbxd.com/resized/film-poster/1/1/9/7/4/9/9/1197499-marty-supreme-0-300-0-450-crop.jpg?v=b14a26bb43 2x" alt="" class="img-fluid"></a>
            </div>
            <div class="col-8 text-start">
                <a href="index.php?ctrl=content&action=movie&id=" class="link"><h2>Titre du film</h2></a>
                <p>Lorem  molestiae laudantium adipisci dicta deserunt error alias consectetur dignissimos iure commodi, quasi rem recusandae cum eum. Eius magni quisquam explicabo adipisci aut.</p>
                <span class="spanMovie d-block"><i class="bi bi-heart"></i> 7231873 </span>
                <span class="col-auto ms-auto">
                    <i class="bi bi-star" data-value="1"></i>
                    <i class="bi bi-star" data-value="2"></i>
                    <i class="bi bi-star" data-value="3"></i>
                    <i class="bi bi-star" data-value="4"></i>
                    <i class="bi bi-star" data-value="5"></i>
                </span>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-4 text-center my-auto">
                <a href="index.php?ctrl=content&action=movie&id="><img src="https://a.ltrbxd.com/resized/film-poster/1/1/9/7/4/9/9/1197499-marty-supreme-0-300-0-450-crop.jpg?v=b14a26bb43 2x" alt="" class="img-fluid"></a>
            </div>
            <div class="col-8 text-start">
                <a href="index.php?ctrl=content&action=movie&id=" class="link"><h2>Titre du film</h2></a>
                <p>Lorem  molestiae laudantium adipisci dicta deserunt error alias consectetur dignissimos iure commodi, quasi rem recusandae cum eum. Eius magni quisquam explicabo adipisci aut.</p>
                <span class="spanMovie d-block"><i class="bi bi-heart"></i> 7231873 </span>
                <span class="col-auto ms-auto">
                    <i class="bi bi-star" data-value="1"></i>
                    <i class="bi bi-star" data-value="2"></i>
                    <i class="bi bi-star" data-value="3"></i>
                    <i class="bi bi-star" data-value="4"></i>
                    <i class="bi bi-star" data-value="5"></i>
                </span>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-4 text-center my-auto">
                <a href="index.php?ctrl=content&action=movie&id="><img src="https://a.ltrbxd.com/resized/film-poster/1/1/9/7/4/9/9/1197499-marty-supreme-0-300-0-450-crop.jpg?v=b14a26bb43 2x" alt="" class="img-fluid"></a>
            </div>
            <div class="col-8 text-start">
                <a href="index.php?ctrl=content&action=movie&id=" class="link"><h2>Titre du film</h2></a>
                <p>Lorem  molestiae laudantium adipisci dicta deserunt error alias consectetur dignissimos iure commodi, quasi rem recusandae cum eum. Eius magni quisquam explicabo adipisci aut.</p>
                <span class="spanMovie d-block"><i class="bi bi-heart"></i> 7231873 </span>
                <span class="col-auto ms-auto">
                    <i class="bi bi-star" data-value="1"></i>
                    <i class="bi bi-star" data-value="2"></i>
                    <i class="bi bi-star" data-value="3"></i>
                    <i class="bi bi-star" data-value="4"></i>
                    <i class="bi bi-star" data-value="5"></i>
                </span>
            </div>
	</div>
</section>