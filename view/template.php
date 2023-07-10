<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="public/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/css.css">
	<title>SCHOLAR  SHOP</title>
</head>
<body>
	
	<header class="navbar navbar-dark bg-dark fixed-top">
        <a href="root.php" style="">SCHOLAR SHOP</a>
        <div class="justify-content-between" style="text-align: center;">
            <ul class="navbar flex-row">
            	<form method="GET">
                    <li><input type="text" name="SEARCHE" placeholder="SEARCHE" style=""></li>
                </form>
                <li class="navbar-item px-3 text-light text-uppercase font-weight-blold "><a href="root.php">Home</a></li>
                <li class="navbar-item text-light text-uppercase font-weight-blold"><a href="mailto: schollar_shop@example.com" target="_blanck">Contact Us</a></li>
                <!--<li class="navbar-item text-light text-uppercase font-weight-blold">About Us </li>-->
                <li class="navbar-item text-light text-uppercase font-weight-blold"><a href="root.php?sign=<?='1'?>" target="_blanck" >Sign in </a></li>
                
                <li class="navbar-item text-light text-uppercase font-weight-blold"><a href="root.php?panier=<?=1?>" ><img src="public/img/panier.jpeg" style="width: 30px;height: 30px;"></a></li>
            </ul>
        </div>
    </header>

    <nav class=""><!---->
        
    <?php

        include 'model/connexion.php';
$result=$con->query("SELECT * FROM categories");
while ($tabCat=$result->fetch()) {
    echo "<div>"."<a style='text-decoration: none;' href='root.php?idc={$tabCat['idCategorie']}'>{$tabCat['categorie']}</a>"."</div>"."<br>" ;
}
?>

     <?= $content ?>
        
    </nav>
