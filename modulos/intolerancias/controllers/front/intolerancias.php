<?php
class IntoleranciasIntoleranciasModuleFrontController extends ModuleFrontController{
    public $php_self = 'intolerancias';



    public function initContent(){
    parent::initContent();
    //$this->setTemplate('module:intolerancias/views/templates/front/products-allergy.tpl');
    $this->setTemplate('products-allergy.tpl');
  }



    public function postProcess(){ 

        parent::initContent();
        
        //if (Tools::isSubmit('action')) {
        $context = Context::getContext();
        $allergy_selected = Tools::getValue('allergy_selected');

        if($allergy_selected != ""){
            $sql = "SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, pl.`description`, pl.`description_short`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, pl.`available_now`, pl.`available_later`, image_shop.`id_image` id_image, il.`legend`, m.`name` AS manufacturer_name, product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity, IFNULL(product_attribute_shop.id_product_attribute,0) id_product_attribute";
            $sql .= " FROM `". _DB_PREFIX_ ."product` p";
            $sql .= " INNER JOIN ". _DB_PREFIX_ ."product_shop product_shop ON (product_shop.id_product = p.id_product AND product_shop.id_shop = ".$context->shop->id.")";
            $sql .= " INNER JOIN ps_product_intolerance_allergy pia ON (pia.id_product = p.id_product AND pia.id_shop = ".$context->shop->id.")";
            $sql .= " LEFT JOIN `ps_product_lang` `pl` ON (p.`id_product` = pl.`id_product` AND pl.`id_lang` = ".$this->context->language->id." AND pl.id_shop = ".$context->shop->id.")";
            $sql .= " LEFT JOIN `ps_image_shop` `image_shop` ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop=1".$context->shop->id.")";
            $sql .= " LEFT JOIN `ps_image_lang` `il` ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = ".$this->context->language->id.")";
            $sql .= " LEFT JOIN `ps_manufacturer` `m` ON (m.`id_manufacturer` = p.`id_manufacturer`)";
            $sql .= " LEFT JOIN `ps_product_attribute_shop` `product_attribute_shop` ON (p.`id_product` = product_attribute_shop.`id_product` AND product_attribute_shop.`default_on` = 1 AND product_attribute_shop.id_shop=".$context->shop->id.")";
            $sql .= " LEFT JOIN ps_stock_available stock ON (stock.id_product = p.id_product AND stock.id_product_attribute = 0 AND stock.id_shop_group = 1 AND stock.id_shop = 0 ) ";
            $sql .= " WHERE
                        product_shop.`active` = 1 AND
                        product_shop.`visibility` IN ('both', 'catalog') AND
                        pia.`id_intolerance_allergy` in(".$allergy_selected.") and";
            $sql .= " EXISTS(
                        SELECT 1 FROM `ps_category_product` cp 
                        JOIN `ps_category_group` cg ON (cp.id_category = cg.id_category AND cg.`id_group` IN (1)) 
                        WHERE cp.`id_product` = p.`id_product`)";
            $sql .= " order by product_shop.`date_add` DESC";


            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

            $products_ids = array();
            foreach ($result as $row) {
                $products_ids[] = $row['id_product'];
            }


            // Thus you can avoid one query per product, because there will be only one query for all the products of the cart

            $id_lang = $this->context->language->id;
            Product::cacheFrontFeatures($products_ids, $id_lang);
            $products = Product::getProductsProperties((int)$id_lang, $result);

        }else{
            $products = array();
        }

        $this->context->smarty->assign(array(
            'products' => $products,
            'url_theme' => _PS_THEME_DIR_,
            'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
            'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
            'comparator_max_item' => Configuration::get('PS_COMPARATOR_MAX_ITEM')
        ));

        //$this->setTemplate(_PS_THEME_DIR_.'/product-allergy.tpl');
        //$this->setTemplate("module:intolerancias/views/templates/front/products-allergy.tpl");
        $this->setTemplate("products-allergy.tpl");
    }
}