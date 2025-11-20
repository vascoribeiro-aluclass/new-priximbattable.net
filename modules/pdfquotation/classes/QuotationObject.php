<?php
/**
* Class QuotationObject
*
* @author    Empty
* @copyright 2007-2016 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

class QuotationObject extends ObjectModel
{
	/** @var integer */
	public $id_quotation;

	/** @var string */
	public $ref_quotation;

	/** @var integer */
    public $id_cart;

    /** @var integer */
    public $id_customer;

    /** @var string */
	public $first_name;

    /** @var string */
	public $last_name;

    /** @var string */
	public $email;

    /** @var string */
	public $phone;

    /** @var integer */
	public $contacted;

    /** @var integer */
    public $date_add;

    /** @var integer */
    public $deleted;

    public $link_cart;

    public $link_qrcode;
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'quotation',
        'primary' => 'id_quotation',
        'multilang' => FALSE,
        'fields' => array(
            'ref_quotation' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => FALSE, 'lang' => FALSE),
            'id_cart' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => TRUE, 'lang' => FALSE),
            'id_customer' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => FALSE, 'lang' => FALSE),
            'first_name' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => TRUE, 'lang' => FALSE),
            'last_name' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => TRUE, 'lang' => FALSE),
            'email' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => TRUE, 'lang' => FALSE),
            'phone' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => FALSE, 'lang' => FALSE),
            'contacted' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => TRUE, 'lang' => FALSE),
            'deleted' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => TRUE, 'lang' => FALSE),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate', 'required' => TRUE, 'lang' => FALSE),
            'link_cart' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'link_qrcode' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
        ),
    );

    public static function loadByIdQuotation($id_quotation){
        $result = Db::getInstance()->getRow('
            SELECT *
            FROM `'._DB_PREFIX_.'quotation` q
            WHERE q.`id_quotation` = '.(int)$id_quotation
        );

        return new QuotationObject($result['id_quotation']);
    }

    public function getByIdCustomer($idCustomer){
        $checaDesconto = Product::checaDescontosCatalogo();
      $result_prod = Db::getInstance()->executeS('
        SELECT
            cp.id_product,
            q.ref_quotation
        FROM `sp_quotation` q
        INNER JOIN sp_devis_product_historic cp ON cp.ref_quotation = q.ref_quotation
        WHERE q.id_customer = '.(int)$idCustomer.'
        AND q.deleted = 1
        AND q.date_add <= DATE_ADD(CURDATE(), INTERVAL 2 MONTH)
      ');
      $portes_Quot = [];
      foreach($result_prod as $prod_r){
        // $prod_[] = $prod_r['id_product'];
        $newporduct = new Product($prod_r['id_product'], false, 1);
        $arrayproduct = array();
        $arrayproduct[0]['description_short'] = $newporduct->description_short;
        $arrayproduct[0]['id_product'] = $newporduct->id;
        $arrayproduct[0]['cart_quantity'] = 1;
        $porte = AluclassCarrier::getCarrierPrice($arrayproduct);
        if (!isset($portes_Quot[$prod_r['ref_quotation']])) {
          $portes_Quot[$prod_r['ref_quotation']] = 0;
        }
        $portes_Quot[$prod_r['ref_quotation']] += $porte;
      }

      // exit;

      $results = Db::getInstance()->executeS('
        SELECT
            *,
            ROUND
            (
              (
                (
                    SUM(p.price)
                    - (SUM(p.price) * 0.' . intval($checaDesconto['reduction']) . ')
                ) * (1.20)
              ) - (
                  (
                      SUM(p.price)
                      - (SUM(p.price) * 0.' . intval($checaDesconto['reduction']) . ')
                  ) * (1.20)
                  * (IFNULL(cr.reduction_percent / 100, 0))
              ),
            2) AS total_products,
            cp.date_add as date_add,
            GROUP_CONCAT( CONCAT(sp_product_lang.name) SEPARATOR "\n") as products_name
        FROM `sp_quotation` q
        INNER JOIN sp_devis_product_historic cp ON cp.ref_quotation = q.ref_quotation
        INNER JOIN sp_product_lang ON sp_product_lang.id_product = cp.id_product
        INNER JOIN sp_product p ON p.id_product = cp.id_product
        left join sp_cart_cart_rule ccr on ccr.id_cart = q.id_cart
        left join sp_cart_rule cr on cr.id_cart_rule = ccr.id_cart_rule
        WHERE q.id_customer = '.(int)$idCustomer.'
        AND q.deleted = 1
        AND q.date_add <= DATE_ADD(CURDATE(), INTERVAL 2 MONTH)
        GROUP BY q.ref_quotation
      ');



        foreach($results as &$result) {
            // $cartObj = new Cart($result['id_cart']);
            $refQuotation = $result['ref_quotation'];
            $result['totalPortes'] = isset($portes_Quot[$refQuotation]) ? $portes_Quot[$refQuotation] : 0;
            // $result['total'] = $result['total_products'] + round(($result['totalPortes'] * 1.20), 2);
            $result['products'] = $result['products_name'];
            // var_dump($result['products_name']);
        }

        // $results = Db::getInstance()->executeS('
        //     SELECT *
        //     FROM `'._DB_PREFIX_.'quotation` q
        //     WHERE q.`id_customer` = '.(int)$idCustomer.' '.
        //     'AND q.deleted=1'
        // );

        // foreach($results as &$result) {
        //     $cartObj = new Cart($result['id_cart']);
        //     $result['total'] = $cartObj->getOrderTotal();
        //     $result['products'] = $cartObj->getProducts();
        // }

        return $results;
    }

    public static function loadByIdAndCustomer($idQuotation, $idCustomer) {
        $result = Db::getInstance()->getRow('
            SELECT *
            FROM `'._DB_PREFIX_.'quotation` quotation
            WHERE quotation.`id_quotation` = '.(int)$idQuotation.' '.
            'AND quotation.`id_customer` = '.(int)$idCustomer
        );

        if(!empty($result['id_quotation'])) {
            return new QuotationObject($result['id_quotation']);
        }
        else {
            return null;
        }
    }
}

