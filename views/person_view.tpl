{extends file="views/layout_view.tpl"}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}
{block name="content"}
<section class="container row mx-auto" id="actor">
    <div class="col-12 col-md-3 py-5 text-center ">
        <img src="{$objPerson->getPhoto()}" alt="Photo de {$objPerson->getFullName()}" class="img-fluid w-75 w-50">
        <div class="py-3 text-center w-75 w-md-50 mx-auto">
            <span class="spanMovie d-block py-1">{$objPerson->getCountry()}</span>
            <span class="spanMovie d-block py-1">{$objPerson->getBirthdateFormat()}</span>

            {* On n'affiche la date de décès que si elle existe *}
            {if $objPerson->getDeathDate()}
                <span class="spanMovie d-block py-1">{$objPerson->getDeathDateFormat()}</span>
            {else}
                <span class="spanMovie d-block py-1">{$objPerson->getAge()}</span>
            {/if}

            <p>{$objPerson->getBio()}</p>
        </div>
    </div>

    <div class="col-12 col-md-9 py-1 py-md-5 text-center text-md-start ">
        <h1 class="d-md">{$objPerson->getFullName()}</h1>
        <form method="post" class="row filterActor align-items-center">
            <div class="col-5 col-md-4 ">
                <select class="form-select" name="order">
                    <option value="">Date</option>
                    <option value="ASC" {if $order === "ASC"}selected{/if}>Croissant</option>
                    <option value="DESC" {if $order === "DESC"}selected{/if}>Décroissant</option>
                </select>
            </div>

            <div class="col-5 col-md-4">
                <select class="form-select" name="job" >
                    <option value="">Rôle</option>
                    {foreach $arrJobToDisplay as $objJobs}
                        <option value="{$objJobs->getId()}" {if $objJobs->getId() == $job}selected{/if}>
                            {$objJobs->getNameJob()}
                        </option>
                    {/foreach}
                </select>
            </div>

            <a href="/Projet2/index.php?ctrl=person&action=person&id={$objPerson->getId()}" class="col-12 col-md-2 p-1 nav-link">
                Réinitialiser
            </a>
            <button type="submit" class="col-12 col-md-2 p-1 nav-link">
                Recherche
            </button>
        </form>

        <div class="row p-3 scrollList">
            {foreach $arrMovieToDisplay as $objMovie}
                {include file="views/_partial/movieOfPerson.tpl"}
            {/foreach}
        </div>
    </div>
</section>

{/block}
{block name="js"}
    <script src="/Projet2/assets/js/person.js"> </script>
{/block}
