<script>
    const _i_Moi_Meme = {
        "nom": '<?= $moi_meme['nom'] ?>'
    }
    var globalFormData = [],
        globalFiltreData = './api/home/vide',
        globalFiltre = "./api/filtre/vide"

    const _i_homePage = "home",
        _i_loginPage = "login",
        _i_My_Cookies = {
            "connexion": `is_co_<?= $moi_meme['slug'] ?>`,
            "droits": `_cookieDroits<?= $moi_meme['slug'] ?>`,
            "user": `_cookieUser<?= $moi_meme['slug'] ?>`
        },
        _i_My_Storage = {
            "menu": `_menu<?= $moi_meme['slug'] ?>`
        },
        lienAPI = <?= $moi_meme['api']; ?>
</script>
<!-- JQUERY -->
<script src="./assets/js/jquery.min.js"></script>
<?php
$dossier = "./assets/js/indispensables";
$scandir = scandir($dossier);
foreach ($scandir as $fichier) {
    if ($fichier != '.' && $fichier != '..' && substr($fichier, mb_strlen($fichier) - 3) == ".js")
        //  echo "$dossier/$fichier <br>";
        echo '<script src="' . "$dossier/$fichier" . '?' . $is_dev . '"></script>
        ';
}

?>

<script>
    moment.locale('fr')
</script>

<?php
$dossier = "./assets/js/fonctions";
$scandir = scandir($dossier);
foreach ($scandir as $fichier) {
    $ext__ = explode(".", $fichier);
    if ($fichier != '.' && $fichier != '..' && end($ext__) == "js")
        //  echo "$dossier/$fichier <br>";
        echo '<script src="assets/js/fonctions/' . $fichier . '?' . $is_dev . '"></script>';
}
?>