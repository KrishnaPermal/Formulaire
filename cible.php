<?php

//echo var_dump($_POST);

//CREATION DES VARIABLES ET UTILISATION DE LA METHODE $_POST pour récupérer les valeurs du formulaire,options et checkbox//
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date = $_POST['born'];
$email = $_POST['mail'];

$choix = $_POST['choix'];

$chkbx1 = isset($_POST['chk1']);
$chkbx2 = isset($_POST['chk2']);
$chkbx3 = isset($_POST['chk3']);
$chkbx4 = isset($_POST['chk4']);

?>

<!--ICI NOUS RECUPERONS LES VALEURS DU FORMULAIRE-->
<form action="cible.php" method="post">
    <input type="text" name="nom" value="<?php echo $nom; ?>" />
    <input type="text" name="prenom" value="<?php echo $prenom; ?>" />
    <input type="date" name="date" value="<?php echo $date; ?>" />


    <!--ICI NOUS RECUPERONS LES VALEURS POUR LES OPTIONS select-->

    <select name="choix">
        <option value="choix1" <?php if ($choix === "choix1") {
                                    echo "selected";
                                } ?>>Débutant</option>

        <option value="choix2" <?php if ($choix === "choix2") {
                                    echo "selected";
                                } ?>>Intermédiaire</option>

        <option value="choix3" <?php if ($choix === "choix3") {
                                    echo "selected";
                                } ?>>Confirmé</option>
    </select>


    <!--ICI NOUS RECUPERONS LES VALEURS POUR LES checkbox-->

    <label for='chk1'>HTML</label>
    <input type="checkbox" name="chk1" <?php if ($chkbx1 == "on") { echo 'checked'; } ?> />

    <label for='chk2'>CSS</label>
    <input type="checkbox" name="chk2" <?php if ($chkbx2 == "on") { echo 'checked'; } ?> />

    <label for='chk3'>JAVASCRIPT</label>
    <input type="checkbox" name="chk3" <?php if ($chkbx3 == "on") { echo 'checked'; } ?> />

    <label for='chk4'>PHP</label>
    <input type="checkbox" name="chk4" <?php if ($chkbx4 == "on") { echo 'checked'; } ?> />

    <input type="submit" name="Soumettre le formulaire" />



<?php

// VALIDATION FORMULAIRE

if(!empty($_POST))
{
   if(empty($_POST['nom'])) {
      $errors['nom'] = "Le nom ne peut être vide";
   }
   if(!preg_match('/^([a-z0-9] )*$/i', $_POST['nom'])){
      $errors['nom'] = "Le nom doit contenir que les lettres et les chiffres";
   }
   if(empty($_POST['email']) OR !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $errors['email'] = "L'email entré n'est pas valide";
   }

}

?>


