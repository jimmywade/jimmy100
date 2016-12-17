<?php 
    session_start(); 
    
    unset($_SESSION['empleador']);

    session_destroy(); 
   
    
    header('location: ../index.html'); 
?>
