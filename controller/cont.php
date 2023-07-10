<?php 

require 'view/view.php';
require 'model/mod.php';
require 'model/panier.php';
require 'model/Tpanier.php';
require 'model/validerPanier.php';
require 'model/ajouter_clients.php';

if (isset($_GET['sign'])) 
{
	//pour identifier le client
	
	if(isset($_SESSION['email']) && isset($_SESSION['password'])){
		?>
            <script>
            alert("Vous éte déja connecter");
            window.close();
            </script>
            <?php
	}
	else
	{
		require 'view/Ajoute_client.php';
	if (isset($_POST['Connecter'])) {
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$login = $_POST['username'];
	        $password = $_POST['password'];
	        Ajouter($login,$password );
		}

	}
	}
}
if(isset($_POST['Inscrire']))
{
	//pour insrire un client
	 if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['email']) && empty($_POST['password']) && empty($_POST['date']) && empty($_POST['pay']) && empty($_POST['adress']))
     {
       ?>
       <script>
       alert("Tout les champs est obligatoire");
       </script>
       <?php
     }
     else{
    $tab[0]=strtoupper($_POST['nom']);
    $tab[1]=ucfirst($_POST['prenom']);
    $tab[2]=$_POST['email'];
    $tab[3]=$_POST['password'];
    $tab[4]=$_POST['date'];
    $tab[5]=ucfirst($_POST['pay']);
    $tab[6]=ucwords($_POST['adress']);
    require 'model/sinscrire_clients.php';
    inscrire($tab);
}
}
if(isset($_GET['vider']))
{
	//vider le panier
	
	unset($_SESSION['panier']);
	//Tpanier();
	header("location:root.php?panier=1");
	
}
if(isset($_GET['panier']))
{	
	//Aficher le panier
	//Si le panier est vide
	if(!isset($_SESSION['panier']))
		{
			echo "<br><br><br><br><br><br><br>";
			?>
			<div style="text-align: center;font-family: 'Courier New', Courier, monospace;font-size: xx-large;font-style: oblique;">
			<?php
			echo "Votre panier est vide";
			echo "</div>";

		}
	else{
		Tpanier();
		}
}
if(isset($_GET['commande']) && isset($_SESSION['email']))
{
	//pour valider la commande 
	Commande();
}
if(isset($_GET['commande']) && !isset($_SESSION['email']))
{
	//pour se conecte avant de commander

	require 'view/Ajoute_client.php';
	if (isset($_POST['Connecter'])) {
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$login = $_POST['username'];
	        $password = $_POST['password'];
	        Ajouter($login,$password );
	        Commande();
		}
		
	}
}
if(isset($_GET['idpanier']) && isset($_GET['prix']))
{	
	//Pour ajouter le produit selectioner au panier
	$Panier=$_GET['idpanier'];
	$prix=$_GET['prix'];
	//header("location:panier.php");
	Panier($Panier,$prix);
}
if(isset($_GET['idc']))
{	
	//Pour obtenir les Categories existe dans la base de donnes 
	$Categories=$_GET['idc'];
	$result=Categories($Categories);
	require 'view/view_categorie.php';
}
if(isset($_GET['idp']))
{
	//Pour obtenir les details de produit depuist la base de donnes
	$Produit=$_GET['idp'];
	$tabProd=Produit($Produit);
	require 'view/view_produit.php';
}
if (isset($_GET['SEARCHE'])) {
	//pour chercher un produit
	$result=searche($_GET['SEARCHE']);
	require 'view/view_home.php';

}
elseif(!isset($_GET['idc']) && !isset($_GET['idp']) && !isset($_GET['sign']) && !isset($_GET['prix']) && !isset($_GET['panier']) && !isset($_GET['commande']) && !isset($_GET['vider']) && !isset($_GET['SEARCHE']) )
{
	//la page d'acceulle si l'internaute na choisire aucun chose
	 $result=Home();
	 require 'view/view_home.php';
}



