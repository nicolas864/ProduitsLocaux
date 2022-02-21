<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Nicolas Roussel">
    <meta name="description" content="cho cho cho ca cogne">
    <link rel="icon" href="../images/plaine.jpg">
    <title>Inscription</title>

    <script src="../jquery.min.js"></script>
    <script src="ajax.js" type="text/javascript"></script>
</head>
<body>
    <header>
        <?php 
        include('header.php');
        ?>
    </header>

    <h1>QUI C'EST QUI S'INSCRIT ICI???</h1>
    
    <form method="POST" class="formRegisterAjax" >
        <div>
            <input class="name_society_register" type="text" name="name_society" placeholder="Nom de la societe" value="<?php
                if (isset($name_society)) {
                    echo $name_society;
                }
            ?>"/>
        </div>
        <div>
            <input class="mailIns" type="email" name="email" placeholder="Mail" value="<?php
                if (isset($email)) {
                    echo $email;
                }
            ?>" />
        </div>
        <div>
            <input class="pwIns1" type="password" name="password1" placeholder="Mot de passe"/>
        </div>
        <div>
            <input class="pwIns2" type="password" name="password2" placeholder="Confirmez le mot de passe" />
        </div>
        <div>
            <button class="submit" type="submit" name="submit">Inscrption</button>
            <button><a href="oops.php">Se connecter</a></button>
        </div>
        <?php
            if (isset($erreur)) {
                echo '<font color="red">' . $erreur . "</font>";
            }
        ?>
    </form>     

    <footer>
        <?php
        include('footer.php');
        ?>
    </footer> 
</body>
</html>

