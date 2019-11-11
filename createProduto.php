<?php
// Includes
include 'validacoes.php';

// Definindo valores padroes
$ok_nome = true;
$nome = '';
$preco = 0;
$descricao = '';

// Verificando se o formulário foi enviado
if ($_POST) {

    // Validando se o nome foi digitado
    $ok_nome = checarNome($_POST['nome']);

    // Atribuindo o valor dos $_POST as variaveis
	$nome = $_POST['nome'];
	$preco = $_POST['$preco'];
	$descricao = $_POST['$descricao'];
	
	// PEGANDO produtos.json E TRANSFORMANDO EM ARRAY
    $produtosJson = file_get_contents('./database/produtos.json');
    $produtosArray = json_decode($produtosJson, true);
	
	// CRIANDO NOVO PRODUTO
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

	// pegaProduto();
	// novoProduto($nome, $preco, $descricao);
	// guardaProduto();
	// cadastrou();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=form, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<form method="POST" enctype="multipart/form-data">

		<div class="col-md-6 mb-3">
      		<label for="nome">Nome</label>
      		<input name="nome" type="text" id="nome" value="<?= $nome?>" class="form-control <?php if (!$ok_nome) {echo ('is-invalid');}?>" placeholder="Nome"> 
			<?php if (!$ok_nome): ?> 
	  		<div class="invalid-feedback">
        		Nome inválido.
      		</div>
			<?php endif;?>

			<label for="preco">Preço</label>
			<input class="form-control" type="number" id="preco" name="preco" step="0.01" min="0">
			<label  for="descricao">Descrição</label>
			<input class="form-control" type="text" id="descricao" name="descricao">

			<input type="file" name="foto">
			<button type="submit">Enviar</button>
    	</div>

	</form>
</body>
</html>