<?php
    // Include
    include 'funcoes.php';

    $produtosJson = file_get_contents('./database/produtos.json');
    $produtos = json_decode($produtosJson, true);
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Document</title>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Descrição</th>
                            <th scope="col"><a href="createProduto.php" class="btn btn-secondary"> Novo Produto</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($produtos as $produto ): ?>
                        <tr>
                            <th scope="row">
                                <?= $produto['id']?>
                            </th>
                            <td>
                                <?= $produto['nome']?>
                            </td>
                            <td>
                                R$ <?= $produto['preco']?>
                            </td>
                            <td>
                            <?= $produto['descricao']?>
                            </td>
                            <td>
                                <a href="showProduto.php?id=<?=$produto['id']?>" class="btn btn-secondary">Ver</a>
                            </td>
                            <td></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>