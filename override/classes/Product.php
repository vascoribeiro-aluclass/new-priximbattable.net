<?php

//require_once _PS_CLASS_DIR_.'AluclassCarrier.php';

class Product extends ProductCore
{

  /* paulo ++ função criada para verificar no front office se há descontos ativos no catálogo */
  public function checaDescontosCatalogo($idcategory = false, $idproduct = false)
  {
    $hoje = date("Y-m-d H:i:s");
    $retorno['cont_rules'] = 0;
    $retorno['reduction'] = 0;
    $retorno['reduction_value'] = 0;
    $retorno['to'] = false;
    $cont_rules = 0;

    if ($idcategory) {
      $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule_customize_product where id_product= '.(int)$idproduct.'  AND NOW() BETWEEN `from` AND `to` ORDER BY id_specific_price_rule ASC');

      if (empty($reducao_catalogo)) {
        $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule_customize where id_category = '.(int)$idcategory.'  AND NOW() BETWEEN `from` AND `to` ORDER BY id_specific_price_rule ASC');
        if (empty($reducao_catalogo)) {
          $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule ORDER BY id_specific_price_rule ASC');
        }
      }

    } else {
      $reducao_catalogo = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price_rule ORDER BY id_specific_price_rule ASC');
    }

    foreach ($reducao_catalogo as $valueReducao) {
      if ($hoje >= $valueReducao['from']) {
        if ($hoje <= $valueReducao['to']) {
          $cont_rules++;
          if ($valueReducao['reduction_type'] == "amount") {
            $legenda_desconto = $valueReducao['reduction'];
            $legenda_desconto_value = $valueReducao['reduction'];
          } else {
            $legenda_desconto = (int)$valueReducao['reduction'] . "%";
            $legenda_desconto_value = (int)$valueReducao['reduction'];
          }
          $retorno['cont_rules'] = $cont_rules;
          $retorno['reduction'] = $legenda_desconto;
          $retorno['reduction_value'] = $legenda_desconto_value;
          // $retorno['to'] = $valueReducao['to'];
          // $nameMonth = array(
          //   "01" => "janvier",
          //   "02" => "février",
          //   "03" => "mars",
          //   "04" => "avril",
          //   "05" => "mai",
          //   "06" => "juin",
          //   "07" => "juillet",
          //   "08" => "août",
          //   "09" => "septembre",
          //   "10" => "octobre",
          //   "11" => "novembre",
          //   "12" => "décembre"
          // );
          // $retorno['from'] = substr($valueReducao['from'], 8, 2) . " " . $nameMonth[substr($valueReducao['from'], 5, 2)];
          // $retorno['to'] = substr($valueReducao['to'], 8, 2) . " " . $nameMonth[substr($valueReducao['to'], 5, 2)];
          $retorno['from'] = $valueReducao['from'];
          $retorno['to'] = $valueReducao['to'];
        }
      }
    }
    return $retorno;
  }

  public static function getNotFreeShipping($idProd)
  {
    if ($idProd == 755098) {
      $notfreeshipping = false;
    } elseif ($idProd == 757177) {
      $notfreeshipping = false;
    } elseif ($idProd == 757409) {
      $notfreeshipping = false;
    } elseif ($idProd == 757419) {
      $notfreeshipping = false;
    } elseif ($idProd == 757422) {
      $notfreeshipping = false;
    } elseif ($idProd == 758914) {
      $notfreeshipping = false;
    } elseif ($idProd == 758917) {
      $notfreeshipping = false;
    } elseif ($idProd == 758930) {
      $notfreeshipping = false;
    } elseif ($idProd == 813396) {
      $notfreeshipping = false;
    } elseif ($idProd == 850337) {
      $notfreeshipping = false;
    } elseif ($idProd == 850353) {
      $notfreeshipping = false;
    } elseif ($idProd == 1020935) {
      $notfreeshipping = false;
    } elseif ($idProd == 1021065) {
      $notfreeshipping = false;
    } elseif ($idProd == 1021069) {
      $notfreeshipping = false;
    } elseif ($idProd == 1021071) {
      $notfreeshipping = false;
    } elseif ($idProd == 1021073) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036497) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036501) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036502) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036503) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036504) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036505) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036506) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036508) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036510) {
      $notfreeshipping = false;
    } elseif ($idProd == 1036509) {
      $notfreeshipping = false;
    } elseif ($idProd == 640125) {
      $notfreeshipping = false;
    } else {
      $notfreeshipping = true;
    }

    return $notfreeshipping;
  }

  /* paulo -- função criada para verificar no front office se há descontos ativos no catálogo */

  public static function getCarrierPrice($idProd, $tax)
  {
    $arrayporte = array();
    $arrayporte = AluclassCarrier::getCarrierBeginPrice($idProd);
    $price = $arrayporte['porteprice'];
    $price = round($price * $tax, 2);

    $arrayporte['porteprice_com_iva'] = $price;
    if ($arrayporte['free_shipping'] && Product::getNotFreeShipping($idProd)) {
      $arrayporte['porteprice_text'] = "" . number_format($price, 2, ',', ' ') . "";
      $arrayporte['porteprice_com_aumento'] = CEIL($arrayporte['porteprice'] / 0.60);
      $arrayporte['porteprice_com_iva_com_aumento'] = CEIL($arrayporte['porteprice_com_iva'] / 0.60);
    } elseif ($arrayporte['half_free_shipping']) {
      $price = round($arrayporte['show_price'] * $tax, 2);
      $arrayporte['porteprice_text'] = number_format($price, 2, ',', ' ') . "";
      $arrayporte['porteprice_com_aumento'] = CEIL(($arrayporte['porteprice'] - $arrayporte['show_price']) / 0.60);
      $arrayporte['porteprice_com_iva_com_aumento'] = CEIL(($arrayporte['porteprice_com_iva'] - $price) / 0.60);
    } else {
      $arrayporte['porteprice_text'] = number_format($price, 2, ',', ' ') . "";
      $arrayporte['porteprice_com_aumento'] = 0;
      $arrayporte['porteprice_com_iva_com_aumento'] = 0;
    }


    return $arrayporte;
  }
  public function infoProdutoCatalogo($id_prod, $preco_com_iva, $bd_preco_sem_iva, $preco_sem_iva, $is_count_ndk = true)
  {

    $fator_iva = $preco_com_iva / $preco_sem_iva;
    $arrayporte = Product::getCarrierPrice($id_prod, $fator_iva);

    $preco_final_sem_desc = (($bd_preco_sem_iva * $fator_iva)) + $arrayporte['porteprice_com_iva_com_aumento'];
    $preco_final_sem_desc_seo = $preco_final_sem_desc;
    $preco_final_sem_desc = number_format($preco_final_sem_desc, 2, ',', '.') . " €";

    $preco_final_sem_desc_sem_portes = (($bd_preco_sem_iva * $fator_iva));
    $preco_final_sem_desc_seo_sem_portes = $preco_final_sem_desc_sem_portes;
    $preco_final_sem_desc_sem_portes = number_format($preco_final_sem_desc_sem_portes, 2, ',', '.') . " €";

    // retornos
    $retorno['preco_corrigido'] = number_format(($bd_preco_sem_iva * $fator_iva), 2, ',', '.') . " €";
    $retorno['preco_final_sem_desc'] = $preco_final_sem_desc;
    $retorno['preco_final_sem_desc_sem_portes'] = $preco_final_sem_desc_sem_portes;
    $retorno['preco_final_sem_desc_seo'] = $preco_final_sem_desc_seo;
    $retorno['preco_final_sem_desc_seo_sem_portes'] = $preco_final_sem_desc_seo_sem_portes;

    return $retorno;
  }

   /* paulo ++ função criada para exibir o preço do produto sem ndk no front office */
  public function infoProduto($id_prod, $preco_com_iva, $preco_sem_iva, $is_count_ndk = true)
  {
    $calcula = 0;
    $cont_num_ndk = 0;
    $price  =0;

    // verifica se tem ndk
    if ($is_count_ndk) {
      $checa_ndk = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'ndk_customization_field WHERE products LIKE "%' . $id_prod . '%"');
      foreach ($checa_ndk as $prods) {
        if (substr_count($prods["products"], ',') > 0) {
          $ids_prods = explode(",", $prods["products"]);
          for ($i_id_prods = 0; $i_id_prods <= substr_count($prods["products"], ','); $i_id_prods++) {
            if ($ids_prods[$i_id_prods] == $id_prod) {
              $cont_num_ndk++;
            }
          }
        } else {
          if ($prods["products"] == $id_prod) {
            $cont_num_ndk++;
          }
        }
      }
    }

    // verifica se tem reducao no produto
    $nota_product = Db::getInstance()->executeS('select (SELECT ROUND(AVG(`grade`), 1) FROM `' . _DB_PREFIX_ . 'product_comment` where `validate` = 1 AND `deleted` = 0 AND `id_product` = ' . $id_prod . ') as nota , (SELECT count(`id_product_comment`) FROM `' . _DB_PREFIX_ . 'product_comment` where `validate` = 1 AND `deleted` = 0 AND `id_product` = ' . $id_prod . ') as num_nota');
    $check_reducao_produto = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'specific_price WHERE id_product=' . $id_prod . ' AND id_cart="0"');
    $cont_reducao = 0;
    foreach ($check_reducao_produto as $reds) {
      $cont_reducao++;
    }
    $retorno['cont_reducao'] = $cont_reducao;
    if ($cont_reducao > 0) {
      if ($check_reducao_produto[0]['reduction_type'] == "amount") {
        $calcula = $check_reducao_produto[0]['reduction'];
      } else {
        $calcula = $price * ($check_reducao_produto[0]['reduction'] / 100);
      }
    }



    // captura info do produto
    $nota_product = Db::getInstance()->executeS('select (SELECT ROUND(AVG(`grade`), 1) FROM `' . _DB_PREFIX_ . 'product_comment` where `validate` = 1 AND `deleted` = 0 AND `id_product` = ' . $id_prod . ') as nota , (SELECT count(`id_product_comment`) FROM `' . _DB_PREFIX_ . 'product_comment` where `validate` = 1 AND `deleted` = 0 AND `id_product` = ' . $id_prod . ') as num_nota');
    $bd_preco_sem_iva = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'product WHERE id_product=' . $id_prod . '');
    $bd_preco_sem_iva = array_key_exists('price', $bd_preco_sem_iva[0]) ? $bd_preco_sem_iva[0]['price'] : 0;
    $fator_iva = $preco_com_iva / $preco_sem_iva;
    $arrayporte = Product::getCarrierPrice($id_prod, $fator_iva);

    $preco_final_sem_desc = (($bd_preco_sem_iva * $fator_iva) - $calcula) + $arrayporte['porteprice_com_iva_com_aumento'];
    $preco_final_sem_desc_seo = $preco_final_sem_desc;
    $preco_final_sem_desc = number_format($preco_final_sem_desc, 2, ',', '.') . " €";

    $preco_final_sem_desc_sem_portes = (($bd_preco_sem_iva * $fator_iva) - $calcula);
    $preco_final_sem_desc_seo_sem_portes = $preco_final_sem_desc_sem_portes;
    $preco_final_sem_desc_sem_portes = number_format($preco_final_sem_desc_sem_portes, 2, ',', '.') . " €";

    $bd_prazos = Db::getInstance()->executeS('SELECT time  FROM `' . _DB_PREFIX_ . 'afgx_product_info_extra_xml` pi
      INNER JOIN `' . _DB_PREFIX_ . 'afgx_product_info_handling_time_xml` ht on ht.id_handling_time = pi.id_handling_time
      WHERE pi.`id_product` =' . $id_prod . '');

    $prazos = 40;
    if (count($bd_prazos) > 0) {
      $prazos = $bd_prazos[0]['time'];
    }

    // retornos
    $retorno['cont_ndk'] = $cont_num_ndk;
    $retorno['preco_corrigido'] = number_format(($bd_preco_sem_iva * $fator_iva), 2, ',', '.') . " €";
    $retorno['preco_final_sem_desc'] = $preco_final_sem_desc;
    $retorno['preco_final_sem_desc_sem_portes'] = $preco_final_sem_desc_sem_portes;
    $retorno['preco_final_sem_desc_seo'] = $preco_final_sem_desc_seo;
    $retorno['preco_final_sem_desc_seo_sem_portes'] = $preco_final_sem_desc_seo_sem_portes;
    $retorno['nota_product'] = $nota_product[0]['nota'];
    $retorno['num_nota_product'] = $nota_product[0]['num_nota'];
    $retorno['porteprice_text'] = $arrayporte['porteprice_text'];
    $retorno['free_shipping'] = $arrayporte['free_shipping'];
    $retorno['half_free_shipping'] = $arrayporte['half_free_shipping'];
    $retorno['time_shipping'] = $prazos;
    $retorno['porteprice_com_iva_com_aumento'] = $arrayporte['porteprice_com_iva_com_aumento'];
    return $retorno;
  }
  /* paulo -- função criada para exibir o preço do produto sem ndk no front office */

  /* paulo ++ função criada para exibir o preço do produto com desconto do catálogo (se necessário) */
  public function precoAtualizadoSEO($preco_final_sem_desc_seo, $reduction_value, $preco_final_sem_desc_seo_sem_portes = 0)
  {
   
    $context = Context::getContext();
    $cartRules = $context->cart->getCartRules();
    $preco_reduction_value = $preco_final_sem_desc_seo_sem_portes - ($preco_final_sem_desc_seo_sem_portes * ($reduction_value / 100));
    $retorno['reduction_percent'] = key_exists(0, $cartRules) ? (key_exists('obj', $cartRules[0]) ? $cartRules[0]['obj']->reduction_percent : 0) : 0;
    $retorno['reduction_percent_price'] = key_exists(0, $cartRules) ? (key_exists('obj', $cartRules[0]) ?  $preco_reduction_value - (($cartRules[0]['obj']->reduction_percent / 100) * $preco_reduction_value) : 0) : 0;
    $retorno['reduction_percent_name'] = key_exists(0, $cartRules) ? (key_exists('obj', $cartRules[0]) ? $cartRules[0]['obj']->name : '') : 0;
    $retorno['preco_com_desconto_sem_formato'] = $preco_final_sem_desc_seo - ($preco_final_sem_desc_seo * ($reduction_value / 100));
    $retorno['preco_com_desconto_catalogo'] = number_format($preco_final_sem_desc_seo - ($preco_final_sem_desc_seo * ($reduction_value / 100)), 2, '.', '');
    $retorno['preco_com_desconto_catalogo_view'] = number_format($preco_final_sem_desc_seo - ($preco_final_sem_desc_seo * ($reduction_value / 100)), 2, ',', ' ') . " €";
    return $retorno;
  }
  /* paulo ++ função criada para exibir o preço do produto com desconto do catálogo (se necessário) */

  public function checkExists3D($id_prod)
  {
    $file3D = "3d/" . $id_prod . ".html";

    if (file_exists($file3D)) {
      $retorno['has3D'] = "yes";
    } else {
      $retorno['has3D'] = "no";
    }

    return $retorno;
  }

  public function getScoreRepairProduct($idProd)
  {
    $sql = "SELECT SUM(`score`) FROM `" . _DB_PREFIX_ . "score_repair` where id_product = " . $idProd;
    $sumRepair = (21 * 9.5) + Db::getInstance()->getValue($sql);

    $sql = "SELECT COUNT(`id`) FROM `" . _DB_PREFIX_ . "score_repair` where id_product = " . $idProd;
    $numRepair = 21 + Db::getInstance()->getValue($sql);

    return round($sumRepair / $numRepair, 1);
  }

  public function getIpUser()
  {
    $ipequl = false;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    $sql = "SELECT ip_config FROM `sc_system_value` where id = 1";
    $ipconfigMarioKart = Db::getInstance()->getValue($sql);
    $arrayipconfigMarioKart = explode(";", $ipconfigMarioKart);



    if (in_array($ip, $arrayipconfigMarioKart)) {
      $ipequl = true;
    }

    return $ipequl;
  }

  public function checkDescriptionFile($product_id) {
    $file_description = "./descricoes/".$product_id.".html";
    if (file_exists($file_description)) {
      return true;
    } else {
      return false;
    }
  }
}
