<?php

/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */
class SpecificPrice extends SpecificPriceCore
{


  /**
   * Returns the specificPrice information related to a given productId and context.
   *
   * @param int $id_product
   * @param int $id_shop
   * @param int $id_currency
   * @param int $id_country
   * @param int $id_group
   * @param int $quantity
   * @param int $id_product_attribute
   * @param int $id_customer
   * @param int $id_cart
   * @param int $real_quantity
   *
   * @return array
   */
  public static function getSpecificPrice(
    $id_product,
    $id_shop,
    $id_currency,
    $id_country,
    $id_group,
    $quantity,
    $id_product_attribute = null,
    $id_customer = 0,
    $id_cart = 0,
    $real_quantity = 0
  ) {
    if (!SpecificPrice::isFeatureActive()) {
      return [];
    }
    /*
         * The date is not taken into account for the cache, but this is for the better because it keeps the consistency
         * for the whole script.
         * The price must not change between the top and the bottom of the page
        */

    if (!self::couldHaveSpecificPrice($id_product)) {
      return [];
    }

    if (static::$psQtyDiscountOnCombination === null) {
      static::$psQtyDiscountOnCombination = Configuration::get('PS_QTY_DISCOUNT_ON_COMBINATION');
      // no need to compute the key the first time the function is called, we know the cache has not
      // been computed yet
      $key = null;
    } else {
      $key = self::computeKey(
        $id_product,
        $id_shop,
        $id_currency,
        $id_country,
        $id_group,
        $quantity,
        $id_product_attribute,
        $id_customer,
        $id_cart,
        $real_quantity
      );
    }

    $customProd = new Product($id_product);
    $context = Context::getContext();
    $id_category = false;

    if (preg_match('/\[@(\d+)@\]/', $customProd->description_short[(int)$context->language->id], $findNum)) {
      $id_category = $findNum[1];
    } else {
      $id_category = $customProd->id_category_default;
    }

    $query = '
              SELECT *, ' . SpecificPrice::_getScoreQuery($id_product, $id_shop, $id_currency, $id_country, $id_group, $id_customer) . '
                FROM `' . _DB_PREFIX_ . 'specific_price_customize`
                WHERE
                        `id_shop` ' . self::formatIntInQuery(0, $id_shop) . ' AND
                        `id_currency` ' . self::formatIntInQuery(0, $id_currency) . ' AND
                        `id_country` ' . self::formatIntInQuery(0, $id_country) . ' AND
                        `id_group` ' . self::formatIntInQuery(0, $id_group) . ' AND
                        `id_category` = ' . $id_category . ' AND
                         NOW() BETWEEN `from` AND `to`
                AND IF(`from_quantity` > 1, `from_quantity`, 0) <= ';

    $query .= (static::$psQtyDiscountOnCombination || !$id_cart || !$real_quantity) ? (int) $quantity : max(1, (int) $real_quantity);

    $Reducfamaly = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($query);


    if (!empty($Reducfamaly)) {
      return  Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($query);
    }

    if (!array_key_exists($key, self::$_specificPriceCache)) {
      $query_extra = self::computeExtraConditions($id_product, $id_product_attribute, $id_customer, $id_cart);
      if ($key === null) {
        // compute the key after calling computeExtraConditions as it initializes some useful cache
        $key = self::computeKey(
          $id_product,
          $id_shop,
          $id_currency,
          $id_country,
          $id_group,
          $quantity,
          $id_product_attribute,
          $id_customer,
          $id_cart,
          $real_quantity
        );
      }
      $query = '
			SELECT *, ' . SpecificPrice::_getScoreQuery($id_product, $id_shop, $id_currency, $id_country, $id_group, $id_customer) . '
				FROM `' . _DB_PREFIX_ . 'specific_price`
				WHERE
                `id_shop` ' . self::formatIntInQuery(0, $id_shop) . ' AND
                `id_currency` ' . self::formatIntInQuery(0, $id_currency) . ' AND
                `id_country` ' . self::formatIntInQuery(0, $id_country) . ' AND
                `id_group` ' . self::formatIntInQuery(0, $id_group) . ' ' . $query_extra . '
				AND IF(`from_quantity` > 1, `from_quantity`, 0) <= ';

      $query .= (static::$psQtyDiscountOnCombination || !$id_cart || !$real_quantity) ? (int) $quantity : max(1, (int) $real_quantity);
      $query .= ' ORDER BY `id_product_attribute` DESC, `id_cart` DESC, `from_quantity` DESC, `id_specific_price_rule` ASC, `score` DESC, `to` DESC, `from` DESC';
      self::$_specificPriceCache[$key] = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($query);
    }

    return self::$_specificPriceCache[$key];
  }
}
