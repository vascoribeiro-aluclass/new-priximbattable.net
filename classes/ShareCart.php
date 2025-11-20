
<?php

class ShareCart
{

  public static function safeEncrypt(string $message, string $key): string
  {
    $encoded = base64_encode($message);
    /*
      if (mb_strlen($key, '8bit') !== SODIUM_CRYPTO_SECRETBOX_KEYBYTES) {
          throw new RangeException('Key is not the correct size (must be 32 bytes).');
      }
      $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);

      $cipher = base64_encode(
          $nonce.
          sodium_crypto_secretbox(
              $message,
              $nonce,
              $key
          )
      );
      sodium_memzero($message);
      sodium_memzero($key);
      return $cipher;*/
    return  $encoded;
  }

  public static function safeDecrypt(string $encrypted, string $key): string
  {
    $decoded = base64_decode($encrypted);
    /*$decoded = base64_decode($encrypted);
      $nonce = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
      $ciphertext = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');

      $plain = sodium_crypto_secretbox_open(
          $ciphertext,
          $nonce,
          $key
      );
      if (!is_string($plain)) {
          throw new Exception('Invalid MAC');
      }
      sodium_memzero($ciphertext);
      sodium_memzero($key);
      return  $plain;*/
    return  $decoded;
  }

  public static function createMultiLangField($field)
  {
    $res = array();
    foreach (Language::getIDs(false) as $id_lang) {
      $res[$id_lang] = $field;
    }
    return $res;
  }

  public static function uploadImage($id_entity, $id_image = null, $imgUrl)
  {
    $tmpfile = tempnam(_PS_TMP_IMG_DIR_, 'ps_import');
    $watermark_types = explode(',', Configuration::get('WATERMARK_TYPES'));
    $image_obj = new Image((int)$id_image);
    $path = $image_obj->getPathForCreation();
    $imgUrl = str_replace(' ', '%20', trim($imgUrl));
    // Evaluate the memory required to resize the image: if it's too big we can't resize it.
    if (!ImageManager::checkImageMemoryLimit($imgUrl)) {
      return false;
    }
    if (@copy($imgUrl, $tmpfile)) {
      ImageManager::resize($tmpfile, $path . '.jpg');
      $images_types = ImageType::getImagesTypes('products');
      foreach ($images_types as $image_type) {
        ImageManager::resize($tmpfile, $path . '-' . stripslashes($image_type['name']) . '.jpg', $image_type['width'], $image_type['height']);
        if (in_array($image_type['id_image_type'], $watermark_types)) {
          Hook::exec('actionWatermark', array('id_image' => $id_image, 'id_product' => $id_entity));
        }
      }
    } else {
      unlink($tmpfile);
      return false;
    }
    unlink($tmpfile);
    return true;
  }

  public static function addProduct($ean13, $ref, $name, $qty, $text, $textS, $features, $price, $weight, $imgUrl, $catDef, $catAll, $id_lang,$tax)
  {
    $product = new Product();              // Create new product in prestashop
    $product->ean13 = $ean13;
    $product->reference = $ref;
    $product->name = $name[$id_lang];
    $product->description_short = $textS;
    $product->description = $text;
    $product->id_category_default = $catDef;
    $product->redirect_type = '301';
    $product->price = number_format($price, 6, '.', '');
    $product->weight = $weight;
    $product->minimal_quantity = 1;
    $product->show_price = 1;
    $product->on_sale = 0;
    $product->online_only = 0;
    $product->meta_description = '';
    $product->id_tax_rules_group = $tax;
    $product->link_rewrite = Tools::str2url($name[$id_lang]); // Contribution credits: mfdenis

    $product->add(); // Submit new product
    StockAvailable::setQuantity($product->id, null, $qty); // id_product, id_product_attribute, quantity
    $product->addToCategories(array(102));     // After product is submitted insert all categories

    // Insert "feature name" and "feature value"
    if (is_array($features)) {
      foreach ($features as $feature) {
        $attributeName = $feature['name'];
        $attributeValue = $feature['value'];

        // 1. Check if 'feature name' exist already in database
        $FeatureNameId = Db::getInstance()->getValue('SELECT id_feature FROM ' . _DB_PREFIX_ . 'feature_lang WHERE name = "' . pSQL($attributeName) . '"');
        // If 'feature name' does not exist, insert new.
        if (empty($FeatureNameId)) {
          Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'feature` (`id_feature`,`position`) VALUES (0, 0)');
          $FeatureNameId = Db::getInstance()->Insert_ID(); // Get id of "feature name" for insert in product
          Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'feature_shop` (`id_feature`,`id_shop`) VALUES (' . $FeatureNameId . ', 1)');
          Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'feature_lang` (`id_feature`,`id_lang`, `name`) VALUES (' . $FeatureNameId . ', ' . Context::getContext()->language->id . ', "' . pSQL($attributeName) . '")');
        }

        // 1. Check if 'feature value name' exist already in database
        $FeatureValueId = Db::getInstance()->getValue('SELECT id_feature_value FROM ' . _DB_PREFIX_ . 'feature_value WHERE id_feature_value IN (SELECT id_feature_value FROM `' . _DB_PREFIX_ . 'feature_value_lang` WHERE value = "' . pSQL($attributeValue) . '") AND id_feature = ' . $FeatureNameId);
        // If 'feature value name' does not exist, insert new.
        if (empty($FeatureValueId)) {
          Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'feature_value` (`id_feature_value`,`id_feature`,`custom`) VALUES (0, ' . $FeatureNameId . ', 0)');
          $FeatureValueId = Db::getInstance()->Insert_ID();
          Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'feature_value_lang` (`id_feature_value`,`id_lang`,`value`) VALUES (' . $FeatureValueId . ', ' . Context::getContext()->language->id . ', "' . pSQL($attributeValue) . '")');
        }
        Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'feature_product` (`id_feature`, `id_product`, `id_feature_value`) VALUES (' . $FeatureNameId . ', ' . $product->id . ', ' . $FeatureValueId . ')');
      }
    }


    Image::duplicateProductImages((int)$imgUrl, $product->id, array());
    return $product->id;
  }

  public static function GetSql($row, $table)
  {
    $text_sql = "";
    foreach ($row as $key => $value) {
      $row[$key] = str_replace("'", "''", $row[$key]);
    }
    $string_fields_products = "'" . implode("','", $row) . "'";
    $array_fields_products_key = array_keys($row);

    $string_fields_products_key = "`" . implode("`,`", $array_fields_products_key) . "`";
    $text_sql = "INSERT INTO `" . $table . "` (	$string_fields_products_key) VALUES ($string_fields_products); ";

    return $text_sql;
  }

  public static function getlinksharehistoriccart($idcustomer,$idcart){

    // inserir carrrinho
    // cart inicio
    $query = new DbQuery();
    $query->select('*');
    $query->from('cart');
    $query->where("id_cart= {$idcart}");

    $resultcart = Db::getInstance()->executeS($query);
    $cart = $resultcart[0];
    $text_sql = ShareCart::GetSql($cart,"sp_cart_share");
    $text_sql_array = Db::getInstance()->execute($text_sql);
    $id_cart_share = (int)Db::getInstance()->Insert_ID();
    // cart Fim


    // cart product inicio
    $query = new DbQuery();
    $query->select('`id_cart`,
                    `id_product`,
                    `id_address_delivery`,
                    `id_shop`,
                    `id_product_attribute`,
                    `id_customization`,
                    `quantity`,
                    `date_add`');
    $query->from('cart_product_historic');
    $query->where("id_cart= {$idcart}");
    $query->orderBy('date_add desc');

    $resultHstProducts = Db::getInstance()->executeS($query);

    $resultProducts = array();

    foreach($resultHstProducts as $product){
      if(!array_key_exists($product['id_product'], $resultProducts)){
        $resultProducts[$product['id_product']] = $product;
      }
    }

    foreach($resultProducts as $product){

      if(13432 != $product['id_product']){
        $product['id_cart_share'] = $id_cart_share;
        $text_sql = ShareCart::GetSql($product,"sp_cart_product_share");
        $text_sql_array = Db::getInstance()->execute($text_sql);
         // cart product Fim
        if($product['id_customization'] > 0) {
          $id_product =  $product['id_product'];

            // customization inicio
          $id_customization_old = $product['id_customization'];
          $query = new DbQuery();
          $query->select('*');
          $query->from('customization');
          $query->where("id_customization = {$id_customization_old}");
          $resultProducts = Db::getInstance()->executeS($query);
          $row = $resultProducts[0];
          $row['id_cart_share'] = $id_cart_share;
          $text_sql = ShareCart::GetSql($row,"sp_customization_share");
          $text_sql_array = Db::getInstance()->execute($text_sql);
          // customization end
          // sp_customization_field inicio

          $query = new DbQuery();
          $query->select('*');
          $query->from('customization_field');
          $query->where("id_product = {$id_product}");
          $resultdatas = Db::getInstance()->executeS($query);
          foreach($resultdatas as $data){
            $id_customization_field = $data['id_customization_field'];
            $data['id_cart_share'] = $id_cart_share;
            $text_sql = ShareCart::GetSql($data,"sp_customization_field_share");
            $text_sql_array = Db::getInstance()->execute($text_sql);
            // customization end

            // sp_customized_data inicio
            $query = "SELECT * FROM `". _DB_PREFIX_ . "customized_data` where `index` =  ".$id_customization_field;
            $result_customized_data = Db::getInstance()->executeS($query);

            foreach($result_customized_data as $value_customized_data){
              $value_customized_data['id_cart_share'] = $id_cart_share;
              $text_sql = ShareCart::GetSql($value_customized_data,"sp_customized_data_share");
              $text_sql_array = Db::getInstance()->execute($text_sql);
            }
            // sp_customized_data end

            // sp_customization_field_lang inicio
            $query = "SELECT * FROM `". _DB_PREFIX_ . "customization_field_lang` where `id_customization_field` =  ".$id_customization_field;
            $result_customization_field_lang = Db::getInstance()->executeS($query);

            foreach($result_customization_field_lang as $value_customization_field_lang){
              $value_customization_field_lang['id_cart_share'] = $id_cart_share;
              $text_sql = ShareCart::GetSql($value_customization_field_lang,"sp_customization_field_lang_share");
              $text_sql_array = Db::getInstance()->execute($text_sql);
            }
             // sp_customization_field_lang end

          }
        }
      }
    }
   // fim inserir carrrinho


   $link = ShareCart::safeEncrypt($idcustomer.";".$idcart.";".$id_cart_share,"12345678123456781234567812345678");

    return 'https://'.$_SERVER['SERVER_NAME'].'/ajax/index.php?setaction=sharecartlink&cart='.$link;
  }

  public static function getlinksahrecart($idcustomer, $idcart)
  {

    // inserir carrrinho
    // cart inicio
    $query = new DbQuery();
    $query->select('*');
    $query->from('cart');
    $query->where("id_cart= {$idcart}");

    $resultcart = Db::getInstance()->executeS($query);
    $cart = $resultcart[0];
    $text_sql = ShareCart::GetSql($cart, "sp_cart_share");
    $text_sql_array = Db::getInstance()->execute($text_sql);
    $id_cart_share = (int)Db::getInstance()->Insert_ID();
    // cart Fim

    // cart product inicio
    $query = new DbQuery();
    $query->select('*');
    $query->from('cart_product');
    $query->where("id_cart= {$idcart}");

    $resultProducts = Db::getInstance()->executeS($query);

    foreach ($resultProducts as $product) {

      if (13432 != $product['id_product']) {
        $product['id_cart_share'] = $id_cart_share;
        $text_sql = ShareCart::GetSql($product, "sp_cart_product_share");
        $text_sql_array = Db::getInstance()->execute($text_sql);
        // cart product Fim
        if ($product['id_customization'] > 0) {
          $id_product =  $product['id_product'];

          // customization inicio
          $id_customization_old = $product['id_customization'];
          $query = new DbQuery();
          $query->select('*');
          $query->from('customization');
          $query->where("id_customization = {$id_customization_old}");
          $resultProducts = Db::getInstance()->executeS($query);
          $row = $resultProducts[0];
          $row['id_cart_share'] = $id_cart_share;
          $text_sql = ShareCart::GetSql($row, "sp_customization_share");
          $text_sql_array = Db::getInstance()->execute($text_sql);
          // customization end
          // sp_customization_field inicio

          $query = new DbQuery();
          $query->select('*');
          $query->from('customization_field');
          $query->where("id_product = {$id_product}");
          $resultdatas = Db::getInstance()->executeS($query);
          foreach ($resultdatas as $data) {
            $id_customization_field = $data['id_customization_field'];
            $data['id_cart_share'] = $id_cart_share;
            $text_sql = ShareCart::GetSql($data, "sp_customization_field_share");
            $text_sql_array = Db::getInstance()->execute($text_sql);
            // customization end

            // sp_customized_data inicio
            $query = "SELECT * FROM `" . _DB_PREFIX_ . "customized_data` where `index` =  " . $id_customization_field;
            $result_customized_data = Db::getInstance()->executeS($query);

            foreach ($result_customized_data as $value_customized_data) {
              $value_customized_data['id_cart_share'] = $id_cart_share;
              $text_sql = ShareCart::GetSql($value_customized_data, "sp_customized_data_share");
              $text_sql_array = Db::getInstance()->execute($text_sql);
            }
            // sp_customized_data end

            // sp_customization_field_lang inicio
            $query = "SELECT * FROM `" . _DB_PREFIX_ . "customization_field_lang` where `id_customization_field` =  " . $id_customization_field;
            $result_customization_field_lang = Db::getInstance()->executeS($query);

            foreach ($result_customization_field_lang as $value_customization_field_lang) {
              $value_customization_field_lang['id_cart_share'] = $id_cart_share;
              $text_sql = ShareCart::GetSql($value_customization_field_lang, "sp_customization_field_lang_share");
              $text_sql_array = Db::getInstance()->execute($text_sql);
            }
            // sp_customization_field_lang end

          }
        }
      }
    }
    // fim inserir carrrinho


    $link = ShareCart::safeEncrypt($idcustomer . ";" . $idcart . ";" . $id_cart_share, "12345678123456781234567812345678");

    return 'https://' . $_SERVER['SERVER_NAME'] . '/ajax/index.php?setaction=sharecartlink&cart=' . $link;
  }

  public static function getidcustomer($idcustomer)
  {
    $mail = 0;
    $query = new DbQuery();
    $query->select('email');
    $query->from('customer');
    $query->where("email = '{$idcustomer}'");
    $resultemail = Db::getInstance()->executeS($query);
    if ($resultemail) {
      $mail = $resultemail[0]['email'];
    }

    return $mail;
  }

  public static function getsahrecart($idcustomer, $idcart, $idcartshare)
  {

    $query = "SELECT * FROM `" . _DB_PREFIX_ . "cart_share` where `id_cart` =  " . $idcart . " and `id_cart_share` = " . $idcartshare . " and `num_show` > 0 ";
    $resultProducts = Db::getInstance()->executeS($query);
    $id_customer_old = $resultProducts[0]['id_customer'];

    if (count($resultProducts) > 0) {
      $query = "UPDATE `" . _DB_PREFIX_ . "cart_share` set `num_show` = `num_show`-1 where `id_cart` =  " . $idcart . " and `id_cart_share` = " . $idcartshare;
      $resultProducts = Db::getInstance()->executeS($query);
    } else {
      return false;
    }



    $context = Context::getContext();

    if ($idcustomer > 0) {
      $customer = new Customer($idcustomer);

      $new_cart = new Cart();
      $new_cart->id_lang = (int)($customer->id_lang);
      $new_cart->id_currency = (int)($customer->id_currency);
      $new_cart->id_guest = (int)($customer->id_guest);
      $new_cart->id_shop_group = (int)$customer->id_shop_group;
      $new_cart->id_shop = $customer->id_shop;
      $new_cart->id_customer = (int)($customer->id);
      $new_cart->id_carrier = 1;
      $new_cart->recyclable = 0;
      $new_cart->gift = 0;
      $new_cart->id_address_delivery = (int)(Address::getFirstCustomerAddressId($cart->id_customer));
      $new_cart->id_address_invoice = $cart->id_address_delivery;
      $id_address_delivery = $new_cart->id_address_delivery;
    } else {
      $new_cart = new Cart();
      $new_cart->id_lang = (int)$context->cookie->id_lang;
      $new_cart->id_currency = (int)$context->cookie->id_currency;
      $new_cart->id_guest = (int)$context->cookie->id_guest;
      $new_cart->id_shop_group = (int)$context->shop->id_shop_group;
      $new_cart->id_shop = $context->shop->id;
      $new_cart->id_carrier = 1;
      $new_cart->recyclable = 0;
      $new_cart->gift = 0;
      $new_cart->id_address_delivery = 0;
      $new_cart->id_address_invoice = 0;
      $id_address_delivery = $new_cart->id_address_delivery;
    }

    $context->cart = $new_cart;
    $context->cart->add();
    $context->cookie->id_cart = $new_cart->id;

    // inserir carrrinho

    $query = "SELECT * FROM `" . _DB_PREFIX_ . "cart_product_share` where `id_cart` =  " . $idcart . " and `id_cart_share` = " . $idcartshare;
    $resultProducts = Db::getInstance()->executeS($query);

    foreach ($resultProducts as $product) {
      if (13432 != $product['id_product']) {
        if ($product['id_customization'] > 0) {
          $id_product_old = $product['id_product'];
          $product_old = new Product($product['id_product']);

          $id_product_new =  ShareCart::addProduct(
            $product_old->ean13,
            $product_old->reference,
            $product_old->name,
            1,
            $product_old->description,
            $product_old->description_short,
            null,
            $product_old->price,
            $product_old->weight,
            $product_old->id,
            $product_old->id_category_default,
            $product_old->getCategories(),
            $context->cookie->id_lang,
            Product::getIdTaxRulesGroupByIdProduct((int)$product['id_product'], Context::getContext())
          );

          $query = "SELECT `id_product_original`, ".$id_product_new." as `id_product_customization`,`link`,`title` FROM `sp_link_customization_product` where `id_product_customization` =  ". $id_product_old;
          $resultconfiguracao = Db::getInstance()->executeS($query);
          if (count($resultconfiguracao) > 0) {
            $rowconf = $resultconfiguracao[0];
            $text_sql = ShareCart::GetSql($rowconf, _DB_PREFIX_ . "link_customization_product");
            $text_sql_array = Db::getInstance()->execute($text_sql);
          }

          $id_customization_old = $product['id_customization'];
          unset($product['id_cart_share']);
          unset($product['date_share']);

          $query = "SELECT * FROM `" . _DB_PREFIX_ . "customization_share` where `id_customization` =  " . $id_customization_old . " and `id_cart_share` = " . $idcartshare;
          $resultProducts = Db::getInstance()->executeS($query);
          $row = $resultProducts[0];
          unset($row['id_customization']);
          unset($row['id_cart_share']);
          unset($row['date_share']);
          $row['id_product'] = $id_product_new;
          $row['id_address_delivery'] = $id_address_delivery;
          $row['id_cart'] = $new_cart->id;

          $text_sql = ShareCart::GetSql($row, "sp_customization");
          $text_sql_array = Db::getInstance()->execute($text_sql);
          $id_customization_new = (int)Db::getInstance()->Insert_ID();

          $query = "SELECT * FROM `" . _DB_PREFIX_ . "customization_field_share` where `id_product` = " . $id_product_old . " and `id_cart_share` = " . $idcartshare;
          $resultdatas = Db::getInstance()->executeS($query);

          foreach ($resultdatas as $data) {
            // sp_customization_field
            unset($data['id_cart_share']);
            unset($data['date_share']);
            $id_customization_field = $data['id_customization_field'];
            unset($data['id_customization_field']);
            $data['id_product'] = $id_product_new;

            $text_sql = ShareCart::GetSql($data, "sp_customization_field");
            $text_sql_array = Db::getInstance()->execute($text_sql);
            $id_customization_field_new = (int)Db::getInstance()->Insert_ID();

            // sp_customized_data
            $query = "SELECT * FROM `" . _DB_PREFIX_ . "customized_data_share` where `index` =  " . $id_customization_field . " and `id_cart_share` = " . $idcartshare;
            $result_customized_data = Db::getInstance()->executeS($query);

            foreach ($result_customized_data as $value_customized_data) {
              unset($value_customized_data['id_cart_share']);
              unset($value_customized_data['date_share']);
              $value_customized_data['id_customization'] = $id_customization_new;
              $value_customized_data['index'] = $id_customization_field_new;
              $text_sql = ShareCart::GetSql($value_customized_data, "sp_customized_data");
              $text_sql_array = Db::getInstance()->execute($text_sql);
            }

            // sp_customization_field_lang
            $query = "SELECT * FROM `" . _DB_PREFIX_ . "customization_field_lang_share` where `id_customization_field` =  " . $id_customization_field . " and `id_cart_share` = " . $idcartshare;
            $result_customization_field_lang = Db::getInstance()->executeS($query);

            foreach ($result_customization_field_lang as $value_customization_field_lang) {
              unset($value_customization_field_lang['id_cart_share']);
              unset($value_customization_field_lang['date_share']);
              $value_customization_field_lang['id_customization_field'] = $id_customization_field_new;
              $text_sql = ShareCart::GetSql($value_customization_field_lang, "sp_customization_field_lang");
              $text_sql_array = Db::getInstance()->execute($text_sql);
            }
          }

          $path_render_old = _PS_IMG_DIR_ . 'scenes/ndkcf/pdf/' . (int)$id_customer_old . '/' . (int)$id_product_old . '/' . $id_customization_old . '/render.html';
          if (file_exists($path_render_old)) {
            $path_render_new = _PS_IMG_DIR_ . 'scenes/ndkcf/pdf/' . (int)$context->customer->id . '/';
            if (!is_dir($path_render_new)) {
              mkdir($path_render_new, 0777, true);
            }
            $path_render_new = _PS_IMG_DIR_ . 'scenes/ndkcf/pdf/' . (int)$context->customer->id . '/' . (int)$id_product_new . '/';
            if (!is_dir($path_render_new)) {
              mkdir($path_render_new, 0777, true);
            }
            $path_render_new = _PS_IMG_DIR_ . 'scenes/ndkcf/pdf/' . (int)$context->customer->id . '/' . (int)$id_product_new . '/' . (int)$id_customization_new . '/';
            if (!is_dir($path_render_new)) {
              mkdir($path_render_new, 0777, true);
            }

            copy($path_render_old, $path_render_new . 'render.html');
          }

          $context->cart->updateQty($product['quantity'], $id_product_new, $product['id_product_attribute'], $id_customization_new, 'up', (int)($id_address_delivery));
        } else {

          $context->cart->updateQty($product['quantity'], $product['id_product'], $product['id_product_attribute'], $product['id_customization'], 'up', (int)($id_address_delivery));
        }
        $new_cart->update();
      }
    }
    // fim inserir carrrinho
    return true;
  }


  public static function sendmailOrder($mail, $link, $name,$link_comecial = null)
  {

    Mail::Send(
      (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
      'sharemail', // email template file to be use
      'Partage du panier d\'achat', // email subject
      array(
        '{nom}' => $name,
        '{link}' => $link, // email content
      ),
      $mail,
      Configuration::get('PS_SHOP_EMAIL'), // receiver email address
      $name, //receiver name
      NULL, //from email address
      NULL,  //from name
      NULL, //file attachment
      NULL, //mode smtp
      _PS_MAIL_DIR_, //mode smtp 12
      false,//mode smtp 13
      ($link_comecial ? $link_comecial : null), //mode smtp 14
    );

    return "sucess";
  }
}
