<?php

if (isset($_POST['Enviar']) && isset($_FILES['my_image'])) 
{
    include "conexao.php";
    $img_name = $_FILES['my_image'] ['name'];
    $img_size = $_FILES['my_image'] ['size'];
    $tmp_name = $_FILES['my_image'] ['tmp_name'];
    $error = $_FILES['my_image'] ['error'];

    if ($error === 0)
    {
        if ($img_size > 125000)
        {
            $em = "Desculpe, esse arquivo é muito grande para ser enviado";
            header("Location: index.php?error=$em");
        }
        else
        {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs))
            {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'fotos/'. $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Inserir dados no banco de dados
                $sql = "INSERT INTO test_image VALUES ('','$new_img_name')";
                mysqli_query($conn, $sql);
                header("Location: view.php");
            }
            else
            {
                $em = "Esse tipo de arquivo não é aceito";
                header("Location: index.php?error=$em");
            }
        }
    }
    else
    {
        $em = "Erro no envio da imagem";
        header("Location: index.php?error=$em");
    }
}
else
{
    header("Location: index.php");
}





?>