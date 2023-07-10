<?php
function Commande()
{
//session_start();
include 'connexion.php';
//verifier l'authentification

	if(isset($_SESSION['panier']))
	{
		//ajout de lacommande
		
		$idc=$_SESSION['idcl'];
		$dtCmd=date("Y-m-d"); 
		$poids=5;
		$n=$con->exec("INSERT INTO commandes VALUES (NULL,'$dtCmd','$poids',0,'$idc')") or die("Eroor 1");
		$idCmd=$con->lastInsertId();

		//ajouts des lignes de la commande
		for($i=0;$i<count($_SESSION['panier']);$i++)
		{
			$qt=$_SESSION['panier'][$i]['qte'];
			$pr=$_SESSION['panier'][$i]['prix']*$qt;
			$idp=$_SESSION['panier'][$i]['Panier'];
			//Verifier si la quantite est disponible
			$sql="SELECT * FROM produits WHERE idProduit='$idp' ";
			$req=$con->query($sql);
			$tab=$req->fetch();
			if ($qt>$tab['quantiteStock']) {
				echo "<br><br><br><br><br><br><br><div style='text-align: center;font-family: 'Courier New', Courier, monospace;font-size: xx-large;font-style: oblique;margin-top:100px'>Nous somme desolle la quantite que vous avez demander est indisponible pour le moment</div";
				break;
			}
			else
			{
			$nb=$con->exec("INSERT INTO lignescommandes VALUES (NULL,'$qt','$pr','$idp','$idCmd')");
			//retrancher la qte du stock
			$u=$con->exec("UPDATE produits SET quantiteStock=quantiteStock-$qt WHERE idProduit= '$idp' ") or die("Eroor 2");
			if($u==1)
		{
			echo "<br><br><br><br><br><br><br><div style='text-align: center;font-family: 'Courier New', Courier, monospace;font-size: xx-large;font-style: oblique;margin-top:100px'>Votre commende a ete accepter<br>Merci de nous choisire</div><br>";

		}
		else 
		{
			echo "il ya une erreure";
		}
			}
		}
		
}
}