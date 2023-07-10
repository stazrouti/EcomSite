<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter produit</h1>
    <form  method='POST' action="../controller/admin.php" enctype="multipart/form-data">
        <label>libelle</label>
        <input type='text' name='libelle' ><br>
        <label>prix produit</label>
        <input type='text' name='prixproduit' ><br>
        <label>photo produit</label>
        <input type='file' name="photoproduit" ><br>
        <label>description</label>
        <input type='text' name='description' ><br>
        <label>date Mise Envente</label>
        <input type='date' name='dateMiseEnvente' ><br>
        <label>quantitestock</label>
        <input type='text' name='quantitestock' ><br>
        <label>promo</label>
        <input type='text' name='promo' ><br>
        <label>Categorie</label>
        <select name="idCategorie">
            <option>Informatique</option>
            <option>t-shirt</option>
            <option>Accessoires</option>
            <option>Electromenager</option>
        </select><br>
        <input type='submit'name='Ajouter' value='Ajouter produit'>
    </form>
</body>
</html>