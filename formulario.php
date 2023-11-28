<?php
    include ("banco.php");

    session_start();

    if(isset( $_SESSION["adm"]) && $_SESSION["adm"] == "true"){

        if(isset($_POST["nome"])){
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $base64 = $_POST['imagem'];
            $base64 = preg_replace('/^data:image\/\w+;base64,/', '', $base64);
            $imageData = base64_decode($base64);
            $preco = $_POST['preco'];
            
            $id = uniqid();

            $conn->query('INSERT INTO produtos (ProdutoId, nome, descricao, preco, foto) VALUES ("'.$id.'","'.$nome.'","'.$descricao.'",'.$preco.',"'.$imageData.'")');
    
        }
    
?>

<form action="POST">
        <label for="nomeproduto">Nome do produto</label>
        <input name="nomeproduto" id="nomeproduto" type="text">
        
        <label for="descproduto">Nome do produto</label>
        <textarea name="descproduto" id="descproduto" type="text"></textarea>

        <label for="nomeproduto">Nome do produto</label>
        <input id="nomeproduto" type="">


</form>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text" required><br>
        <label for="descricao">Descricao</label>
        <input id="descricao" name="descricao" type="text" required><br>
        <label for="imagem">imagem</label>
        <input type="file" accept="image/*" id="imagem" name="imagem" required><br>
        <label for="preco">preço</label>
        $<input type="number" name="preco" id="preco" required><br>
        <button type="submit">Enviar</button>
    </form>

</body>
</html>

<?php 
    }
    else {
        echo '<script>location = "login.php"</script>';
    }

?>