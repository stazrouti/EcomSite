<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br><br>
<a href='../view/Ajouter_produit.php' >Ajouter produit</a><bR>
<a href="admin.php?voire_commande=1" target="_blank" >Voire les commandes</a>
<br>
<h2>List de produit</h2>
<table border="1">
        <tr>
            <th>id produit</th>
            <th>libelle</th>
            <th>prixProduit	</th>
            <th>photoProduit</th>
            <th>dateMiseEnVente	</th>
            <th>quantiteStock</th>
            <th>promo</th>
            <th>idCategorie</th>
            <th>Suprimer produit</th>
            <th>Modifier produit</th>
        </tr>
        <?php
        while($tab=$result->fetch())
        {
         $imageURL = '../public/img/imgsite/'.$tab["photoProduit"];
        ?>
        <tr>
            <td><?php echo $tab['idProduit'] ;?></td>
            <td><?php echo $tab ['libelle'];?></td>
            <td><?php echo $tab['prixProduit'] ;?></td>
            <td><img src="<?php echo $imageURL; ?>" style='width: 30px;height: 30px;' /></td>
            <td><?php echo $tab['dateMiseEnVente'] ;?></td>
            <td><?php echo $tab['quantiteStock'] ;?></td>
            <td><?php echo $tab['promo'] ;?></td>
            <td><?php echo $tab['idCategorie'] ;?></td>
            <td><a href="../controller/admin.php?sup=<?=$tab['idProduit']?>"><img src="../public/img/delete.png" alt="sup" width="25px"></a>
            <td><a href="../controller/admin.php?modif=<?=$tab['idProduit']?>"><img src="../public/img/update.png" alt="modif" width="25px"></a>
        </tr>
        <?php } ?>
</table>

        