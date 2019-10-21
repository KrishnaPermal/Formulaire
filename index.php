<!---->

<?php

/**
* Affiche les erreurs rencontrées
* @param $key 
* @return String
*/ 
function show_error($key)
{
global $errors; //Récupère la variable $errors dans la portée globale
return !empty($errors[$key]) ? '<span class="error">' . $errors[$key] . '</span>' : '';
}

if(!empty($_POST))
{
	if(empty($_POST['nom'])) $errors['nom'] = "Le nom ne peut être vide";
	if(!preg_match('/^([a-z0-9] )*$/i', $_POST['nom'])) $errors['nom'] = "Le nom doit contenir que les lettres et les chiffres";
	if(empty($_POST['email']) OR !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = "L'email entré n'est pas valide";
	if(!empty($_POST['url']) && !filter_var($_POST['url'], FILTER_VALIDATE_URL)) $errors['url'] = "L'URL entré n'est pas valide";
	if(empty($_POST['message'])) $errors['message'] = 'Le message ne peut être vide';
}
if(empty($errors))
{
	echo 'JE VALIDE CES DONNEES AVEC SUCCESS';
}
?>
<!--TRAITEMENT PHP-->


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EXO FORMULAIRE_nouveau</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <main>

        <p>MON FORMULAIRE</p><br>

        <!--Formulaire-->
        <fieldset>
            <legend>Contact</legend>
            <form class="Contact-form" action="cible.php" method="post">

                <?php if (!empty($errors)) : ?>
                    <legend>Les erreurs ont été trouvées</legend>
                <?php endif; ?>

                <p>
                    <label for="Last name">Nom * : <input type="text" name="nom" placeholder="Nom"></label>
                    <?php echo show_error('nom') ?>
                </p>

                <p>
                    <label for="first name">Prénom * : <input type="text" name="prenom" placeholder="Prénom"></label>
                    <?php echo show_error('prenom') ?>
                </p>

                <p>
                    <label for="email">Email * : <input type="email" name="email" placeholder="Email"></label>
                    <?php echo show_error('mail') ?>
                </p>

                <p>
                    <label for="date of born">Date de Naissance : <input type="date" name="born"></label>
                </p><br>
        </fieldset>
        <!--Formulaire-->



        <!--Gestion Option-->
        <p>
            <fieldset>
                <label for="choix"> Choisissez un niveau :

                    <select name="choix[]">
                        <!--Initialisation du nom avec un tableau -->

                        <option value="1" selected="selected">Débutant</option>
                        <option value="2">Intermédiaire</option>
                        <option value="2">Confirmé</option>

                    </select></label>
            </fieldset>
        </p>
        <!--Gestion Option-->




        <!--Gestion checkbox-->
        <p>
            <fieldset>
                <label for="">Choisir vos langages favoris :</label><br><br>
                <label for='chk1'>HTML</label>
                <input type="checkbox" name="chk1" />
        </p>

        <p>
            <label for='chk2'>CSS</label>
            <input type="checkbox" name="chk2" />
        </p>

        <p>
            <label for='chk3'>JAVASCRIPT</label>
            <input type="checkbox" name="chk3" />
        </p>

        <p>
            <label for='chk4'>PHP</label>
            <input type="checkbox" name="chk4" />
        </p>


        <!--Gestion checkbox-->

        <input type="submit" name="submit" value="Valider" />
        <!--Obtenir les valeurs séléctionnées-->
        </fieldset>
        </form>




    </main>
</body>

</html>