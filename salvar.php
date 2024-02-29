<?php

    $Novo = $_GET;


    if (isset($Novo['name']) && isset($Novo['nota1']) && isset($Novo['nota2']) && isset($Novo['nota3']) && isset($Novo['nota4'])) {
        $nome = $Novo['name'];

        $notas = array(
            
            'nota1'  => $Novo['nota1'],
            'nota2'  => $Novo['nota2'],
            'nota3'  => $Novo['nota3'],
            'nota4'  => $Novo['nota4']
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
                $alunoEditado = array(
                    'ID'      => $Novo['id'],
                    "Nome"    => $Novo['name'],
                    "Notas"   => $notas,
                    "Media"   => number_format((float)$media, 2),
                    "status"  => $status   
                );
            }
        
            session_start();

            $_SESSION['alunos'][$Novo['indice']] = $alunoEditado; 
            
        header("Refresh: 0; url=calcular.php");  
?>