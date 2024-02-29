<?php
    function Apagar(){
        session_start();
        session_unset();
        location.reload();
    }

    session_start(); 

    $_SESSION['valor'] = null;

    if(isset($_SESSION['alunos'])){
        $alunos = $_SESSION['alunos'];
    }
    else{
        $alunos = array();
    }

    //Recebendo Dados

    if (isset($_POST['name']) && isset($_POST['nota1']) && isset($_POST['nota2']) && isset($_POST['nota3']) && isset($_POST['nota4'])) {
        $nome = $_POST['name'];

        $notas = array(
            
            'nota1'  => $_POST['nota1'],
            'nota2'  => $_POST['nota2'],
            'nota3'  => $_POST['nota3'],
            'nota4'  => $_POST['nota4']
        );

        //Calculo da Media 

            $media = (($notas['nota1'] + $notas['nota2'] + $notas['nota3'] + $notas['nota4']) / 4 );

            //Calculo do status de aprovação

            if($media >=60) {
                $status =  "Aprovado";
            }
            elseif( ($media < 60 ) && ($media > 40)){
                $status =  "Em Recuperação";
            }
            else{  
                $status =  "Reprovado";
            }

            //Aray do aluno Novo

            if (isset($_SESSION['alunos']) && is_array($_SESSION['alunos'])) {
                $novoAluno = array(
                    'ID'      => (count($_SESSION['alunos']) + 1),
                    "Nome"    => $nome,
                    "Notas"   => $notas,
                    "Media"   => number_format((float)$media, 2),
                    "status"  => $status   
                );
            } else {
                // Se 'alunos' não estiver definido ou não for um array, inicialize o array
                $_SESSION['alunos'] = array();
                $novoAluno = array(
                    'ID'      => 0, // Ou qualquer valor inicial desejado
                    "Nome"    => $nome,
                    "Notas"   => $notas,
                    "Media"   => number_format((float)$media, 2),
                    "status"  => $status   
                );
            }  

            
            array_push($alunos , $novoAluno);
            $_SESSION['alunos'] = $alunos;

        
        
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
</head>
<body>
    <h1>Tabela de Alunos Escola Escolha Nome Insira Aqui Estadual.</h1>
    <table border="1px">

        
            <?php
            if (isset($_SESSION['alunos']) && is_array($_SESSION['alunos'])) {

                    echo"<thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Notas</th>
                    <th>Media</th>
                    <th>Status</th>
                    <th>Ação</th> 
                </thead>
                
                <tbody>";
                foreach($_SESSION['alunos'] as $pos => $imprimindoAlunos) {
                if($imprimindoAlunos  != NULL){
                    echo "<tr>
                            <td> #{$pos}</td>
                            <td>{$imprimindoAlunos['Nome']}</td>
                            <td>" . implode(" ", $imprimindoAlunos['Notas']) . "</td>
                            <td>{$imprimindoAlunos['Media']}</td>   
                            <td>{$imprimindoAlunos['status']}</td>
                            <td> <button id='$pos' onclick=\"confirmar(this.id, 'excluir')\">Excluir</button> 
                                 <button id='$pos' onclick=\"confirmar(this.id, 'editar')\">Editar</button> 
                            
                        </tr>";
                } else {
                    echo"<tr>" ;    
                    echo"<td>" ;
                    echo"<td>" ;
                    echo"</tr>";
                };
           } 
            // Trate o caso em que $_SESSION['alunos'] não está definido ou não é um array
        } else {
            echo("Sem Alunos cadastrados");

        };
        
        ?> 
        </tbody>


    </table>    
        <a onclick=""></a>
        <button onclick="location.href='kill.php'">Apagar Tudo</button>
        <button onclick="location.href='index.html'">Adicionar +</button>

       <!-- onclick="location.href='excluir.php'"

        onclick="location.href='kill.php'" -->
        <script src="script.js"></script>
</body>
</html>