<?php 

function Home()
{
	include 'connexion.php';
	$result=$con->query("SELECT * FROM produits WHERE promo >0 ORDER BY promo DESC LIMIT 8");
	return $result;

}
function Categories($Categories)
{
	include 'connexion.php';
	$sql="SELECT * FROM produits WHERE idCategorie='$Categories' ";
	$result=$con->query($sql)or die("error");
	return $result;

}
function Produit($Produit)
{
	include 'connexion.php';
	echo"<br>"."<br>"."<br>"."<br>"."<br>";
	echo "<div style='text-align:center;' class='produit'>";
	$sql="SELECT * FROM produits WHERE idProduit='$Produit' ";
	$result=$con->query($sql)or die("error");

	$tabProd=$result->fetch();
	return $tabProd;
	

}
function searche($S)
{
	include 'connexion.php';
	$sql="SELECT * FROM produits WHERE CONCAT(libelle,descriptions) like  '%$S%' ";
	$result=$con->query($sql) or die("error searche");
	return $result ;

}

?>