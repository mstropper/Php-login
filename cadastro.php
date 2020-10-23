<?php
$login = $_POST['login'];
$senha = $_POST['senha'];

$connect = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");
$busca=$connect->prepare ("SELECT login FROM tb_usuarios WHERE login = '$login'");
$busca->execute();
$logarray=$busca->fetch(PDO::FETCH_ASSOC);

  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";

    }else{
      if($logarray['login'] == $login){

                 echo"<script language='javascript' type='text/javascript'>
          alert('Este login já está em uso, por favor insira outro!');window.location.
         href='cadastro.html'</script>";
        die();

      }else{
        $consulta = $connect->prepare("INSERT INTO tb_usuarios (login,senha) values('$login','$senha')");
		$insert=$consulta->execute();

        if($insert){

          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
         href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
         alert('Não foi possível cadastrar esse usuário');window.location
         .href='cadastro.html'</script>";

        }
      }
    }
	
?>