<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Dispositifs</title>
    <link rel="stylesheet" href="administration.css">
</head>

<body>
<a href="index.php">&#x2659;</a>
    <div class="container">
        <div class="ajouter_dispositifs">
            <h2>Ajouter un dispositifs</h2>
            <form action="" method="post">
                <input type="text" name="titre" placeholder="Entrez le nom du dispositifs">
                <input type="text" name="logo" placeholder="Image/Logo">
                <input type="text" name="descriptif" placeholder="Entrez un description">
                <input type="text" name="partenaires" placeholder="Entrez le ou les logos partenaires">
                <input type="text" name="lien" placeholder="Entrez le lien externe">
                <input type="submit" value="Ajouter un dispositifs">
            </form>
            <?php
            if (isset($_POST['titre']) & isset($_POST['logo']) & isset($_POST['descriptif']) & isset($_POST['partenaires']) & isset($_POST['lien'])) {
                $bdd = new PDO('mysql:host=localhost;dbname=france_active;charset=utf8', 'admin', 'Simpl@n974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->query('SELECT * FROM dispositifs');

                $requete = 'INSERT INTO dispositifs VALUES(NULL, "' . $_POST['titre'] . '", "' . $_POST['logo'] . '", "' . $_POST['descriptif'] . '", "' . $_POST['partenaires'] . '","' . $_POST['lien'] . '")';
                $resultat = $bdd->query($requete);
               
            }

        
            
            ?>
        </div>

        <div class="modifier_dispositifs">
            <h2>Modifier un dispositifs</h2>
            <form action="" method="post">
                <input type="text" name="initial-titre" placeholder="Entrez le titre initial">
                <input type="text" name="new-titre" placeholder="Choisissez un  nouveau titre">
                <input type="text" name="new-logo" placeholder="Choisissez un  nouveau logo">
                <input type="text" name="new-descriptif" placeholder="Choisissez un  nouveau descriptif">
                <input type="text" name="new-partenaires" placeholder="Choisissez un  nouveau partenaires">
                <input type="text" name="new-lien" placeholder="Choisissez une nouvelle minature">
                <input type="submit" value="Modifier un dispositifs">
            </form>
            <?php
            if (isset($_POST['initial-titre'])) {
                $bdd = new PDO('mysql:host=localhost;dbname=france_active;charset=utf8', 'admin', 'Simpl@n974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->query('SELECT * FROM dispositifs');
                
                $requete = "UPDATE dispositifs SET titre='" . $_POST['new-titre'] . "',
        logo='" . $_POST['new-logo'] . "', descriptif='" . $_POST['new-descriptif'] . "',
        partenaires='" . $_POST['new-partenaires'] . "', lien='" . $_POST['new-lien'] . "'WHERE titre='" . $_POST['initial-titre'] . "'";
                $resultat = $bdd->query($requete);
            }
            ?>
        </div>

        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=france_active;charset=utf8', 'admin', 'Simpl@n974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $reponse = $bdd->query('SELECT * FROM dispositifs');
         while ($donnees= $reponse->fetch()) {
         echo ' <img src="' . $donnees['logo'] .'">';
         echo '' . $donnees['titre'] .'">';
         echo '' . $donnees['descriptif'] .'">';
         echo '' . $donnees['partenaires'] .'">';
         }
        ?>

        <div class="supprimer_dispositifs">
            <h2>Supprimer un dispositifs</h2>
            <form action="" method="post">
                <input type="text" name="remove-titre" placeholder="Entrez le titre du dispositifs">
                <input type="submit" value="Supprimer un dispositifs">
            </form>
            <?php
            if (isset($_POST['remove-titre'])) {
                $bdd = new PDO('mysql:host=localhost;dbname=france_active;charset=utf8', 'admin', 'Simpl@n974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->query('SELECT * FROM dispositifs');
                $requete = 'DELETE from dispositifs WHERE titre="' . $_POST['remove-titre'] . '"';
                $resultat = $bdd->query($requete);
            }
            ?>
        </div>

    </div>

</body>

</html>