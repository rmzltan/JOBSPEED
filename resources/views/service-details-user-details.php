<?php
  include_once("data-connection.php");

  $createConnection=setUpConnection();
  $displayContent = "select * from tbladditionalinfo";

  $posts= $createConnection->query($displayContent) or die($createConnection->error);
  $row = $posts->fetch_assoc();
?>
