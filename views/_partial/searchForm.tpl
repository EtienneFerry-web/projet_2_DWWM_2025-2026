
<form action="index.php?ctrl=search&action=searchPage" class="{$formClass}" role="search" method="post" id="formSearch">
         <div class="search-container">
            <input class="form-control me-2" type="search" placeholder="Rechercher..." name="search" value="{if isset($arrSearch)} {$arrSearch->getSearch()} {/if}" id="searchBar" autocomplete="off">
            <div id="suggestions" class="suggestions-list"></div>
         </div>
            <button class="btn" type="submit">
        <img src="/Projet2/assets/img/iconBtnSearch.svg" height="32" width="32">
    </button>
</form>
