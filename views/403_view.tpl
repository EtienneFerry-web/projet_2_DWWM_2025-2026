{extends file="views/layout_view.tpl"}
{block name="title" prepend}403{/block}
{block name="description"}Erreur 403 page intropuvable{/block}

{block name="css_variation"}
    <link rel="stylesheet" href="{$smarty.env.BASE_URL}assets/css/403.css">
{/block}

{block name="content"}
<section class="container text-center py-5">
    <h1>403 - Accées Refusé</h1>
    <p>Flèche du haut pour sauter et Flèche du bas pour t'accroupir bonne chance !</p>

    <div id="game-container">
        <div id="player">403</div>
    </div>

    <div>Score: <span id="score">0</span></div>
    <div class="col-12 text-center">

        <button class="btn btn-outline-dark px-5 text-uppercase my-5" onclick="createObstacle()">Start</button>
    </div>
</section>
{/block}

{block name="js"}
    <script src="{$smarty.env.BASE_URL}assets/js/403.js"> </script>
{/block}
