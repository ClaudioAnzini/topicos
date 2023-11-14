<?php
    include ("banco.php");
    
    session_start();
    if(isset( $_POST['username']) && isset($_POST['password'])){
        if($_POST['username'] == 'admin' && $_POST['password'] == 'password'){
            $_SESSION['adm'] = true;
            echo '<script>
            alert("Logado");
            location = "index.html";
            </script>';
        } else {
            echo '<script>alert("senha incorreta")</script>';
        }
    }

?>

<form method="POST">
    <label for="username">Username:</label>
    <input name="username" id="username" type="text" placeholder="admin"><br>
    <label for="password">Password:</label>
    <input name="password" id="password" type="password" placeholder="password"><br>
    <button type="submit">Enviar</button>
</form>
