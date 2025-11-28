<?php

$HTML  =  '<form method="post" action="passa-produto.php" >  
  ID do produto : <input type="text" name="idalterado" >
  ID do NDK que vai ser inserido : <input type="text" name="idndk" >
  <br><br>
  <label>Servidor que vai ser passado.</label> 
  <br><br>
  <label>Ambiente </label> 
<select name="ambiente" >
  <option value="SANDBOX">SANDBOX</option>
  <option value="PRODUCAO">PRODUCAO</option>
</select>
<br><br>
<label>Lingua  </label> 
<select name="site" >
    <option value="ES">ES</option>
    <option value="PT">PT</option>
    <option value="FR">FR</option>
</select>
<br><br>
  <input type="submit" name="submit" value="Submit">  
</form>';
echo  $HTML;

?>