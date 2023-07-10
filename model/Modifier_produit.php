<?php
function Affiche_modife($id)
{
    try {
        $con = new PDO("mysql:host=localhost;dbname=ecom", 'root', '', array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
        $sql = "SELECT * FROM produits WHERE idProduit='$id' ";
        $res = $con->query($sql);
        return  $table = $res->fetch();
    } catch (PDOException $mes) {
        echo $mes->getMessage();
    }
}
function Modifier_produit($table)
    {
        include 'connexion.php';
        $idproduit = $table[0];
        $libelle = $table[1];
        $prixproduit = $table[2];
        $photoproduit = $table[3];
        $description = $table[4];
        //$dateMiseEnvente = $table[5];
        /* $quantitestock = $table[6];
        $promo = $table[7];
        $idCategorie = $table[8]; */
        $quantitestock = $table[5];
        $promo = $table[6];
        $idCategorie = $table[7];
        //conecxion avec db
        try {
            $con = new PDO("mysql:host=localhost;dbname=ecom", 'root', '', array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
            $sql = "UPDATE  produits SET libelle='$libelle',prixProduit='$prixproduit',photoProduit='$photoproduit',descriptions='$description',
            quantiteStock='$quantitestock',promo='$promo',idCategorie='$idCategorie' WHERE 	idProduit='$idproduit' ";
            /* $sql = "UPDATE  produits SET libelle='$libelle',prixProduit='$prixproduit',photoProduit='$photoproduit',descriptions='$description',
            dateMiseEnVente='$dateMiseEnvente',quantiteStock='$quantitestock',promo='$promo',idCategorie='$idCategorie' WHERE 	idProduit='$idproduit' "; */
            $nb = $con->exec($sql) or die("error");
            if ($nb) {
                echo "bien modifier un produit";
            }
        } catch (PDOException $mes) {
            echo $mes->getMessage();
        }
    }