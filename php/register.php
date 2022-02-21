<?php
session_start();
$_SESSION['connect'] = false;

echo "<script>alert(\"OOPS\")</script>";

$dataBase = new PDO('mysql:host=localhost;dbname=produits_locaux;charset=utf8', 'root', '');

if (!empty($_POST['name_society']) && !empty($_POST['email']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
    $name_society = (htmlspecialchars($_POST['name_society']));
    $email = (htmlspecialchars($_POST['email']));
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 == $password2){
        if (societyNameCheck($name_society) == 1){
            if (emailCheck($email) == 1){
                register($name_society, $email, $password1);
            }
            else{
                echo "email deja enregistré";
            }
        }
        else{
            echo "societe deja enregistré";
        }
    }
    else{
        echo "Mot de passe différents";
    }
}
else{
    echo "veuillez renseigner tous les champs";
    echo "<script>alert(\"OOPS\")</script>";
}


function societyNameCheck ($name){
    try{
        $dataBase = new PDO('mysql:host=localhost;dbname=produits_locaux;charset=utf8', 'root', '');
        $insertName = $dataBase ->prepare("SELECT society_name FROM user WHERE society_name = '" . $name . "' ");
        $insertName -> execute();
        $counter = $insertName -> rowCount();
        if ($counter == 0){
            return 1;
        }
        else{
            return 0;
        }
    }
    catch (PDOException $e){
        echo "erreur connexion bdd";
    }
}


function emailCheck ($email){
    try{
        $dataBase = new PDO('mysql:host=localhost;dbname=produits_locaux;charset=utf8', 'root', '');
        $insertemail = $dataBase ->prepare("SELECT email FROM user WHERE email = '" . $email . "' ");
        $insertemail -> execute();
        $counter = $insertemail -> rowCount();
        if ($counter == 0){
            return 1;
        }
        else{
            return 0;
        }
    }
    catch (PDOException $e){
        echo "erreur connexion bdd";
    }
}


function register ($name_society, $email, $password){
    try{
        $dataBase = new PDO('mysql:host=localhost;dbname=produits_locaux;charset=utf8', 'root', '');
        $insertUSer = $dataBase -> prepare('INSERT INTO user(name_society, password, email) VALUES(:name_society,:password,:email)');
        if($insertUSer -> execute(array('name_society' => $name_society, 'password' => $password, 'email' => $email))){
            $_SESSION['connect'] = true;
            $_SESSION['user'] = $name_society;
            echo "<script>alert(\"Inscription réussie\")</script>";
            header('Location: ../index.php');
        }
    }
    catch (PDOException $e){
        echo "<script>alert(\"Erreur inscription\")</script>";
    }
}


?>