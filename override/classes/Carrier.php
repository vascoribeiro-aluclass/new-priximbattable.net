<?php



class Carrier extends CarrierCore {
  public function getDeliveryPriceByWeight($total_weight, $id_zone, $product_list = null)
  {

      $id_carrier = (int) $this->id;
      $cache_key = $id_carrier . '_' . $total_weight . '_' . $id_zone;

      if (!isset(self::$price_by_weight[$cache_key])) {
          $sql = 'SELECT d.`price`
        FROM `' . _DB_PREFIX_ . 'delivery` d
        LEFT JOIN `' . _DB_PREFIX_ . 'range_weight` w ON (d.`id_range_weight` = w.`id_range_weight`)
        WHERE d.`id_zone` = ' . (int) $id_zone . '
          AND ' . (float) $total_weight . ' >= w.`delimiter1`
          AND ' . (float) $total_weight . ' < w.`delimiter2`
          AND d.`id_carrier` = ' . $id_carrier . '
          ' . Carrier::sqlDeliveryRangeShop('range_weight') . '
        ORDER BY w.`delimiter1` ASC';
          $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);
          if (!isset($result['price'])) {
              self::$price_by_weight[$cache_key] = $this->getMaxDeliveryPriceByWeight($id_zone);
          } else {
              self::$price_by_weight[$cache_key] = $result['price'];
          }
      }

      $price_by_weight = Hook::exec('actionDeliveryPriceByWeight', array('id_carrier' => $id_carrier, 'total_weight' => $total_weight, 'id_zone' => $id_zone));
      if (is_numeric($price_by_weight)) {
          self::$price_by_weight[$cache_key] = $price_by_weight;
      }

      return self::$price_by_weight[$cache_key] + AluclassCarrier::getCarrierPrice($product_list);
  }

}
?>
