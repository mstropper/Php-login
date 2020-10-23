<?php
session_start();
      if(isset($_SESSION['nomedouser'])){
      echo"Bem-Vindo, ".$_SESSION['nomedouser']." <br>";
      echo"Essas informações podem ser acessadas por você";
	  echo "<a href=\"sair.php\">Logout</a>";
    }else{
      echo"Bem-Vindo<br>";
      echo"Essas informações não podem ser acessadas por você";
      echo"<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";
    }
?>

