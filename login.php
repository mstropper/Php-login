<?php
$login = $_POST["login"];
$entrar = $_POST["entrar"];
$senha =$_POST["senha"];
$connect = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

  if (isset($entrar)) {
			$query = $connect->prepare("select count(*) as contagem from tb_usuarios where login = '$login' and senha ='$senha' ");
			$query->execute();
			$retorno =$query->fetch(PDO::FETCH_ASSOC);
			
			
 			if ($retorno['contagem'] ==1)
	{
		   session_start();
		   $_SESSION['nomedouser'] =$login;
           header("Location:index.php");
     }
		  
	  else{
		
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }
  }
?>