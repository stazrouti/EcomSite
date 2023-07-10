<?php
function Afficher_commande_affecter()
{
    //Afficher tout les commande pour l'admin
    include 'connexion.php';
    $req="SELECT * FROM commandes NATURAL JOIN lignescommandes ORDER BY idClient";
    $result=$con->query($req);
    return $result;
}
function modifier_etat($id)
{
    include 'connexion.php';
    $req="SELECT etat,idCommande FROM commandes WHERE idCommande='$id' ";
    $result=$con->query($req);
    $tab=$result->fetch();
    return $tab;
}
function valider_etat($tab)
{
    include 'connexion.php';
    $sql="UPDATE  commandes SET etat='$tab[1]' WHERE  idCommande='$tab[0]' ";
    $nb=$con->exec($sql);
}