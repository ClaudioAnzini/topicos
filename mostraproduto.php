<?php

    include ("banco.php");

    $querysidebar = "SELECT * FROM produtos";
    $resultsidebar = $conn->query($querysidebar);

    if ($resultsidebar->num_rows > 0) {

      $currentTopic = "";
      while ($rowsidebar = $resultsidebar->fetch_assoc()) {

        
      echo '<img style="height:20px;" class="sidebar-img" alt="' . $rowsidebar['title'] . '" src="data:image/jpeg;base64,' . $rowsidebar["cover_image"] .'"></img>';

      }
    } else {
        echo 'tem nada';
    }
    ?>