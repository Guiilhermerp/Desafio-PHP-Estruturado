<?php
// Includes
include 'validacoes.php';

// Definindo valores padroes
$ok_nome = true;
$nome = '';



// Verificando se o formulário foi enviado
if ($_POST) {

    // Validando se o nome foi digitado
    $ok_nome = checarNome($_POST['nome']);

	novoProduto($_POST['nome'], $_POST['preco'], $_POST['descricao']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=form, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastra Produto</title>
    
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
			<button type="submit" value="Submit" name="submit">Enviar</button>
    	</div>

	</form>
</body>
</html>