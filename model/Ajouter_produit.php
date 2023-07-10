<?php
function ajouterproduit($table)
{

    $libelle = $table[1];
    $prixproduit = $table[2];
    $photoproduit = $table[3];
    $description = $table[4];
    $dateMiseEnvente = $table[5];
    $quantitestock = $table[6];
    $promo = $table[7];
    $idCategorie = $table[8];
    //conecxion avec db
    try {
        $con = new PDO('mysql:host=localhost;dbname=ecom', 'root', '', array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
        $sql = "INSERT INTO produits VALUES(NULL,'$libelle', $prixproduit, '$photoproduit', '$description',
         '$dateMiseEnvente', '$quantitestock', '$promo', '$idCategorie')";
        $nb = $con->exec($sql);
        if ($nb==1) {
            echo "bien ajouter un produit";
        }
    } catch (PDOException $mes) {
        echo $mes->getMessage();
    }
}