<?php
    include ("banco.php");

    session_start();

    if(isset( $_SESSION["adm"]) && $_SESSION["adm"] == "true"){

        if(isset($_POST["type"]) && $_POST['type'] == 'criarproduto'){
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $preco = $_POST['preco'];
            
            $id = uniqid();

            $base64 = $_POST['cover'];
            $base64 = preg_replace('/^data:image\/\w+;base64,/', '', $base64);
            $imageData = base64_decode($base64);

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
        <input type="file" name="imagem" id="imagem" accept="image/*" onchange="processarImagem()" required><br>
        <label for="preco">preço</label>
        $<input type="number" name="preco" id="preco" required><br>
        <button type="submit">Enviar</button>
    </form>
</body>
<script>

        function processarImagem() {
            var inputImagem = document.getElementById('imagem');

            if (inputImagem.files.length > 0) {
                var arquivo = inputImagem.files[0];
                var leitor = new FileReader();

                leitor.onload = function (e) {
                    var imagemBase64 = e.target.result;
                    inputImagem.value = imagemBase64;

                
                };

                leitor.readAsDataURL(arquivo);
            } else {
                console.log("Nenhum arquivo selecionado.");
            }
        }

</script>

</html>

<?php 
    }
    else {
        echo '<script>location = "login.php"</script>';
    }

?>