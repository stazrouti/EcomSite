<?php 
function inscrire($tab)
{
  include 'connexion.php';
  $sql="INSERT INTO clients VALUES(NULL, '$tab[0]', '$tab[1]','$tab[2]','$tab[3]', '$tab[4]', '$tab[5]','$tab[6]')";
    $nb=$con->exec($sql) or die("Ereur");
     if($nb==1)
    {
      $_SESSION['email']=$tab[2];
      $_SESSION['password']=$tab[3];
      $_SESSION['idcl']=$con->lastInsertId();
      ?>
          <script>
            alert("Merci de vous inscrire");
            window.close();
          </script>
          <?php
    }
}