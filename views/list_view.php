
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
    	<?php
            if(count($objContent) === 0){
               echo "<h2 class='text-center'>Aucun Résultat !</h2>";
            } else {
                foreach($objContent as $objMovie){
                    require'views/_partial/movieList.php';
                }
            }
        ?>
	</div>
</section>
