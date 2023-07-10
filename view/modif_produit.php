<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifier produit</h1>
<form action='../controller/admin.php' method='POST' enctype="multipart/form-data">
<label>libelle</label>
<input type='text' name='libelle'  value="<?php echo $row['libelle'];?> "><br>
<label>prix produit</label>
<input type='text' name='prixproduit'  value="<?php echo $row['prixProduit'];?> "><br>
<?php $imageURL = '../public/img/imgsite/'.$row['photoProduit']; ?>
<label>photo produit</label><br><img style="width:30px;height:30px" src="<?php echo $imageURL ;?>" >

<input type='file' name='photoproduit'  value=""><br>

<label>description</label>
<input type='text' name='description'  value="<?php echo $row['descriptions'];?> "><br>
<label>date Mise Envente</label>
<input type='text' disabled value="<?php echo $row['dateMiseEnVente'];?>"><br>
<input type='hidden' name='dateMiseEnvente'  value="<?php echo $row['dateMiseEnVente'];?>">
<label>quantitestock</label>
<input type='text' name='quantitestock'  value="<?php echo $row['quantiteStock'];?> "><br>
<label>promo</label>
<input type='text' name='promo'  value="<?php echo $row['promo'];?> " ><br>
<label>idCategorie</label>
<input type='text' name='idCategorie'  value="<?php echo $row['idCategorie'];?> "><br>
<input type='hidden' name='idproduit' value="<?php echo $row['idProduit'];?>">

<input type='submit'name='Modifier' value='Modifier'>
</form>
</body>
</html>