<?php

function checarNome($str)
{
    // Verificando se string tem pelo menos 3 caracteres (strlen)
    if (strlen($str) < 3) {
        return false;
    }

    // Verif se string tem menos de 10 carac
    if (strlen($str) > 10) {
        return false;
    }

    // Se chegar até aqui, retorne true
    return true;

}

// PEGANDO produtos.json E TRANSFORMANDO EM ARRAY
function pegaProduto(){
    $produtosJson = file_get_contents('./database/produtos.json');
    $produtosArray = json_decode($produtosJson, true);
}

// CRIANDO NOVO PRODUTO
function novoProduto($nome, $preco, $descricao){
    $novoProduto = [
        'nome' => $_POST['$nome'],
        'preco' => $_POST['$preco'],
        'descricao' => $_POST['$descricao'],
    ];

    //atribuindo novo produto a array produtos;
    $produtosArray[] = $novoProduto;
}

// GUARDANDO produtoArray NO JSON
function guardaProduto(){
    $novoProdutoJson = json_encode($produtosArray);
    $cadastrou = file_put_contents('./database/produtos.json', $novoProdutoJson);
}

// VERIFICA SE CADASTROU
function cadastrou(){
    if ($cadastrou) {
       echo("CADASTROU !!");
    }
        echo("NÃO CADASTROU !! ");
}
?>