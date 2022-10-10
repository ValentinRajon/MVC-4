<?php 
require_once('testVoiture.php')
class ModelVoiture{
private $marque;
private $couleur;
private $immatriculation;

public function getMarque(){
    return $this->marque;
}

public function setMarque($marque2){
    $this->marque=$marque2;
}

public static function getAllVoitures(){
    $voitureTable = $BDD->prepare ('SELECT * FROM voiture');
    return $voitureTable;
}

public function _construct($m=NULL,$c=NULL,$i=NULL){
    if (!is_null($m) && !is_null($c) && !is_null($i)) {
        // Si aucun de $m, $c et $i sont nuls,
        // c'est forcement qu'on les a fournis
        // donc on retombe sur le constructeur à 3 arguments
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
       
}}

public function getCouleur(){
    return $this->couleur;
}

public function setCouleur($couleur2){
    $this->couleur=$couleur2;
}

public function getImmat(){
    return $this->immatriculation;
}


public function setImmat($immatriculation2){
    $this->immatriculation=$immatriculation2;
}

public function setImmat($immatriculation2)
{
   if ($immatriculation2 =<8) {$this->immatriculation = $immatriculation2;}
}

function getVoitureByImmat($immat) {
    $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
    "nom_tag" => $immat,
    //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête
    $req_prep->execute($values);
    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit))
    return false;
    return $tab_voit[0];
   }

   public function save($this){
    $sql = "INSERT INTO table_name (column1, column2, ...) VALUES (value1, value2, ...)"
}
}
?>