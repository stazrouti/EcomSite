<?php
    echo "<table border='' width='50%'><tr>";
    echo "<td>idCommande</td>";
    echo "<td>dateCommande</td>";
    echo "<td>etat</td>";
    echo "<td>idClient</td>";
    echo "<td>quantite</td>";
    echo "<td>prix</td>";
    echo "<td>idproduit</td>";
    echo "<td>Modifier l'etat</td></tr>";
while($tab=$result->fetch())
{
    echo "<tr>";
    echo "<td>".$tab['idCommande']."</td>";
    echo "<td>".$tab['dateCommande']."</td>";
    echo "<td>".$tab['etat']."</td>";
    echo "<td>".$tab['idClient']."</td>";
    echo "<td>".$tab['quantite']."</td>";
    echo "<td>".$tab['prix']."</td>";
    echo "<td>".$tab['idproduit']."</td>";
    ?> 
    <td><a href="admin.php?chang_etat=<?= $tab['idCommande'] ?>"><img src="../public/img/update.png" width="30px"></a></td></tr>
    <?php
    
}
echo "</table>";