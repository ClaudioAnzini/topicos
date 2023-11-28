<?php
    include ("banco.php");

    session_start();

    if(isset( $_SESSION["adm"]) && $_SESSION["adm"] == "true"){

        if(isset($_POST["type"]) && $_POST['type'] == 'criarproduto'){
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $imagem_temporaria = $_FILES["imagem"]["tmp_name"];
            $conteudo_imagem = file_get_contents($imagem_temporaria);
            $imagem_base64 = base64_encode($conteudo_imagem);
            $preco = $_POST['preco'];
            
            $id = uniqid();

            $conn->query('INSERT INTO produtos (id, nome, descricao, preco, foto, tipoid) VALUES ("'.$id.'","'.$nome.'","'.$descricao.'",'.$preco.',"'.$imageData.'","12")');
    
        }
    
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="hidden" name="type" value="criarproduto">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text" required><br>
        <label for="descricao">Descricao</label>
        <textarea id="descricao" name="descricao" type="text" required></textarea><br>
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