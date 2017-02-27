<?php
  require("config.php");
  if(isset($_POST['trans_text'])){
      $trans_text = $_POST['trans_text'];
      $trans_id = $_POST['trans_id'];
      $strquery = "UPDATE `translated_strings` SET `text` = '$trans_text' WHERE `translated_strings`.`id` = $trans_id";
      $conn->query($strquery);
  }
  	echo "<span>".$trans_text."</span>";
?>