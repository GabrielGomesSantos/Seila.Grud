<?php
    session_start();
    $pos =($_GET['indice']); 
    $alunos = $_SESSION['alunos'][$pos];
    $notas = $alunos['Notas'];

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styleindex.css">
  <title>Editing</title>
</head>
<body>

  <form method="get" action="salvar.php">

    <input type="hidden" name="indice" value="<?=$pos?>"/>
    <input type="hidden" name="id" value= "<?=$alunos['ID']?>">

    
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value=" <?php echo $alunos['Nome'] ?>"> <br>

    <label for="nota1">nota 1:</label><br>
    <input type="number" id="nota1" name="nota1" min="0" max="100" value="<?php echo $notas['nota1']?>">
    <br>

    <label for="nota2">nota 2:</label><br>
    <input type="number" id="nota2" name="nota2" min="0" max="100" value="<?php echo $notas['nota2']?>"><br>

    <label for="nota3">nota 3:</label><br>
    <input type="number" id="nota3" name="nota3" min="0" max="100" value="<?php echo $notas['nota3']?>"><br>
    
    <label for="nota4">nota 4:</label><br>
    <input type="number" id="nota4" name="nota4" min="0" max="100" value="<?php echo $notas['nota4']?>">
    <br><br>
    <input type="submit" value="Enviar">
  </form>
</body>
</html>