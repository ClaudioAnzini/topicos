<?php
        include ("banco.php");

        session_start();
    
        if(isset( $_SESSION["adm"]) && $_SESSION["adm"] == "true"){
    
            if(isset($_POST["type"]) && $_POST['type'] == 'criarproduto'){
                $nome = $_POST["nome"];
                $descricao = $_POST["descricao"];
                $preco = $_POST['preco'];
                $id = uniqid();
                $imageData = $_POST['cover'];
                
    
                $conn->query('INSERT INTO produtos (id, nome, descricao, preco, foto, tipoid) VALUES ("'.$id.'","'.$nome.'","'.$descricao.'",'.$preco.',"'.$imageData.'","12")');
    
            }
        
    ?>
            
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Criar Produtos</title>
    </head>
    <body>

        <h1>Criar Produto</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="criarproduto">
            <label for="nome">Nome</label>
            <input id="nome" name="nome" type="text" required><br>
            <label for="descricao">Descricao</label>
            <textarea id="descricao" name="descricao" type="text" required></textarea><br>
            <label for="cover">Imagem</label>
            <input type="file" id="imageInput" accept="image/*"><br>
            <input type="hidden" id="cover" name="cover" value="">
            <img id="imagePreview" src="" alt="Preview da Imagem" style="max-width: 300px; max-height: 300px;">
          
            <label for="preco">preço</label>
            $<input type="number" name="preco" id="preco" required><br>
            <button type="submit">Enviar</button>
        </form>

        <h1>Criar Tipo</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="criarproduto">
            <label for="nome">Nome</label>
            <input id="nome" name="nome" type="text" required><br>
            <label for="descricao">Descricao</label>
            <textarea id="descricao" name="descricao" type="text" required></textarea><br>
            <label for="cover">Imagem</label>
            <input type="file" id="imageInput" accept="image/*"><br>
            <input type="hidden" id="cover" name="cover" value="">
            <img id="imagePreview" src="" alt="Preview da Imagem" style="max-width: 300px; max-height: 300px;">
          
            <button type="submit">Enviar</button>
        </form>



    </body>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            const imagePreview = document.getElementById('imagePreview');
            const coverInput = document.getElementById('cover');
            const imageInput = document.getElementById('imageInput');

            imagePreview.src = coverInput.value;

            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    coverInput.value = e.target.result;
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
                } else {
                coverInput.value = coverInput.dataset.default;
                imagePreview.src = coverInput.dataset.default;
                }
            });
            });
        </script>
    </html>
    
    <?php 
        }
        else {
            echo '<script>location = "login.php"</script>';
        }
    
    ?>