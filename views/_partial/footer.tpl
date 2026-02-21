    <footer>
        <div class="container text-center py-5">
            <a href="index.php?ctrl=page&action=mention" class="p-2 nav-link {$strPage ==="mention" ? "active" : ""}">Mentions Légales</a>|
            <a href="index.php?ctrl=page&action=policy" class="p-2 nav-link {$strPage ==="policy" ? "active" : ""}">Politique de confidentialité</a>
            <div>© 2026 GIVE ME FIVE. Tous droits réservés.</div>
        </div>
    </footer>
    {if isset($smarty.session.user)}<script src="assets/js/activity.js"></script>{/if}
    <script src="assets/js/autoCompletion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {block name="js"}{/block}
</body>
</html>
