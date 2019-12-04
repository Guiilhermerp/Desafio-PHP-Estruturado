<?php

    $produtosJson = file_get_contents('./database/produtos.json');
    $produtos = json_decode($produtosJson, true);

    $id = $_GET['id'];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Produto</title>
    </head>

    <body>
        <div class="container">
                <?php foreach($produtos as $produto ): ?>
                <?php if($produto['id'] == $id): ?>
                <h2>
                    <?= $produto['nome'] ?>
                </h2>
                <!-- img -->
                <section>
        
                    <div class="descricao">
                        <h5>Descrição: </h5>
                        <?= $produto['descricao'] ?>
                    </div>
        
                    <div class="preco">
                        <h5>Preço</h5>
                        <?= $produto['preco'] ?>
                    </div>
                        <a href="#" class="btn btn-danger">Excluir produto</a>
                </section>
                <?php endif ?>
                <?php endforeach; ?>
        </div>
    </body>

    </html>