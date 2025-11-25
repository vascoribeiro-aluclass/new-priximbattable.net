<?php

require __DIR__ . '/vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;

// set info to qr code
$pdfUrl = $_GET['str_devis'];
$qrCode = QrCode::create($pdfUrl)
    ->setSize(300)
    ->setMargin(10)
    ->setForegroundColor(new Color(0, 0, 0))
    ->setBackgroundColor(new Color(255, 255, 255));

$writer = new PngWriter();
$result = $writer->write($qrCode);

// set images to memory
$qrImage = imagecreatefromstring($result->getString());
$logo = imagecreatefrompng(__DIR__ . '/logo.png');
$qrWidth = imagesx($qrImage);
$qrHeight = imagesy($qrImage);

// set size and position (white circle to logo)
$logoSize = 60;
$circleSize = 70;
$circleX = ($qrWidth / 2) - ($circleSize / 2);
$circleY = ($qrHeight / 2) - ($circleSize / 2);

// put the white circle on center
imagesavealpha($qrImage, true);
$white = imagecolorallocate($qrImage, 255, 255, 255);
imagefilledellipse($qrImage, $qrWidth / 2, $qrHeight / 2, $circleSize, $circleSize, $white);

// resize logo and set position
$logoResized = imagecreatetruecolor($logoSize, $logoSize);
imagesavealpha($logoResized, true);
$transparency = imagecolorallocatealpha($logoResized, 0, 0, 0, 127);
imagefill($logoResized, 0, 0, $transparency);
imagecopyresampled($logoResized, $logo, 0, 0, 0, 0, $logoSize, $logoSize, imagesx($logo), imagesy($logo));

// put logo on white circle
$logoX = ($qrWidth / 2) - ($logoSize / 2);
$logoY = ($qrHeight / 2) - ($logoSize / 2);
imagecopy($qrImage, $logoResized, $logoX, $logoY, 0, 0, $logoSize, $logoSize);

// show qr code to save
# show
// header('Content-Type: image/png');
// imagepng($qrImage);

# save
// $qrcode_filename = "qrcode_".date("Ymd_His").".png";
// imagepng($qrImage, __DIR__ . '/'.$qrcode_filename);


$filename = "qrcode_" . date("Ymd_His") . ".png";
$filepath = __DIR__ . '/' . $filename;
$urlpath = "/_aluclass/qrcode/" . $filename;

imagepng($qrImage, $filepath);
// unlink($qrcode_filename); // optional

// destroy informations
imagedestroy($qrImage);
imagedestroy($logoResized);

header('Content-Type: application/json');
echo json_encode(['status' => 'success', 'qrcode_url' => $urlpath]);
