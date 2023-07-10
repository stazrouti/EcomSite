<?php 
session_start();
function Ajouter($login,$password)
{
    include 'connexion.php';
    $sql = "SELECT email,passWord,idClient FROM clients "; 
        $result = $con->query($sql);
        $bool=true;
        while($table = $result->fetch())
        {
        if($login== $table['email'] && $password == $table['passWord']){
            
                $_SESSION['email']=$login;
                $_SESSION['password']=$password;
                $_SESSION['idcl']=$table['idClient'];
                
                
                ?>
                <script>
                alert("Merci de vous Connecter");
                window.close();
            </script>
            <?php
            break;
        }
        else{
            $bool=false;
        }
    }
    if($bool==false)
    { ?>
        <script>
                alert("Login ou password incorrect");
            </script>
    <?php
    
}
}
?>