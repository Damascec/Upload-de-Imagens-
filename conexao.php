<?php

    $servidor = "localhost";
    $user="root";
    $password="";
    $db = "projetoalbum";

    $conn = mysqli_connect($servidor, $user, $password,$db);

    if (!$conn)
    {
        echo "Conxão com o banco de dados falhou";
        exit();
    }

?>