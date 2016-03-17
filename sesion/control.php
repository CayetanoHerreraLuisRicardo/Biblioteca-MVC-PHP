<?php
if ($_POST["usuario"]=="bibliotecario" && $_POST["contra"]=="12345")
{ 
   	session_start(); 
    $_SESSION["autentificado"]= true; 
   	header ("Location: ../biblioteca.php");	
}
else 
{ 
   	header("Location: ../index.php?error=si"); 
} 
?>