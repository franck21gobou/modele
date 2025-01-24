<!DOCTYPE html>
<html lang="fr">


<?php include $P_header; ?>

<body>
    <div id="weLoad"></div>


    <?php include $P_script; ?>
    <script>
        loader('start')
        asyncPost('./api/test/test')
            .then(rep => {
                rep.is_auth ?
                    window.location.href = _i_homePage
                    : window.location.href = _i_loginPage
            })
    </script>

</body>


</html>