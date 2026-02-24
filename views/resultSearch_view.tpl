{extends file="views/layout_view.tpl"}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}
{block name="content"}
<section id="search" class="container row flex-lg-row-reverse py-5 mx-auto text-center text-lg-start">
    <h1>Resultat</h1>
    <p>Résultat a la recherche "{$arrSearch->getSearch()}".</p>
    <div class="py-2 col-12 col-lg-4">
        <form method="post" action="index.php?ctrl=search&action=searchPage">
            <input type="hidden" name="search" value="{$arrSearch->getSearch()}">
            <label class="form-label w-100 border-bottom border-dark">Résultat Par :</label>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="3" id="filter-actors" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-actors">Acteur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="2" id="filter-producer" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-producer">Producteur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="1" id="filter-director" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-director">Réalisateur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="4" id="filter-user" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-user">Utilisateur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="5" id="filter-movie" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-movie">Film</label>
            </div>
            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="0" id="filter-default" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-default">Par defaut</label>
            </div>
        </form>

    </div>
    <div class="py-2 col-12 col-lg-8 scrollSearch">
    
    {if empty($arrResultToDisplay) || $arrResultToDisplay === 0}
       <h2 class='text-center'>Aucun Résultat !</h2>
    {else}
        {foreach from=$arrResultToDisplay item=objContent}
            {include file="views/_partial/movieSearch.tpl"}
        {/foreach}
    {/if}
    </div>

</section>
{/block}
{block name="js"}
    <script src="/Projet2/assets/js/search.js"> </script>
{/block}