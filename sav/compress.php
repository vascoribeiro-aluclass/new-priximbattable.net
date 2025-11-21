<?php

function compressImage($sourcePath, $reductionPercentage = 80, $maxIterations = 10) {
    // Obtém informações sobre a imagem original
    $imageInfo = getimagesize($sourcePath);
    if ($imageInfo === false) {
        // Se não for uma imagem válida, ele irá retornar false
        return false;
    }

    $sourceMime = $imageInfo['mime'];
    $sourceWidth = $imageInfo[0];
    $sourceHeight = $imageInfo[1];

    // Carrega a imagem original mediante o tipo de ficheiro
    switch ($sourceMime) {
        case 'image/jpeg':
            $sourceImage = imagecreatefromjpeg($sourcePath);
            break;
        case 'image/png':
            $sourceImage = imagecreatefrompng($sourcePath);
            break;
        case 'image/gif':
            $sourceImage = imagecreatefromgif($sourcePath);
            break;
        default:
            // Se não for um tipo de imagem não suportado ele vai retornar false
            return false;
    }

    // Faz o calculo do tamanho alvo com base na redução percentual
    $sourceFileSize = filesize($sourcePath);
    $targetSizeBytes = $sourceFileSize * (1 - $reductionPercentage / 100);
    $quality = 90; // Inicia com uma qualidade alta
    $iteration = 0;
    $compressedImage = null;

    do {
        ob_start(); // Inicia o buffer de saída

        // Redimensiona a imagem se necessário
        $scale = sqrt($targetSizeBytes / $sourceFileSize);
        $newWidth = $sourceWidth * $scale;
        $newHeight = $sourceHeight * $scale;
        $resizedImage = imagescale($sourceImage, $newWidth, $newHeight);

        // Salva a imagem comprimida na memória com o tipo de arquivo original e a qualidade especificada
        switch ($sourceMime) {
            case 'image/jpeg':
                imagejpeg($resizedImage, null, $quality);
                break;
            case 'image/png':
                $compressionLevel = round((100 - $quality) / 11); // Converte qualidade JPEG para nível de compressão PNG
                imagepng($resizedImage, null, $compressionLevel);
                break;
            case 'image/gif':
                imagegif($resizedImage, null);
                break;
        }

        // Obtém o conteúdo do buffer de saída (imagem comprimida)
        $compressedImage = ob_get_clean();
        $compressedSize = strlen($compressedImage);

        // Ajusta a qualidade e a escala para a próxima iteração
        $quality -= 10;
        $iteration++;
    } while ($compressedSize > $targetSizeBytes && $iteration < $maxIterations && $quality > 10);

    // Libera recursos da imagem
    imagedestroy($sourceImage);
    if (isset($resizedImage)) {
        imagedestroy($resizedImage);
    }

    return $compressedImage;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compress'])) {
    // Verifica se arquivos foram enviados
    if (!empty(array_filter($_FILES['image']['name']))) {
        $reductionPercentage = 80; // Percentual de redução do tamanho
        $currentDate = date("Ymd");

        // Defina o caminho relativo para o diretório 'doc'
        $outputDir = __DIR__ . "/doc/";
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0755, true);
        }

        // Percorre todos os arquivos enviados
        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            if (!empty($tmp_name)) {
                $file_name = "compress" . ($key + 1) . "_" . $currentDate . ".jpg"; // Nome do arquivo de saída
                $file_tmp = $_FILES['image']['tmp_name'][$key];
                $file_type = mime_content_type($file_tmp);

                // Comprime o arquivo atual
                $compressedImage = compressImage($file_tmp, $reductionPercentage);

                if ($compressedImage !== false) {
                    // Salva o arquivo comprimido no servidor
                    $output_file = $outputDir . $file_name;
                    file_put_contents($output_file, $compressedImage);

                    // Exibe o link para o download do arquivo
                    $relativePath = "doc/" . $file_name;
                    echo "<a href='$relativePath' download='$file_name'>$file_name</a><br>";
                } else {
                    echo "<p>Falha ao comprimir a imagem $file_name.</p>";
                }
            }
        }
    } else {
        echo "<p>Nenhum arquivo enviado.</p>";
    }
}

?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprimir Imagem</title>
</head>
<body>
    <h2>Comprimir Imagem</h2>
    <form action="info.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image[]" accept="image/*"><br>
        <input type="file" name="image[]" accept="image/*"><br>
        <input type="file" name="image[]" accept="image/*"><br>
        <button type="submit" name="compress">Comprimir</button>
    </form>
</body>
</html>-->
