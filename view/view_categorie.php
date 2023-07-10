<?php 
echo"<br>"."<br>"."<br>"."<br>"."<br>";
echo "<div class='produit' >";
while($tabProd=$result->fetch())
{
        
    $imageURL = 'public/img/imgsite/'.$tabProd['photoProduit'];

    echo "<div class='categorie'>";
    
    ?>
    <div><img src="<?php echo $imageURL; ?>"></div>
    <?php
    echo $tabProd['libelle']."<br>";
    $prixPromo=($tabProd['prixProduit'])- ($tabProd['prixProduit']*($tabProd['promo']/100));
    echo $prixPromo." Dh"."<br>";
    echo "<s>{$tabProd['prixProduit']}</s>";
    
    echo "<a href='root.php?idp={$tabProd['idProduit']}'><img src='public/img/view.png' style='width: 30px;height: 30px;'></a><br>";
    echo "<div style='border: dotted black;'><a style='text-decoration: none;' href='root.php?idpanier={$tabProd['idProduit']}&prix={$prixPromo}'> ajouter au panier</a></div>";
    echo "</div>";

}
echo "</div>";