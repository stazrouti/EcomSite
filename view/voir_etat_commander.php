<html>
<head>
    <script>
        function check1()
        {
            alert("Etat 0:le produit est dans l'agence");
            alert("Etat 1:le produit est envoyer");
            alert("Etat 2:le produit est recu");
            alert("Etat 3:le produit a ètè rècupèrè"); 
        }
        function check()
        {
            etat=document.getElementById("etat").value;
            if(etat!=0 && etat!=1 && etat!=2 && etat!=3)
            {
                alert("Etat 0:le produit est dans l'agence");
                alert("Etat 1:le produit est envoyer");
                alert("Etat 2:le produit est recu");
                alert("Etat 3:le produit a ètè rècupèrè");
            }
        }
    </script>
</head>
<body onload="check1()">
<form action="admin.php?voire_commande=1" method="POST">
    
        <label>Id de commande </label>
    <input type="text" value="<?php echo $tab['idCommande'] ; ?>" disabled><br>
    <input type="hidden" name="idc" value="<?php echo $tab['idCommande'] ; ?>" >
        <label>Etat </label>
    <input type="text" name="etat" id="etat" value="<?php echo $tab['etat'] ; ?>"><br>
    <input type="submit" value="Changer" name="changer_etat" onclick="check()">
</form>

</body>
</html>