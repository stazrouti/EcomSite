<?php
	echo "<table align='center' ><tr>";
	$l=0;
	while($tabProd=$result->fetch())
	{
		echo"<br>";
				
		$imageURL = 'public/img/imgsite/'.$tabProd['photoProduit'];
		echo "<td>";
		echo'<div style="margin-top: 10px;text-align: center;align-content: center;border: black solid;" >';
		?>
		<div><img src="<?php echo $imageURL; ?>"></div>
		<?php


		echo "<br>".$tabProd['libelle'], "<br>";
		$prixPromo=$tabProd['prixProduit']- ($tabProd['prixProduit']*($tabProd['promo']/100));
		echo $prixPromo." Dh"."<br>";
		echo "<s>{$tabProd['prixProduit']}</s>";
		
		echo "<a href='root.php?idp={$tabProd['idProduit']}'><img src='public/img/view.png' style='width: 30px;height: 30px;'></a><br>";
		echo "<div style='border: dotted black;'><a style='text-decoration: none;' href='root.php?idpanier={$tabProd['idProduit']}&prix={$prixPromo}'> ajouter au panier</a></div>";
		echo "</div>";
		echo "</td>";

		$l++;
		if($l%2==0)
			ECHO "</tr><tr>";
}
	ECHO "<table>";