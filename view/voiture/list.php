<?php
require_once ('model/ModelVoiture.php'); // chargement du modèle
$tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
require ('view/voiture/list.php'); //redirige vers la vue
?>

<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title>Liste des voitures</title>
 </head>
 <body>
 <?php
 foreach ($tab_v as $v)
 echo '<p> Voiture d\'immatriculation ' . $v->getImmatriculation() . '.</p>';
 ?>
 </body>
</html>
