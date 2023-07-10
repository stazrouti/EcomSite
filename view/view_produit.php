<?php

	$imageURL = 'public/img/imgsite/'.$tabProd['photoProduit'];
	?>
	<div><img src="<?php echo $imageURL; ?>"></div>
	<?php
	echo $tabProd['libelle']."<br>";
	
	$prixPromo=$tabProd['prixProduit']- $tabProd['prixProduit']*($tabProd['promo'])/100;
	echo $prixPromo." Dh"."<br>";
	echo "<s>{$tabProd['prixProduit']}</s>"."<br>";
	echo $tabProd['descriptions']."<br>";
	echo "<div style='border: solid black yellow;margin-right:43%;margin-left:43%;background-color:yellow;border-radius:10px'><a style='text-decoration: none;' href='root.php?idpanier={$tabProd['idProduit']}&prix={$prixPromo}'> ajouter au panier</a></div>";
	echo "<div><a href=''></a></div>";
	echo "</div>";