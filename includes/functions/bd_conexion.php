<?php
  $conn = new mysqli('localhost', 'root', 'root', 'gdlwebcamp');
 
  if($conn->connect_error) {
    echo $error -> $conn->connect_error;
  }
  if(!mysqli_set_charset($conn, 'utf8')) { // Para pasar los caracteres en español
    printf('Error cargando los caracteres', mysqli_error($conn)); 
    exit(); 
    }
?>