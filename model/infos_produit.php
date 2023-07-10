<?php
function Sup($sup)
{
    include 'connexion.php';
    $sql="DELETE FROM produits WHERE idProduit='$sup' ";
    
    ?>
    <script>
        window.location.href = "location:../controller/admin.php";
    </script>
    <?php
    $nb=$con->exec($sql) or die("error sup");
}

function Infos()
{   
    
    
    include 'connexion.php';
    $req="SELECT * FROM produits ORDER BY idProduit";
    $result=$con->query($req);
    
    return $result;

}