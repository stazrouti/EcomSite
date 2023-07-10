<?php
function Panier($Panier,$prix)
{
	//session_start();
include 'connexion.php';
echo "<br><br><br><br><br><br><br><br><br><br><br>";
$flag=0;

if(!isset($_SESSION['panier'])){
$n=0;

}
else
{
	$n=count($_SESSION['panier']);

// RECHERCHE SI LE PRODUIT EXISTE DEJA DANS LEPANIER
	
	for($i=0;$i<$n;$i++)
	{
		if($_SESSION['panier'][$i]['Panier']==$Panier)
		{
			$_SESSION['panier'][$i]['qte']++;
			$flag=1;
			break;
		}
	}
}
if($flag==0)
{
$_SESSION['panier'][$n]['Panier']=$Panier;
$_SESSION['panier'][$n]['prix']=$prix;
$_SESSION['panier'][$n]['qte']=1;
}

//affichage du panier

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
	$result = $con->query("SELECT * FROM produits WHeRE idProduit='$Panier' ");
	$tabProd=$result->fetch();
	$imageURL = 'public/img/imgsite/'.$tabProd['photoProduit'];
	
	echo '<tr><td>'; ?>
	<img src="<?php echo $imageURL ;?>" style="width: 30px;height: 30px;"></td>
	 <?php
	echo "<td>{$_SESSION['panier'][$i]['prix']}</td><td>{$_SESSION['panier'][$i]['qte']}</td>";
	$mt=$_SESSION['panier'][$i]['prix']*$_SESSION['panier'][$i]['qte'];
	$total+=$mt;
	echo"<td>$mt</td><td></td></tr>";

}
echo"<tr><td colspan=4>TOTAL</td><td>{$total} Dh</td></tr></table>";
}