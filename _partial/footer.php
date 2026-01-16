    <footer>
        <div class="container text-center py-5">
            <a href="/Projet2/page/mention.php" class="p-2 nav-link <?= ($strPage ==="mention")? "active" : ""; ?>">Mentions Légales</a>|
            <a href="/Projet2/page/policy.php" class="p-2 nav-link <?= ($strPage ==="policy")? "active" : ""; ?>">Politique de confidentialité</a>
            <div>© 2026 GIVE MY FIVE. Tous droits réservés.</div>
        </div>
    </footer>
    <?php if($strPage ==="index"){ ?>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
        <script src="/Projet2/asset/js/slideIndex.js"></script>

    <?php } elseif($strPage ==="movie" || $strPage ==="actor" || $strPage ==="user"){ ?>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
        <script src="/Projet2/asset/js/slideMovie.js"></script>
        <script src="/Projet2/asset/js/star.js"> </script>
    <?php }?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
