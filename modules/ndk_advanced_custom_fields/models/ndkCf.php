<?php

/**
 *  Tous droits réservés NDKDESIGN
 *
 *  @author    Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2017 Hendrik Masson
 *  @license   Tous droits réservés
 */

require_once _PS_MODULE_DIR_ . 'ndk_advanced_custom_fields/tools/http_build_url.php';
require_once _PS_CLASS_DIR_ . 'AluclassCarrier.php';

class NdkCf extends ObjectModel
{

  public $products;
  public $categories;
  public $type;
  public $nb_lines;
  public $maxlength;
  public $feature;
  public $target;
  public $target_child;
  public $x_axis;
  public $y_axis;
  public $svg_path;
  public $zone_width;
  public $zone_height;
  public $position;
  public $price;
  public $unit;
  public $preserve_ratio;
  public $price_type;
  public $price_per_caracter;
  /** @var string Name */
  public $name;
  public $admin_name;
  public $notice;
  public $tooltip;
  public $required = false;
  public $recommend = false;
  public $is_visual = false;
  public $configurator = false;
  public $draggable = false;
  public $resizeable = false;
  public $rotateable = false;
  public $orienteable = false;
  public $zindex;
  public $validity;
  public $colors;
  public $stroke_color;
  public $fonts;
  public $sizes;
  public $effects;
  public $alignments;
  public $color_effect;
  public $influences;
  public $quantity_min;
  public $quantity_max;
  public $weight_min;
  public $weight_max;
  public $open_status;
  public $ref_position;
  public static $numfech = 0;


  public static $definition = array(
    'table' => 'ndk_customization_field',
    'primary' => 'id_ndk_customization_field',
    'multilang' => true,
    'fields' => array(
      'required' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
      'recommend' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
      'is_visual' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
      'configurator' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
      'draggable' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
      'resizeable' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
      'rotateable' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
      'orienteable' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
      'type' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
      'nb_lines' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'maxlength' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'feature' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'target' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'target_child' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),

      'x_axis' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'y_axis' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'zone_width' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'zone_height' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'svg_path' =>      array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),

      'position' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
      'ref_position' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'zindex' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'validity' =>      array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
      'products' =>      array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
      'categories' =>      array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
      'price' =>      array('type' => self::TYPE_FLOAT, 'validate' => 'isPrice', 'required' => false),
      'unit' =>      array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
      'preserve_ratio' =>      array('type' => self::TYPE_INT, 'validate' => 'isGenericName'),
      'price_type' =>      array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
      'price_per_caracter' =>      array('type' => self::TYPE_FLOAT, 'validate' => 'isPrice', 'required' => false),
      // Lang fields
      'name' =>         array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
      'admin_name' =>         array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
      'notice' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 5000),
      'tooltip' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 5000),
      'fonts' => array('type' => self::TYPE_HTML, 'lang' => false, 'validate' => 'isCleanHtml', 'size' => 5000),
      'colors' => array('type' => self::TYPE_HTML, 'lang' => false, 'validate' => 'isCleanHtml', 'size' => 5000),
      'stroke_color' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
      'sizes' => array('type' => self::TYPE_HTML, 'lang' => false, 'validate' => 'isCleanHtml', 'size' => 5000),
      'effects' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
      'alignments' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
      'color_effect' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
      'influences' =>      array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),

      'quantity_min' => array(
        'type' => ObjectModel::TYPE_INT,
        'required' => false
      ),
      'quantity_max' => array(
        'type' => ObjectModel::TYPE_INT,
        'required' => false
      ),
      'weight_min' => array(
        'type' => ObjectModel::TYPE_FLOAT,
        'required' => false
      ),
      'weight_max' => array(
        'type' => ObjectModel::TYPE_FLOAT,
        'required' => false
      ),
      'open_status' =>  array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
    ),


  );

  public function add($autodate = true, $nullValues = false)
  {
    return  parent::add($autodate);
  }

  public function update($nullValues = false)
  {
    $return = parent::update($nullValues);
    return $return;
  }



  public function deleteImage($force_delete = false)
  {
    // Hack to prevent the main lookbook image from being deleted in AdminController::uploadImage() when a thumb image is uploaded
    if (isset($_FILES['thumb']) && (!isset($_FILES['image']) || empty($_FILES['image']['name'])))
      return true;

    if (parent::deleteImage()) {
      if (
        file_exists($this->image_dir . 'thumbs/' . $this->id . '-thumb_scene.' . $this->image_format)
        && !unlink($this->image_dir . 'thumbs/' . $this->id . '-thumb_scene.' . $this->image_format)
      )
        return false;
    } else
      return false;
    return true;
  }


  public static function isRequiredCustomization($id_product, $id_category)
  {
    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();

    $id_lang = Context::getContext()->language->id;

    Db::getInstance()->execute('SET SQL_BIG_SELECTS=1');

    $fields = Db::getInstance()->getRow('
				SELECT COUNT(cf.`id_ndk_customization_field`)
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_shop` cfs ON (cfs.`id_ndk_customization_field`= cf.`id_ndk_customization_field`AND cfs.`id_shop` = ' . (int)Context::getContext()->shop->id . ')
				WHERE FIND_IN_SET( ' . (int)$id_product . ', cf.`products`) OR FIND_IN_SET( ' . (int)$id_category . ', cf.`categories`)
				AND cf.type NOT IN(99)
				AND (cf.required = 1 OR cf.quantity_min > 0 OR cf.weight_min > 0)');
    if ($fields["COUNT(cf.`id_ndk_customization_field`)"] > 0)
      return true;
    else
      return false;
  }

  //---------------------------   vasco - Janela PVC   --------------------------
  public static function GetCalculoPVC($field)
  {

    $valueUnit = $field['valuePrice'];
    $dimensions = array();
    foreach (Tools::getValue('ndkcsfield') as $field => $value) {
      if (!empty($value) && $value != '') {
        $values = array();
        if (is_array($value)) {
          foreach ($value as $k => $v) {
            if ($k == 'width') {
              $dimensions[$field] = $value;
              $values[] = $field;
            }
          }
          foreach ($values as $value) {
            if (count($dimensions) > 0 && isset($dimensions[$value])) {
              if (
                isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
              ) {
                $result = (($dimensions[$value]['height'] / 1000) * ($dimensions[$value]['width'] / 1000)) * $valueUnit;
              }
            }
          }
        }
      }
    }
    return $result;
  }
  public static function GetCalculoPerPVC($aluclass_pvc, $field, $fields, $i)
  {
    $val_pvc = 0;
    $dimensions = array();
    foreach (Tools::getValue('ndkcsfield') as $field => $value) {
      if (!empty($value) && $value != '') {
        $values = array();
        if (is_array($value)) {
          foreach ($value as $k => $v) {
            if ($k == 'width') {
              $dimensions[$field] = $value;
              $values[] = $field;
            }
          }
          foreach ($values as $value) {
            if (count($dimensions) > 0 && isset($dimensions[$value])) {
              if (
                isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
              ) {
                $price_pvc =  NdkCf::getDimensionPrice($value, $dimensions[$value]['width'], $dimensions[$value]['height']);
                $sql = 'SELECT `price` FROM `' . _DB_PREFIX_ . 'product` WHERE `id_product` =' . (int)Tools::getValue('id_product');
                $price_prodcut = Db::getInstance()->getValue($sql);
                $val_pvc = ($price_pvc + $price_prodcut) * ($aluclass_pvc[$fields[$i]['id_ndk_customization_field_value']] / 100);
              }
            }
          }
        }
      }
    }
    return $val_pvc;
  }

  //---------------------------   vasco - Função para Calculo Portas de Entrada   --------------------------
  public static function GetCalculoAileOrTapee($arrayAluclassIdField, $idField, $field)
  {
    if (in_array($idField, $arrayAluclassIdField)) {
      $valueUnit = $field['valuePrice'];
      $dimensions = array();
      foreach (Tools::getValue('ndkcsfield') as $field => $value) {
        if (!empty($value) && $value != '') {
          $values = array();
          if (is_array($value)) {
            foreach ($value as $k => $v) {
              if ($k == 'width') {
                $dimensions[$field] = $value;
                $values[] = $field;
              }
            }
            foreach ($values as $value) {
              if (count($dimensions) > 0 && isset($dimensions[$value])) {
                if (
                  isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                  && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                  && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                ) {
                  $result = ((($dimensions[$value]['height'] * 2) + $dimensions[$value]['width']) / 1000) * $valueUnit;
                }
              }
            }
          }
        }
      }
      return $result;
    }

    return false;
  }

  public static function GetPriceCustomField($id_field, $value, $id_lang)
  {

    $sql =
      'SELECT ncf.`id_ndk_customization_field`,ncf.`type`, ncf.`price` as price, ncf.`unit`, ncf.`price_type`, ncf.`price_per_caracter`, ncfv.`id_ndk_customization_field_value`, ncfv.`price`as valuePrice, ncfvl.value, ncfv.`reference`
			FROM `' . _DB_PREFIX_ . 'ndk_customization_field` ncf
      INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value` ncfv ON (ncfv.`id_ndk_customization_field`= ncf.`id_ndk_customization_field` )

      INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` ncfvl ON (ncfvl.`id_ndk_customization_field_value`= ncfv.`id_ndk_customization_field_value` AND ncfvl.`value` = "' . pSQL($value) . '" AND ncfvl.`id_lang` = ' . (int)$id_lang . ' AND ncfvl.`value` <> "" )
			WHERE (ncf.`id_ndk_customization_field` = ' . (int)$id_field . ' AND (ncf.price > 0 OR ncf.price_per_caracter > 0)) OR (ncfv.`id_ndk_customization_field` = ' . (int)$id_field . ' AND ncfvl.`value` = "' . pSQL($value) . '" AND ncfvl.`id_lang` = ' . (int)$id_lang . ')';

    return Db::getInstance()->executeS($sql);
  }

  public static function getCustomFields($id_product, $id_category)
  {

    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    $jsonDatas = array();
    $id_lang = Context::getContext()->language->id;

    Db::getInstance()->execute('SET SQL_BIG_SELECTS=1');

    $fields = Db::getInstance()->executeS('
				SELECT cf.`id_ndk_customization_field`, cf.`type`, cf.`feature`, cf.`target`, cf.`target_child`, cf.`price` , cf.`unit`, cf.`preserve_ratio`, cf.`price_type`, cf.`price_per_caracter`, cf.`nb_lines`, cf.`maxlength`, cf.`x_axis`, cf.`y_axis`, cf.`zone_width`, cf.`svg_path`, cf.`zone_height`, cf.`required`, cf.`recommend`, cf.`is_visual`, cf.`configurator`, cf.`draggable`, cf.`resizeable`, cf.`rotateable`, cf.`orienteable`, cf.`position`, cf.`ref_position`, cf.`zindex`, cf.`fonts`, cf.`colors`,  cf.`stroke_color`, cf.`sizes`, cf.effects, cf.alignments, cf.color_effect, cf.`validity`, cf.`quantity_min`, cf.`quantity_max`,cf.`weight_min`, cf.`weight_max`, cf.`open_status`, cf.influences, cfl.`name`, cfl.`notice`, cfl.`tooltip`, g.id_ndk_customization_field_group, g.mode
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_lang` cfl ON (cfl.`id_ndk_customization_field`= cf.`id_ndk_customization_field`AND cfl.`id_lang` = ' . (int)$id_lang . ' )
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_group` g ON (FIND_IN_SET( cf.`id_ndk_customization_field`, g.`fields`))
				INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_shop` cfs ON (cfs.`id_ndk_customization_field`= cf.`id_ndk_customization_field`AND cfs.`id_shop` = ' . (int)Context::getContext()->shop->id . ')
				WHERE FIND_IN_SET( ' . (int)$id_product . ', cf.`products`) OR FIND_IN_SET( ' . (int)$id_category . ', cf.`categories`) AND cf.type NOT IN(99)
				 GROUP BY  cf.`id_ndk_customization_field` ORDER BY cf.`position`,cf.`id_ndk_customization_field`');

    $i = 0;

    foreach ($fields as $field) {
      if ($field['price_type'] == 'percent')
        $usetax = false;
      else {
        $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));

        if (Product::$_taxCalculationMethod == 0) {
          $usetax = true;
        } else {
          $usetax = false;
        }
      }

      $fields[$i]['fonts'] = '';
      $fields[$i]['fontLink'] = '';
      $fields[$i]['colors'] = '';
      $fields[$i]['sizes'] = '';
      $fields[$i]['effects'] = '';
      $fields[$i]['alignments'] = '';
      if (file_exists(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . $field['target_child'] . '.jpg')) {

        list($width, $height, $type, $attr) = getimagesize(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . $field['target_child'] . '.jpg');
        $fields[$i]['target_original_width'] = $width;
        $fields[$i]['target_original_height'] = $height;
      } else {
        $fields[$i]['target_original_width'] = 0;
        $fields[$i]['target_original_height'] = 0;
      }

      if ($field['target'] == 0) {
        $fields[$i]['target_child'] = 0;
        $fields[$i]['y_axis'] = 0;
        $fields[$i]['x_axis'] = 0;
        $fields[$i]['svg_path'] = 0;
      } elseif ($field['target'] > 0) {
        if ($field['target_child'] == 0) {
          $target = new NdkCf((int)$field['target']);
          $targetValues = array();
          foreach ($target->getValuesId() as $value)
            array_push($targetValues, $value['id']);

          $fields[$i]['target_child'] = implode('|', $targetValues);
        }
      }

      if ($field['fonts'] != '') {
        $fields[$i]['fontLink'] = $field['fonts'];
        //Context::getContext()->controller->addCSS($field['fonts'], 'all');
        $families = explode('family=', $field['fonts']);
        $families = $families[1];
        $fonts = explode('|', $families);
        $fonts = str_replace(array('\'', '"', "'"), '', $fonts);

        $fields[$i]['fonts'] = array();
        $f = 0;
        foreach ($fonts as $key => $value) {
          $fields[$i]['fonts'][] = str_replace('+', ' ', $value);
          //var_dump(str_replace('+', ' ', $value));
          $f++;
        }
      }


      if ($field['colors'] != '') {
        $fields[$i]['colors'] = explode(';', $field['colors']);
      } else {
        $fields[$i]['colors'] = explode(';', Configuration::get('NDK_ACF_COLORS'));
      }


      if ($field['sizes'] != '') {
        $fields[$i]['sizes'] = explode(';', $field['sizes']);
      }

      if ($field['effects'] != '') {
        $fields[$i]['effects'] = explode(';', $field['effects']);
      }
      if ($field['alignments'] != '') {
        $fields[$i]['alignments'] = explode(';', $field['alignments']);
      }

      $fields[$i]['is_picto'] = file_exists(_PS_IMG_DIR_ . 'scenes/ndkcf/pictos/' . $field['id_ndk_customization_field'] . '.jpg');
      $fields[$i]['is_mask_image'] = file_exists(_PS_IMG_DIR_ . 'scenes/ndkcf/mask/' . $field['id_ndk_customization_field'] . '.jpg');


      if (file_exists(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . $field['id_ndk_customization_field'] . '.csv')) {
        $csv_file = _PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . $field['id_ndk_customization_field'] . '.csv';
        //mise à jour csv si besoin
        $reqs = Db::getInstance()->getRow('SELECT COUNT(id_ndk_customization_field) as nb FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE id_ndk_customization_field = ' . (int)$field['id_ndk_customization_field']);
        if ($reqs['nb'] < 1)
          Ndkcf::recordCsv($field['id_ndk_customization_field']);

        $fields[$i]['is_csv'] = true;

        $fields[$i]['price_range_width'] = Db::getInstance()->executeS('SELECT DISTINCT(width) FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE id_ndk_customization_field = ' . (int)$field['id_ndk_customization_field']);

        $fields[$i]['price_range_height'] = Db::getInstance()->executeS('SELECT DISTINCT(height) FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE id_ndk_customization_field = ' . (int)$field['id_ndk_customization_field']);

        $fields[$i]['price_range_min_width'] = Db::getInstance()->getRow('SELECT MIN(width + 0.0) as min FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE id_ndk_customization_field = ' . (int)$field['id_ndk_customization_field'] . ' AND width !=""')['min'];

        $fields[$i]['price_range_min_height'] = Db::getInstance()->getRow('SELECT MIN(height + 0.0) as min FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE id_ndk_customization_field = ' . (int)$field['id_ndk_customization_field'] . ' AND height !=""')['min'];

        $fields[$i]['price_range_max_width'] = Db::getInstance()->getRow('SELECT MAX(width + 0.0) as max FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE id_ndk_customization_field = ' . (int)$field['id_ndk_customization_field'])['max'];

        $fields[$i]['price_range_max_height'] = Db::getInstance()->getRow('SELECT MAX(height + 0.0) as max FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv WHERE id_ndk_customization_field = ' . (int)$field['id_ndk_customization_field'])['max'];
      } else
        $fields[$i]['is_csv'] = false;


      $fields[$i]['values'] = Db::getInstance()->executeS(
        'SELECT cfv.`id_ndk_customization_field_value` as id, cfvl.`value`, cfvl.`textmask`, cfvl.`description`, cfvl.`tags`, cfv.`price`, cfv.`color`, cfv.`set_quantity`, cfv.`quantity`, cfv.`default_value`,cfv.`input_type` ,  cfv.`quantity_min`, cfv.`quantity_max`, cfv.`step_quantity`, cfv.`id_product_value`, cfv.`influences_restrictions`, cfv.`influences_obligations`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field_value` cfv
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` cfvl ON (cfvl.`id_ndk_customization_field_value`= cfv.`id_ndk_customization_field_value`AND cfvl.`id_lang` = ' . (int)Context::getContext()->language->id . ')
				WHERE cfv.`id_ndk_customization_field` = ' . (int)$field['id_ndk_customization_field'] . '  AND NOT FIND_IN_SET( ' . (int)$id_product . ', cfv.`excludes_products`) AND cfvl.`id_lang` = ' . (int)Context::getContext()->language->id . ' GROUP BY cfv.`id_ndk_customization_field_value` ORDER BY cfv.position asc, cfv.id_ndk_customization_field_value asc'
      );

      if ($fields[$i]['price_type'] == 'percent')
        $usetax = false;

      $fields[$i]['price'] = $usetax ? $product_tax_calculator->addTaxes($field['price']) : $field['price'];
      $fields[$i]['price_per_caracter'] = $usetax ? $product_tax_calculator->addTaxes($field['price_per_caracter']) : $field['price_per_caracter'];

      $j = 0;
      $colorizesvg = false;



      foreach ($fields[$i]['values'] as $value) {

        if ($fields[$i]['price_type'] == 'percent')
          $usetax = false;


        $fields[$i]['values'][$j]['price'] = $usetax ? $product_tax_calculator->addTaxes($value['price']) : $value['price'];

        if (file_exists(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . $value['id'] . '.svg')) {
          $fields[$i]['values'][$j]['issvg'] = true;
          $colorizesvg = true;
          $fields[$i]['values'][$j]['svgcode'] = str_replace(']>', '', Tools::file_get_contents(_PS_ROOT_DIR_ . '/img/scenes/ndkcf/' . $value['id'] . '.svg'));
        } else
          $fields[$i]['values'][$j]['issvg'] = false;

        if (file_exists(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/thumbs/' . $value['id'] . '-texture.jpg'))
          $fields[$i]['values'][$j]['is_texture'] = true;

        else
          $fields[$i]['values'][$j]['is_texture'] = false;

        if (file_exists(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . $value['id'] . '.jpg'))
          $fields[$i]['values'][$j]['is_image'] = true;

        else
          $fields[$i]['values'][$j]['is_image'] = false;


        if ($value['influences_restrictions'] != '') {
          $i_values = explode(',', $value['influences_restrictions']);
          foreach ($i_values as $v) {
            if ($v != '') {
              if ($v[0] . $v[1] . $v[2] == 'all') {
                $jsonDatas[$fields[$i]['id_ndk_customization_field']][$value['id']]['restrictions'][] = explode('-', $v)[1] . '|all|all';
              } else {
                $vObj = Db::getInstance()->getRow('
										SELECT v.id_ndk_customization_field, vl.value
										FROM ' . _DB_PREFIX_ . 'ndk_customization_field_value v
										LEFT JOIN ' . _DB_PREFIX_ . 'ndk_customization_field_value_lang vl ON (vl.id_ndk_customization_field_value = v.id_ndk_customization_field_value AND vl.id_lang = ' . (int)Context::getContext()->language->id . ')
										WHERE v.id_ndk_customization_field_value = ' . (int)$v);
                $jsonDatas[$fields[$i]['id_ndk_customization_field']][$value['id']]['restrictions'][] = $vObj['id_ndk_customization_field'] . '|' . $v . '|' . $vObj['value'];
              }
            } else {
              $jsonDatas[$fields[$i]['id_ndk_customization_field']][$value['id']]['restrictions'][] = '';
            }
          }
        }

        if ($value['influences_obligations'] != '') {
          $i_values = explode(',', $value['influences_obligations']);
          foreach ($i_values as $v) {
            if ($v != '') {
              if ($v[0] . $v[1] . $v[2] == 'all') {
                $jsonDatas[$fields[$i]['id_ndk_customization_field']][$value['id']]['obligations'][] = explode('-', $v)[1] . '|all|all';
              } else {
                $vObj = Db::getInstance()->getRow('
										SELECT v.id_ndk_customization_field, vl.value
										FROM ' . _DB_PREFIX_ . 'ndk_customization_field_value v
										LEFT JOIN ' . _DB_PREFIX_ . 'ndk_customization_field_value_lang vl ON (vl.id_ndk_customization_field_value = v.id_ndk_customization_field_value AND vl.id_lang = ' . (int)Context::getContext()->language->id . ')
										WHERE v.id_ndk_customization_field_value = ' . (int)$v);

                $jsonDatas[$fields[$i]['id_ndk_customization_field']][$value['id']]['obligations'][] = $vObj['id_ndk_customization_field'] . '|' . $v . '|' . $vObj['value'];
              }
            } else {
              $jsonDatas[$fields[$i]['id_ndk_customization_field']][$value['id']]['obligations'][] = '';
            }
          }
        }

        $j++;
      }



      $fields[$i]['colorizesvg'] = $colorizesvg;

      $i++;
    }

    $return = array('fields' => $fields, 'jsonDatas' => $jsonDatas);
    return $return;
  }
  public static function recordCsv($id)
  {
    if (file_exists(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . (int)$id . '.csv')) {
      $csv_file = _PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . (int)$id . '.csv';
      $csv_array = Ndkcf::csvToPriceRange($csv_file);
      Db::getInstance()->execute('
				   DELETE FROM `' . _DB_PREFIX_ . 'ndk_customization_field_csv`
				   WHERE id_ndk_customization_field = ' . (int)$id);

      $i = 0;
      $sql = array();
      foreach ($csv_array as $width => $value) {
        $j = 0;
        foreach ($value as $height => $price) {
          if ($j > 0)
            // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - save price as text - start
            $sql[] = 'INSERT into ' . _DB_PREFIX_ . 'ndk_customization_field_csv (id_ndk_customization_field, width, height, price) VALUES (' . (int)$id . ', \'' . pSQL($width) . '\', \'' . pSQL($height) . '\', \'' . $price . '\')';
          // Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - save price as text - end
          //original $sql[] = 'INSERT into '._DB_PREFIX_.'ndk_customization_field_csv (id_ndk_customization_field, width, height, price) VALUES ('.(int)$id.', \''.pSQL($width).'\', \''.pSQL($height).'\', '.(float)$price.')';

          $j++;
        }
        $i++;
      }
      foreach ($sql as $req)
        Db::getInstance()->execute($req);

      # Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - Code for manipulate CSV - start
      $aluclass_array = array();

      $aluclass_file = fopen($csv_file, "r");
      $aluclass_csv_file_temp = (int)$aluclass_id . "_temp.csv";
      $aluclass_fp = fopen($aluclass_csv_file_temp, "w");

      while (($aluclass_line = fgetcsv($aluclass_file)) !== false) {
        $aluclass_array[] = $aluclass_line;
      }

      for ($aluclass_i = 0; $aluclass_i < count($aluclass_array); $aluclass_i++) {
        $aluclass_cont_pipe = substr_count($aluclass_array[$aluclass_i][0], '|');
        $aluclass_string = "";
        if ($aluclass_cont_pipe == 0) {
          $aluclass_string = $aluclass_string . $aluclass_array[$aluclass_i][0];
          $aluclass_vetor = array($aluclass_i => $aluclass_string);
        } else {
          for ($aluclass_indice = 0; $aluclass_indice < substr_count($aluclass_array[$aluclass_i][0], '|') + 1; $aluclass_indice++) {
            $aluclass_valores = explode(';', $aluclass_array[$aluclass_i][0]);
            if (strstr($aluclass_valores[$aluclass_indice], "|")) {
              $aluclass_result = substr($aluclass_valores[$aluclass_indice], 0, -5);
            } else {
              $aluclass_result = $aluclass_valores[$aluclass_indice];
            }

            if ($aluclass_indice < $aluclass_cont_pipe) {
              $aluclass_string = $aluclass_string . $aluclass_result . ";";
              $aluclass_vetor = array($aluclass_i => $aluclass_string);
            } else {
              $aluclass_string = $aluclass_string . $aluclass_result;
              $aluclass_vetor = array($aluclass_i => $aluclass_string);
            }
          }
        }
        fputcsv($aluclass_fp, $aluclass_vetor, ",");
      }

      fclose($aluclass_fp);
      fclose($aluclass_file);

      unlink($csv_file);
      rename($aluclass_csv_file_temp, $csv_file);
      # Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - Code for manipulate CSV - end

    }
  }


  public static function csvToPriceRange($csv_file)
  {
    $data_csv = Tools::file_get_contents($csv_file);
    //$data_csv_lines = explode("\n", $data_csv);
    $data_csv_lines = preg_split("/\\r\\n|\\r|\\n/", $data_csv);
    $dcl = 0;
    $csv_lines_array = array();
    $csv_col_array = array();
    $csv_array = array();

    foreach ($data_csv_lines as $key => $value) {
      $line_csv = explode(';', $value);
      if ($dcl === 0)
        $removed = array_shift($line_csv);

      $csv_lines_array[] = $line_csv;
      if ($dcl === 0) {
        foreach ($line_csv as $l => $v)
          $csv_col_array[] = $v;
      }

      $dcl++;
    }
    foreach ($csv_col_array as $col => $value_col) {
      foreach ($csv_lines_array as $line => $values_line) {
        $csv_array[$value_col][$values_line[0]] = $values_line[$col + 1];
      }
    }
    return $csv_array;
  }


  public static function getPriceTab($field)
  {
    if (file_exists(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . (int)$field . '.csv')) {
      $csv_file = _PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . (int)$field . '.csv';
      $csv_array = NdkCf::csvToPriceRange($csv_file);

      $data_csv = Tools::file_get_contents($csv_file);
      $data_csv_lines = explode("\r", $data_csv);
      $table = array();
      foreach ($data_csv_lines as $key => $value) {
        $new_line = explode(';', $value);
        $table[] = $new_line;
      }
      return $table;
    }
  }

  //lier à la bdd CSV
  public static function getDimensionPrice_old($field, $width, $height)
  {
    if (file_exists(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . (int)$field . '.csv')) {
      $csv_file = _PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . (int)$field . '.csv';
      $csv_array = NdkCf::csvToPriceRange($csv_file);

      $widthKey = array();
      $heightKey = array();

      $field = new NdkCf((int)$field);
      if ($field->type == 21 || $field->type == 19) {
        foreach ($csv_array as $key => $value) {
          if ($width == $key) {

            $widthKey[] = $key;
            $line = $value;
          }
        }

        $item_price = str_replace(',', '.', $line[$height]);
        return $item_price;
      } else {

        foreach ($csv_array as $key => $value) {
          if ($width <= $key) {
            $widthKey[] = $key;
            $line = $value;
          }
        }
        $line = $csv_array[min($widthKey)];

        foreach ($line as $key => $value) {
          if ($height <= $key) {
            $heightKey[] = $value;
          }
        }

        return min($heightKey);
      }
    }
  }

  public static function getDimensionPrice($field, $width, $height)
  {
    if (file_exists(_PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . (int)$field . '.csv')) {
      $csv_file = _PS_IMG_DIR_ . 'scenes/' . 'ndkcf/' . (int)$field . '.csv';
      //$csv_array = NdkCf::csvToPriceRange($csv_file);

      $widthKey = array();
      $heightKey = array();

      $field = new NdkCf((int)$field);
      if ($field->type == 21 || $field->type == 19) {
        //on cherche la valeur exacte
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow(
          'SELECT price FROM ' . _DB_PREFIX_ . 'ndk_customization_field_csv
						WHERE id_ndk_customization_field = ' . (int)$field->id . '
						AND width = \'' . $width . '\' AND height = \'' . $height . '\''
        );
        //var_dump($result);
        $item_price = str_replace(',', '.', $result['price']);
        return $item_price;
      } else {
        $csv_array = NdkCf::csvToPriceRange($csv_file);
        foreach ($csv_array as $key => $value) {
          if ($width <= $key) {
            $widthKey[] = $key;
            $line = $value;
          }
        }
        $line = $csv_array[min($widthKey)];

        foreach ($line as $key => $value) {
          if ($height <= $key) {
            $heightKey[] = $value;
          }
        }

        return min($heightKey);
      }
    }
  }


  public static function getCustomFieldsForCreation($id_product, $id_category)
  {

    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
    if (Product::$_taxCalculationMethod == 0) {
      $usetax = true;
    } else {
      $usetax = false;
    }

    $id_lang = Context::getContext()->language->id;
    $fields = Db::getInstance()->executeS('
				SELECT cf.`id_ndk_customization_field`, cf.`price`, cf.`unit`, cf.`price_type`, cf.`price_per_caracter`, cfl.`name`, cfv.`id_ndk_customization_field_value`, cfvl.`value`, cfv.`price` as valuePrice , cfv.`set_quantity`, cfv.`quantity`, cfv.`default_value`,cfv.`input_type`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_lang` cfl ON (cfl.`id_ndk_customization_field`= cf.`id_ndk_customization_field`AND cfl.`id_lang` = ' . (int)$id_lang . ' )
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value` cfv ON (cfv.`id_ndk_customization_field`= cf.`id_ndk_customization_field`)
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` cfvl ON (cfvl.`id_ndk_customization_field_value`= cf.`id_ndk_customization_field`AND cfvl.`id_lang` = ' . (int)$id_lang . ')
				WHERE (FIND_IN_SET( ' . (int)$id_product . ', cf.`products`) OR FIND_IN_SET( ' . (int)$id_category . ', cf.`categories`)) AND cf.type NOT IN(5, 99)
				 GROUP BY  cf.`id_ndk_customization_field` ORDER BY cf.`ref_position`');

    $i = 0;
    foreach ($fields as $field) {
      $fields[$i]['values'] = Db::getInstance()->executeS(
        'SELECT cfv.`id_ndk_customization_field_value` as id, cfvl.`value`, cfv.`reference`, cfvl.`description`,  cfv.`price`, cfv.`color`, cfv.`set_quantity`, cfv.`quantity`, cfv.`default_value`,cfv.`input_type` , cfv.`quantity_min`, cfv.`quantity_max`, cfv.`step_quantity`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field_value` cfv
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` cfvl ON (cfvl.`id_ndk_customization_field_value`= cfv.`id_ndk_customization_field_value`AND cfvl.`id_lang` = ' . (int)$id_lang . ')
				WHERE cfv.`id_ndk_customization_field` = ' . (int)$field['id_ndk_customization_field'] . '  AND NOT FIND_IN_SET( ' . (int)$id_product . ', cfv.`excludes_products`) '
      );

      if ($fields[$i]['price_type'] == 'percent')
        $usetax = false;

      if ($usetax) {
        $fields[$i]['price'] = $product_tax_calculator->addTaxes($field['price']);
        $fields[$i]['price_per_caracter'] = $product_tax_calculator->addTaxes($field['price_per_caracter']);
      }

      $j = 0;
      foreach ($fields[$i]['values'] as $value) {
        $fields[$i]['values'][$j]['price'] = $usetax ? $product_tax_calculator->addTaxes($value['price']) : $value['price'];
        $j++;
      }

      $i++;
    }

    return $fields;
  }

  public static function getFieldFromPrice($id_product, $id_category)
  {

    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
    if (Product::$_taxCalculationMethod == 0) {
      $usetax = true;
    } else {
      $usetax = false;
    }

    $fields = Db::getInstance()->executeS('
				SELECT cf.`price`, cf.`unit`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				WHERE (FIND_IN_SET( ' . (int)$id_product . ', cf.`products`) OR FIND_IN_SET( ' . (int)$id_category . ', cf.`categories`)) AND cf.type = 99
				 GROUP BY  cf.`id_ndk_customization_field` ORDER BY cf.`id_ndk_customization_field` LIMIT 1');

    $i = 0;
    foreach ($fields as $field) {

      if ($usetax) {
        $fields[$i]['price'] = $product_tax_calculator->addTaxes($field['price']);
      }

      $i++;
    }

    return $fields;
  }

  public static function findByName($id_product, $id_category, $name)
  {
    $id_lang = Context::getContext()->language->id;
    $fields = Db::getInstance()->executeS('
				SELECT cf.`id_ndk_customization_field`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_lang` cfl ON (cfl.`id_ndk_customization_field`= cf.`id_ndk_customization_field`AND cfl.`id_lang` = ' . (int)$id_lang . ' )
				WHERE (FIND_IN_SET( ' . (int)$id_product . ', cf.`products`) OR FIND_IN_SET( ' . (int)$id_category . ', cf.`categories`))
				AND cfl.`name` = \'' . mysql_real_escape_string($name) . '\'');
    if (sizeof($fields) > 0)
      return $fields[0]['id_ndk_customization_field'];
    else
      return 0;
  }

  public static function getOneCustomFields($id_ndk_customization_field)
  {
    $id_lang = Context::getContext()->language->id;
    $fields = Db::getInstance()->executeS('
				SELECT cf.`id_ndk_customization_field`, cfl.`name`, CONCAT(cfl.`name`, \' (\', cfl.`admin_name`, \')\') as adminname,  cf.`is_visual`, cf.`configurator` ,cf.`draggable`,cf.`resizeable`, cf.`rotateable`, cf.`orienteable`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_lang` cfl ON (cfl.`id_ndk_customization_field`= cf.`id_ndk_customization_field`AND cfl.`id_lang` = ' . (int)$id_lang . ' )
				WHERE cfl.`id_lang` = ' . (int)$id_lang . ' and  cf.`id_ndk_customization_field` = ' . (int)$id_ndk_customization_field . '
				GROUP BY  cf.`id_ndk_customization_field` ORDER BY cf.`id_ndk_customization_field`');

    $i = 0;
    foreach ($fields as $field) {
      $fields[$i]['values'] = Db::getInstance()->executeS(
        'SELECT cfv.`id_ndk_customization_field_value` as id, cfvl.`value`,  cfvl.`description`, cfv.`price`, cfv.`color`, cfv.`set_quantity`, cfv.`quantity`, cfv.`default_value`,cfv.`input_type` ,  cfv.`quantity_min`, cfv.`quantity_max`, cfv.`step_quantity`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field_value` cfv
				INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` cfvl ON (cfvl.`id_ndk_customization_field_value`= cfv.`id_ndk_customization_field`AND cfvl.`id_lang` = ' . (int)$id_lang . ')
				WHERE cfv.`id_ndk_customization_field` = ' . (int)$field['id_ndk_customization_field']
      );

      $i++;
    }


    return $fields;
  }

  public static function getAllCustomFields()
  {
    $id_lang = Context::getContext()->language->id;
    $fields = Db::getInstance()->executeS('
				SELECT cf.`id_ndk_customization_field`, cfl.`name`, CONCAT(cfl.`name`, \' (\', cfl.`admin_name`, \')\') as adminname,  cf.`is_visual`, cf.`configurator` ,cf.`draggable`,cf.`resizeable`, cf.`rotateable`, cf.`orienteable`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_lang` cfl ON (cfl.`id_ndk_customization_field`= cf.`id_ndk_customization_field`AND cfl.`id_lang` = ' . (int)$id_lang . ' )
				WHERE cfl.`id_lang` = ' . (int)$id_lang . '
				GROUP BY  cf.`id_ndk_customization_field` ORDER BY cf.`id_ndk_customization_field`');

    $i = 0;
    foreach ($fields as $field) {
      $fields[$i]['values'] = Db::getInstance()->executeS(
        'SELECT cfv.`id_ndk_customization_field_value` as id, cfvl.`value`,  cfvl.`description`, cfv.`price`, cfv.`color`, cfv.`set_quantity`, cfv.`quantity`, cfv.`default_value`,cfv.`input_type` ,  cfv.`quantity_min`, cfv.`quantity_max`, cfv.`step_quantity`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field_value` cfv
				INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` cfvl ON (cfvl.`id_ndk_customization_field_value`= cfv.`id_ndk_customization_field`AND cfvl.`id_lang` = ' . (int)$id_lang . ')
				WHERE cfv.`id_ndk_customization_field` = ' . (int)$field['id_ndk_customization_field']
      );

      $i++;
    }


    return $fields;
  }



  public function getValues()
  {
    $id_lang = Context::getContext()->language->id;
    $sql = 'SELECT cfv.`id_ndk_customization_field_value` as id, cfvl.`value`,  cfvl.`description`, cfv.`price`, cfv.`color`, cfv.`set_quantity`, cfv.`quantity`, cfv.`default_value`,cfv.`input_type` , cfv.`quantity_min`, cfv.`quantity_max`, cfv.`step_quantity`, cfv.`influences_restrictions`
			FROM `' . _DB_PREFIX_ . 'ndk_customization_field_value` cfv
			INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` cfvl ON (cfvl.`id_ndk_customization_field_value`= cfv.`id_ndk_customization_field`AND cfvl.`id_lang` = ' . (int)$id_lang . ')
			WHERE cfv.`id_ndk_customization_field` = ' . (int)$this->id;
    $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    return $result;
  }

  public function getValuesId()
  {
    $id_lang = Context::getContext()->language->id;
    $sql = 'SELECT cfv.`id_ndk_customization_field_value` as id
			FROM `' . _DB_PREFIX_ . 'ndk_customization_field_value` cfv
			WHERE cfv.`id_ndk_customization_field` = ' . (int)$this->id;
    $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    return $result;
  }

  public static function getCartProductCustomization($id_cart, $id_product, $id_product_attribute = 0, $ref_product = 0)
  {
    if ($id_product_attribute < 1)
      $id_product_attribute = 0;

    if ($ref_product == 0)
      $ref_product = $id_product;

    $prod = new Product($ref_product);
    $categories = $prod->getCategories();
    $id_lang = Context::getContext()->language->id;

    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
    if (Product::$_taxCalculationMethod == 0) {
      $usetax = true;
    } else {
      $usetax = false;
    }



    $sql =
      'SELECT c.id_customization, c.quantity as orderQuantity, ncf.`price` as price, ncf.`unit`, ncf.`price_type`, ncf.`price_per_caracter`, ncfv.`price`as valuePrice, cd.value as value, ncfvl.value as optionValue, ncfv.`id_ndk_customization_field_value`, ncfv.`set_quantity`, ncfv.`quantity`, ncfv.`default_value`,ncfv.`input_type`
			FROM `' . _DB_PREFIX_ . 'customization` c
			LEFT JOIN `' . _DB_PREFIX_ . 'customized_data` cd ON (cd.`id_customization`= c.`id_customization`)
			LEFT JOIN `' . _DB_PREFIX_ . 'customization_field` cf ON (cf.`id_customization_field`= cd.`index`)
			LEFT JOIN `' . _DB_PREFIX_ . 'customization_field_lang` cfl ON (cfl.`id_customization_field`= cf.`id_customization_field`AND cfl.`id_lang` = ' . (int)$id_lang . ' )
			LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_lang` ncfl ON (ncfl.`name`= cfl.`name`AND ncfl.`id_lang` = ' . (int)$id_lang . ' )
			LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field` ncf ON (ncf.`id_ndk_customization_field`= ncfl.`id_ndk_customization_field`)
			LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value` ncfv ON (ncfv.`id_ndk_customization_field`= ncf.`id_ndk_customization_field`)
			LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` ncfvl ON (ncfvl.`id_ndk_customization_field_value`= ncfv.`id_ndk_customization_field_value` AND ncfvl.`value`= cd.`value` AND ncfvl.`value` <> "" AND ncfvl.`id_lang` = ' . (int)$id_lang . ' )

			WHERE c.`id_product` = ' . (int)$id_product . '  AND c.`id_product_attribute` = ' . (int)$id_product_attribute . '
			AND c.`id_cart` = ' . $id_cart . ' AND c.`in_cart` = 1
			AND ncfvl.`value`= cd.`value`
			AND ncfvl.`value` <> ""
			AND ncfvl.`id_lang` = ' . (int)$id_lang . '
			AND ( FIND_IN_SET( ' . (int)$ref_product . ', ncf.`products`)
			OR FIND_IN_SET( ' . (int)$categories . ', ncf.`categories`))';

    $fields = Db::getInstance()->executeS($sql);


    $i = 0;
    foreach ($fields as $field) {
      if ($usetax) {
        $fields[$i]['price'] = $product_tax_calculator->addTaxes($field['price']);
        $fields[$i]['price_per_caracter'] = $product_tax_calculator->addTaxes($field['price_per_caracter']);
        $fields[$i]['valuePrice'] = $product_tax_calculator->addTaxes($field['valuePrice']);
      }

      $i++;
    }

    return $fields;
  }


  public static function getCustomizationPrice($id_field, $value, $id_product, $reductionDiscount = array())
  {

    $id_lang = Context::getContext()->language->id;

    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
    if (Product::$_taxCalculationMethod == 0) {
      $usetax = true;
    } else {
      $usetax = false;
    }

    $sql =
      'SELECT ncf.`id_ndk_customization_field`,ncf.`type`, ncf.`price` as price, ncf.`unit`, ncf.`price_type`, ncf.`price_per_caracter`, ncfv.`id_ndk_customization_field_value`, ncfv.`price`as valuePrice, ncfvl.value, ncfv.`reference`
			FROM `' . _DB_PREFIX_ . 'ndk_customization_field` ncf
			INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value` ncfv ON (ncfv.`id_ndk_customization_field`= ncf.`id_ndk_customization_field` )
			INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` ncfvl ON (ncfvl.`id_ndk_customization_field_value`= ncfv.`id_ndk_customization_field_value` AND ncfvl.`id_ndk_customization_field_value` = "' . (int)$value  . '" AND ncfvl.`id_lang` = ' . (int)$id_lang . ' AND ncfvl.`value` <> "" )
			WHERE (ncf.`id_ndk_customization_field` = ' . (int)$id_field . ' AND (ncf.price > 0 OR ncf.price_per_caracter > 0)) OR (ncfv.`id_ndk_customization_field` = ' . (int)$id_field . ' AND ncfvl.`id_ndk_customization_field_value` = "' . (int)$value . '"  AND ncfvl.`id_lang` = ' . (int)$id_lang . ')';

    // tapee e aile
    $aluclass_id_field_tapee = array("660", "746", "1469", "3426", "746");
    $aluclass_id_field_aile = array("665", "1461", "3427", "3940");
    $aluclass_id_field_type = array(
      "29243" => "J",
      "29590" => "J",
      "29591" => "J",
      "29616" => "J",
      "29592" => "P",
      "29593" => "P",
      "29594" => "P",
      "29617" => "P",
      "29035" => "J",
      "19806" => "J",
      "29115" => "J",
      "29117" => "J",
      "29133" => "P",
      "29135" => "P",
      "29136" => "P",
      "29138" => "P",
      "12231" => "P",
      "12235" => "P",
      "12239" => "P",
      "30656" => "J",
      "30664" => "J",
      "35522" => "J",
      "3430" => "P"
    );

    // tapee e aile  Portas de Entrada
    $aluclassIdFieldTapeeOrAileDoor = array("1036", "1265", "1284", "1045");
    // decoracao - site pt
    $aluclass_id_decor_porta = array(
      "793",
      "782",
      "821",
      "822",
      "823",
      "824",
      "824",
      "825",
      "826",
      "827",
      "828",
      "829",
      "830",
      "789",
      "851",
      "852",
      "853",
      "890",
      "891",
      "892",
      "855",
      "856",
      "857",
      "858",
      "798",
      "799",
      "885",
      "886",
      "887",
      "888",
      "889",
      "893",
      "792"
    ); /* decoracao por porta site pt */

    $aluclass_id_prod_com_decor = array("12231", "12235", "12235", "13567", "43148", "43150", "3208");  /* id dos produtos de decoracao */

    $aluclass_id_options_fermeture = array("2001", "2017", "2014", "2018", "2280", "2281", "3108", "3106", "3103", "4777", "4778", "4878", "4877", "4923", "4924"); /* ids campos ndk, opcoes pergola site fr */

    $aluclass_id_pord_options_fermeture = array("640153", "640152", "1291", "1379", "1302", "1150", "1127", "1264", "640116", "640147", "640148", "640149", "640150", "640151", "640207", "640208");  /* id dos prods, opcoes pergola site fr */

    $aluclass_id_TypeFixation_cloture = array("2722", "2728", "4147", "4159", "4160", "4161", "4162", "4163", "4164", "4165", "4166", "4167", "4168", "4169", "4170", "4215", "4216", "4217", "4218", "4219", "4220", "4221", "4222", "4223", "4224", "4225", "4226", "4227", "4228", "4229", "4230", "4231", "4232", "4233", "4234", "4235", "4236", "4237", "4238"); /* ids campos ndk, opcoes cloture   site fr */

    $aluclass_id_pord_TypeFixation_cloture = array("13814", "640026");  /* id dos prods, opcoes cloture site fr */

    $aluclass_id_pord_TypeFixation_cloture_new = array("485", "687", "606", "640029", "640027", "640028");  /* id dos prods, opcoes cloture site fr */

    $aluclass_id_pergola_easy = array("4887", "4888"); /* ids campos ndk, opcoes pregolas   site fr */
    $aluclass_id_pord_pergola_easy = array("640147", "640148", "640207", "640208");  /* id dos prods, opcoes pregolas site fr */

    $posteArray = array(
      '2000' => '2',
      '2500' => '3',
      '3000' => '3',
      '3500' => '3',
      '4000' => '3',
      '4500' => '4',
      '5000' => '4',
      '5500' => '4',
      '6000' => '4',
      '6500' => '5',
      '7000' => '5',
      '7500' => '5',
      '8000' => '5',
      '8500' => '6',
      '9000' => '6',
      '9500' => '6',
      '10000' => '6',
      '10500' => '7',
      '11000' => '7',
      '11500' => '7',
      '12000' => '7',
      '12500' => '8',
      '13000' => '8',
      '13500' => '8',
      '14000' => '8',
      '14500' => '9',
      '15000' => '9',
      '15500' => '9',
      '16000' => '9',
      '16500' => '10',
      '17000' => '10',
      '17500' => '10',
      '18000' => '10',
      '18500' => '11',
      '19000' => '11',
      '19500' => '11',
      '20000' => '11',

      '20500' => '12',
      '21000' => '12',
      '21500' => '12',
      '22000' => '12',
      '22500' => '13',
      '23000' => '13',
      '23500' => '13',
      '24000' => '13',
      '24500' => '14',
      '25000' => '14',
      '25500' => '14',
      '26000' => '14',
      '26500' => '15',
      '27000' => '15',
      '27500' => '15',
      '28000' => '15',
      '28500' => '16',
      '29000' => '16',
      '29500' => '16',
      '30000' => '16',

      '30500' => '17',
      '31000' => '17',
      '31500' => '17',
      '32000' => '17',
      '32500' => '18',
      '33000' => '18',
      '33500' => '18',
      '34000' => '18',
      '34500' => '19',
      '35000' => '19',
      '35500' => '19',
      '36000' => '19',
      '36500' => '20',
      '37000' => '20',
      '37500' => '20',
      '38000' => '20',
      '38500' => '21',
      '39000' => '21',
      '39500' => '21',
      '40000' => '21',

      '40500' => '22',
      '41000' => '22',
      '41500' => '22',
      '42000' => '22',
      '42500' => '23',
      '43000' => '23',
      '43500' => '23',
      '44000' => '23',
      '44500' => '24',
      '45000' => '24',
      '45500' => '24',
      '46000' => '24',
      '46500' => '25',
      '47000' => '25',
      '47500' => '25',
      '48000' => '25',
      '48500' => '26',
      '49000' => '26',
      '49500' => '26',
      '50000' => '26'
    );



    $aluclass_id_longueur_cloture = array(
      '13814' => '2710',
      '640026' => '2710'
    );


    $aluclass_id_field_bsolamez = array("5206");
    $aluclass_product_bsolamez = array("640218");

    $aluclass_id_finition_verriere = array("2603"); /* ids campos ndk, opcoes verriere   site fr */
    $aluclass_id_pord_finition_verriere = array("13402");  /* id dos prods, opcoes verriere site fr */

    $aluclass_id_32_carport = array("5627","5637"); /* ids campos ndk, opcoes carport   32 mm  site fr */
    $aluclass_id_pord_32_carport = array("640292", "640293");  /* id dos prods , opcoes carport 32 mm site fr */
    $aluclass_id_dimen_32_carport = array("5620","5621","5622","5630","5631","5632");  /* id dos prods , opcoes carport 32 mm site fr */
    $aluclass_id_options_fermeture_carport = array("5626", "5636", "5655", "5646");
    $aluclass_id_pord_options_fermeture_carport = array("640292", "640293", "640294", "640295");  

    $aluclass_id_field_pre_pvc = array("4996", "4999", "5000", "5007", "5008", "5020", "5009", "5024", "5028", "5032", "5036", "5043", "5047", "5051", "5055");
    $aluclass_id_field_pvc = array("5001", "5003", "5011", "5012", "5010", "5010", "5026", "5029", "5033", "5037", "5044", "5048", "5052", "5056");
    $aluclass_product_pvc = array("640194", "640196", "640197", "640198", "640199", "640195", "640200", "640201", "640202", "640203", "640204", "640205");
    $aluclass_pvc = array(
      "28898" => "50",
      "28891" => "50",
      "28884" => "50",
      "28877" => "50",
      "28867" => "50",
      "28860" => "50",
      "28853" => "50",
      "28846" => "50",
      "28812" => "50",
      "28810" => "50",
      "28808" => "50",
      "28748" => "50",
      "28764" => "10",
      "29203" => "10",
      "28765" => "10",
      "28836" => "15",
      "29202" => "15",
      "28837" => "15",
      "28769" => "3",
      "28770" => "5",
      "28771" => "9",
      "28772" => "9",
      "28830" => "11"
    );

    $aluclass_id_service_pose_grillage = array("5524"); /* ids campos ndk, opcoes verriere   site fr */
    /* Inicio arrays por causa dos serviço de pose das grillage/ clouture */
    $aluclass_prod_id_service_pose_grillage = array("68667", "640024", "68627", "640025", "48485", "640023", "485", "687", "190338", "190381", "190231", "606", "640130", "640026");
    $aluclass_prod_id_service_pose_clouture = array("485", "687", "190338", "190381", "190231", "606");
    $aluclass_prod_id_service_pose_clouture_promo = array("640026");
    $aluclass_prod_id_service_pose_clouture_panneau = array("640130");
    /*Fim arrays por causa dos serviço de pose das grillage/ clouture */

    /*  ingorar  desconto*/
    $arrayidsingorar = array(5426, 5417, 5424, 5425, 5439, 5440, 5441, 5442, 5443, 5444, 5445, 5446, 5447, 5448, 5449, 5450, 5452, 5453, 5454, 5455, 5456, 5457, 5458, 5459, 5460, 5462, 5463, 5465, 5466, 5467, 5472, 5473, 5518, 5522, 5523, 5546);

    $fields = Db::getInstance()->executeS($sql);
    $i = 0;
    foreach ($fields as $field) {
      if ($usetax) {
        $fields[$i]['price'] = $product_tax_calculator->addTaxes($field['price']);
        $fields[$i]['price_per_caracter'] = $product_tax_calculator->addTaxes($field['price_per_caracter']);

        // aluclass - inicio calculo decoracao
        if (in_array($id_field, $aluclass_id_decor_porta)) {
          if (in_array($id_product, $aluclass_id_prod_com_decor)) {


            $val_decor = $_POST["prices"][$id_field];
            $field['valuePrice'] = $val_decor / ((($product_tax_calculator->taxes[0]->rate) / 100) + 1);
          }
        }
        // aluclass - fim calculo decoracao
        // ignorar desconto inicio
        if (in_array($id_field, $arrayidsingorar)) {
          if (array_key_exists('reduction_value', $reductionDiscount)) {
            $valor_unitario = $field['valuePrice'];
            $valor_unitario = $valor_unitario / (1 - ($reductionDiscount['reduction_value'] / 100));
            $field['valuePrice'] = $valor_unitario;
          }
        }
        // ignorar desconto fim

        // aluclass - pose de service  grillage

        if (in_array($id_field, $aluclass_id_service_pose_grillage)) {
          if (in_array($id_product, $aluclass_prod_id_service_pose_grillage)) {
            $valor_unitario = $field['valuePrice'];
            $dimensions = array();

            foreach (Tools::getValue('ndkcsfield') as $fieldfg => $value) {
              if (!empty($value) && $value != '') {

                $values = array();
                if (is_array($value)) {
                  foreach ($value as $k => $v) {
                    if ($k == 'width') {
                      $dimensions[$fieldfg] = $value;
                      $values[] = $fieldfg;
                    }
                  }
                  foreach ($values as $value) {
                    if (count($dimensions) > 0 && isset($dimensions[$value])) {
                      if (
                        isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                        && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                        && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                      ) {

                        if (array_key_exists('reduction_value', $reductionDiscount)) {
                          $valor_unitario = $valor_unitario / (1 - ($reductionDiscount['reduction_value'] / 100));
                        }

                        if (in_array($id_product, $aluclass_prod_id_service_pose_clouture)) {
                          $valorNumResultado = $dimensions[$value]['width'];
                          $val_finition = ($valorNumResultado / 1000) * $valor_unitario;
                        } elseif (in_array($id_product, $aluclass_prod_id_service_pose_clouture_panneau)) {
                          preg_match_all('/\d+/', $dimensions[$value]['width'], $matches);
                          $secondNumber = isset($matches[0][1]) ? $matches[0][1] : 50;
                          $val_finition =  $secondNumber * $valor_unitario;
                        } elseif (in_array($id_product, $aluclass_prod_id_service_pose_clouture_promo)) {
                          preg_match_all('/=(\d+)m/', $dimensions[$value]['width'], $matches);
                          $secondNumber = isset($matches[1][0]) ? $matches[1][0] : 50;
                          $val_finition =  $secondNumber * $valor_unitario;
                        } else {
                          preg_match('/(\d+(?:,\d+)?)/', $dimensions[$value]['width'], $matches);
                          $valorNumResultado = isset($matches[0]) ? str_replace(',', '.', $matches[0]) : null;
                          $val_finition = $valorNumResultado * $valor_unitario;
                        }
                      }
                    }
                  }
                }
              }
            }
            $field['valuePrice'] = $val_finition;
          }
        }
        // aluclass - pose de service grillage

        // aluclass - inicio calculo 32 mm carport

        if (in_array($id_field, $aluclass_id_32_carport)) {
          if (in_array($id_product, $aluclass_id_pord_32_carport)) {
            $valor_unitario = $field['valuePrice'];
            $dimensions = array();

            foreach (Tools::getValue('ndkcsfield') as $fieldfg => $value) {
              if (!empty($value) && $value != '') {

                $values = array();
                if (is_array($value)) {
                  foreach ($value as $k => $v) {
                    if ($k == 'width') {
                      $dimensions[$fieldfg] = $value;
                      $values[] = $fieldfg;
                    }
                  }
                  foreach ($values as $value) {
                    if (count($dimensions) > 0 && isset($dimensions[$value])) {
                      if (
                        isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                        && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                        && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                      ) {
                        if (in_array($value, $aluclass_id_dimen_32_carport)) {
                          $val_finition = (($dimensions[$value]['height'] / 1000) * ($dimensions[$value]['width'] / 1000)) * $valor_unitario;
                         $field['valuePrice'] = $val_finition;
                        }
                      }
                    }
                  }
                }
              }
            }
          
          }
        }
        //  aluclass - fim calculo 32 mm carport

        // aluclass - inicio calculo finition

        if (in_array($id_field, $aluclass_id_finition_verriere)) {
          if (in_array($id_product, $aluclass_id_pord_finition_verriere)) {
            $valor_unitario = $field['valuePrice'];
            $dimensions = array();

            foreach (Tools::getValue('ndkcsfield') as $fieldfg => $value) {
              if (!empty($value) && $value != '') {

                $values = array();
                if (is_array($value)) {
                  foreach ($value as $k => $v) {
                    if ($k == 'width') {
                      $dimensions[$fieldfg] = $value;
                      $values[] = $fieldfg;
                    }
                  }
                  foreach ($values as $value) {
                    if (count($dimensions) > 0 && isset($dimensions[$value])) {
                      if (
                        isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                        && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                        && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                      ) {
                        $val_finition = (($dimensions[$value]['height'] / 1000) * ($dimensions[$value]['width'] / 1000)) * $valor_unitario;
                      }
                    }
                  }
                }
              }
            }
            $field['valuePrice'] = $val_finition;
          }
        }
        // aluclass - fim calculo finition

        // aluclass - inicio calculo lame double parois)
        if (in_array($id_field, $aluclass_id_pergola_easy)) {
          if (in_array($id_product, $aluclass_id_pord_pergola_easy)) {
            $valor_unitario = $field['valuePrice'];
            $dimensions = array();

            foreach (Tools::getValue('ndkcsfield') as $fieldfg => $value) {
              if (!empty($value) && $value != '') {

                $values = array();
                if (is_array($value)) {
                  foreach ($value as $k => $v) {
                    if ($k == 'width') {
                      $dimensions[$fieldfg] = $value;
                      $values[] = $fieldfg;
                    }
                  }
                  foreach ($values as $value) {
                    if (count($dimensions) > 0 && isset($dimensions[$value])) {
                      if (
                        isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                        && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                        && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                      ) {
                        $val_finition = (($dimensions[$value]['height'] / 1000) * ($dimensions[$value]['width'] / 1000)) * $valor_unitario;
                      }
                    }
                  }
                }
              }
            }
            $field['valuePrice'] = $val_finition;
          }
        }
        // aluclass - fim calculo lame double parois)

        // aluclass - inicio calculo cloture)

        if (in_array($id_field, $aluclass_id_TypeFixation_cloture)) {
          if (in_array($id_product, $aluclass_id_pord_TypeFixation_cloture)) {
            $aluclass_cloture_field = Tools::getValue('ndkcsfield');
            $nameField = $aluclass_cloture_field[$aluclass_id_longueur_cloture[$id_product]];
            $val_cloture = $field['valuePrice'];
            $nameField = explode("m", $nameField);
            if ($nameField[0] == '2') {
              $valueInt = (($nameField[0] / 2) + 1) * $val_cloture;
            } else {
              $arrayValeuLag2 = explode("=", $nameField[1]);
              $valueInt = (($arrayValeuLag2[1] / 2) + 1) * $val_cloture;
            }
            $field['valuePrice'] = $valueInt;
          }
        }
        // aluclass - fim calculo cloture)

        // aluclass - inicio calculo cloture)

        if (in_array($id_field, $aluclass_id_TypeFixation_cloture)) {
          if (in_array($id_product, $aluclass_id_pord_TypeFixation_cloture_new)) {
            $val_cloture = $field['valuePrice'];

            foreach (Tools::getValue('ndkcsfield') as $fieldfg => $value) {
              if (!empty($value) && $value != '') {

                $values = array();
                if (is_array($value)) {
                  foreach ($value as $k => $v) {
                    if ($k == 'width') {
                      $dimensions[$fieldfg] = $value;
                      $values[] = $fieldfg;
                    }
                  }
                  foreach ($values as $value) {
                    if (count($dimensions) > 0 && isset($dimensions[$value])) {
                      if (
                        isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                        && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                        && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                      ) {
                        foreach ($posteArray as $indexMedida => $poste) {
                          if ($indexMedida  >= $dimensions[$value]['width']) {
                            $valueInt = $poste * $val_cloture;
                            break;
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
            $field['valuePrice'] = $valueInt;
          }
        }
        // aluclass - fim calculo cloture)


        //Vasco Portas de Entrada - Tapee
        $resultCalculoAileOrTapee = Ndkcf::GetCalculoAileOrTapee($aluclassIdFieldTapeeOrAileDoor, $id_field, $field);
        if ($resultCalculoAileOrTapee) {
          $field['valuePrice'] = $resultCalculoAileOrTapee;
        }

        //Vasco Janelas PVC
        if (in_array($id_product, $aluclass_product_pvc)) {
          if (in_array($id_field, $aluclass_id_field_pre_pvc)) {
            $field['valuePrice']   = NdkCf::GetCalculoPerPVC($aluclass_pvc, $field, $fields, $i);
          }
        }
        if (in_array($id_product, $aluclass_product_pvc)) {
          if (in_array($id_field, $aluclass_id_field_pvc)) {
            $field['valuePrice']   = NdkCf::GetCalculoPVC($field);
          }
        }
        //Vasco BSO lame z
        if (in_array($id_product, $aluclass_product_bsolamez)) {
          if (in_array($id_field, $aluclass_id_field_bsolamez)) {
            $field['valuePrice']   = NdkCf::GetCalculoPVC($field);
          }
        }

        // aluclass - inicio calculo pergola
        if (in_array($id_field, $aluclass_id_options_fermeture)) {
          if (in_array($id_product, $aluclass_id_pord_options_fermeture)) {
            $numfield = count($_POST["ndkcsfield"][$id_field]["quantity"]);
            $val_pergola = $_POST["prices"][$id_field]; /// $numfield;
            NdkCf::$numfech = NdkCf::$numfech + 1;
            if ($numfield == NdkCf::$numfech) {
              $field['valuePrice'] = $val_pergola / ((((int)$product_tax_calculator->taxes[0]->rate) / 100) + 1);
            } else {
              $field['valuePrice'] = 0;
            }
          }
        }
        // aluclass - fim calculo pergola

         // aluclass - inicio calculo carport
        if (in_array($id_field, $aluclass_id_options_fermeture_carport)) {
          if (in_array($id_product,  $aluclass_id_pord_options_fermeture_carport)) {
            $numfield = count($_POST["ndkcsfield"][$id_field]["quantity"]);
            $val_carport = $_POST["prices"][$id_field]; /// $numfield;
            NdkCf::$numfech = NdkCf::$numfech + 1;
            if ($numfield == NdkCf::$numfech) {
              $field['valuePrice'] = $val_carport / ((((int)$product_tax_calculator->taxes[0]->rate) / 100) + 1);
            } else {
              $field['valuePrice'] = 0;
            }
          }
        }
        // aluclass - fim calculo carport

        // aluclass - inicio calculo taipee e aile com taxa aplicada
        // tapee - se for tape
        if (in_array($id_field, $aluclass_id_field_tapee)) {
          $valor_unitario = $field['valuePrice'];
          $dimensions = array();
          foreach (Tools::getValue('ndkcsfield') as $field => $value) {
            if (!empty($value) && $value != '') {
              $values = array();
              if (is_array($value)) {
                foreach ($value as $k => $v) {
                  if ($k == 'width') {
                    $dimensions[$field] = $value;
                    $values[] = $field;
                  }
                }
                foreach ($values as $value) {
                  if (count($dimensions) > 0 && isset($dimensions[$value])) {
                    if (
                      isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                      && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                      && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                    ) {
                      if ($aluclass_id_field_type[$id_product][0] == "J") {
                        $val_tapee = ((($dimensions[$value]['height'] * 2) + $dimensions[$value]['width']) / 1000) * $valor_unitario;
                      } else {
                        $val_tapee = ((($dimensions[$value]['height'] * 2) + $dimensions[$value]['width']) / 1000) * $valor_unitario;
                      }
                    }
                  }
                }
              }
            }
          }
          $fields[$i]['valuePrice'] = $product_tax_calculator->addTaxes($val_tapee);
        }

        // aile
        if (in_array($id_field, $aluclass_id_field_aile)) {
          $valor_unitario = $field['valuePrice'];
          $dimensions = array();
          foreach (Tools::getValue('ndkcsfield') as $field => $value) {
            if (!empty($value) && $value != '') {
              $values = array();
              if (is_array($value)) {
                foreach ($value as $k => $v) {
                  if ($k == 'width') {
                    $dimensions[$field] = $value;
                    $values[] = $field;
                  }
                }
                foreach ($values as $value) {
                  if (count($dimensions) > 0 && isset($dimensions[$value])) {
                    if (
                      isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                      && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                      && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                    ) {
                      if ($aluclass_id_field_type[$id_product][0] == "J") {
                        $val_aile = ((($dimensions[$value]['height'] * 2) + ($dimensions[$value]['width']) * 2) / 1000) * $valor_unitario;
                      } else {
                        $val_aile = ((($dimensions[$value]['height'] * 2) + $dimensions[$value]['width']) / 1000) * $valor_unitario;
                      }
                    }
                  }
                }
              }
            }
          }
          $fields[$i]['valuePrice'] = $product_tax_calculator->addTaxes($val_aile);
        } /*else {
					$fields[$i]['valuePrice'] = $product_tax_calculator->addTaxes($field['valuePrice']); // original
				}*/
        if (!in_array($id_field, $aluclass_id_field_tapee) && !in_array($id_field, $aluclass_id_field_aile)) {
          $fields[$i]['valuePrice'] = $product_tax_calculator->addTaxes($field['valuePrice']);
        }
        // aluclass - fim calculo taipee e aile
      } else {
        $fields[$i]['price'] = $field['price'];
        $fields[$i]['price_per_caracter'] = $field['price_per_caracter'];
        //$fields[$i]['valuePrice'] = $field['valuePrice'];

        // Vasco Portas de Entrada - Tapee
        $resultCalculoAileOrTapee = Ndkcf::GetCalculoAileOrTapee($aluclassIdFieldTapeeOrAileDoor, $id_field, $field);
        if ($resultCalculoAileOrTapee) {
          $fields[$i]['valuePrice'] = $resultCalculoAileOrTapee;
        }

        //Vasco Janelas PVC
        if (in_array($id_product, $aluclass_product_pvc)) {
          if (in_array($id_field, $aluclass_id_field_pre_pvc)) {
            $field['valuePrice']   = NdkCf::GetCalculoPerPVC($aluclass_pvc, $field, $fields, $i);
          }
        }
        if (in_array($id_product, $aluclass_product_pvc)) {
          if (in_array($id_field, $aluclass_id_field_pvc)) {
            $field['valuePrice']   = NdkCf::GetCalculoPVC($field);
          }
        }
        //Vasco BSO lame z
        if (in_array($id_product, $aluclass_product_bsolamez)) {
          if (in_array($id_field, $aluclass_id_field_bsolamez)) {
            $field['valuePrice']   = NdkCf::GetCalculoPVC($field);
          }
        }

        // aluclass - inicio calculo taipee e aile sem taxa aplicada
        // tapee
        if (in_array($id_field, $aluclass_id_field_tapee)) {
          $valor_unitario = $field['valuePrice'];
          $dimensions = array();
          foreach (Tools::getValue('ndkcsfield') as $field => $value) {
            if (!empty($value) && $value != '') {
              $values = array();
              if (is_array($value)) {
                foreach ($value as $k => $v) {
                  if ($k == 'width') {
                    $dimensions[$field] = $value;
                    $values[] = $field;
                  }
                }
                foreach ($values as $value) {
                  if (count($dimensions) > 0 && isset($dimensions[$value])) {
                    if (
                      isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                      && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                      && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                    ) {
                      if ($aluclass_id_field_type[$id_product][0] == "J") {
                        $val_tapee = ((($dimensions[$value]['height'] * 2) + ($dimensions[$value]['width']) * 2) / 1000) * $valor_unitario;
                      } else {
                        $val_tapee = ((($dimensions[$value]['height'] * 2) + $dimensions[$value]['width']) / 1000) * $valor_unitario;
                      }
                    }
                  }
                }
              }
            }
          }
          $fields[$i]['valuePrice'] = $val_tapee;
        }


        // Vasco Portas de Entrada - Aile
        $resultCalculoAileOrTapee = Ndkcf::GetCalculoAileOrTapee($aluclassIdFieldTapeeOrAileDoor, $id_field, $field);
        if ($resultCalculoAileOrTapee) {
          $fields[$i]['valuePrice'] = $resultCalculoAileOrTapee;
        }
        //Vasco Janelas PVC
        if (in_array($id_product, $aluclass_product_pvc)) {
          if (in_array($id_field, $aluclass_id_field_pre_pvc)) {
            $field['valuePrice']   = NdkCf::GetCalculoPerPVC($aluclass_pvc, $field, $fields, $i);
          }
        }
        if (in_array($id_product, $aluclass_product_pvc)) {
          if (in_array($id_field, $aluclass_id_field_pvc)) {
            $field['valuePrice']   = NdkCf::GetCalculoPVC($field);
          }
        }

        //Vasco BSO lame z
        if (in_array($id_product, $aluclass_product_bsolamez)) {
          if (in_array($id_field, $aluclass_id_field_bsolamez)) {
            $field['valuePrice']   = NdkCf::GetCalculoPVC($field);
          }
        }


        // aile
        if (in_array($id_field, $aluclass_id_field_aile)) {
          $valor_unitario = $field['valuePrice'];
          $dimensions = array();
          foreach (Tools::getValue('ndkcsfield') as $field => $value) {
            if (!empty($value) && $value != '') {
              $values = array();
              if (is_array($value)) {
                foreach ($value as $k => $v) {
                  if ($k == 'width') {
                    $dimensions[$field] = $value;
                    $values[] = $field;
                  }
                }
                foreach ($values as $value) {
                  if (count($dimensions) > 0 && isset($dimensions[$value])) {
                    if (
                      isset($dimensions[$value]['width']) && isset($dimensions[$value]['height'])
                      && $dimensions[$value]['width'] != '' &&  $dimensions[$value]['width'] != ' '
                      && $dimensions[$value]['height'] != '' &&  $dimensions[$value]['height'] != ' '
                    ) {
                      if ($aluclass_id_field_type[$id_product][0] == "J") {
                        $val_aile = ((($dimensions[$value]['height'] * 2) + ($dimensions[$value]['width']) * 2) / 1000) * $valor_unitario;
                      } else {
                        $val_aile = ((($dimensions[$value]['height'] * 2) + $dimensions[$value]['width']) / 1000) * $valor_unitario;
                      }
                    }
                  }
                }
              }
            }
          }
          $fields[$i]['valuePrice'] = $val_aile;
        }

        if (!in_array($id_field, $aluclass_id_field_tapee) && !in_array($id_field, $aluclass_id_field_aile)) {
          $fields[$i]['valuePrice'] = $field['valuePrice'];
        }
        // aluclass - fim calculo taipee e aile
      }

      $i++;
    }

    return $fields;
  }




  public function updatePosition($way, $position)
  {
    if (!$res = Db::getInstance()->executeS(
      '
					SELECT ncf.`position`, ncf.`id_ndk_customization_field`
					FROM `' . _DB_PREFIX_ . 'ndk_customization_field` ncf
					WHERE ncf.`id_ndk_customization_field` = ' . (int)Tools::getValue('id') . '
					ORDER BY ncf.`position` ASC'
    ))
      return false;

    foreach ($res as $ndk_customization_field)
      if ((int)$ndk_customization_field['id_ndk_customization_field'] == (int)$this->id)
        $moved = $ndk_customization_field;

    if (!isset($moved) || !isset($position))
      return false;

    // < and > statements rather than BETWEEN operator
    // since BETWEEN is treated differently according to databases
    return (Db::getInstance()->execute(
      '
					UPDATE `' . _DB_PREFIX_ . 'ndk_customization_field`
					SET `position`= `position` ' . ($way ? '- 1' : '+ 1') . '
					WHERE `position`
					' . ($way
        ? '> ' . (int)$moved['position'] . ' AND `position` <= ' . (int)$position
        : '< ' . (int)$moved['position'] . ' AND `position` >= ' . (int)$position)
    ) && Db::getInstance()->execute('
					UPDATE `' . _DB_PREFIX_ . 'ndk_customization_field`
					SET `position` = ' . (int)$position . '
					WHERE `id_ndk_customization_field`=' . (int)$moved['id_ndk_customization_field'])
    );
  }


  public static function calculateFieldsPriceDisplay($id_product, $fields)
  {

    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));

    $i = 0;
    foreach ($fields as $field) {
      if ($fields[$i]['price_type'] == 'percent')
        $usetax = false;

      $fields[$i]['price'] = !$usetax ? $product_tax_calculator->removeTaxes($field['price']) : $field['price'];
      $i++;
    }
    return $fields;
  }

  public static function getTargetsFields()
  {
    $id_lang = Context::getContext()->language->id;
    $fields = Db::getInstance()->executeS('
				SELECT cf.`id_ndk_customization_field` as id, cfl.`admin_name` as name
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_lang` cfl ON (cfl.`id_ndk_customization_field`= cf.`id_ndk_customization_field` AND cfl.`id_lang` = ' . (int)$id_lang . ' )
				WHERE cf.`type` = 10 GROUP BY  cf.id_ndk_customization_field');
    return $fields;
  }


  public static function getTargetsChilds($id)
  {
    $id_lang = Context::getContext()->language->id;
    $fields = Db::getInstance()->executeS('
				SELECT cfv.`id_ndk_customization_field_value` as id, cfvl.`value`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field_value` cfv
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` cfvl ON (cfvl.`id_ndk_customization_field_value`= cfv.`id_ndk_customization_field_value` AND cfvl.`id_lang` = ' . (int)$id_lang . ' )
				WHERE cfv.`id_ndk_customization_field` = ' . (int)$id . ' GROUP BY  cfv.id_ndk_customization_field_value');
    return $fields;
  }

  public static function getFieldsLight($current)
  {
    $id_lang = Context::getContext()->language->id;
    $sql = '
				SELECT cf.`id_ndk_customization_field` as id, cfl.`admin_name` as name , gl.name as groupname
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_group` g ON (FIND_IN_SET( cf.`id_ndk_customization_field`, g.`fields`))
				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_group_lang` gl ON (gl.`id_ndk_customization_field_group`= g.`id_ndk_customization_field_group` AND gl.`id_lang` = ' . (int)Context::getContext()->language->id . ')

				LEFT JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_lang` cfl ON (cfl.`id_ndk_customization_field`= cf.`id_ndk_customization_field` AND cfl.`id_lang` = ' . (int)$id_lang . ' )
				WHERE  cf.`id_ndk_customization_field` != ' . (int)$current . ' GROUP BY  cf.id_ndk_customization_field ORDER BY cfl.`admin_name`';

    $fields = Db::getInstance()->executeS($sql);
    foreach ($fields as &$field) {
      $field['name'] = $field['name'] . ($field['groupname'] != '' ? ' [' . $field['groupname'] . ']' : '');
    }
    return $fields;
  }


  public static function getInfluencesFields($ids, $qtty = false)
  {
    $id_lang = Context::getContext()->language->id;
    $fields = Db::getInstance()->executeS('
				SELECT cf.`id_ndk_customization_field`, cfl.`admin_name`
				FROM `' . _DB_PREFIX_ . 'ndk_customization_field` cf
				INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_lang` cfl ON (cfl.`id_ndk_customization_field`= cf.`id_ndk_customization_field` AND cfl.`id_lang` = ' . (int)$id_lang . ' )
				WHERE cf.`id_ndk_customization_field` IN (' . $ids . ') GROUP BY  cf.id_ndk_customization_field');


    $i = 0;
    foreach ($fields as $field) {
      $fields[$i]['values'] = Db::getInstance()->executeS('
					SELECT cfv.`id_ndk_customization_field_value` as id, cfvl.`value` as name
					FROM `' . _DB_PREFIX_ . 'ndk_customization_field_value` cfv
					INNER JOIN `' . _DB_PREFIX_ . 'ndk_customization_field_value_lang` cfvl ON (cfvl.`id_ndk_customization_field_value`= cfv.`id_ndk_customization_field_value` AND cfvl.`id_lang` = ' . (int)$id_lang . ' )
					WHERE cfv.`id_ndk_customization_field`= (' . $field['id_ndk_customization_field'] . ')');

      if ($qtty && $qtty > 0) {
        $j = 0;
        foreach ($fields[$i]['values'] as $value) {
          $fields[$i]['values'][$j]['id'] = $value['id'] . '[' . $qtty . ']';
          $j++;
        }
      }

      $i++;
    }

    return $fields;
  }


  public static function createProductCustom($product, $id_combination = 0, $price, $cusText, $devischeck = false, $ndkcfidproductedit = false)
  {
    $carrierCode = '';
    $id_lang = Context::getContext()->language->id;
    $languages = Language::getLanguages(false);
    $customProd = new Product(null, false, null, Context::getContext()->shop->id);
    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$product->id, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));

    if (Product::$_taxCalculationMethod == 0) {
      $usetax = true;
    } else {
      $usetax = false;
    }

    if (AluclassCarrier::checkExitCarrierRules((int)$product->id, Tools::getValue('ndkcsfield'))) {
      $carrierCode = AluclassCarrier::getCarrierRules((int)$product->id, Tools::getValue('ndkcsfield'));
    } else {
      $carrierCode = AluclassCarrier::getCarrierCode((int)$product->id);
    }

    // Incio do Serviço de montagem
    $arrayNDKs = Tools::getValue('ndkcsfield');
    $checkposeservice = false;

    $arrayidsservice = array(5426, 5417, 5424, 5425, 5439, 5440, 5441, 5442, 5443, 5444, 5445, 5446, 5447, 5448, 5449, 5450, 5452, 5453, 5454, 5455, 5456, 5457, 5458, 5459, 5460, 5462, 5463, 5465, 5466, 5467, 5472, 5473, 5518, 5522, 5523, 5524, 5546);

    foreach ($arrayNDKs as $keysndk => $valuendk) {
      if (in_array($keysndk, $arrayidsservice)) {
        $checkposeservice = true;
      }
    }
    // Fim do Serviço de montagem
    // cria tag's para identificadores
    // tag servço de montagem [%POSE%]
    if ($checkposeservice) {
      $carrierCode = '[%POSE%] ' . $carrierCode;
    }
    // tag servideo de entrega de plano de pergolas as cameras [%PLAN%]
    foreach ($arrayNDKs as $keysndk => $valuendk) {
      if ($keysndk == 5327) {
        $carrierCode = "[%PLAN%] " . $carrierCode;
      }
    }
    // tag portes gratuitos [%FREE%]
    if (AluclassCarrier::checkFreeShip((int)$product->id)) {
      $carrierCode = "[%FREE%] " . $carrierCode;
    }
    // tag portes gratuitos [%HALFFREE%]
    if (AluclassCarrier::checkHalfFreeShip((int)$product->id)) {
      $carrierCode = "[%HALFFREE%] " . $carrierCode;
    }

    if ($usetax)
      $price = $product_tax_calculator->removeTaxes($price);

    if ($id_combination > 0) {
      $combNames = $product->getAttributesResume($id_lang);
      foreach ($combNames as $row) {
        if ($row['id_product_attribute'] == $id_combination)
          $combName = $row['attribute_designation'];
      }
    } else {
      $combName = false;
    }


    foreach ($languages as $lang) {
      $name = $product->name[$id_lang] . (isset($combName) && $combName != '' ? ' - ' . $combName : '');

      $customProd->name[$lang['id_lang']] = Tools::truncateString($cusText . ' ' . $name, 125);

      $link_rewrite = preg_replace('/[\s\'\:\/\[\]\-\|]+/', ' ', $name);
      $link_rewrite = str_replace(array(' ', '/', '|'), '-', $link_rewrite);
      $link_rewrite = str_replace(array('--', '---', '----'), '-', $link_rewrite);
      $link_rewrite = Tools::truncateString($link_rewrite . ' ' . $name, 125);
      $customProd->link_rewrite[$lang['id_lang']] = Tools::str2url($link_rewrite . '-00');
      $customProd->description_short[$lang['id_lang']] = $cusText . ' :' . $name . "[@".$product->id_category_default."@]" . $carrierCode;
    }


    $customProd->reference = Tools::str2url('custom-' . $product->id . '-' . $id_combination . '-' . Context::getContext()->cart->id);
    $customProd->supplier_reference = Tools::str2url('myndkcustomprod');


    $customProd->id_category_default = (int)Configuration::get('NDK_ACF_CAT');

    $customProd->customizable = 1;
    $customProd->id_supplier = (int)$product->id_supplier;
    $customProd->id_manufacturer = (int)$product->id_manufacturer;
    $customProd->indexed = 0;

    $customProd->is_virtual = $product->is_virtual;
    //forpack
    $customProd->cache_is_pack = 1;
    $customProd->pack_stock_type = 1;
    $customProd->id_tax_rules_group = Product::getIdTaxRulesGroupByIdProduct((int)$product->id, Context::getContext());
    $customProd->out_of_stock = $product->out_of_stock;
    $customProd->visibility = 'none';
    $customProd->price = $price;
    $customProd->quantity = 1;
    $customProd->minimal_quantity = 0;
    $customProd->uploadable_files = 99;
    $customProd->text_fields = 99;

    $customProd->width = $product->width;
    $customProd->height = $product->height;
    $customProd->depth = $product->depth;
    $weight = $product->weight;
    $customProd->location = $product->location;
    if ($id_combination > 0) {
      $comb = new Combination((int)$id_combination);
      $weight = $weight + $comb->weight;
      $customProd->location = $comb->location;
    }

    $customProd->weight = $weight;

    $customProd->ecotax = $product->ecotax;

    $customProd->advanced_stock_management = $product->advanced_stock_management;
    $customProd->depends_on_stock = $product->depends_on_stock;

    $customProd->save();

    foreach ($languages as $lang) {
      $customProd->link_rewrite[$lang['id_lang']] = Tools::str2url($link_rewrite . '-' . (int)$customProd->id);
    }
    $customProd->save();

    //$customProd->updateCategories( (int)Configuration::get('NDK_ACF_CAT') );
    Db::getInstance()->execute('INSERT INTO `' . _DB_PREFIX_ . 'category_product` (`id_category`, `id_product`) VALUES (' . (int)Configuration::get('NDK_ACF_CAT') . ', ' . (int)$customProd->id . ')');
    Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'stock_available` SET out_of_stock = ' . (int)$product->out_of_stock . ' WHERE id_product = ' . (int)$customProd->id);


    $warehouses  = Db::getInstance()->executeS(' SELECT DISTINCT(id_warehouse),  location FROM `' . _DB_PREFIX_ . 'warehouse_product_location` WHERE id_product = ' . $product->id . ' AND id_product_attribute = ' . (int)$id_combination);
    foreach ($warehouses as $warehouse) {
      Db::getInstance()->execute('
        INSERT INTO `' . _DB_PREFIX_ . 'warehouse_product_location` (`id_warehouse`,`id_product`,`id_product_attribute`,`location`)
          VALUES (' . (int)$warehouse['id_warehouse'] . ', ' . (int)$customProd->id . ', 0, "' . pSQL($warehouse['location']) . '") ');
    }

    $customProd->setCarriers(self::getCarriersIds((int)$product->id));
    //Product::duplicateSpecificPrices((int)$product->id, $customProd->id);
    foreach (SpecificPrice::getByProductId((int)$product->id, (int)$id_combination) as $data) {
      $specific_price = new SpecificPrice((int)$data['id_specific_price']);
      $specific_price->id_product = (int)$customProd->id;
      $specific_price->id_product_attribute = 0;
      unset($specific_price->id);
      $specific_price->add();
    }

    Product::duplicateAccessories((int)$product->id, $customProd->id);

    GroupReduction::duplicateReduction((int)$product->id, $customProd->id);

    NdkCf::duplicateProductImagesAttibute((int)$product->id, $customProd->id, $id_combination);
    //Image::duplicateProductImages((int)$product->id, $customProd->id, array());
    NdkCf::duplicateProductCategories($product->id, $customProd->id);
    return (int)$customProd->id;
  }
  // }

  public static function duplicateProductCategories($id_old, $id_new)
  {
    $sql = 'SELECT `id_category`
					FROM `' . _DB_PREFIX_ . 'category_product`
					WHERE `id_product` = ' . (int)$id_old;
    $result = Db::getInstance()->executeS($sql);

    $row = array();
    if ($result) {
      foreach ($result as $i) {
        $row[] = '(' . implode(', ', array(
          (int)$id_new,
          $i['id_category'],
          '(SELECT tmp.max + 1 FROM (
						SELECT MAX(cp.`position`) AS max
						FROM `' . _DB_PREFIX_ . 'category_product` cp
						WHERE cp.`id_category`=' . (int)$i['id_category'] . ') AS tmp)'
        )) . ')';
      }
    }

    $flag = Db::getInstance()->execute(
      '
				INSERT IGNORE INTO `' . _DB_PREFIX_ . 'category_product` (`id_product`, `id_category`, `position`)
				VALUES ' . implode(',', $row)
    );
    return $flag;
  }

  public static function duplicateProductImagesAttibute($id_product_old, $id_product_new, $id_combination)
  {
    $images_types = ImageType::getImagesTypes('products');
    if ((int)$id_combination > 0)
      $result = Db::getInstance()->executeS('
	        	SELECT `id_image`
	        	FROM `' . _DB_PREFIX_ . 'product_attribute_image`
	        	WHERE `id_product_attribute` = ' . (int)$id_combination);
    else
      $result = Db::getInstance()->executeS('
	        	SELECT `id_image`
	        	FROM `' . _DB_PREFIX_ . 'image`
	        	WHERE `id_product` = ' . (int)$id_product_old . ' AND cover=1');

    if (sizeof($result) == 0) {
      Image::duplicateProductImages((int)$id_product_old, $id_product_new, array());
    } else {
      foreach ($result as $row) {
        $image_old = new Image($row['id_image']);
        $image_new = clone $image_old;
        unset($image_new->id);
        $image_new->id_product = (int)$id_product_new;

        // A new id is generated for the cloned image when calling add()
        if ($image_new->add()) {
          $new_path = $image_new->getPathForCreation();
          foreach ($images_types as $image_type) {
            if (file_exists(_PS_PROD_IMG_DIR_ . $image_old->getExistingImgPath() . '-' . $image_type['name'] . '.jpg')) {
              if (!Configuration::get('PS_LEGACY_IMAGES')) {
                $image_new->createImgFolder();
              }
              copy(
                _PS_PROD_IMG_DIR_ . $image_old->getExistingImgPath() . '-' . $image_type['name'] . '.jpg',
                $new_path . '-' . $image_type['name'] . '.jpg'
              );
              if (Configuration::get('WATERMARK_HASH')) {
                $old_image_path = _PS_PROD_IMG_DIR_ . $image_old->getExistingImgPath() . '-' . $image_type['name'] . '-' . Configuration::get('WATERMARK_HASH') . '.jpg';
                if (file_exists($old_image_path)) {
                  copy($old_image_path, $new_path . '-' . $image_type['name'] . '-' . Configuration::get('WATERMARK_HASH') . '.jpg');
                }
              }
            }
          }

          if (file_exists(_PS_PROD_IMG_DIR_ . $image_old->getExistingImgPath() . '.jpg')) {
            copy(_PS_PROD_IMG_DIR_ . $image_old->getExistingImgPath() . '.jpg', $new_path . '.jpg');
          }

          // Duplicate shop associations for images
          $image_new->duplicateShops($id_product_old);
        } else {
          return false;
        }
      }
    }
  }

  public static function getCarriersIds($id_product)
  {
    $return  = array();
    $results =  Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT pc.id_carrier_reference
			FROM `' . _DB_PREFIX_ . 'product_carrier` pc
			WHERE pc.`id_product` = ' . (int)$id_product . '
				AND pc.`id_shop` = ' . (int)Context::getContext()->shop->id);
    foreach ($results as $row)
      $return[] = $row['id_carrier_reference'];

    return $return;
  }

  public static function deleteTempPackFromCart($id_product, $id_customization = 0, $id_product_attribute = 0)
  {
    $tempProd = new Product($id_product);
    if ($tempProd->supplier_reference == 'myndkcustomprod')
      $tempProd->delete();

    if ($id_customization > 0) {
      $customisation = new Customization((int)$id_customization);
      $search = Db::getInstance()->executeS(
        'SELECT fc.id_ndk_customization_field_configuration as id FROM ' . _DB_PREFIX_ . 'ndk_customization_field_configuration fc WHERE fc.id_customization = ' . (int)$id_customization
      );
      if (sizeof($search) > 0) {
        $config = new ndkCfConfig((int)$search[0]['id']);
        if (Validate::isLoadedObject($config))
          $config->delete();
      }
      $customisation->delete();
    }
  }

  public static function deleteTempPackFromCart17($id_product, $id_customization = 0, $id_product_attribute = 0)
  {
    $tempProd = new Product($id_product);
    if ($tempProd->supplier_reference == 'myndkcustomprod')
      $tempProd->delete();

    if ((int)$id_customization > 0) {
      Db::getInstance()->execute('
				   DELETE FROM `' . _DB_PREFIX_ . 'customized_data`
				   WHERE id_customization = ' . (int)$id_customization);

      Db::getInstance()->execute('
				   DELETE FROM `' . _DB_PREFIX_ . 'customization`
				   WHERE id_customization = ' . (int)$id_customization);

      $search = Db::getInstance()->executeS(
        'SELECT fc.id_ndk_customization_field_configuration as id FROM ' . _DB_PREFIX_ . 'ndk_customization_field_configuration fc WHERE fc.id_customization = ' . (int)$id_customization
      );
      if (sizeof($search) > 0) {
        $config = new ndkCfConfig((int)$search[0]['id']);
        $config->delete();
      }
    }

    Db::getInstance()->execute('
			   DELETE FROM `' . _DB_PREFIX_ . 'cart_product`
			   WHERE id_product = ' . (int)$id_product . ' AND id_product_attribute=' . (int)$id_product_attribute . ' AND id_cart =' . (int)Context::getContext()->cart->id);
  }

  public static function copyImg($id_entity, $id_image = null, $url, $entity = 'products', $regenerate = true)
  {
    $tmpfile = tempnam(_PS_TMP_IMG_DIR_, 'ps_import');
    $watermark_types = explode(',', Configuration::get('WATERMARK_TYPES'));

    switch ($entity) {
      default:
      case 'products':
        $image_obj = new Image($id_image);
        $path = $image_obj->getPathForCreation();
        break;
      case 'categories':
        $path = _PS_CAT_IMG_DIR_ . (int)$id_entity;
        break;
      case 'manufacturers':
        $path = _PS_MANU_IMG_DIR_ . (int)$id_entity;
        break;
      case 'suppliers':
        $path = _PS_SUPP_IMG_DIR_ . (int)$id_entity;
        break;
    }

    $url = str_replace(' ', '%20', trim($url));
    $url = urldecode($url);
    $parced_url = parse_url($url);

    if (isset($parced_url['path'])) {
      $uri = ltrim($parced_url['path'], '/');
      $parts = explode('/', $uri);
      foreach ($parts as &$part)
        $part = urlencode($part);
      unset($part);
      $parced_url['path'] = '/' . implode('/', $parts);
    }

    if (isset($parced_url['query'])) {
      $query_parts = array();
      parse_str($parced_url['query'], $query_parts);
      $parced_url['query'] = http_build_query($query_parts);
    }

    if (!function_exists('http_build_url'))
      require_once(_PS_TOOL_DIR_ . 'http_build_url/http_build_url.php');

    $url = http_build_url('', $parced_url);

    // Evaluate the memory required to resize the image: if it's too much, you can't resize it.
    if (!ImageManager::checkImageMemoryLimit($url))
      return false;

    $orig_tmpfile = $tmpfile;

    // 'file_exists' doesn't work on distant file, and getimagesize makes the import slower.
    // Just hide the warning, the processing will be the same.
    if (Tools::copy($url, $tmpfile)) {
      $tgt_width = $tgt_height = 0;
      $src_width = $src_height = 0;
      $error = 0;
      ImageManager::resize(
        $tmpfile,
        $path . '.jpg',
        null,
        null,
        'jpg',
        false,
        $error,
        $tgt_width,
        $tgt_height,
        5,
        $src_width,
        $src_height
      );
      $images_types = ImageType::getImagesTypes($entity, true);

      if ($regenerate) {
        $previous_path = null;
        $path_infos = array();
        $path_infos[] = array($tgt_width, $tgt_height, $path . '.jpg');
        foreach ($images_types as $image_type) {
          $tmpfile = self::get_best_path($image_type['width'], $image_type['height'], $path_infos);

          if (ImageManager::resize(
            $tmpfile,
            $path . '-' . Tools::stripslashes($image_type['name']) . '.jpg',
            $image_type['width'],
            $image_type['height'],
            'jpg',
            false,
            $error,
            $tgt_width,
            $tgt_height,
            5,
            $src_width,
            $src_height
          )) {
            // the last image should not be added in the candidate list if it's bigger than the original image
            if ($tgt_width <= $src_width && $tgt_height <= $src_height)
              $path_infos[] = array($tgt_width, $tgt_height, $path . '-' . Tools::stripslashes($image_type['name']) . '.jpg');
          }
          if (in_array($image_type['id_image_type'], $watermark_types))
            Hook::exec('actionWatermark', array('id_image' => $id_image, 'id_product' => $id_entity));
        }
      }
    } else {
      @unlink($orig_tmpfile);
      return false;
    }
    unlink($orig_tmpfile);
    return true;
  }

  public static function get_best_path($tgt_width, $tgt_height, $path_infos)
  {
    $path_infos = array_reverse($path_infos);
    $path = '';
    foreach ($path_infos as $path_info) {
      list($width, $height, $path) = $path_info;
      if ($width >= $tgt_width && $height >= $tgt_height)
        return $path;
    }
    return $path;
  }

  public static function getproductsLight($ids_product)
  {
    $id_lang = Context::getContext()->language->id;
    return Db::getInstance()->executeS(
      '
				SELECT p.`id_product`, p.`reference`, pl.`name`
				FROM `' . _DB_PREFIX_ . 'product`p
				LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (
					p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = ' . (int)$id_lang . '
				)
				WHERE p.id_product IN (' . $ids_product . ') AND p.active = 1 GROUP BY id_product'
    );
  }

  public static function getCategoryproductsLight($id_category)
  {
    $id_lang = Context::getContext()->language->id;
    return Db::getInstance()->executeS(
      '
				SELECT p.`id_product`, p.`reference`, pl.`name`
				FROM `' . _DB_PREFIX_ . 'product`p
				LEFT JOIN `' . _DB_PREFIX_ . 'category_product` cp
					ON (p.`id_product` = cp.`id_product`)
				LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (
					p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = ' . (int)$id_lang . '
				)
				WHERE cp.id_category = ' . (int)$id_category . ' AND p.active = 1 GROUP BY id_product ORDER by name'
    );
  }



  public static function getProductInfos($id_product, $id_product_attribute = 0, $only_active = true, $id_lang = null, $lite_result = true, Context $context = null)
  {
    if (!$context)
      $context = Context::getContext();


    $id_lang = Context::getContext()->language->id;


    $sql = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, MAX(product_attribute_shop.id_product_attribute) id_product_attribute, product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity, pl.`description`, pl.`description_short`, pl.`available_now`,
								pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, MAX(image_shop.`id_image`) id_image,
								il.`legend`, m.`name` AS manufacturer_name, cl.`name` AS category_default, pa.weight as attrWeight,
								DATEDIFF(product_shop.`date_add`, DATE_SUB(NOW(),
								INTERVAL ' . (Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20) . '
									DAY)) > 0 AS new, product_shop.price AS orderprice, product_shop.wholesale_price , p.unity, p.unit_price_ratio
							FROM `' . _DB_PREFIX_ . 'product` p
							' . Shop::addSqlAssociation('product', 'p') . '
							LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute` pa
							ON (p.`id_product` = pa.`id_product` AND pa.id_product_attribute = ' . $id_product_attribute . ')
							' . Shop::addSqlAssociation('product_attribute', 'pa', false, 'product_attribute_shop.`default_on` = 1') . '
							' . Product::sqlStock('p', 'product_attribute_shop', false, $context->shop) . '
							LEFT JOIN `' . _DB_PREFIX_ . 'category_lang` cl
								ON (product_shop.`id_category_default` = cl.`id_category`
								AND cl.`id_lang` = ' . (int)$id_lang . Shop::addSqlRestrictionOnLang('cl') . ')
							LEFT JOIN `' . _DB_PREFIX_ . 'category_product` cp
								ON (product_shop.`id_product` = cp.`id_product`
								AND cl.`id_lang` = ' . (int)$id_lang . Shop::addSqlRestrictionOnLang('cl') . ')
							LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl
								ON (p.`id_product` = pl.`id_product`
								AND pl.`id_lang` = ' . (int)$id_lang . Shop::addSqlRestrictionOnLang('pl') . ')
							LEFT JOIN `' . _DB_PREFIX_ . 'image` i
								ON (i.`id_product` = p.`id_product`)' .
      Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1') . '
							LEFT JOIN `' . _DB_PREFIX_ . 'image_lang` il
								ON (image_shop.`id_image` = il.`id_image`
								AND il.`id_lang` = ' . (int)$id_lang . ')
							LEFT JOIN `' . _DB_PREFIX_ . 'manufacturer` m
								ON m.`id_manufacturer` = p.`id_manufacturer`
							WHERE product_shop.`id_shop` = ' . (int)$context->shop->id . '
							AND p.id_product = ' . (int)$id_product

      . ($only_active ? ' AND product_shop.`active` = 1' : '') . ' GROUP BY p.id_product';

    $sql .= ' ORDER BY p.id_product';



    $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

    if (!$result)
      return array();

    /* Modify SQL result */
    return Product::getProductsProperties($id_lang, $result);
  }

  public static function getProductAttributeCombinations($id_product)
  {
    $combinations = array();
    $context = Context::getContext();
    $product = new Product($id_product, $context->language->id);
    $attributes_groups = $product->getAttributesGroups($context->language->id);
    $att_grps = '';
    foreach ($attributes_groups as $k => $row) {
      $combinations[$row['id_product_attribute']]['attributes_values'][$row['id_attribute_group']] = $row['attribute_name'];
      $combinations[$row['id_product_attribute']]['attributes_group'][$row['id_attribute_group']] = $row['public_group_name'];

      $combinations[$row['id_product_attribute']]['attributes_groups'] = @implode(', ', $combinations[$row['id_product_attribute']]['attributes_group']);
      $att_grps = $combinations[$row['id_product_attribute']]['attributes_groups'];
      $combinations[$row['id_product_attribute']]['attributes_names'] = @implode(', ', $combinations[$row['id_product_attribute']]['attributes_values']);
      $combinations[$row['id_product_attribute']]['attributes'][] = (int)$row['id_attribute'];
      $combinations[$row['id_product_attribute']]['price'] = (float)$row['price'];

      // Call getPriceStatic in order to set $combination_specific_price
      if (!isset($combination_prices_set[(int)$row['id_product_attribute']])) {
        Product::getPriceStatic((int)$product->id, false, $row['id_product_attribute'], 6, null, false, true, 1, false, null, null, null, $combination_specific_price);
        $combination_prices_set[(int)$row['id_product_attribute']] = true;
        $combinations[$row['id_product_attribute']]['specific_price'] = $combination_specific_price;
      }
      $combinations[$row['id_product_attribute']]['ecotax'] = (float)$row['ecotax'];
      $combinations[$row['id_product_attribute']]['weight'] = (float)$row['weight'];
      $combinations[$row['id_product_attribute']]['quantity'] = (int)$row['quantity'];
      $combinations[$row['id_product_attribute']]['reference'] = $row['reference'];
      $combinations[$row['id_product_attribute']]['unit_impact'] = $row['unit_price_impact'];
      $combinations[$row['id_product_attribute']]['minimal_quantity'] = $row['minimal_quantity'];
      if ($row['available_date'] != '0000-00-00') {
        $combinations[$row['id_product_attribute']]['available_date'] = $row['available_date'];
        $combinations[$row['id_product_attribute']]['date_formatted'] = Tools::displayDate($row['available_date']);
      } else
        $combinations[$row['id_product_attribute']]['available_date'] = '';
      foreach ($combinations as $id_product_attribute => $comb) {
        $attribute_list = '';
        foreach ($comb['attributes'] as $id_attribute)
          $attribute_list .= '\'' . (int)$id_attribute . '\',';
        $attribute_list = rtrim($attribute_list, ',');
        $combinations[$id_product_attribute]['list'] = $attribute_list;
      }
    }
    $comb = array(
      'attribute_groups' => $att_grps,
      'values' => $combinations
    );

    return $comb;
  }

  public static function getIdCombination($id_product, $attr1, $attr2)
  {
    $myresult = 0;
    $sql = 'SELECT pac.id_product_attribute
						FROM ' . _DB_PREFIX_ . 'product_attribute_combination pac
						LEFT JOIN ' . _DB_PREFIX_ . 'product_attribute pa ON (pa.id_product_attribute = pac.id_product_attribute)
						WHERE pa.id_product = ' . (int)$id_product . ' AND (pac.id_attribute = ' . (int)$attr1 . ' OR pac.id_attribute = ' . (int)$attr2 . ')';

    $datas = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

    $viewed = array();
    foreach ($datas as $item) {
      $viewed[] = (int)$item['id_product_attribute'];
    }

    $array_count = array_count_values($viewed);

    foreach ($array_count as $key => $value) {
      if ($value > 1)
        $myresult = (int)$key;
    }

    if ($myresult == 0 && sizeof($datas) > 0)
      $myresult = (int)$datas[0]['id_product_attribute'];

    return (int)$myresult;
  }

  public static function getProductAttributeCombinationsTab($id_product)
  {
    $combinations = array();
    $context = Context::getContext();
    $product = new Product($id_product, $context->language->id);
    $attributes_groups = $product->getAttributesGroups($context->language->id);
    $attributes_groups_ok = array();


    foreach ($attributes_groups as $value) {
      $id = $value['id_attribute'];
      if (!isset($attributes_groups_ok[$id]))
        $attributes_groups_ok[$id] = array();

      $attributes_groups_ok[$id] = $value;
    }

    $attr = array();
    $i = 0;
    foreach ($attributes_groups_ok as $item) {
      if ($i == 0)
        $col_group = $item['id_attribute_group'];

      if ($item['id_attribute_group'] == $col_group)
        $attr['cols'][] = $item;
      else
        $attr['rows'][] = $item;

      $i++;
    }
    if (!isset($attr['rows']))
      $attr['rows'] = false;

    return $attr;
  }


  public static function getAttributeImageAssociations($id_product_attribute, $id_product, $allow_no_picture = false)
  {
    $combination_images = array();
    $data = Db::getInstance()->executeS('
				SELECT `id_image`
				FROM `' . _DB_PREFIX_ . 'product_attribute_image`
				WHERE `id_product_attribute` = ' . (int)$id_product_attribute);

    foreach ($data as $row) {
      $combination_images[] = (int)$row['id_image'];
    }
    if (sizeof($combination_images) > 0)
      return $combination_images[0];
    else
		    	if ($allow_no_picture)
      return false;
    else
      return product::getCover($id_product)['id_image'];
  }

  public static function getAttributeImagesAssociations($id_product_attribute, $id_product)
  {
    $combination_images = array();
    $data = Db::getInstance()->executeS(
      '
				SELECT `' . _DB_PREFIX_ . 'product_attribute_image`.`id_image`
				FROM `' . _DB_PREFIX_ . 'product_attribute_image`
				JOIN `' . _DB_PREFIX_ . 'image`
				ON `' . _DB_PREFIX_ . 'product_attribute_image`.`id_image` = `' . _DB_PREFIX_ . 'image`.`id_image`
				WHERE `id_product_attribute` = ' . (int)$id_product_attribute . '
				ORDER BY `position` ASC'
    );
    foreach ($data as $row) {
      $combination_images[] = (int)$row['id_image'];
    }
    $combination_images[] = product::getCover($id_product)['id_image'];
    if (sizeof($combination_images) > 0)
      return $combination_images;
    else
      return false;
  }


  public static function getQuantityDiscount($id_product)
  {
    $context = Context::getContext();
    $id_customer = (isset($context->customer) ? (int)$context->customer->id : 0);
    $id_group = (int)Group::getCurrent()->id;
    $id_country = $id_customer ? (int)Customer::getCurrentCountry($id_customer) : (int)Tools::getCountry();

    $quantity_discounts = SpecificPrice::getQuantityDiscounts((int)$id_product, (int)$context->shop->id, (int)$context->cookie->id_currency, (int)$id_country, (int)$id_group, null, true, (int)$context->customer->id);
    foreach ($quantity_discounts as &$quantity_discount) {
      if ($quantity_discount['id_product_attribute']) {
        $combination = new Combination((int)$quantity_discount['id_product_attribute']);
        $attributes = $combination->getAttributesName((int)$this->context->language->id);
        foreach ($attributes as $attribute) {
          $quantity_discount['attributes'] = $attribute['name'] . ' - ';
        }
        $quantity_discount['attributes'] = rtrim($quantity_discount['attributes'], ' - ');
      }
      if ((int)$quantity_discount['id_currency'] == 0 && $quantity_discount['reduction_type'] == 'amount') {
        $quantity_discount['reduction'] = Tools::convertPriceFull($quantity_discount['reduction'], null, Context::getContext()->currency);
      }
    }
    $product = new Product((int)$id_product);
    $product_price = $product->getPrice(Product::$_taxCalculationMethod == PS_TAX_INC, false);
    $tax = (float)$product->getTaxesRate(new Address((int)$context->cart->{Configuration::get('PS_TAX_ADDRESS_TYPE')}));
    $ecotax_rate = (float)Tax::getProductEcotaxRate($context->cart->{Configuration::get('PS_TAX_ADDRESS_TYPE')});
    $ecotax_tax_amount = Tools::ps_round($product->ecotax, 2);
    if (Product::$_taxCalculationMethod == PS_TAX_INC && (int)Configuration::get('PS_TAX')) {
      $ecotax_tax_amount = Tools::ps_round($ecotax_tax_amount * (1 + $ecotax_rate / 100), 2);
    }

    return NdkCf::formatQuantityDiscounts($quantity_discounts, $product_price, (float)$tax, $ecotax_tax_amount);
  }

  public static function formatQuantityDiscounts($specific_prices, $price, $tax_rate, $ecotax_amount)
  {
    foreach ($specific_prices as $key => &$row) {
      $row['quantity'] = &$row['from_quantity'];
      if ($row['price'] >= 0) {
        // The price may be directly set

        $cur_price = (!$row['reduction_tax'] ? $row['price'] : $row['price'] * (1 + $tax_rate / 100)) + (float)$ecotax_amount;

        if ($row['reduction_type'] == 'amount') {
          $cur_price -= ($row['reduction_tax'] ? $row['reduction'] : $row['reduction'] / (1 + $tax_rate / 100));
          $row['reduction_with_tax'] = $row['reduction_tax'] ? $row['reduction'] : $row['reduction'] / (1 + $tax_rate / 100);
        } else {
          $cur_price *= 1 - $row['reduction'];
        }

        $row['real_value'] = $price > 0 ? $price - $cur_price : $cur_price;
      } else {
        if ($row['reduction_type'] == 'amount') {
          if (Product::$_taxCalculationMethod == PS_TAX_INC) {
            $row['real_value'] = $row['reduction_tax'] == 1 ? $row['reduction'] : $row['reduction'] * (1 + $tax_rate / 100);
          } else {
            $row['real_value'] = $row['reduction_tax'] == 0 ? $row['reduction'] : $row['reduction'] / (1 + $tax_rate / 100);
          }
          $row['reduction_with_tax'] = $row['reduction_tax'] ? $row['reduction'] : $row['reduction'] +  ($row['reduction'] * $tax_rate) / 100;
        } else {
          $row['real_value'] = $row['reduction'] * 100;
        }
      }
      $row['nextQuantity'] = (isset($specific_prices[$key + 1]) ? (int)$specific_prices[$key + 1]['from_quantity'] : -1);
    }
    return $specific_prices;
  }

  public static function l($string, $specific = false)
  {
    return Translate::getModuleTranslation('ndk_advanced_custom_fields', $string, 'ndkcf');
  }



  public static function duplicateGroupReductionCache($id_product_old, $id_product_new)
  {
    $query = '
				SELECT *
				FROM `' . _DB_PREFIX_ . 'product_group_reduction_cache`
				WHERE `id_product` = ' . (int)$id_product_old;

    $rows = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);


    if (sizeof($rows) > 0) {
      foreach ($rows as $row) {
        $check = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
						SELECT *
						FROM `' . _DB_PREFIX_ . 'product_group_reduction_cache`
						WHERE `id_group` = ' . $row['id_group'] . ' AND `id_product` = ' . (int)$id_product_new, false);


        $query = 'INSERT INTO `' . _DB_PREFIX_ . 'product_group_reduction_cache` (`id_product`, `id_group`, `reduction`)
						VALUES (' . $id_product_new . ', ' . $row['id_group'] . ', ' . $row['reduction'] . ')';
        Db::getInstance()->execute($query);
      }
    }

    return true;
  }



  public static function getAttributesLang($id_product, $id_combination, $id_lang, $attribute_value_separator = ' - ', $attribute_separator = ', ')
  {
    $combName = '';
    if (!Combination::isFeatureActive()) {
      return array();
    }

    $combinations = Db::getInstance()->executeS('SELECT pa.*, product_attribute_shop.*
		        				FROM `' . _DB_PREFIX_ . 'product_attribute` pa
		        				' . Shop::addSqlAssociation('product_attribute', 'pa') . '
		        				WHERE pa.`id_product` = ' . (int)$id_product . '
		        				GROUP BY pa.`id_product_attribute`');

    if (!$combinations) {
      return false;
    }

    $product_attributes = array();
    foreach ($combinations as $combination) {
      $product_attributes[] = (int)$combination['id_product_attribute'];
    }

    $lang = Db::getInstance()->executeS('SELECT pac.id_product_attribute, GROUP_CONCAT(agl.`name`, \'' . pSQL($attribute_value_separator) . '\',al.`name` ORDER BY agl.`id_attribute_group` SEPARATOR \'' . pSQL($attribute_separator) . '\') as attribute_designation
		        				FROM `' . _DB_PREFIX_ . 'product_attribute_combination` pac
		        				LEFT JOIN `' . _DB_PREFIX_ . 'attribute` a ON a.`id_attribute` = pac.`id_attribute`
		        				LEFT JOIN `' . _DB_PREFIX_ . 'attribute_group` ag ON ag.`id_attribute_group` = a.`id_attribute_group`
		        				LEFT JOIN `' . _DB_PREFIX_ . 'attribute_lang` al ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = ' . (int)$id_lang . ')
		        				LEFT JOIN `' . _DB_PREFIX_ . 'attribute_group_lang` agl ON (ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = ' . (int)$id_lang . ')
		        				WHERE pac.id_product_attribute IN (' . implode(',', $product_attributes) . ')
		        				GROUP BY pac.id_product_attribute');

    foreach ($lang as $k => $row) {
      $combinations[$k]['attribute_designation'] = $row['attribute_designation'];
    }

    //Get quantity of each variations
    foreach ($combinations as $key => $row) {
      $cache_key = $row['id_product'] . '_' . $row['id_product_attribute'] . '_quantity';

      if (!Cache::isStored($cache_key)) {
        $result = StockAvailable::getQuantityAvailableByProduct($row['id_product'], $row['id_product_attribute']);
        Cache::store(
          $cache_key,
          $result
        );
        $combinations[$key]['quantity'] = $result;
      } else {
        $combinations[$key]['quantity'] = Cache::retrieve($cache_key);
      }
    }

    foreach ($combinations as $row) {
      if ($row['id_product_attribute'] == (int)$id_combination)
        $combName = $row['attribute_designation'];
    }

    return $combName;
  }


  public static function getAttributePrice($id_product, $id_product_attribute)
  {

    $context = Context::getContext();
    $quantity = 1;
    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));
    $usetax = Group::getPriceDisplayMethod(Group::getPriceDisplayMethod(Context::getContext()->customer->id_default_group));
    $usetax = Product::$_taxCalculationMethod == PS_TAX_INC;

    if ((int)$id_product_attribute == 0)
      $id_product_attribute = null;
    else
      $id_product_attribute = (int)$id_product_attribute;

    return Product::getPriceStatic((int)$id_product, $usetax, $id_product_attribute, 6, null, false, true, $quantity, false, (int)$context->customer->id, (int)$context->cart->id);
  }

  public static function getNdkTaxeRate($id_product)
  {

    $id_address = (int)Context::getContext()->cart->id_address_invoice;
    $address = Address::initialize($id_address, true);
    $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, Context::getContext()));
    $product_tax_calculator = $tax_manager->getTaxCalculator();
    return $product_tax_calculator->getTotalRate();
  }

  public static function class_exists_ndk($class)
  {
    return class_exists($class);
  }

  public static function clearAllCache()
  {
    Db::getInstance()->Execute('TRUNCATE TABLE `' . _DB_PREFIX_ . 'ndk_customization_field_cache`');
  }
}
