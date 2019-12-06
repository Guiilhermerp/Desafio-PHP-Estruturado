<?php 

include('./includes/headerLogado.php');

session_start();
if (!$_SESSION['usuario']) header('Location: login.php');
    
    function pegaProdutos(){
        $produtosJson = file_get_contents("./database/produtos.json");
        return json_decode($produtosJson, true);
    };
    
    if ($_GET){
        $id = $_GET['id'];
        function procuraProdutos($id) {
            $produtos = pegaProdutos();
            foreach($produtos as $produto)
              if ($produto['id'] == $id)
                return $produto;
            
            return false;
        };
        $produtoID = procuraProdutos($id);
    };
    
    function deletarProduto($id){
        $produtos = pegaProdutos();
        foreach ($produtos as $posicao => $produto)
        if ($produto['id'] == $id){
            array_splice($produtos, $posicao, 1);
            
            $produtosJson = json_encode($produtos);
            return file_put_contents("./database/produtos.json", $produtosJson);
        };
        return false;
    };
    
    if($_POST){
        $deletou = deletarProduto($id);
        if($deletou){ 
            header('Location: indexProdutos.php');
        };
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- inserindo o bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Produto</title>
</head>
<body>
   
    <div class="container mt-4">
        <div class="row justify-content-center">
            <span><h3><?= $produtoID['nome']?></h3></span>
        </div>
        <div class="row justify-content-center my-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= $produtoID['foto']?>" alt="Imagem foto do produto">  
                <div class="card-body">
                    <p class="card-text"><?= $produtoID['descricao']?></p>
                    <form class="row justify-content-around" method="POST">
                        <a href="editProduto.php?id=<?= $produtoID['id'] ?>" class="btn btn-warning">Editar</a>
                        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>

    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
</body>
</html>
<?php include('./includes/footer.php'); ?>