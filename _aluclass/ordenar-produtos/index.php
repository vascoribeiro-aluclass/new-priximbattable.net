<?php

$v = $_GET["v"]; // get view

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

$catarray = array(
  array("0",51,"335,4511,293889,3607,3654"),
  array("58943",52,"4511,347,3607,293889,3654"),
  array("58941",53,"4511,335,1034,949,3607,293889,3654"),
  array("0",55,"293889,3607"),
  array("0",56,"293889,3607"),
  array("0",65,"293889,3607"),
  array("0",21,"342,1058,3610,13403,13483,828,13409,5583,12606,63439,63438"),
  array("0",108,"342,3610,63438,13403,33413,63439,5583,13483,1058,12606"),
  array("0",117,"86314,63438,63439,62088,5583,12606"),
  array("0",23,"0"),
  array("0",106,"0"),
  array("0",126,"0"),
  array("0",127,"0"),
  array("0",24,"863,1041"),
  array("0",26,"0"),
  array("0",25,"3427,3430"),
  array("0",27,"1040,3660"),
  array("0",28,"116"),
  array("0",29,"116"),
  array("0",30,"116"),
  array("3126,3006,2993,3115,3092",32,"111,1108"),
  array("0",111,"0"),
  array("0",104,"0"),
  array("0",112,"0"),
  array("0",33,"1108"),
  array("0",97,"482,112"),
  array("0",94,"112"),
  array("0",98,"112"),
  array("0",98,"112"),
  array("0",100,"0"),
  array("0",119,"0"),
  array("0",120,"0"),
  array("0",121,"0"),
  array("0",99,"112"),
  array("0",83,"0"),
  array("0",84,"0"),
  array("0",85,"0"),
  array("17441",34,"166,13442,13530,758914,758917,758930,640125"),
  array("0",35,"13442"),

);



foreach($catarray as $key=>$value){

  $sqlT = "
  select
        x.ordem,x.price, x.id_product
        FROM(
            SELECT CP.id_product,CP.id_category, CP.position, 0 as ordem,
            (P.price*1.2)-IFNULL((SELECT sum(`reduction`) as sumvaleu
            FROM `ps_specific_price` where `id_product` = CP.`id_product` and `id_currency` in (1,0)  and `reduction_type` = 'amount'),0)+  (CASE WHEN cdp.`free_shipping` = 1 THEN ((cdpp.`price`+40)*1.2) ELSE 0 END) as price

            FROM `ps_category_product` CP
            inner join `ps_product` P on P.`id_product` = CP.`id_product` and P.active = 1
            LEFT JOIN  `ps_customize_delivery_product` cdp on cdp.`id_product` = P.`id_product`
            LEFT JOIN  `ps_customize_delivery_price` cdpp on cdpp.`id_customize_delivery` = cdp.`id_customize_delivery`
            where P.`id_category_default` != 102 and `id_category` = ".$value[1]." and CP.`id_product` in (".$value[0].")

            union all

            SELECT CP.id_product,CP.id_category, CP.position, 1 as ordem,
            (P.price*1.2)-IFNULL((SELECT sum(`reduction`) as sumvaleu
            FROM `ps_specific_price` where `id_product` = CP.`id_product` and `id_currency` in (1,0)  and `reduction_type` = 'amount'),0)+  (CASE WHEN cdp.`free_shipping` = 1 THEN ((cdpp.`price`+40)*1.2) ELSE 0 END) as price

            FROM `ps_category_product` CP
            inner join `ps_product` P on P.`id_product` = CP.`id_product` and P.active = 1
            LEFT JOIN  `ps_customize_delivery_product` cdp on cdp.`id_product` = P.`id_product`
            LEFT JOIN  `ps_customize_delivery_price` cdpp on cdpp.`id_customize_delivery` = cdp.`id_customize_delivery`
            where P.`id_category_default` != 102 and `id_category` = ".$value[1]." and CP.`id_product` not in (".$value[0].",".$value[2].")

            union all

            SELECT CP.id_product,CP.id_category, CP.position, 2 as ordem,
            (P.price*1.2)-IFNULL((SELECT sum(`reduction`) as sumvaleu
            FROM `ps_specific_price` where `id_product` = CP.`id_product` and `id_currency` in (1,0)  and `reduction_type` = 'amount'),0)+  (CASE WHEN cdp.`free_shipping` = 1 THEN ((cdpp.`price`+40)*1.2) ELSE 0 END) as price
            FROM `ps_category_product` CP
            INNER JOIN `ps_product` P on P.`id_product` = CP.`id_product` and P.active = 1
            LEFT JOIN  `ps_customize_delivery_product` cdp on cdp.`id_product` = P.`id_product`
            LEFT JOIN  `ps_customize_delivery_price` cdpp on cdpp.`id_customize_delivery` = cdp.`id_customize_delivery`
            where P.`id_category_default` != 102 and  `id_category` = ".$value[1]." and CP.`id_product`  in (".$value[2].")
        ) x
        GROUP BY x.id_product
    order by x.ordem,x.price,x.id_product";

  $select_exec = $database->query($sqlT);


  $i = 0;
  if ($select_exec->num_rows > 0) {
    while ($item = $select_exec->fetch_array()) {
      $i++;
      $sql = "update `ps_category_product` set `position` = ".$i." where `id_category` = ".$value[1]." and `id_product` = ".$item['id_product']."; ";
      $database->query($sql);

    }
  }
}
$database->close();
