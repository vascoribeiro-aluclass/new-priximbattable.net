<?php

set_time_limit(0);

define("LEVEL_DIR", "../../");
define("EXTENSOES", array("jpg","JPG","jpeg","JPEG","gif","GIF","png","PNG"));
define("TAMANHO", 102400);

$initdir = "img";
$dir = new DirectoryIterator( LEVEL_DIR.$initdir );

$extensoes = EXTENSOES;
$tamanho_minimo = TAMANHO;

$txt_ext = "";
for ($leg_ext=0; $leg_ext < count(EXTENSOES); $leg_ext++) {
    if ($leg_ext == 0) {
        $txt_ext = EXTENSOES[$leg_ext];
    } else {
        $txt_ext = $txt_ext.", ".EXTENSOES[$leg_ext];
    }
}
echo "Exibindo ficheiros (".$txt_ext.") à partir de ".tamanhoArquivo($tamanho_minimo)."<hr>";

foreach($dir as $file) {
    if (!$file->isDot()) {
        if  ( $file->isDir() ) {
            $dirName = $file->getFilename();
            $caminho = $file->getPathname();
            recursivo($caminho, $dirName, $initdir);
        }
 
        if  ( $file->isFile() ) {
            $fileName = $file->getFilename();
            $caminho = $file->getPathname();
            if( in_array(getExtensao($fileName), $extensoes)) {
                if ($file->getSize() > $tamanho_minimo) {
                    $caminho_relativo = $file->getPathname();
                    $caminho_relativo = str_replace(LEVEL_DIR, "/", $caminho_relativo);
                    echo $fileName." - ".tamanhoArquivo($file->getSize())." - <a href='".$caminho_relativo."' target='_blank'>ver ficheiro</a><br>";
                }
            }
        }
    }
}

function getExtensao($file) {
    $extensao = explode(".", $file);
    $extensao = $extensao[count($extensao) - 1];
    return $extensao;
}
 
function recursivo($caminho, $dirName, $initdir){
    $extensoes = EXTENSOES;
    $tamanho_minimo = TAMANHO;
    global $dirName;
    $DI = new DirectoryIterator( $caminho );
    foreach ($DI as $file){
        if (!$file->isDot()) {
            if  ( $file->isDir() ) {
                $dirName = $file->getFilename();
                $caminho = $file->getPathname();
                recursivo($caminho, $dirName, $initdir);
            }
            if  ( $file->isFile() ) {
                $fileName = $file->getFilename();
                if( in_array(getExtensao($fileName), $extensoes)) {
                    if ($file->getSize() > $tamanho_minimo) {
                        $caminho_relativo = $file->getPathname();
                        $caminho_relativo = str_replace(LEVEL_DIR, "/", $caminho_relativo);
                        echo $fileName." - ".tamanhoArquivo($file->getSize())." - <a href='".$caminho_relativo."' target='_blank'>ver ficheiro</a><br>";
                    }
                }
            }
        }
    }
}

function tamanhoArquivo($tamanho) {

    $bytes = floatval($tamanho);
    $arBytes = array(
        0 => array(
            "UNIT" => "TB",
            "VALUE" => pow(1024, 4)
        ),
        1 => array(
            "UNIT" => "GB",
            "VALUE" => pow(1024, 3)
        ),
        2 => array(
            "UNIT" => "MB",
            "VALUE" => pow(1024, 2)
        ),
        3 => array(
            "UNIT" => "KB",
            "VALUE" => 1024
        ),
        4 => array(
            "UNIT" => "B",
            "VALUE" => 1
        ),
    );
    foreach($arBytes as $arItem) {
        if($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}

?>