function confirmar(id, acao){
    if(acao == "excluir"){
        var confirmar = confirm('Tem certeza que deseja excluir este aluno?')
        if(confirmar){
            location.href='excluir.php?indice=' + id
         }
    }else {
        var confirmar = confirm('Tem certeza que deseja editar este aluno?')
        if(confirmar){
            location.href='editar.php?indice=' + id
         }
    }

    
}