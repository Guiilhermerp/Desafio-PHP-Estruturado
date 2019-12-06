<?php 

include('./includes/headerLogado.php');

session_start();
if (!$_SESSION['usuario']) header('Location: login.php');
    include('validacoesUsuario.php');
    include('userFunction.php');
    
    if($_POST){
        if (empty($erro_user) && 
            empty($erro_mail) && 
            empty($erro_senha) && 
            empty($erro_confirm_senha)
            )
            {
                $usuario = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
                ];
            };
            
            $salvou = guardaUsuario($usuario);
            if ($salvou){
                return header('Location: createUsuario.php');
            };
    };

    if ($_GET && $_GET['id']) {
        if (!$_SESSION['usuario']) return header('Location: createUsuario.php');
        deleteUsuario($_GET['id']);
    }
    
    $usuarios = pegaUsuario();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Novo usuário</title>
</head>
<body>
    <main class="container offset-3">
        <div class="row my-4 offset-1">
            <spam><h2>Cadastrar Usuário</h2></spam>
        </div>
        <form method="post" enctype="multipart/form-data">

            <div class="col-md-6 mt-2">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control">

                <?php if($erro_user) : ?>
                    <div class="alert alert-danger mt-3">Campo obrigatório</div>
                <?php endif ; ?>			
            </div>

            <div class="col-md-6 mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <?php if($erro_mail) : ?>
                    <div class="alert alert-danger mt-3">Campo obrigatório</div>
                <?php endif ; ?>
            </div>
            
            <div class="col-md-6 mt-2">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control">
                <?php if($erro_senha) : ?>
                    <div class="alert alert-danger mt-3">A senha deve ter no mínimo 6 caracteres</div>
                <?php endif ; ?>
            </div>

            <div class="col-md-6 mt-2">
                <label for="senha">Confirmar senha</label>
                <input type="password" name="confirmSenha" id="senha" class="form-control">
                <?php if($erro_confirm_senha) : ?>
                    <div class="alert alert-danger mt-3">Senha não confere</div>
                <?php endif ; ?>
            </div>
        
            <div class="col-6">
                <button type="submit" class="btn btn-secondary mt-2">Enviar</button>
            </div>

        </form>
    </main>

    <div class="container mt-4">
    <span><h2>Todos Usuários</h2></span>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr scope="row">
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['nome'] ?></td>
                        <td><?= $usuario['email'] ?></td>
                        <td><a class="btn btn-warning" href="editUsuario.php?id=<?= $usuario['id'] ?>">Editar</a></th>
                        <td>
                            <form method="GET">
                                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                <buttom type="submit" class="btn btn-danger">Excluir</buttom>
                            </form>
                        </td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
</body>
</html>
<?php include('./includes/footer.php'); ?>