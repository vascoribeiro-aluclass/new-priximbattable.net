<?php

$idFieldNDK = @$_POST["idFieldNDK"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto Robin Hood</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <div class="row mt-2 mb-3">
      <div class="col-12">
        <h1>Projeto Robin Hood</h1>
        <p>Roubando imagens dos ricos (FR) para dar aos pobres (PT e ES).</p>
      </div>
    </div>
  </div>

  <div class="container bg-light">
    <div class="row m-3 p-3">

      <?php
      if (!$idFieldNDK) {
      ?>
      <form method="post">
        <div class="col-3 mt-3">
          <label for="idFieldNDK" class="form-label">ID Campo NDK</label>
          <input type="text" class="form-control" id="idFieldNDK" name="idFieldNDK">
        </div>

        <div class="col-9 mt-3">
          <button type="submit" class="btn btn-primary processar">Processar</button>
        </div>
      </form>
      <?php
      } else {
        ?>

        <div class="container">
          <div class="row">
            <div class="col-12 mt-3 mb-3">
              <p class="h1">Pronto! 😃 Agora execute o envio em localhost.</p>
              <a href="index.php" class="text-primary">Voltar para início</a> | <a href="get.php" class="text-primary">Baixar novas imagens</a>
            </div>
          </div>
        </div>

        <div class="col-12 mt-3">
        <?php
        $ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
        $site     = "FR"; // FR, ES, PT

        include("../database.php");

        $exec = $database->query("SELECT * FROM ps_ndk_customization_field_value WHERE id_ndk_customization_field=$idFieldNDK");
        while ($item = $exec->fetch_array()) {

          $itemNow = $item["id_ndk_customization_field_value"];
          $checkAutresRal = $database->query("SELECT value FROM ps_ndk_customization_field_value_lang WHERE id_ndk_customization_field_value=$itemNow")->fetch_array();
          $search = "autres";
          if (!preg_match("/{$search}/i", $checkAutresRal[0])) {

            echo "<p>Download da imagem ".$item["id_ndk_customization_field_value"].".jpg.. (".$checkAutresRal[0].") ✅</p>";
            $url = "https://priximbattable.net/img/scenes/ndkcf/".$item["id_ndk_customization_field_value"].".jpg";
            $content = file_get_contents($url, FILE_BINARY);
            file_put_contents("imagens/".$item["id_ndk_customization_field_value"].".jpg", $content, FILE_BINARY);
            
            $url = "https://priximbattable.net/img/scenes/ndkcf/".$item["id_ndk_customization_field_value"].".webp";
            if (file_exists($url)) {
              echo "<p>Download da imagem ".$item["id_ndk_customization_field_value"].".webp.. (".$checkAutresRal[0].") ✅</p>";
              $content = @file_get_contents($url, FILE_BINARY);
              file_put_contents("imagens/".$item["id_ndk_customization_field_value"].".webp", $content, FILE_BINARY);
            } else {
              echo "<p>Download da imagem ".$item["id_ndk_customization_field_value"].".webp.. (".$checkAutresRal[0].") ❌</p>";
            }

            $arraySufix = array("cart_default", "home_default", "large_default", "medium_default", "small_default");
            $filenameWithoutExtension = explode(".", $item["id_ndk_customization_field_value"]);
            for ($i = 0; $i < count($arraySufix); $i++) {
              echo "<p>Download da imagem ".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg.. (".$checkAutresRal[0].") ✅</p>";
              $url = "https://priximbattable.net/img/scenes/ndkcf/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg";
              $content = file_get_contents($url, FILE_BINARY);
              file_put_contents("imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg", $content, FILE_BINARY);

              $url = "https://priximbattable.net/img/scenes/ndkcf/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp";
              if (file_exists($url)) {
                echo "<p>Download da imagem ".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp.. (".$checkAutresRal[0].") ✅</p>";
                $content = @file_get_contents($url, FILE_BINARY);
                file_put_contents("imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp", $content, FILE_BINARY);
              } else {
                echo "<p>Download da imagem ".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp.. (".$checkAutresRal[0].") ❌</p>";
              }
            }

          }

        }
        ?>
        </div>
        <?php
      }
      ?>

    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    $(document).on("click", ".processar", function() {
      $(this).html("Aguarde, processando...");
      $(this).addClass("disabled");
    });
  </script>

</body>
</html>