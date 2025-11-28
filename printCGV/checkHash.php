<?php

$getHash = $_GET["h"];

echo base64_decode($getHash)."<hr>";

?>

<form action="checkHash.php">
  <label for="h">Hash to check:</label>
  <input type="text" name="h">
  <button type="submit" value="">Check</button>
</form>
