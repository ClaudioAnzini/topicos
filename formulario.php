<?php
    include ("banco.php");

    session_start();

    if(isset( $_SESSION["adm"]) && $_SESSION["adm"] == "true"){

        if(isset($_POST["type"]) && $_POST['type'] == 'criarproduto'){
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $preco = $_POST['preco'];
            
            $id = uniqid();

            // Verifique se um arquivo foi enviado
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                // Caminho temporário do arquivo
                $caminho_temporario = $_FILES['imagem']['tmp_name'];

                // Leia o conteúdo do arquivo
                $conteudo_imagem = file_get_contents($caminho_temporario);

                // Converta o conteúdo para Base64
                $imagem_base64 = base64_encode($conteudo_imagem);

                // Exiba ou armazene o valor de $imagem_base64 conforme necessário
                $imageData = $imagem_base64;
            } else {
                die("Erro ao processar o upload da imagem.");
            }

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
        <input type="file" name="imagem" id="imagem" accept="image/*" required><br>
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