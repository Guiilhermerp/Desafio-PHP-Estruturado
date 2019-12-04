<?php

    $nome = '';
    $email = '';
    $senha = '';

    include 'funcoes.php';

    if($_POST){

    novoUsuario($nome, $email, $senha);

    };

    $usuariosJson = file_get_contents('./database/usuarios.json');
    $usuarios = json_decode($usuariosJson, true);

    //Deletar usuario
    if ($_GET && $_GET['id']) {
        if (!$_SESSION['usuario']) return header('Location: createUsuario.php');
        deletarUsuario($_GET['id']);
    }


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">

        <title>Usuarios</title>
    </head>

    <body>
        <div class="container">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input required type="text" name="nome" class="form-control" id="nome" aria-describedby="nomeHelp">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha">
                </div>
                <div class="form-group">
                    <label for="senhaConfirma">Confirmar senha</label>
                    <input type="password" name="senhaConfirma" class="form-control" id="senhaConfirma">
                </div>
                <button type="submit" value="Submit" name="submit">Enviar</button>
            </form>
        </div>

        <div class="container">
            <?php foreach($usuarios as $usuario): ?>
            <p><?= $usuario['nome']?></p>
            <a href="editarUsuario.php?id=<?=$usuario['id']?>" class="btn btn-primary">Editar</a>
            <form action="" method="GET">
                <input type="hidden" name="id" value="<?=$usuario['id']?>">
                <button class="btn btn-danger ">Excluir</button>
            </form>
            <?php endforeach;?>
        </div>
    </body>

    </html>