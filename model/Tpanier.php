<?php 

function Tpanier()
{
	//session_start();
	include 'connexion.php';
/*if(!isset($_SESSION['panier']))
{
	
	echo "<br><br><br><br><br><br><br>";
	?>
	<div style="text-align: center;font-family: 'Courier New', Courier, monospace;font-size: xx-large;font-style: oblique;">
	<?php
	echo "Votre panier est vide";
	echo "</div>";

}
else{*/
	echo "<br><br><br><br><br><br><br><br><br><br>";
	echo "<a href='root.php?vider=1' style='text-decoration:none'><div style='background-color:orange;width:100px;text-align: center;margin-left: 90%;'>Vider le panier</div></a>";
	echo "<table border='1' class='table table-striped'>";
?>
	<tr>
		<td></td>
		<td>Prix</td>
		<td>Qantitè</td>
		<td>Prix total de produit</td>
		<td></td>
	</tr>
	<?php
	$total=0;
	for($i=0;$i<count($_SESSION['panier']);$i++)

{
	
	$Panier=$_SESSION['panier'][$i]['Panier'];

	$result = $con->query("SELECT * FROM produits WHeRE idProduit='$Panier'");
	$tabProd=$result->fetch();
	$imageURL = 'public/img/imgsite/'.$tabProd['photoProduit'];
	
	echo '<tr><td>';
	?>
	<img src="<?php echo $imageURL ;?>" style="width: 30px;height: 30px;"></td>
	 <?php 
	echo "<td>{$_SESSION['panier'][$i]['prix']}</td><td>{$_SESSION['panier'][$i]['qte']}</td>";
	$mt=$_SESSION['panier'][$i]['prix']*$_SESSION['panier'][$i]['qte'];
	$total+=$mt;
	echo"<td>$mt</td><td></td></tr>";

}
echo"<tr><td colspan=4>TOTAL</td><td>{$total} Dh</td></tr></table>";
echo "<a href='root.php?commande=1' style='text-decoration:none'><div style='background-color:orange;width:100px;text-align: center;margin-left: 90%;'>Comander</div></a>";
//}



}