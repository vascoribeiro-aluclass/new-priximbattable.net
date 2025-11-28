<?php

$action = $_GET["action"];

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT

include("../database.php");

if ($mostra_erros == TRUE) {
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    error_reporting(E_ALL);
}

date_default_timezone_set("Europe/Paris");
header('Content-Type: text/html; charset=utf-8');

if ($action && $action == "alu-update-prices") {

  $increase_price = 180;
  $tax_increase_price = true;
  $percent_tax = 1.2;

  $products = array(
    // portoes de correr standard
    // "58943",
    // "640118",
    // "640110",
    // "640119",
    // "1810",
    // "640111",
    // "640113",
    // "640122",
    // "640112",
    // "640121",
    // "2501",
    // "640115",
    // "108835",
    // "640120",
    // "108902",
    // "2516",
    // "107100",
    // "2128",
    // "107031",
    // "640123",
    // "640114",
    // "2370",
    // "106906",
    // "640117",
    // "2375",
    // "108956",
    // "1658",
    // "2246",
    // "2491",
    // "108772",
    // "2496",
    // "109063",
    // "2272",
    // "107508",
    // "1974",
    // "2521",
    // "2012",
    // "2385",
    // "1986",
    // "1677",
    // "18774",
    // "1962",
    // "2380",
    // "1931",
    // "2511",
    // "2506",
    // "2526",
    // "18780",
    // "640210"

    // portoes de correr a medida
    // "640175",
    // "640168",
    // "106905",
    // "108903",
    // "640176",
    // "8863",
    // "640173",
    // "13648",
    // "640178",
    // "12118",
    // "640169",
    // "640171",
    // "11515",
    // "108834",
    // "640170",
    // "640177",
    // "640179",
    // "18785",
    // "10975",
    // "11394",
    // "107101",
    // "108773",
    // "105902",
    // "9989",
    // "18790",
    // "109065",
    // "640174",
    // "640180",
    // "9265",
    // "9587",
    // "107032",
    // "107509",
    // "9788",
    // "9064",
    // "640172",
    // "11072",
    // "8742",
    // "9466",
    // "2390",
    // "10894",
    // "11917",
    // "10391",
    // "11193",
    // "108957",
    // "10190",
    // "10693",
    // "11716",
    // "640213"

    // portoes batente standard
    // "1689",
    // "640085",
    // "640086",
    // "640081",
    // "640078",
    // "640079",
    // "640091",
    // "640089",
    // "640080",
    // "640082",
    // "84736",
    // "640088",
    // "2239",
    // "2024",
    // "86645",
    // "640083",
    // "640087",
    // "2031",
    // "85102",
    // "1682",
    // "84003",
    // "86313",
    // "2251",
    // "1651",
    // "640084",
    // "640090",
    // "2275",
    // "96450",
    // "2258",
    // "1998",
    // "337262",
    // "2005",
    // "1663",
    // "19426",
    // "2017",
    // "1991",
    // "86822",
    // "1955",
    // "1979",
    // "97109",
    // "1670",
    // "97197",
    // "1936",
    // "18779",
    // "18766",
    // "1967",
    // "2232",
    // "2225",
    // "2265",
    // "640209"

    // portoes batente a medida
    // "640155",
    // "86651",
    // "640154",
    // "640159",
    // "5710",
    // "8651",
    // "84141",
    // "13665",
    // "640156",
    // "7999",
    // "8108",
    // "84808",
    // "6724",
    // "7612",
    // "19428",
    // "640164",
    // "640165",
    // "18784",
    // "640162",
    // "86163",
    // "6253",
    // "640157",
    // "18789",
    // "640160",
    // "6072",
    // "640161",
    // "6362",
    // "640166",
    // "85247",
    // "96371",
    // "640163",
    // "640167",
    // "5601",
    // "7267",
    // "5891",
    // "97110",
    // "97196",
    // "7086",
    // "7709",
    // "7818",
    // "6543",
    // "2279",
    // "8470",
    // "640158",
    // "7539",
    // "96451",
    // "6905",
    // "8289",
    // "7358",
    // "640212"

    // portas de garagem seccionadas
    // "12227",
    // "12228",
    // "170307",
    // "12223",
    // "170397",
    // "321715",
    // "12225",
    // "12226",
    // "170225",
    // "178796",
    // "13613",
    // "171280"
  );

  echo "Starting...<br />";
  $log_file = fopen("update_price_from_specific_product_".date("Y-m-d").".txt", "a");
  fwrite($log_file, "Starting log...\n");

  foreach ($products as $key => $value) {
    $product_info = $database->query("SELECT * FROM sp_product WHERE id_product=$value")->fetch_array();

    if ($tax_increase_price) {
      $price_with_tax = round($product_info["price"] * $percent_tax);
      $new_price_with_tax = round($price_with_tax + $increase_price);

      $new_price_without_tax = round($new_price_with_tax / $percent_tax, 5);

      $log = "Product ID: ".$value." | Old price without tax: ".$product_info["price"]." | Old price with tax: ".$price_with_tax." | New price without tax: ".$new_price_without_tax." | New price with tax: ".$new_price_with_tax." | Increase price with tax | ".date("Y-m-d H:i:s");
    } else {
      $price_with_tax = round($product_info["price"] + ($product_info["price"] * ($percent_tax / 100) + 1));
      $price_without_tax = $product_info["price"];
      $price_without_tax = $price_without_tax + $increase_price;

      $new_price_with_tax = round($price_without_tax + ($price_without_tax * ($percent_tax / 100) + 1));

      $new_price_without_tax = $new_price_with_tax / (($percent_tax / 100) + 1);

      $log = "Product ID: ".$value." | Old price without tax: ".$product_info["price"]." | Old price with tax: ".$price_with_tax." | New price without tax: ".$new_price_without_tax." | New price with tax: ".$new_price_with_tax." | Increase price without tax | ".date("Y-m-d H:i:s");
    }

    // update
    $update_product_info = $database->query("UPDATE sp_product SET price='$new_price_without_tax' WHERE id_product=$value");
    $update_product_info = $database->query("UPDATE sp_product_shop SET price='$new_price_without_tax' WHERE id_product=$value");

    // log
    echo $log."<br />";
    fwrite($log_file, $log."\n");
  }

  echo "Done.<br />";
  fwrite($log_file, "Done.\n");
  fclose($log_file);

} elseif ($action && $action == "alu-update-prices-logs") {

  foreach (glob("*.txt") as $file) {
  echo "<a href=".$file." target='_blank'>".$file."</a>";
  }

} else {

  echo "░░░░░░░░░░░█████████████<br />";
  echo "░░░░░░░░░███░███░░░░░░██<br />";
  echo "███░░░░░██░░░░██░██████████<br />";
  echo "████████░░░░░░████░░░░░░░██<br />";
  echo "████░░░░░░░░░░██░░██████████<br />";
  echo "████░░░░░░░░░░░███░░░░░░░░░██<br />";
  echo "████░░░░░░░░░░░██░░██████████<br />";
  echo "████░░░░░░░░░░░░████░░░░░░░░█<br />";
  echo "████░░░░░░░░░░░░░███░░████░░█<br />";
  echo "█████████░░░░░░░░░░████░░░░░█<br />";
  echo "███░░░░░██░░░░░░░░░░░░░█████<br />";
  echo "░░░░░░░░░███░░░░░░░██████<br />";
  echo "░░░░░░░░░░░██░░░░░░██<br />";
  echo "░░░░░░░░░░░░███░░░░░██<br />";
  echo "░░░░░░░░░░░░░░██░░░░██<br />";
  echo "░░░░░░░░░░░░░░░███░░░██<br />";
  echo "░░░░░░░░░░░░░░░░░██░░░█<br />";
  echo "░░░░░░░░░░░░░░░░░░█░░░█<br />";
  echo "░░░░░░░░░░░░░░░░░░██░██<br />";
  echo "░░░░░░░░░░░░░░░░░░░███<br />";

}
exit;




$database->close();
