<?php

class Order extends OrderCore {

  public function getProductsDetail()
  {
      return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
      SELECT od.*,ps.*,  od.product_id as id_product, IFNULL(lcp.`title`,"") as title_customization
      FROM `' . _DB_PREFIX_ . 'order_detail` od
      LEFT JOIN `' . _DB_PREFIX_ . 'link_customization_product` lcp ON lcp.`id_product_customization`   = od.product_id
      LEFT JOIN `' . _DB_PREFIX_ . 'product_shop` ps ON (ps.id_product = od.product_id AND ps.id_shop = od.id_shop)
      WHERE od.`id_order` = ' . (int) $this->id);
  }

}
