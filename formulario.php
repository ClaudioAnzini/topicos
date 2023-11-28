<?php
        include ("banco.php");

        session_start();
    
        if(isset( $_SESSION["adm"]) && $_SESSION["adm"] == "true"){
    
            if(isset($_POST["type"]) && $_POST['type'] == 'criarproduto'){
                $nome = $_POST["nome"];
                $descricao = $_POST["descricao"];
                $preco = $_POST['preco'];
                $id = uniqid();
                $imageData = $_POST['imagem'];
                
    
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
    <form id="produtoForm" method="POST">
        <input type="hidden" name="type" value="criarproduto">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text" required><br>
        <label for="descricao">Descricao</label>
        <textarea id="descricao" name="descricao" type="text" required></textarea><br>
        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" id="imagem" accept="image/*" required><br>
        <label for="preco">Preço</label>
        $<input type="number" name="preco" id="preco" required><br>
        <button type="submit">Enviar</button>
    </form>

    <script>
        document.getElementById('produtoForm').addEventListener('submit', (event) => {
            event.preventDefault();

            const imageInput = document.getElementById('imagem');
            const imageFile = imageInput.files[0];

            if (!imageFile) {
                alert('Please select an image file');
                return;
            }

            const imageFileReader = new FileReader();
            imageFileReader.onload = (event) => {
                const base64Image = event.target.result;
                const formData = new FormData();
                formData.append('imagem', base64Image);
                formData.append('nome', document.getElementById('nome').value);
                formData.append('descricao', document.getElementById('descricao').value);
                formData.append('preco', document.getElementById('preco').value);

                fetch('', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Produto criado com sucesso!');
                            document.getElementById('produtoForm').reset();
                        } else {
                            alert('Erro ao criar produto');
                        }
                    });
            };
            imageFileReader.readAsDataURL(imageFile);
        });
    </script>
</body>
</html>
    
    <?php 
        }
        else {
            echo '<script>location = "login.php"</script>';
        }
    
    ?>