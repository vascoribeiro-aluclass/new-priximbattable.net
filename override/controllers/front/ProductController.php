<?php

/**
 *
 * @author Yassine Belkaid <yassine.belkaid87@gmail.com>
 */

class ProductController extends ProductControllerCore
{
    /**
     * Initializes common front page content: header, footer and side columns.
     */
    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign(array(
            'virtual_merchant' => $this->getRandomVirtualAssitant((int)Tools::getValue('id_product')),
        ));
    }

    private function getRandomVirtualAssitant($id_product)
    {
        $result = Db::getInstance()->getRow('SELECT * FROM `vendeur-virtuel` 
            WHERE `id_product` = '. (int)$id_product .' order by RAND()');

        if (!$result) {
            return false;
        }

        if (!$result['image']) {
            $result['image'] = 'vendeur-virtuel/vend_virtuel.png';
        }

        return $result;
    }
}