<?php
session_start(); 

if ($_SESSION["autentificado"] == false) 
{ 
   	header("Location: ../index.php"); 
   	exit(); 
}	
?>