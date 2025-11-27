<?php


include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');
$status = "false";


$action = Tools::getValue('setaction');

switch($action){
  case "sendprofessionnels":
    $customermail = Tools::getValue('customermail');
    $nameCustomer = Tools::getValue('nameCustomer');
    $phoneCustomer = Tools::getValue('phoneCustomer');
    $siretname = Tools::getValue('siretname');



    if( filter_var($customermail, FILTER_VALIDATE_EMAIL) && preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phoneCustomer)){

      Mail::Send(
        (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
        'professionnels', // email template file to be use
        $nameCustomer.' call to action réseau installateur', // email subject
        array(
          '{siret}' => $siretname,
          '{nom}' => $nameCustomer,
          '{mail}' => $customermail, // email content
          '{tel}' => $phoneCustomer, // email content
        ),
        'wm.priximbattable@gmail.com',
        Configuration::get('PS_SHOP_EMAIL'), // receiver email address
        $nameCustomer, //receiver name
        NULL, //from email address
        NULL,  //from name
        NULL, //file attachment
        NULL, //mode smtp
      );

      Mail::Send(
        (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
        'professionnels', // email template file to be use
        $nameCustomer.' call to action réseau installateur', // email subject
        array(
          '{siret}' => $siretname,
          '{nom}' => $nameCustomer,
          '{mail}' => $customermail, // email content
          '{tel}' => $phoneCustomer, // email content
        ),
        'fabrice@aae-pro.com',
        Configuration::get('PS_SHOP_EMAIL'), // receiver email address
        $nameCustomer, //receiver name
        NULL, //from email address
        NULL,  //from name
        NULL, //file attachment
        NULL, //mode smtp
      );

      Mail::Send(
        (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
        'professionnels_client', // email template file to be use
        $nameCustomer.' call to action réseau installateur', // email subject
        array(
          '{siret}' => $siretname,
          '{nom}' => $nameCustomer,
          '{mail}' => $customermail, // email content
          '{tel}' => $phoneCustomer, // email content
        ),
        $customermail,
        Configuration::get('PS_SHOP_EMAIL'), // receiver email address
        $nameCustomer, //receiver name
        NULL, //from email address
        NULL,  //from name
        NULL, //file attachment
        NULL, //mode smtp
      );


      $status = "sucess";
    }else{
      $status = "errorSendMail";
    }

  break;

  case "getwishlist":
    $id_product = Tools::getValue('id_product');

    $objWishlist = new WishList();
    $iswishlist = $objWishlist->isWishList((int)$id_product);

    if($iswishlist)
      $status = "true";

  break;
  case "setwishlist":
    $id_product = Tools::getValue('id_product');

    $objWishlist = new WishList();
    $wishlistArray = $objWishlist->SetWishList($id_product);

    if($wishlistArray['status'] == 'success')
      $status = "true";

  break;
  break;
  case "getcarthistoric":
    $id_cart = Tools::getValue('cart');
    $id_customer = Tools::getValue('customer');

    $link = ShareCart::getlinksharehistoriccart((int)$id_customer,(int)$id_cart);
    header("Location: ".$link);
    $status = "true";
  break;
  case "getorderhistoric":
    $id_order = Tools::getValue('id_order');

    $result_order = Db::getInstance()->executeS("SELECT `id_customer`,`id_cart` FROM `ps_orders` where `reference` = " . (int)$id_order );
    $row_order    = current( $result_order );
    $link = ShareCart::getlinksahrecart((int)$row_order['id_customer'],(int)$row_order['id_cart']);
    header("Location: ".$link);
    $status = "true";
  break;
  case "titleproduct":
    $required = Db::getInstance()->executeS("UPDATE `". _DB_PREFIX_ ."link_customization_product` SET `title` = '" . Tools::getValue('valtitleproduct') . "'
    WHERE  `id_product_customization` = " . (int)Tools::getValue('idtitleproduct') );
    $status = "true";
  break;
  case "dupliceproduct":

    $context = Context::getContext();
    $id_product_old = (int)Tools::getValue('idproduct');

    if(!$id_product_old){
      exit;
    }

    $product_old = new Product($id_product_old);

    $id_product_new =  ShareCart::addProduct(
                          $product_old->ean13,
                          $product_old->reference,
                          $product_old->name,
                          1,
                          $product_old->description,
                          $product_old->description_short ,
                          null,
                          $product_old->price,
                          $product_old->weight,
                          $product_old->id,
                          $product_old->id_category_default ,
                          $product_old->getCategories(),
                          $context->cookie->id_lang,
                          Product::getIdTaxRulesGroupByIdProduct((int)$id_product_old, Context::getContext())
                      );

    $query = "SELECT `id_product_original`, ".$id_product_new." as `id_product_customization`,`link` FROM `ps_link_customization_product` where `id_product_customization` =  ". $id_product_old;
    $resultconfiguracao = Db::getInstance()->executeS($query);
    if(count($resultconfiguracao) > 0){
      $rowconf = $resultconfiguracao[0];
      $text_sql = ShareCart::GetSql($rowconf, _DB_PREFIX_ . "link_customization_product");
      $text_sql_array = Db::getInstance()->execute($text_sql);
    }


    $query = "SELECT `id_customization`, `id_product_attribute`,`id_address_delivery`,`id_cart`,".$id_product_new." as `id_product`,`quantity`,`quantity_refunded`,`quantity_returned`,`in_cart` FROM `". _DB_PREFIX_ . "customization` where `id_product` =  ".$id_product_old;
    $resultProducts = Db::getInstance()->executeS($query);
    $row = $resultProducts[0];
    $id_customization_old = $row['id_customization'];
    unset($row['id_customization']);
    $text_sql = ShareCart::GetSql($row, _DB_PREFIX_ . "customization");

    $text_sql_array = Db::getInstance()->execute($text_sql);
    $id_customization_new = (int)Db::getInstance()->Insert_ID();

    $query = "SELECT `id_customization_field`,`id_product`,`type`,`required`,`is_module`,`is_deleted` FROM `". _DB_PREFIX_ . "customization_field` where `id_product` = ".$id_product_old;
    $resultdatas = Db::getInstance()->executeS($query);

    foreach($resultdatas as $data){
      // sp_customization_field
      $id_customization_field = $data['id_customization_field'];
      unset($data['id_customization_field']);
      $data['id_product'] = $id_product_new;

      $text_sql = ShareCart::GetSql($data, _DB_PREFIX_ . "customization_field");

      $text_sql_array = Db::getInstance()->execute($text_sql);
      $id_customization_field_new = (int)Db::getInstance()->Insert_ID();

      // sp_customized_data
      $query = "SELECT * FROM `". _DB_PREFIX_ . "customized_data` where `index` =  ".$id_customization_field;
      $result_customized_data = Db::getInstance()->executeS($query);

      foreach($result_customized_data as $value_customized_data){
        $value_customized_data['id_customization'] = $id_customization_new;
        $value_customized_data['index'] = $id_customization_field_new;
        $text_sql = ShareCart::GetSql($value_customized_data, _DB_PREFIX_ . "customized_data");

        $text_sql_array = Db::getInstance()->execute($text_sql);
      }

      // sp_customization_field_lang
      $query = "SELECT * FROM `". _DB_PREFIX_ . "customization_field_lang` where `id_customization_field` =  ".$id_customization_field;
      $result_customization_field_lang = Db::getInstance()->executeS($query);

      foreach($result_customization_field_lang as $value_customization_field_lang){
        $value_customization_field_lang['id_customization_field'] = $id_customization_field_new;
        $text_sql = ShareCart::GetSql($value_customization_field_lang, _DB_PREFIX_ . "customization_field_lang");

        $text_sql_array = Db::getInstance()->execute($text_sql);
      }

    }
    $path_render_old = _PS_IMG_DIR_.'scenes/ndkcf/pdf/'.(int)$id_customer_old.'/'.(int)$id_product_old.'/'.$id_customization_old.'/render.html';
    if(file_exists($path_render_old)){
      $path_render_new = _PS_IMG_DIR_.'scenes/ndkcf/pdf/'.(int)$context->customer->id.'/';
      if (!is_dir($path_render_new)) {
        mkdir($path_render_new, 0777, true);
      }
      $path_render_new = _PS_IMG_DIR_.'scenes/ndkcf/pdf/'.(int)$context->customer->id.'/'.(int)$id_product_new.'/';
      if (!is_dir($path_render_new)) {
        mkdir($path_render_new, 0777, true);
      }
      $path_render_new = _PS_IMG_DIR_.'scenes/ndkcf/pdf/'.(int)$context->customer->id.'/'.(int)$id_product_new.'/'.(int)$id_customization_new.'/';
      if (!is_dir($path_render_new)) {
        mkdir($path_render_new, 0777, true);
      }

      copy($path_render_old, $path_render_new.'render.html');
    }
    $context->cart->updateQty(1, $id_product_new, (int)$row['id_product_attribute'], $id_customization_new,'up',(int)$row['id_address_delivery']);
    header("Location: "._PS_BASE_URL_."/panier?action=show");
    exit();
  break;
  case "reviewfix":
    $score = Tools::getValue('score');
    $id_product = Tools::getValue('id_product');

    if(is_numeric($score) && is_numeric($id_product)){
      $sql = "INSERT INTO `ps_score_repair` (`id_product`,`score`) VALUES ('".(int)$id_product."','".(int)$score."'); ";
      $inserscore = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
      $status = "sucess";
    }else{
      $status = "false";
    }

  break;
  case "namechatcheck":
    $name = Tools::getValue('name');
    $mailclient = Tools::getValue('mailclient');

    $sqluser = "SELECT `sc_utilisateur_id` FROM `sc_utilisateur`
            where   `sc_utilisateur_login` like  '%" . $name . "%'";

    $resultuser = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sqluser);
    if (count($resultuser) > 0) {
      $user_id = $resultuser[0]['sc_utilisateur_id'];


      $sqlrappel = "SELECT *
                  FROM sc_rappel
                  WHERE sc_tache_id IS NULL and `sc_rappel_type` = 'chat' and `sc_rappel_email` like '%" . $mailclient . "%'
                  ORDER BY `sc_rappel_date` DESC limit 1";

      $nom_tache =  $name . " respondeu a um chat";

      $resultrappel = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sqlrappel);
      if(count($resultrappel) > 0){

        $sqltache = "INSERT INTO sc_tache
                    SET
                    sc_tache_type='onchat',
                    sc_utilisateur_id=" . $user_id . ",
                    sc_tache_date_creation='" . $resultrappel[0]['sc_rappel_date'] . "',
                    sc_tache_statut='En attente',
                    sc_tache_nom='" . $nom_tache . "',
                    sc_source_id='" . $resultrappel[0]['sc_rappel_id'] . "'";

        $resulttache = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sqltache);
        $sc_tache_id = Db::getInstance()->Insert_ID();

        $sqltache = "UPDATE sc_rappel
            SET
              sc_tache_id='" . $sc_tache_id . "',
              `sc_rappel_type` = 'onchat',
              sc_utilisateur_id=" . $user_id . "
              WHERE sc_rappel_id = '" . $resultrappel[0]['sc_rappel_id'] . "'";

        $resulttache = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sqltache);

      }

      $status = "sucess";

    }

  break;
  case "rappelcoupon":
    $last_name_rappel = Tools::getValue('last_name_rappel');
    $email_rappel = Tools::getValue('email_rappel');
    $email_comercial_rappel = Tools::getValue('email_comercial_rappel');
    $phone_rappel = Tools::getValue('phone_rappel');
    $coderappel = Tools::getValue('coderappel');



    $coderappel = str_replace('"','',$coderappel);
    $coderappel = str_replace('=','',$coderappel);

    $last_name_rappel = str_replace('"','',$last_name_rappel);
    $last_name_rappel = str_replace('=','',$last_name_rappel);

    if(($coderappel == "consultation" || $coderappel == "servicepose" || $coderappel == "rappel" || $coderappel == "chat" || $coderappel == "coupon" || $coderappel == "devis" || $coderappel == "catalogue" || $coderappel == "comparatif" || $coderappel == "blog")
    && filter_var($email_rappel, FILTER_VALIDATE_EMAIL)
    && preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone_rappel)
    ){

      if($coderappel == "devis"){
        $tempoff = 5;
      }else{
        $tempoff = 20;
      }


      $execQueryRappel  = true;
      $sqlCheck = "SELECT
                      CASE
                          WHEN TIMESTAMPDIFF (SECOND,`sc_rappel`.`sc_rappel_date`,'".date("Y-m-d H:i:s")."') >= ".$tempoff."  THEN 1
                          ELSE 0
                      END as ok
                    FROM `sc_rappel`
                    where `sc_rappel_type` = '".$coderappel."' and `sc_rappel_nom` = '".$last_name_rappel."' and `sc_rappel_tel` = '".$phone_rappel."' and  `sc_rappel_email` = '".$email_rappel."'
                    ORDER BY `sc_rappel`.`sc_rappel_date`  DESC limit 1";
      $Check = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sqlCheck);

      if(count($Check) > 0){
        if($Check[0]['ok'] == '0'){
          $execQueryRappel  = false;
        }
      }

      $type_conversion = null;
      $code_conversion = null;
      $date_conversion = null;
      $name_conversion = null;

      if (isset($_COOKIE["PBCLID"])) {
        $type_conversion  = $_COOKIE["PBCLKID_TYPE"];
        $code_conversion = $_COOKIE["PBCLID"];
        $date_conversion = $_COOKIE["PBCLKID_DATE"];
        $name_conversion = 'Lead';
      }

      if($execQueryRappel){
        $sql = "INSERT INTO `sc_rappel` (`sc_rappel_nom`,`sc_rappel_tel`,`sc_rappel_email`,`sc_rappel_type`,`type_conversion`,`code_conversion`,`date_conversion`,`name_conversion`,`sc_rappel_email_comercial`)
        VALUES ('".$last_name_rappel."','".$phone_rappel."','".$email_rappel."','".$coderappel."','".$type_conversion."','".$code_conversion."','".$date_conversion."','".$name_conversion."','".$email_comercial_rappel."'); ";
        $inserscore = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        $status = "sucess";
       }

       if(!$execQueryRappel){
        $status = "temp";
      }

    }elseif($coderappel == "contacterinstalltion"
    && filter_var($email_rappel, FILTER_VALIDATE_EMAIL)
    && preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone_rappel)){

      $nome_rappel = Tools::getValue('nome_rappel');
      $prenome_rappel = Tools::getValue('prenome_rappel');
      $name_rappel = $prenome_rappel. ' ' . $nome_rappel;
      $email_rappel = Tools::getValue('email_rappel');
      $phone_rappel = Tools::getValue('phone_rappel');
      $coderappel = Tools::getValue('coderappel');
      $rappel_message = Tools::getValue('desc_rappel');


      $type_conversion  = null;
      $code_conversion = null;
      $date_conversion = null;
      $name_conversion = null;

      if (isset($_COOKIE["PBCLID"])) {
        $type_conversion  = $_COOKIE["PBCLKID_TYPE"];
        $code_conversion = $_COOKIE["PBCLID"];
        $date_conversion = $_COOKIE["PBCLKID_DATE"];
        $name_conversion = 'Lead';
      }

       $sql = "INSERT INTO `sc_rappel` (`sc_rappel_nom`,`sc_rappel_tel`,`sc_rappel_email`,`sc_rappel_type`,`type_conversion`,`code_conversion`,`date_conversion`,`name_conversion`,`sc_rappel_message`)
                VALUES ('".$name_rappel."','".$phone_rappel."','".$email_rappel."','".$coderappel."','".$type_conversion."','".$code_conversion."','".$date_conversion."','".$name_conversion."','".$rappel_message."'); ";
        $inserscore = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        $status = "sucess";

    }elseif($coderappel == "coupon10"
    && filter_var($email_rappel, FILTER_VALIDATE_EMAIL)
    && preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone_rappel)){


      $sql = "select count(*) as exist_mail FROM `ps_coupon_info` where `mail` like '%".$email_rappel."%';";
      $sp_coupon_info = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
      if($sp_coupon_info[0]['exist_mail'] > 0){
        echo "error";
        exit;
      }

      $sql = "INSERT INTO `ps_coupon_info` (`nom`, `mail`, `tel`) VALUES ('".$last_name_rappel."','".$email_rappel."','".$phone_rappel."');";
      $sp_coupon_info = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);


      $percentage = 5;

      $query = "SHOW TABLE STATUS LIKE 'ps_cart_rule'";
      $item = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);
      $AutoIncrement = $item[0]['Auto_increment'];

      $date_debut = date('Y-m-d');
      $date_fin = date('Y-m-d', strtotime($date_debut . ' + 1 days')); // On ajoute 1 jours
      $date_fin_mail = date('d/m/Y', strtotime($date_debut . ' + 1 days')); // On ajoute 1 jours
      $len_of_gen_str = 2;
      $random_str     = '';
      $chars          = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      $var_size       = strlen($chars);

      for( $x = 0; $x < $len_of_gen_str; $x++ ) {
          $random_str .= $chars[ rand( 0, $var_size - 1 ) ];
      }

      $coupon10 = "PAT" . $random_str.$AutoIncrement;

      $sql = "INSERT INTO ps_cart_rule
      SET id_customer='0',
      date_from='" . $date_debut . "',
      date_to='" . $date_fin . "',
      description='" . $coupon10 . "',
      quantity='1',
      quantity_per_user='1',
      priority='1',
      partial_use='1',
      code='" . $coupon10 . "',
      minimum_amount='0.00',
      minimum_amount_tax='0',
      minimum_amount_currency='1',
      minimum_amount_shipping='0',
      country_restriction='0',
      carrier_restriction='0',
      group_restriction='0',
      cart_rule_restriction='0',
      product_restriction='0',
      shop_restriction='0',
      free_shipping='0',
      reduction_percent= '".$percentage."',
      reduction_amount='0.00',
      reduction_tax='0',
      reduction_currency='1',
      reduction_product='0',
      reduction_exclude_special='0',
      gift_product='0',
      gift_product_attribute='0',
      highlight='0',
      active='1',
      date_add='" . date('Y-m-d h:i:s') . "',
      date_upd='" . date('Y-m-d h:i:s') . "'";

      $sp_cart_rule = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
      $id_cart_rule = Db::getInstance()->Insert_ID();


      $sql = "INSERT INTO sc_code_reduction
		  SET
		    id_cart_rule='" . $id_cart_rule . "',
			  sc_utilisateur_id='-1',
			  sc_code_reduction_code='" . $coupon10 . "',
			  sc_code_reduction_nom='" . $last_name_rappel . "',
			  sc_code_reduction_devis='',
			  sc_code_reduction_email='" . $email_rappel . "',
			  sc_code_reduction_tel='" . $phone_rappel . "',
			  sc_code_reduction_pourcentage='".$percentage."',
			  sc_code_reduction_date_debut='" . $date_debut . "',
			  sc_code_reduction_date_fin='" . $date_fin . "'";

      $sc_code_reduction = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

      $status = "sucess";
      $sql = "INSERT INTO ps_cart_rule_lang
            SET id_cart_rule='" . $id_cart_rule . "',
            id_lang='1',
            name='" . $coupon10 . "'";

      $sp_cart_rule_lang = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

      Mail::Send(
        (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
        'coupon10', // email template file to be use
        'Coupon de '.$percentage.'% Priximbattable', // email subject
        array(
          '{nom}' => $last_name_rappel,
          '{coupon}' => $coupon10, // email content
          '{data}' => $date_fin_mail, // email content
          '{percentage}' => $percentage,
        ),
        $email_rappel,
        Configuration::get('PS_SHOP_EMAIL'), // receiver email address
        $last_name_rappel, //receiver name
        NULL, //from email address
        NULL,  //from name
        NULL, //file attachment
        NULL, //mode smtp
      );

      $status = "sucess";
      $context = Context::getContext();

      $id_cart = $context->cookie->__get('id_cart');

      if (!$id_cart) {
        $cart = new Cart();
        $cart->id_customer = (int)($context->cookie->__get('id_customer'));
        $cart->id_address_delivery = (int)(Address::getFirstCustomerAddressId($cart->id_customer));
        $cart->id_address_invoice = $cart->id_address_delivery;
        $cart->id_lang = (int)($context->cookie->__get('id_lang'));
        $cart->id_currency = (int)($context->cookie->__get('id_currency'));
        $cart->id_carrier = 1;
        $cart->recyclable = 0;
        $cart->gift = 0;
        $cart->add();
        $context->cookie->__set('id_cart', (int)($cart->id));
        $context->cart = $cart;
      } else {
        $cart = new Cart($id_cart);
      }



      $sql = 'SELECT count(*) as packt  FROM
      `' . _DB_PREFIX_ . 'cart_product` cp
      WHERE cp.id_product = 13432  and cp.id_cart = ' . (int) $id_cart;

      $resultPackT = Db::getInstance()->executeS($sql);


      if($resultPackT[0]['packt'] == 0){
        $cart->updateQty(1, 13432, false, null, 'up', 0, null, true);
      }

      if (($cartRule = new CartRule(CartRule::getIdByCode($coupon10)))
       && Validate::isLoadedObject($cartRule) ) {
        if ($error = $cartRule->checkValidity($context, false, true)) {

        } else {
          $cartRules = $context->cart->getCartRules();
          if(key_exists('obj', $cartRules[0])){

          }else{
            $context->cart->addCartRule($cartRule->id);
            $status = "sucessreload";
          }

        }
      }

    }elseif($coderappel == "gagne"
    && filter_var($email_rappel, FILTER_VALIDATE_EMAIL)
    && preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone_rappel)){


      Mail::Send(
        (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
        'gaanecadeau', // email template file to be use
        $last_name_rappel.' s\'est inscrit pour gagner un cadeau', // email subject
        array(
          '{nom}' => $last_name_rappel,
          '{mail}' => $email_rappel, // email content
          '{tel}' => $phone_rappel, // email content
        ),
        'wm.priximbattable@gmail.com',
        Configuration::get('PS_SHOP_EMAIL'), // receiver email address
        $last_name_rappel, //receiver name
        NULL, //from email address
        NULL,  //from name
        NULL, //file attachment
        NULL, //mode smtp
      );

      $status = "sucess";
    }else{
      $status = "false";
    }

  break;

  case "sharelink":
    require_once _PS_CLASS_DIR_.'ShareCart.php';
    $email = Tools::getValue('email');
    $email_comercial_linkcart = Tools::getValue('emailcomercial');
    $name = Tools::getValue('nameCustomer');
    $phone = Tools::getValue('phoneCustomer');
    $idcart = Tools::getValue('sharecart');

    if( filter_var($email, FILTER_VALIDATE_EMAIL)){
     $idcustomer  = ShareCart::getidcustomer($email);
     $link   = ShareCart::getlinksahrecart($idcustomer,$idcart);
     $status = ShareCart::sendmailOrder($email, $link, $name, $email_comercial_linkcart);

     $sql = "INSERT INTO `sc_rappel` (`sc_rappel_nom`,`sc_rappel_tel`,`sc_rappel_email`,`sc_rappel_type`,`sc_rappel_link_cart`,`sc_rappel_email_comercial`) VALUES ('".$name."','".$phone."','".$email."','sharecart','".$link."','".$email_comercial_linkcart."'); ";
     $sc_rappel = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }else{
      $status = "false";
    }

  break;
  case "sharecartlink":
    require_once _PS_CLASS_DIR_.'ShareCart.php';
    $yescart = false;
    $cart = Tools::getValue('cart');
    $cart = ShareCart::safeDecrypt($cart,"12345678123456781234567812345678");

    $cartarray = explode("-",$cart);

    if( count($cartarray) == 3){
      $yescart = true;
    }else{
      $cartarray = explode(";",$cart);

      if( count($cartarray) == 3){
        $yescart = true;
      }
    }

    if($yescart){
      $result = ShareCart::getsahrecart((int)$cartarray[0],(int)$cartarray[1],(int)$cartarray[2]);

      header("Location: https://".$_SERVER['SERVER_NAME']."/panier?action=show");
    }else{
      $status = "false";
    }

  break;
}

echo $status;

?>
