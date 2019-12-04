<?php

function checarNome($str){
    if (strlen($str) < 3) {
        return false;
    } 
    return true;

}

function novoUsuario($nome, $email, $senha){
    $usuariosJson = file_get_contents('./database/usuarios.json');
    $usuariosArray = json_decode($usuariosJson, true);

    $novoUsuario = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
    ];

    if(empty($usuariosArray)){
        $novoUsuario['id'] = 1;
    } else {
        $novoUsuario['id'] = ++
        end($usuariosArray)['id']; 
    }

    $usuariosArray[] = $novoUsuario;

    $novoUsuarioJson = json_encode($usuariosArray);
    $cadastrou = file_put_contents('./database/usuarios.json', $novoUsuarioJson);

    if ($cadastrou) {
        header('Refresh:0');
    }


}

// CRIANDO NOVO PRODUTO
function novoProduto($nome, $preco, $descricao){
    $produtosJson = file_get_contents('./database/produtos.json');
    $produtosArray = json_decode($produtosJson, true);

    $novoProduto = [
        'id' => '',
        'nome' => $_POST['nome'],
        'preco' => $_POST['preco'],
        'descricao' => $_POST['descricao'],
        'foto'=> $nomeFoto
    ];

    if(empty($produtosArray)){
        $novoProduto['id'] = 1;
    } else {
        $novoProduto['id'] = ++
        end($produtosArray)['id']; 
    }

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

function deletarUsuario($id) {
    $usuarios = getUsuarios();
    foreach($usuarios as $index => $usuario)
      if ($usuario['id'] == $id) {
        array_splice($usuarios, $index, 1);
        $json_usuarios = json_encode($usuarios);
        return file_put_contents(ARQUIVO, $json_usuarios);
      }
    
    return false;
  }

?>