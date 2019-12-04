<?php
    
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Editar Usuario</title>
</head>
<body>
<div class="container">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input required type="text" name="nome" class="form-control" id="nome" aria-describedby="nomeHelp" value="<?= $usuario['nome'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $usuario['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha">
                </div>
                <div class="form-group">
                    <label for="senhaConfirma">Confirmar senha</label>
                    <input type="password" name="senhaConfirma" class="form-control" id="senhaConfirma">
                </div>
                <div class="form-group">
                    <button class="btn btn-warning ">Editar</button>
                </div>
            </form>
        </div>
</body>
</html>