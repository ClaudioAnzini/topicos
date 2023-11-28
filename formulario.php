<?php
    include ("banco.php");

    session_start();

    if(isset( $_SESSION["adm"]) && $_SESSION["adm"] == "true"){

    
?>

<form action="POST">
        <label for="nomeproduto">Nome do produto</label>
        <input name="nomeproduto" id="nomeproduto" type="text">
        
        <label for="descproduto">Nome do produto</label>
        <textarea name="descproduto" id="descproduto" type="text"></textarea>

        <label for="nomeproduto">Nome do produto</label>
        <input id="nomeproduto" type="">


</form>

<?php 
    }
    else {
        echo '<script>location = "login.php"</script>';
    }

?>