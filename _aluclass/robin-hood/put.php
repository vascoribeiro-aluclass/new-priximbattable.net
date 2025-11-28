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

      <div class="container">
        <div class="row">
          <div class="col-12 mt-3 mb-3">
            <p class="h1">Pronto! 😃</p>
            <a href="index.php" class="text-primary">Voltar para início</a> | <a href="put.php" class="text-primary">Reprocessar</a>
          </div>
        </div>
      </div>

      <div class="col-12">

        <?php

        $dadosFR = array(
          "host" => "54.38.160.46",
          "usuario" => "priximbattfr",
          "senha" => "hu9wL5yB8YH4"
        );

        $dadosPT = array(
          "host" => "51.38.10.148",
          "usuario" => "priximbattpt",
          "senha" => "uUN6hLs2d27M"
        );

        $dadosES = array(
          "host" => "51.38.10.50",
          "usuario" => "priximbattes",
          "senha" => "E6x92aN9JeSn"
        );

        $fconnFR = ftp_connect($dadosFR["host"]);
        $fconnPT = ftp_connect($dadosPT["host"]);
        $fconnES = ftp_connect($dadosES["host"]);

        ftp_login($fconnFR, $dadosFR["usuario"], $dadosFR["senha"]);
        ftp_login($fconnPT, $dadosPT["usuario"], $dadosPT["senha"]);
        ftp_login($fconnES, $dadosES["usuario"], $dadosES["senha"]);

        $list = ftp_rawlist($fconnFR, "/httpdocs/_aluclass/robin-hood/imagens/");

        $items = array();
        
        foreach ($list as $child) {
          $chunks = preg_split("/\s+/", $child);
          @list($item['rights'], $item['number'], $item['user'], $item['group'], $item['size'],$item['month'], $item['day'], $item['time'], $item['filename']) = $chunks;
          @$item['type'] = $chunks[0]{0} === 'd' ? 'directory' : 'file';
          @array_splice($chunks, 0, 8);
          @$items[implode(" ", $chunks)] = $item;

          if (@$item['type'] == "file") {
            echo "<p>Upload da imagem ".$item['filename'].".. ✅</p>";
            ftp_get($fconnFR, "imagens/".$item['filename'], "/httpdocs/_aluclass/robin-hood/imagens/".$item['filename'], FTP_BINARY);
            ftp_put($fconnPT, "/httpdocs/img/scenes/ndkcf/".$item['filename'], "imagens/".$item['filename'], FTP_BINARY);
            ftp_put($fconnES, "/httpdocs/img/scenes/ndkcf/".$item['filename'], "imagens/".$item['filename'], FTP_BINARY);

            ftp_delete($fconnFR, "/httpdocs/_aluclass/robin-hood/imagens/".$item['filename']);
            unlink("imagens/".$item['filename']);

            $arraySufix = array("cart_default", "home_default", "large_default", "medium_default", "small_default");
            $filenameWithoutExtension = explode(".", $item['filename']);

            if (file_exists("/httpdocs/_aluclass/robin-hood/imagens/".$filenameWithoutExtension[0].".webp")) {
              echo "<p>Upload da imagem ".$filenameWithoutExtension[0].".webp.. ✅</p>";
              ftp_get($fconnFR, "imagens/".$filenameWithoutExtension[0].".webp", "/httpdocs/_aluclass/robin-hood/imagens/".$filenameWithoutExtension[0].".webp", FTP_BINARY);
              ftp_put($fconnPT, "/httpdocs/img/scenes/ndkcf/".$filenameWithoutExtension[0].".webp", "imagens/".$filenameWithoutExtension[0].".webp", FTP_BINARY);
              ftp_put($fconnES, "/httpdocs/img/scenes/ndkcf/".$filenameWithoutExtension[0].".webp", "imagens/".$filenameWithoutExtension[0].".webp", FTP_BINARY);

              ftp_delete($fconnFR, "/httpdocs/_aluclass/robin-hood/imagens/".$filenameWithoutExtension[0].".webp");
              unlink("imagens/".$filenameWithoutExtension[0].".webp");
            } else {
              echo "<p>Upload da imagem ".$filenameWithoutExtension[0].".webp.. ❌</p>";
            }


            for ($i = 0; $i < count($arraySufix); $i++) {
              echo "<p>Upload da imagem ".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg.. ✅</p>";
              ftp_get($fconnFR, "imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg", "/httpdocs/_aluclass/robin-hood/imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg", FTP_BINARY);
              if (file_exists("/httpdocs/_aluclass/robin-hood/imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp")) {
                ftp_get($fconnFR, "imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp", "/httpdocs/_aluclass/robin-hood/imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp", FTP_BINARY);
              }

              ftp_put($fconnPT, "/httpdocs/img/scenes/ndkcf/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg", "imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg", FTP_BINARY);
              ftp_put($fconnES, "/httpdocs/img/scenes/ndkcf/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg", "imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg", FTP_BINARY);

              ftp_delete($fconnFR, "/httpdocs/_aluclass/robin-hood/imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg");
              unlink("imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".jpg");

              if (file_exists("imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp")) {
                echo "<p>Upload da imagem ".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp.. ✅</p>";
                ftp_put($fconnPT, "/httpdocs/img/scenes/ndkcf/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp", "imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp", FTP_BINARY);
                ftp_put($fconnES, "/httpdocs/img/scenes/ndkcf/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp", "imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp", FTP_BINARY);

                ftp_delete($fconnFR, "/httpdocs/_aluclass/robin-hood/imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp");
                unlink("imagens/thumbs/".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp");
              } else {
                echo "<p>Upload da imagem ".$filenameWithoutExtension[0]."-".$arraySufix[$i].".webp.. ❌</p>";
              }
            }
          }
          
        }

        ftp_close($fconnFR);
        ftp_close($fconnPT);
        ftp_close($fconnES);
        
        ?>
      </div>

    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>