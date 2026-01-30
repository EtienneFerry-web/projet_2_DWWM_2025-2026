{extends file="views/layout_view.tpl"}
{block name="title" prepend}Catalogue{/block}
{block name="description"}Notre liste de film, par categorie, réalisateur ...{/block}

{block name="content"}
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
                        {include file="views/_partial/filtersList.tpl"}
                    </div>
                </div>
            </div>
        </div>

        <div class="d-none d-lg-block">
            <h4 class="mb-3">Filtres</h4>
            {include file="views/_partial/filtersList.tpl"}
        </div>
	</div>

	<div class="col-12 col-lg-9 p-3 scrollList">
            {if count($arrMovieToDisplay) === 0}
               <h2 class="text-center">Aucun Résultat !</h2>
            {else}
                {foreach from=$arrMovieToDisplay item=objMovie}
                    {include file="views/_partial/movieList.tpl"}
                {/foreach}
            {/if}
	</div>
</section>
{/block}

{block name="js"}
        <script src="/Projet2/assets/js/search.js"> </script>
{/block}