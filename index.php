<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>upload de imagens usando o PHP</title>
  <style> 
      body { 
        display: flex; 
        justify-content: center; 
        align-items: center;
        flex-direction: column;
        min-height: 100vh;
      }
  </style>
</head>
<body>
    <?php if (isset($_GET['error'])) :?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>
    <form method="post" action="upload.php" enctype="multipart/form-data">
      <input type="file" name="my_image">
      <input type="submit" name="Enviar" value="upload">

    </form> 
</body>
</html>