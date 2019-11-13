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
    

    
}

// CRIANDO NOVO PRODUTO
function novoProduto($nome, $preco, $descricao){
    $produtosJson = file_get_contents('./database/produtos.json');
    $produtosArray = json_decode($produtosJson, true);

    $novoProduto = [
        'nome' => $nome,
        'preco' => $preco,
        'descricao' => $descricao,
    ];

    //atribuindo novo produto a array produtos;
    $produtosArray[] = $novoProduto;

    // GUARDANDO produtoArray NO JSON
    $novoProdutoJson = json_encode($produtosArray);
    $cadastrou = file_put_contents('./database/produtos.json', $novoProdutoJson);

    // VERIFICA SE CADASTROU
    if ($cadastrou) {
        header('Location: indexProdutos.php');
     }
}

function criaFoto(){
    if ($_FILES['foto']['error'] == 0) {
        $nomeFoto = $_FILES['foto']['name'];
        $caminhoTmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file(
            $caminhoTmp, 
            './assets/img/' . $nomeFoto
        );
    }
}




?>