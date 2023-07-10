<?php
session_start();

require '../model/Ajouter_produit.php';
require '../model/Modifier_produit.php';
require '../model/commande_client.php';
if(isset($_POST['Conecter']))
{
    //pour connecter l'admin
    if($_POST['user']=='admin' && $_POST['password']=='admin')
    {   
        $_SESSION['user']=$_POST['user'];
        $_SESSION['password']=$_POST['password'];
        
    }
}
if(isset($_GET['modif']))
{
    //pour modifier un produit
    $id=$_GET['modif'];
    $row=Affiche_modife($id);
    require '../view/modif_produit.php';
    //header("location:../view/modif_produit.php",$row);
    
}
if (isset($_POST['Modifier'])) {
    //pour appliquer la modification de produit

    $dossier='../public/img/imgsite/';
    $photo = basename($_FILES['photoproduit']['name']);
     if(move_uploaded_file($_FILES['photoproduit']['tmp_name'], $dossier . $photo))
     {
    $id=trim($_POST["idproduit"]);
    $libelle=trim($_POST['libelle']);
    $prix= trim($_POST['prixproduit']);
    $description=trim($_POST['description']);
    $quantite=trim($_POST['quantitestock']);
    $promo=trim($_POST['promo']);
    $idc= trim($_POST['idCategorie']);

    $arr = array($id,$libelle,$prix,$photo,$description,$quantite,$promo,$idc);
    Modifier_produit($arr);
    }
}

require '../model/infos_produit.php';
if(isset($_SESSION['user']) && isset($_SESSION['password']) && !isset($_GET['voire_commande']) && !isset($_GET['chang_etat']))
{
    //pour afficher les produit
    $result=Infos();
    require '../view/view_tout_produit.php';
}
if(isset($_GET['sup']))
{
    //pour supprimer un tel produit 
    $sup=$_GET['sup'];
    //header("location:../model/infos_produit.php");
    Sup($sup);
    Infos();
    header("refresh:0");
}
if(isset($_POST['Ajouter']))
{
    //pour retourner la categorie
    if($_POST['idCategorie']=='Informatique')
        {$categorie=1;}
    if($_POST['idCategorie']=='t-shirt')
        {$categorie=2;}
    if($_POST['idCategorie']=='Accessoires')
        {$categorie=3;}
    if($_POST['idCategorie']=='Electromenager')
        {$categorie=4;}
    
    //pour ajouter un produit
    $dossier='../public/img/imgsite/';
    $photo = basename($_FILES['photoproduit']['name']);
    if(move_uploaded_file($_FILES['photoproduit']['tmp_name'], $dossier . $photo))
     {

    $arr = array(
        NUll, $_POST['libelle'], $_POST['prixproduit'],$photo, $_POST['description'], $_POST['dateMiseEnvente'],
        $_POST['quantitestock'], $_POST['promo'], $categorie);
    
    ajouterproduit($arr);
    }
    /*
    ?>
    <script>
        window.location.reload();
    </script>
    <?php*/

}
if(isset($_GET['voire_commande']))
{
    //pour Afficher tout les commandes
    $result=Afficher_commande_affecter();
    require '../view/voire_commande.php';
}
if(isset($_GET['chang_etat']))
{
    //pour voire l'etat de produit
    $id=$_GET['chang_etat'];
    $tab=modifier_etat($id);
    require '../view/voir_etat_commander.php';
}
if(isset($_POST['changer_etat']))
{
    //pour valider le changement d'etat
    $idc=$_POST['idc'];
    $etat=$_POST['etat'];
    if($etat!=0 && $etat!=1 && $etat!=2 && $etat!=3)
        {
            echo "l'etat doit etre entre 0 et 3";
        }
    else
        {
            $tab=array($idc,$etat);
            valider_etat($tab);
            //header("location:admin.php?voire_commande=1");
        }
        
}
elseif(!isset($_SESSION['user']) && !isset($_SESSION['password']) && !isset($_GET['sup']) && !isset($_GET['voire_commande']))
{
    //pour afficher la premier page d'administration
    require '../view/admin_view.php';
}