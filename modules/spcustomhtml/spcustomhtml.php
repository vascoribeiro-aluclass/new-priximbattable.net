<?php
/**
 * package SP Custom Html
 *
 * @version 1.0.1
 * @author    MagenTech http://www.magentech.com
 * @copyright (c) 2014 YouTech Company. All Rights Reserved.
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

if (!defined ('_PS_VERSION_'))
	exit;
include_once ( dirname (__FILE__).'/SpCustomHtmlClass.php' );

class SpCustomHtml extends Module
{
	protected $error = false;
	private $html;
	private $default_hook = array( 
		'displayID1CustomhtmlHeader1',
		'displayID1CustomhtmlHeader2',
		'displayID1Customhtml',
		'displayID1Customhtml2',
		'displayID1Customhtml3',
		'displayID1Customhtml4',
		'displayID1Customhtml5',
		'displayID1Customhtml6',
		'displayCustomhtmlFooter1',
		'displayCustomhtmlFooter2',
		'displayID2Customhtml',
		'displayID2Customhtml2',
		'displayID2Customhtml3',
		'displayID3Customhtml',
		'displayID3Customhtml2',
		'displayID4Customhtml',
		'displayID4Customhtml2',
		'displayID4Customhtml3',
		'displayID4Customhtml4',
		'displayID4Customhtml5',
		'displayID5Customhtml',
		'displayID5Customhtml2',
		'displayID5Customhtml3',
		'displayID5Customhtml4',
		'displayID5CustomhtmlHeader1',
		'displayID5CustomhtmlHeader2',
		'displayFooter',
		'displayLeftColumn',
		'displayFooterMiddle',
		'displayFooterBottom',
		'displayCustomProduct');

	public function __construct()
	{
		$this->name = 'spcustomhtml';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'priximbattable';
		$this->secure_key = Tools::encrypt ($this->name);
		$this->bootstrap = true;
		parent::__construct ();
		$this->displayName = $this->l('Custom Html');
		$this->description = $this->l('This Module allows you to create your own HTML Module using a WYSIWYG editor.');
		$this->confirmUninstall = $this->l('Are you sure?');
		$this->ps_versions_compliancy = array('min' => '1.6.0.9', 'max' => _PS_VERSION_);
	}

	public function install()
	{
		if (parent::install () == false || !$this->registerHook ('header') || !$this->registerHook ('actionShopDataDuplication'))
			return false;
		foreach ($this->default_hook as $hook)
		{
			if (!$this->registerHook ($hook))
				return false;
		}
		$spcustomhtml = Db::getInstance ()->Execute ('DROP TABLE IF EXISTS `'._DB_PREFIX_.'spcustomhtml`')
			&& Db::getInstance ()->Execute ('CREATE TABLE `'._DB_PREFIX_.'spcustomhtml` (`id_spcustomhtml` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`hook` int(10) unsigned, 
			`params` text NOT NULL DEFAULT \'\' ,
			`active` tinyint(1) NOT NULL DEFAULT \'1\',
			`ordering` int(10) unsigned NOT NULL,
			PRIMARY KEY (`id_spcustomhtml`)) ENGINE=InnoDB default CHARSET=utf8');
		$spcustomhtml_shop = Db::getInstance ()->Execute ('DROP TABLE IF EXISTS `'._DB_PREFIX_.'spcustomhtml_shop`')
			&& Db::getInstance ()->Execute ('CREATE TABLE `'._DB_PREFIX_.'spcustomhtml_shop` (`id_spcustomhtml` int(10) unsigned NOT NULL,
			`id_shop` int(10) unsigned NOT NULL, 
			`active` tinyint(1) NOT NULL DEFAULT \'1\',
			PRIMARY KEY (`id_spcustomhtml`,`id_shop`)) ENGINE=InnoDB default CHARSET=utf8');
		$spcustomhtml_lang = Db::getInstance ()->Execute ('DROP TABLE IF EXISTS `'._DB_PREFIX_.'spcustomhtml_lang`')
			&& Db::getInstance ()->Execute ('CREATE TABLE '._DB_PREFIX_.'spcustomhtml_lang (`id_spcustomhtml` int(10) unsigned NOT NULL,
			`id_lang` int(10) unsigned NOT NULL,
			`title_module` varchar(255) NOT NULL DEFAULT \'\',
			`content` text,
			PRIMARY KEY (`id_spcustomhtml`,`id_lang`)) ENGINE=InnoDB default CHARSET=utf8');
		if (!$spcustomhtml || !$spcustomhtml_shop || !$spcustomhtml_lang)
			return false;

		$this->installFixtures();

		return true;
	}

	public function uninstall()
	{
		if (parent::uninstall () == false)
			return false;
		if (!Db::getInstance ()->Execute ('DROP TABLE IF EXISTS `'._DB_PREFIX_.'spcustomhtml`')
			|| !Db::getInstance ()->Execute ('DROP TABLE IF EXISTS `'._DB_PREFIX_.'spcustomhtml_shop`')
			|| !Db::getInstance ()->Execute ('DROP TABLE IF EXISTS `'._DB_PREFIX_.'spcustomhtml_lang`'))
			return false;
		$this->clearCacheItemForHook ();
		return true;
	}
	public function installFixtures()
	{
		$ps_root_dir=str_replace("\\","/",__PS_BASE_URI__);
		$datas = array(
			array(
				'active' => 1,
				'id_spcustomhtml' => 1,
				'hook' => Hook::getIdByName('displayLeftColumn'),
				'title_module' => 'Image Left',
				'content' => 	'
								<a href="#">
									<img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/image-left.jpg" alt="left Image" />
								</a>
				',
				'moduleclass_sfx' => 'image-left block',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 2,
				'hook' => Hook::getIdByName('displayID1CustomhtmlHeader1'),
				'title_module' => 'Custom Support',
				'content' => 	'
										<ul>
											<li class="live-chat"><a href="#">Start <strong>live chat</strong></a></li>
											<li class="phone-support">Call our customer service at:<strong> 096-999-8386</strong></li>
										</ul>
								'
								,
				'moduleclass_sfx' => 'support-info',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 3,
				'hook' => Hook::getIdByName('displayID1CustomhtmlHeader2'),
				'title_module' => 'Free Shipping',
				'content' => 	'
									<img title="shipping" src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/icon-shipping.png" alt="shipping" />
								'
								,
				'moduleclass_sfx' => 'icon-shipping hidden-md-down',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 4,
				'hook' => Hook::getIdByName('displayID1Customhtml'),
				'title_module' => 'Deals Of The Day',
				'content' => 	'
									<div class="box-deal-html">
										<div class="box-title">
										<div class="title">
										<h2><strong>Deals Of</strong> The Day</h2>
										</div>
										<p>Mauris ut tincidunt nisi, id auctor libero. Etiam aliquet felis et consectetur faucibus. Praesent aliquam, lec tempus consequat, felis quam venenatis ligula</p>
										</div>
										<div class="box-categories">
										<div class="categories-in active">
										<div class="item-image"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cate01.jpg" alt="" /></a>
										<h3>Living Room</h3>
										</div>
										</div>
										<div class="categories-in">
										<div class="item-image"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cate02.jpg" alt="" /></a>
										<h3>Kitchen</h3>
										</div>
										</div>
										<div class="categories-in">
										<div class="item-image"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cate03.jpg" alt="" /></a>
										<h3>Work Place</h3>
										</div>
										</div>
										<div class="categories-in">
										<div class="item-image"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cate04.jpg" alt="" /></a>
										<h3>Wardrobe</h3>
										</div>
										</div>
										</div>
									</div>
				',
				'moduleclass_sfx' => 'box-deal',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 5,
				'hook' => Hook::getIdByName('displayID1Customhtml2'),
				'title_module' => 'Banner Top',
				'content' => 	'
									<div class="col-xs-4 images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner01.jpg" alt="" /></a></div>
									<div class="col-xs-4 images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner02.jpg" alt="" /></a></div>
									<div class="col-xs-4 images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner03.jpg" alt="" /></a></div>
				',
				'moduleclass_sfx' => 'box-banner-top clearfix',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 6,
				'hook' => Hook::getIdByName('displayID1Customhtml3'),
				'title_module' => 'Free Shipping',
				'content' => 	'
									<div class="bgr_shipping"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/shiping.jpg" alt="" /></a></div>
				',
				'moduleclass_sfx' => 'box-free-shipping',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 7,
				'hook' => Hook::getIdByName('displayID1Customhtml4'),
				'title_module' => 'Testimonial',
				'content' => 	'
								<div class="bg_testimonia">
									<div class="item">
										<div class="images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/tes1.jpg" alt="" /></a></div>
										<div class="bg_content">
										<p class="des">Fusce lorem ante, condimentum in massa, posuere bibendum. Maecenas euismod vulputate eu rhoncus. Pellentesque commodo posuere maximus. Phasellus pellentesque pellentesque facilisis.</p>
										<a href="#"><strong>JOHN DOE</strong> - Designer</a></div>
									</div>
									<div class="item">
										<div class="images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/tes1.jpg" alt="" /></a></div>
										<div class="bg_content">
										<p class="des">Fusce lorem ante, condimentum in massa, posuere bibendum. Maecenas euismod vulputate eu rhoncus. Pellentesque commodo posuere maximus. Phasellus pellentesque pellentesque facilisis.</p>
										<a href="#"><strong>JOHN DOE</strong> - Designer</a></div>
									</div>
									<div class="item">
										<div class="images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/tes1.jpg" alt="" /></a></div>
										<div class="bg_content">
										<p class="des">Fusce lorem ante, condimentum in massa, posuere bibendum. Maecenas euismod vulputate eu rhoncus. Pellentesque commodo posuere maximus. Phasellus pellentesque pellentesque facilisis.</p>
										<a href="#"><strong>JOHN DOE</strong> - Designer</a></div>
									</div>
									<div class="item">
										<div class="images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/tes1.jpg" alt="" /></a></div>
										<div class="bg_content">
										<p class="des">Fusce lorem ante, condimentum in massa, posuere bibendum. Maecenas euismod vulputate eu rhoncus. Pellentesque commodo posuere maximus. Phasellus pellentesque pellentesque facilisis.</p>
										<a href="#"><strong>JOHN DOE</strong> - Designer</a></div>
									</div>
								</div>
				',
				'moduleclass_sfx' => 'testimonial',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 8,
				'hook' => Hook::getIdByName('displayID1Customhtml5'),
				'title_module' => 'Hot Category',
				'content' => 	'
									<div class="list-category">
									<div class="row">
									<div class="item item1 col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="room dining-room active"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner04.jpg" alt="" /></a>
									<div class="wrap">
									<h3>DINING ROOM</h3>
									<ul>
									<li><a href="#">Large Coffee Tables</a></li>
									<li><a href="#">Small Coffee Tables</a></li>
									<li><a href="#">Coffee Table sets</a></li>
									<li><a href="#">Console Tables</a></li>
									<li><a href="#">Set Of Tables</a></li>
									<li><a href="#">End Tables</a></li>
									</ul>
									</div>
									</div>
									<div class="room living-room"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner05.jpg" alt="" /></a>
									<div class="wrap">
									<h3>Living room</h3>
									<ul>
									<li><a href="#">Coffee Table sets</a></li>
									<li><a href="#">End Tables</a></li>
									<li><a href="#">Console Tables</a></li>
									<li><a href="#">Set Of Tables</a></li>
									</ul>
									</div>
									</div>
									</div>
									<div class="item item2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="view-category">
									<div class="box-slider-title">
									<h2><strong>Hot</strong> Categories</h2>
									</div>
									<div class="content-category">Duis euismod eu nibh at pharetra. Vivamus placerat ac metus et placerat. Nulla molestie massa id est posuere, maximus hendrerit est rhoncus.</div>
									<a href="#">view all categories</a></div>
									<div class="room bed-room"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner06.jpg" alt="" /></a>
									<div class="wrap">
									<h3>Bed room</h3>
									<ul>
									<li><a href="#">Nightstands</a></li>
									<li><a href="#">Beds</a></li>
									<li><a href="#">Headboards</a></li>
									<li><a href="#">Chests & Dressers</a></li>
									<li><a href="#">Nightstands</a></li>
									<li><a href="#">Bedroom Sets</a></li>
									</ul>
									</div>
									</div>
									</div>
									<div class="item item3 col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="room kit-chen"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner07.jpg" alt="" /></a>
									<div class="wrap">
									<h3>Reading room</h3>
									<ul>
									<li><a href="#">Small Coffee Tables</a></li>
									<li><a href="#">Coffee Table sets</a></li>
									<li><a href="#">End Tables</a></li>
									<li><a href="#">Console Tables</a></li>
									<li><a href="#">Set Of Tables</a></li>
									</ul>
									</div>
									</div>
									<div class="room bath-room"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner08.jpg" alt="" /></a>
									<div class="wrap">
									<h3>Bathroom</h3>
									<ul>
									<li><a href="#">Bathroom Faucets</a></li>
									<li><a href="#">Bathroom Mirrors</a></li>
									<li><a href="#">Bathroom Sinks</a></li>
									<li><a href="#">Bathroom Vanities</a></li>
									<li><a href="#">Showers</a></li>
									</ul>
									</div>
									</div>
									</div>
									</div>
									</div>
				',
				'moduleclass_sfx' => 'hot-category',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 9,
				'hook' => Hook::getIdByName('displayID1Customhtml6'),
				'title_module' => 'Brand',
				'content' => 	'
									<div class="category-tab-content clearfix">
										<ul class="nav nav-tabs tab-left">
										<li class="block-title">
										<h3><strong>Featured</strong> Brands</h3>
										</li>
										<!-- Tab Content -->
										<li class="current"><a title="Brands" href="#category_tab_45"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/br1.jpg" alt="br1" /></a></li>
										<li><a title="Brands1" href="#category_tab_46"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/br3.jpg" alt="br1" /></a></li>
										<li><a title="Brands2" href="#category_tab_47"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/br4.jpg" alt="br1" /></a></li>
										</ul>
										<div class="tab-content">
										<div id="category_tab_45" class="tab-pane fade in active">
										<div class="tab-pane-inner"><img class="category-image" src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/brand1.jpg" alt="brand1" />
										<div class="item-description">
										<p>Nokia Corporation is a Finnish multinational communications and information technology company. Nokia is headquartered in Espoo, Uusimaa, in the greater Helsinki metropolitan area.</p>
										<a title="Brands" href="#">Shop Now</a></div>
										</div>
										</div>
										<div id="category_tab_46" class="tab-pane fade">
										<div class="tab-pane-inner"><img class="category-image" src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/brand2.jpg" alt="brand1" />
										<div class="item-description">
										<p>Nokia Corporation is a Finnish multinational communications and information technology company. Nokia is headquartered in Espoo, Uusimaa, in the greater Helsinki metropolitan area.</p>
										<a title="Brands1" href="#">Shop Now</a></div>
										</div>
										</div>
										<div id="category_tab_47" class="tab-pane fade">
										<div class="tab-pane-inner"><img class="category-image" src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/brand3.jpg" alt="brand1" />
										<div class="item-description">
										<p>Nokia Corporation is a Finnish multinational communications and information technology company. Nokia is headquartered in Espoo, Uusimaa, in the greater Helsinki metropolitan area.</p>
										<a title="Brands2" href="#">Shop Now</a></div>
										</div>
										</div>
										<div id="category_tab_48" class="tab-pane fade">
										<div class="tab-pane-inner"><img class="category-image" src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/brand4.jpg" alt="brand1" />
										<div class="item-description">
										<p>Nokia Corporation is a Finnish multinational communications and information technology company. Nokia is headquartered in Espoo, Uusimaa, in the greater Helsinki metropolitan area.</p>
										<a title="Brands2" href="#">Shop Now</a></div>
										</div>
										</div>
										<div id="category_tab_49" class="tab-pane fade">
										<div class="tab-pane-inner"><img class="category-image" src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/brand5.jpg" alt="brand1" />
										<div class="item-description">
										<p>Nokia Corporation is a Finnish multinational communications and information technology company. Nokia is headquartered in Espoo, Uusimaa, in the greater Helsinki metropolitan area.</p>
										<a title="Brands2" href="#">Shop Now</a></div>
										</div>
										</div>
										<div id="category_tab_50" class="tab-pane fade">
										<div class="tab-pane-inner"><img class="category-image" src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/brand6.jpg" alt="brand1" />
										<div class="item-description">
										<p>Nokia Corporation is a Finnish multinational communications and information technology company. Nokia is headquartered in Espoo, Uusimaa, in the greater Helsinki metropolitan area.</p>
										<a title="Brands2" href="#">Shop Now</a></div>
										</div>
										</div>
										</div>
										<ul class="nav nav-tabs tab-right">
										<li><a title="Brands3" href="#category_tab_48"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/br2.jpg" alt="br2" /></a></li>
										<li><a title="Brands4" href="#category_tab_49"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/br5.jpg" alt="br5" /></a></li>
										<li><a title="Brands5" href="#category_tab_50"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/br6.jpg" alt="br6" /></a></li>
										</ul>
										</div>
				',
				'moduleclass_sfx' => 'category-brand-tab',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 10,
				'hook' => Hook::getIdByName('displayCustomhtmlFooter1'),
				'title_module' => 'Need Help',
				'content' => 	'
									<div class="box-newsletter">
										<h3>NEED HELP? CALL OUR AWARD-WINNING</h3>
										<p>SUPPORT TEAM 24/7 AT (844) 555-8386</p>
									</div>
				',
				'moduleclass_sfx' => 'need-help col-lg-6 col-md-6 col-sm-6 col-xs-12',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 11,
				'hook' => Hook::getIdByName('displayCustomhtmlFooter2'),
				'title_module' => 'Download Our App',
				'content' => 	'
								<div class="down-app">
									<h3 class="title_block">
										Download Our App
									</h3>
									<p><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/app.png" alt="" /></a></p>
								</div>
				',
				'moduleclass_sfx' => '',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 12,
				'hook' => Hook::getIdByName('displayID2Customhtml'),
				'title_module' => 'Banner Top Layout 2',
				'content' => 	'
									<div class="col-xs-4 images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner09.jpg" alt="" /></a></div>
									<div class="col-xs-4 images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner10.jpg" alt="" /></a></div>
									<div class="col-xs-4 images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner11.jpg" alt="" /></a></div>
								',
				'moduleclass_sfx' => 'box-banner-top clearfix',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 13,
				'hook' => Hook::getIdByName('displayID2Customhtml2'),
				'title_module' => 'Banner Center Layout 2',
				'content' => 	'
									<div class="bgr_shipping"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner-center.jpg" alt="" /></a></div>
				',
				'moduleclass_sfx' => 'box-banner-top clearfix',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 14,
				'hook' => Hook::getIdByName('displayID2Customhtml3'),
				'title_module' => 'Categories Deal',
				'content' => 	'
							<div class="top-tab-deal clearfix">
								<ul>
									<li class="active"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/1.png" alt="" /></a>
										<h3><a href="#">Living room</a></h3>
									</li>
									<li><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/2.png" alt="" /></a>
										<h3><a href="#">OFFICE</a></h3>
									</li>
									<li><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/3.png" alt="" /></a>
										<h3><a href="#">Armchair</a></h3>
									</li>
									<li><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/4.png" alt="" /></a>
										<h3><a href="#">DINING room</a></h3>
									</li>
									<li><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/5.png" alt="" /></a>
										<h3><a href="#">SHELF</a></h3>
									</li>
									<li><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/6.png" alt="" /></a>
										<h3><a href="#">BED ROOM</a></h3>
									</li>
									<li><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/7.png" alt="" /></a>
										<h3><a href="#">Sofa</a></h3>
									</li>
									<li><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/8.png" alt="" /></a>
										<h3><a href="#">WALL DECOR</a></h3>
									</li>
									<li><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/9.png" alt="" /></a>
										<h3><a href="#">Nightstand</a></h3>
									</li>
								</ul>
							</div>
				',
				'moduleclass_sfx' => 'box-cate-deal',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 15,
				'hook' => Hook::getIdByName('displayID3Customhtml'),
				'title_module' => 'Deals Of The Day',
				'content' => 	'
									<div class="box-deal-html">
										<div class="box-title">
										<div class="title">
										<h2><strong>Deals Of</strong> The Day</h2>
										</div>
										<p>Mauris ut tincidunt nisi, id auctor libero. Etiam aliquet felis et consectetur faucibus. Praesent aliquam, lec tempus consequat, felis quam venenatis ligula</p>
										</div>
										<div class="box-categories">
										<div class="categories-in active">
										<div class="item-image"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cate05.jpg" alt="" /></a>
										<h3>Living Room</h3>
										</div>
										</div>
										<div class="categories-in">
										<div class="item-image"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cate06.jpg" alt="" /></a>
										<h3>Kitchen</h3>
										</div>
										</div>
										<div class="categories-in">
										<div class="item-image"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cate07.jpg" alt="" /></a>
										<h3>Work Place</h3>
										</div>
										</div>
										<div class="categories-in">
										<div class="item-image"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cate08.jpg" alt="" /></a>
										<h3>Wardrobe</h3>
										</div>
										</div>
										</div>
									</div>
				',
				'moduleclass_sfx' => 'box-deal',
				'display_title_module' =>  0
			),
			
			array(
				'active' => 1,
				'id_spcustomhtml' => 16,
				'hook' => Hook::getIdByName('displayID3Customhtml2'),
				'title_module' => 'Banner Top',
				'content' => 	'
									<div class="col-xs-4 images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner01.jpg" alt="" /></a></div>
									<div class="col-xs-4 images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner12.jpg" alt="" /></a></div>
									<div class="col-xs-4 images"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner03.jpg" alt="" /></a></div>
				',
				'moduleclass_sfx' => 'box-banner-top clearfix',
				'display_title_module' =>  0
			),
			
			array(
				'active' => 1,
				'id_spcustomhtml' => 17,
				'hook' => Hook::getIdByName('displayID4Customhtml'),
				'title_module' => 'Deals Of The Day',
				'content' => 	'
						<div class="box-deal-html">
						<div class="box-title">
						<div class="title">
						<h2><span>Deals</span> Of The Days</h2>
						</div>
						<p>Fusce lorem ante, condimentum in massa, posuere bibendum. Maecenas euismod vulputate eu rhoncus.</p>
						</div>
						<div class="box-categories clearfix">
						<div class="categories-in active">
						<div class="item-image"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cat1.png" alt="" /></a></div>
						</div>
						<div class="categories-in ">
						<div class="item-image"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cat2.png" alt="" /></a></div>
						</div>
						<div class="categories-in ">
						<div class="item-image"><a href="#"> <img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cat3.png" alt="" /></a></div>
						</div>
						<div class="categories-in ">
						<div class="item-image"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/cat4.png" alt="" /></a></div>
						</div>
						</div>
						<div class="custom-link"><a href="#">view all</a></div>
						</div>
				',
				'moduleclass_sfx' => 'box-deal',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 18,
				'hook' => Hook::getIdByName('displayID4Customhtml2'),
				'title_module' => 'Banner Center Layout 4',
				'content' => 	'
									<div class="images img1"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner13.jpg" alt="" /></a></div>
									<div class="images img2"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner14.jpg" alt="" /></a></div>
				',
				'moduleclass_sfx' => 'box-banner-top clearfix',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 19,
				'hook' => Hook::getIdByName('displayID4Customhtml3'),
				'title_module' => 'Image Super Category',
				'content' => 	'
									<a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/img-super-1.jpg" alt="#" /></a>
				',
				'moduleclass_sfx' => 'images-super',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 20,
				'hook' => Hook::getIdByName('displayID4Customhtml4'),
				'title_module' => 'Image Super Category 2',
				'content' => 	'
								<a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/img-super-2.jpg" alt="#" /></a>
				',
				'moduleclass_sfx' => 'images-super',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 21,
				'hook' => Hook::getIdByName('displayID4Customhtml5'),
				'title_module' => 'Free Shipping',
				'content' => 	'
									<div class="bgr_shipping"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/shiping2.jpg" alt="" /></a></div>
				',
				'moduleclass_sfx' => 'box-free-shipping',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 22,
				'hook' => Hook::getIdByName('displayID5Customhtml'),
				'title_module' => 'Banner Top Layout 5',
				'content' => 	'
									<div class="images img1"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner15.jpg" alt="" /></a></div>
									<div class="images img2"><a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/banner16.jpg" alt="" /></a></div>
				',
				'moduleclass_sfx' => 'box-banner-top clearfix',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 23,
				'hook' => Hook::getIdByName('displayID5Customhtml2'),
				'title_module' => 'Image Super Category 3',
				'content' => 	'
								<a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/img-super-3.jpg" alt="#" /></a>
				',
				'moduleclass_sfx' => 'images-super',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 24,
				'hook' => Hook::getIdByName('displayID5Customhtml3'),
				'title_module' => 'Image Super Category 4',
				'content' => 	'
								<a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/img-super-4.jpg" alt="#" /></a>
				',
				'moduleclass_sfx' => 'images-super',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 25,
				'hook' => Hook::getIdByName('displayID5Customhtml4'),
				'title_module' => 'Image Super Category 5',
				'content' => 	'
								<a href="#"><img src="'.$ps_root_dir.'themes/sp_furnicom17/assets/img/cms/img-super-5.jpg" alt="#" /></a>
				',
				'moduleclass_sfx' => 'images-super',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 26,
				'hook' => Hook::getIdByName('displayID5CustomhtmlHeader1'),
				'title_module' => 'Custom Support 5',
				'content' => 	'
									<ul>
										<li class="phone-support">Call our customer service at:<strong> 096-999-8386</strong></li>
									</ul>
								'
								,
				'moduleclass_sfx' => 'support-info support-info-1',
				'display_title_module' =>  0
			),
			array(
				'active' => 1,
				'id_spcustomhtml' => 27,
				'hook' => Hook::getIdByName('displayID5CustomhtmlHeader2'),
				'title_module' => 'Custom Support 5',
				'content' => 	'
										<ul>
											<li class="live-chat"><a href="#">Start <strong>live chat</strong></a></li>
										</ul>
								'
								,
				'moduleclass_sfx' => 'support-info support-info-2',
				'display_title_module' =>  0
			)
		);
		$return = true;
		$temp = array();
		foreach ($datas as $i => $data)
		{
			$customs = new SpCustomHtmlClass();
			$temp['content'] = $data['content'];
			$temp['title_module'] = $data['title_module'];
			$customs->hook = $data['hook'];
			$customs->active = $data['active'];
			$customs->ordering = $i;
			unset($data['content']);
			unset($data['title_module']);
			$customs->params = serialize($data);
			foreach (Language::getLanguages(false) as $lang)
			{
			 $customs->content[$lang['id_lang']] = $temp['content'];
			 $customs->title_module[$lang['id_lang']] = $temp['title_module'];
			}
			$return &= $customs->add();
		}
		return $return;
	}

	public function getContent()
	{
		if (Tools::isSubmit ('saveItem') || Tools::isSubmit ('saveAndStay'))
		{
			if ($this->postValidation())
			{
				$this->html .= $this->postProcess();
				$this->html .= $this->initForm();
			}
			else
				$this->html .= $this->initForm();
		}
		elseif (Tools::isSubmit ('addItem') || (Tools::isSubmit('editItem')
				&& $this->moduleExists((int)Tools::getValue('id_spcustomhtml'))) || Tools::isSubmit ('saveItem'))
		{
			if (Tools::isSubmit('addItem'))
				$mode = 'add';
			else
				$mode = 'edit';
			if ($mode == 'add')
			{
				if (Shop::getContext() != Shop::CONTEXT_GROUP && Shop::getContext() != Shop::CONTEXT_ALL)
					$this->html .= $this->initForm ();
				else
					$this->html .= $this->getShopContextError(null, $mode);
			}
			else
			{
				$associated_shop_ids = SpCustomHtmlClass::getAssociatedIdsShop((int)Tools::getValue('id_spcustomhtml'));
				$context_shop_id = (int)Shop::getContextShopID();

				if ($associated_shop_ids === false)
					$this->html .= $this->getShopAssociationError((int)Tools::getValue('id_spcustomhtml'));
				else if (Shop::getContext() != Shop::CONTEXT_GROUP && Shop::getContext() != Shop::CONTEXT_ALL
					&& in_array($context_shop_id, $associated_shop_ids))
				{
					if (count($associated_shop_ids) > 1)
						$this->html = $this->getSharedSlideWarning();
					$this->html .= $this->initForm();
				}
				else
				{
					$shops_name_list = array();
					foreach ($associated_shop_ids as $shop_id)
					{
						$associated_shop = new Shop((int)$shop_id);
						$shops_name_list[] = $associated_shop->name;
					}
					$this->html .= $this->getShopContextError($shops_name_list, $mode);
				}
			}
		}
		else
		{
			if ($this->postValidation())
			{
				$this->html .= $this->postProcess();
				$this->html .= $this->displayForm ();
			}
			else
				$this->html .= $this->displayForm ();
		}
		return $this->html;
	}
	private function postValidation()
	{	$errors = array();
		if (Tools::isSubmit ('saveItem') || Tools::isSubmit ('saveAndStay'))
		{
			if (!Validate::isInt(Tools::getValue('active')) || (Tools::getValue('active') != 0
					&& Tools::getValue('active') != 1))
				$errors[] = $this->l('Invalid slide state.');
			if (!Validate::isInt(Tools::getValue('position')) || (Tools::getValue('position') < 0))
				$errors[] = $this->l('Invalid slide position.');
			if (Tools::isSubmit('id_spcustomhtml'))
			{
				if (!Validate::isInt(Tools::getValue('id_spcustomhtml'))
					&& !$this->moduleExists(Tools::getValue('id_spcustomhtml')))
					$errors[] = $this->l('Invalid module ID');
			}
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{
				if (Tools::strlen(Tools::getValue('title_module_'.$language['id_lang'])) > 255)
					$errors[] = $this->l('The title is too long.');
				if (Tools::strlen(Tools::getValue('content_'.$language['id_lang'])) > 4500)
					$errors[] = $this->l('The content is too long.');
			}
			$id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
			if (Tools::strlen(Tools::getValue('title_module_'.$id_lang_default)) == 0)
				$errors[] = $this->l('The title module is not set.');
			if (Tools::strlen(Tools::getValue('content_'.$id_lang_default)) == 0)
				$errors[] = $this->l('The content is not set.');
			if (Tools::strlen(Tools::getValue('moduleclass_sfx')) > 255)
				$errors[] = $this->l('The Module Class Suffix  is too long.');
		}elseif (Tools::isSubmit('id_spcustomhtml')
			&& (!Validate::isInt(Tools::getValue('id_spcustomhtml'))
				|| !$this->moduleExists((int)Tools::getValue('id_spcustomhtml'))))
			$errors[] = $this->l('Invalid module ID');
		if (count($errors))
		{
			$this->html .= $this->displayError(implode('<br />', $errors));
			return false;
		}
		return true;
	}

	private function postProcess()
	{
		$currentIndex = AdminController::$currentIndex;
		if (Tools::isSubmit ('saveItem') || Tools::isSubmit ('saveAndStay'))
		{
			if (Tools::getValue('id_spcustomhtml'))
			{
				$customhtml = new SpCustomHtmlClass((int)Tools::getValue ('id_spcustomhtml'));
				if (!Validate::isLoadedObject($customhtml))
				{
					$this->html .= $this->displayError($this->l('Invalid slide ID'));
					return false;
				}
			}
			else
				$customhtml = new SpCustomHtmlClass();
			$next_ps = $this->getNextPosition();
			$customhtml->ordering = (!empty($customhtml->ordering)) ? (int)$customhtml->ordering : $next_ps;
			$customhtml->active = (Tools::getValue('active')) ? (int)Tools::getValue('active') : 0;
			$customhtml->hook	= (int)Tools::getValue('hook');
			$tmp_data = array();
			$id_spcustomhtml = (int)Tools::getValue ('id_spcustomhtml');
			$id_spcustomhtml = $id_spcustomhtml ? $id_spcustomhtml : (int)$customhtml->getHigherModuleID();
			$tmp_data['id_spcustomhtml'] = $id_spcustomhtml;

			$tmp_data['active'] = (int)Tools::getValue ('active', 1);
			$tmp_data['moduleclass_sfx'] = Tools::getValue ('moduleclass_sfx');
			$tmp_data['display_title_module'] = Tools::getValue ('display_title_module');
			$tmp_data['hook '] = Tools::getValue('hook');
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{
				$customhtml->title_module[$language['id_lang']] = Tools::getValue('title_module_'.$language['id_lang']);
				$customhtml->content[(int)$language['id_lang']] = Tools::getValue ('content_'.$language['id_lang']);
			}
			$customhtml->params = serialize($tmp_data);
			(Tools::getValue ('id_spcustomhtml')
		&& $this->moduleExists((int)Tools::getValue ('id_spcustomhtml')) )? $customhtml->update() : $customhtml->add ();
			$this->clearCacheItemForHook ();
			if (Tools::isSubmit ('saveAndStay'))
			{
				$tool_id_spcustomhtml = Tools::getValue ('id_spcustomhtml');
				$higher_module = $customhtml->getHigherModuleID();
				$id_spcustomhtml = $tool_id_spcustomhtml?(int)$tool_id_spcustomhtml:(int)$higher_module;
				Tools::redirectAdmin ($currentIndex.'&configure='
				.$this->name.'&token='.Tools::getAdminTokenLite ('AdminModules').'&editItem&id_spcustomhtml='
					.$id_spcustomhtml.'&updateItemConfirmation');
			}
			else
				Tools::redirectAdmin ($currentIndex.'&configure='.$this->name
					.'&token='.Tools::getAdminTokenLite ('AdminModules').'&saveItemConfirmation');
		}
		elseif (Tools::isSubmit('changeStatusItem') && Tools::getValue ('id_spcustomhtml'))
		{
			$customhtml = new SpCustomHtmlClass((int)Tools::getValue ('id_spcustomhtml'));
			if ($customhtml->active == 0)
				$customhtml->active = 1;
			else
				$customhtml->active = 0;
			//$customhtml->updateStatus (Tools::getValue ('active'));
			$customhtml->update();
			$this->clearCacheItemForHook ();
			Tools::redirectAdmin ($currentIndex.'&configure='.$this->name
				.'&token='.Tools::getAdminTokenLite ('AdminModules'));
		}
		elseif (Tools::isSubmit ('deleteItem') && Tools::getValue ('id_spcustomhtml'))
		{
			$customhtml = new SpCustomHtmlClass((int)Tools::getValue ('id_spcustomhtml'));
			$customhtml->delete ();
			$this->clearCacheItemForHook ();
			Tools::redirectAdmin ($currentIndex.'&configure='.$this->name.'&token='
				.Tools::getAdminTokenLite ('AdminModules').'&deleteItemConfirmation');
		}
		elseif (Tools::isSubmit ('duplicateItem') && Tools::getValue ('id_spcustomhtml'))
		{
			$customhtml = new SpCustomHtmlClass(Tools::getValue ('id_spcustomhtml'));
			foreach (Language::getLanguages (false) as $lang)
				$customhtml->title_module[(int)$lang['id_lang']] = $customhtml->title_module[(int)$lang['id_lang']]
					.$this->l(' (Copy)');
			$customhtml->duplicate();
			$this->clearCacheItemForHook ();
			Tools::redirectAdmin ($currentIndex.'&configure='.$this->name.'&token='
				.Tools::getAdminTokenLite ('AdminModules').'&duplicateItemConfirmation');
		}
		elseif (Tools::isSubmit ('saveItemConfirmation'))
			$this->html = $this->displayConfirmation ($this->l('Module successfully updated!'));
		elseif (Tools::isSubmit ('deleteItemConfirmation'))
			$this->html = $this->displayConfirmation ($this->l('Module successfully deleted!'));
		elseif (Tools::isSubmit ('duplicateItemConfirmation'))
			$this->html = $this->displayConfirmation ($this->l('Module successfully duplicated!'));
		elseif (Tools::isSubmit ('updateItemConfirmation'))
			$this->html = $this->displayConfirmation ($this->l('Module successfully updated!'));
	}

	private function clearCacheItemForHook()
	{
		$this->_clearCache ('default.tpl');
	}
	public function moduleExists($id_spcustomhtml)
	{
		$req = 'SELECT cs.`id_spcustomhtml` 
				FROM `'._DB_PREFIX_.'spcustomhtml` cs
				WHERE cs.`id_spcustomhtml` = '.(int)$id_spcustomhtml;
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);

		return ($row);
	}
	public function getNextPosition()
	{
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT MAX(cs.`ordering`) AS `next_position`
			FROM `'._DB_PREFIX_.'spcustomhtml` cs, `'._DB_PREFIX_.'spcustomhtml_shop` css
			WHERE css.`id_spcustomhtml` = cs.`id_spcustomhtml` AND css.`id_shop` = '.(int)$this->context->shop->id
		);

		return (++$row['next_position']);
	}

	private function getGridItems()
	{
		$this->context = Context::getContext ();
		$id_lang = $this->context->language->id;
		$id_shop = $this->context->shop->id;
		$sql = 'SELECT b.`id_spcustomhtml`,  b.`hook`, b.`ordering`, bs.`active`, bl.`title_module`, bl.`content`
			FROM `'._DB_PREFIX_.'spcustomhtml` b
			LEFT JOIN `'._DB_PREFIX_.'spcustomhtml_shop` bs ON (b.`id_spcustomhtml` = bs.`id_spcustomhtml` )
			LEFT JOIN `'._DB_PREFIX_.'spcustomhtml_lang` bl ON (b.`id_spcustomhtml` = bl.`id_spcustomhtml`)
			WHERE bs.`id_shop` = '.(int)$id_shop.' 
			AND bl.`id_lang` = '.(int)$id_lang.'
			ORDER BY b.`ordering`';
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql );
	}

	private function getHookTitle($id_hook, $name = false)
	{
		if (!$result = Db::getInstance ()->getRow ('
			SELECT `name`,`title`
			FROM `'._DB_PREFIX_.'hook`
			WHERE `id_hook` = '.( $id_hook )))
			return false;
		return ( ( $result['title'] != '' && $name )?$result['title']:$result['name'] );
	}

	private function displayForm()
	{
		$currentIndex = AdminController::$currentIndex;
		$modules = array();
		$this->html .= $this->headerHTML ();
		if (Shop::getContext() == Shop::CONTEXT_GROUP || Shop::getContext() == Shop::CONTEXT_ALL)
			$this->html .= $this->getWarningMultishopHtml();
		else if (Shop::getContext() != Shop::CONTEXT_GROUP && Shop::getContext() != Shop::CONTEXT_ALL)
		{
			$modules = $this->getGridItems ();
			if (!empty($modules))
			{
				foreach ($modules as $key => $mod)
				{
					$associated_shop_ids = SpCustomHtmlClass::getAssociatedIdsShop((int)$mod['id_spcustomhtml']);
					if ($associated_shop_ids && count($associated_shop_ids) > 1)
						$modules[$key]['is_shared'] = true;
					else
						$modules[$key]['is_shared'] = false;
				}
			}
		}
		$this->html .= '
	 	<div class="panel">
			<div class="panel-heading">
			'.$this->l('Module Manager').'
			<span class="panel-heading-action">
					<a class="list-toolbar-btn" href="'.$currentIndex.'&configure='.$this->name
			.'&token='.Tools::getAdminTokenLite ('AdminModules').'&addItem">
			<span data-toggle="tooltip" class="label-tooltip" data-original-title="'
			.$this->l('Add new module').'" data-html="true"><i class="process-icon-new "></i></span></a>
			</span>
			</div>
			<table width="100%" class="table" cellspacing="0" cellpadding="0">
			<thead>
			<tr class="nodrag nodrop">
				<th>'.$this->l('ID').'</th>
				<th>'.$this->l('Ordering').'</th>
				<th class=" left">'.$this->l('Title').'</th>
				<th class=" left">'.$this->l('Hook into').'</th>
				<th class=" left">'.$this->l('Status').'</th>
				<th class=" right"><span class="title_box text-right">'.$this->l('Actions').'</span></th>
			</tr>
			</thead>
			<tbody id="gird_items">';
		if (!empty($modules))
		{
			static $irow;
			foreach ($modules as $customhtml)
			{
				$this->html .= '
				<tr id="item_'.$customhtml['id_spcustomhtml'].'" class=" '.( $irow ++ % 2?' ':'' ).'">
					<td class=" 	" onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='
					.Tools::getAdminTokenLite ('AdminModules').'&editItem&id_spcustomhtml='
					.$customhtml['id_spcustomhtml'].'\'">'
					.$customhtml['id_spcustomhtml'].'</td>
					<td class=" dragHandle"><div class="dragGroup"><div class="positions">'.$customhtml['ordering']
					.'</div></div></td>
					<td class="  " onclick="document.location = \''.$currentIndex.'&configure='.$this->name.'&token='
					.Tools::getAdminTokenLite ('AdminModules')
					.'&editItem&id_spcustomhtml='.$customhtml['id_spcustomhtml'].'\'">'.$customhtml['title_module']
					.' '.($customhtml['is_shared'] ? '<span class="label color_field"
		style="background-color:#108510;color:white;margin-top:5px;">'.$this->l('Shared').'</span>' : '').'</td>
					<td class="  " onclick="document.location = \''.$currentIndex.'&configure='.$this->name
					.'&token='.Tools::getAdminTokenLite ('AdminModules').'&editItem&id_spcustomhtml='
					.$customhtml['id_spcustomhtml'].'\'">'
					.( Validate::isInt ($customhtml['hook'])?$this->getHookTitle ($customhtml['hook']):'' ).'</td>
					<td class="  "> <a href="'.$currentIndex.'&configure='.$this->name.'&token='
					.Tools::getAdminTokenLite ('AdminModules')
					.'&changeStatusItem&id_spcustomhtml='.$customhtml['id_spcustomhtml'].'&status='
					.$customhtml['active'].'&hook='.$customhtml['hook'].'">'.( $customhtml['active']?'
					<i class="icon-check"></i>':'<i class="icon-remove"></i>' ).'</a> </td>
					<td class="text-right">
						<div class="btn-group-action">
							<div class="btn-group pull-right">
								<a class="btn btn-default" href="'.$currentIndex.'&configure='.$this->name.'&token='
		.Tools::getAdminTokenLite ('AdminModules').'&editItem&id_spcustomhtml='.$customhtml['id_spcustomhtml'].'">
									<i class="icon-pencil"></i> Edit
								</a> 
								<button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
									<span class="caret"></span>&nbsp;
								</button>
								<ul class="dropdown-menu">
									<li>
							<a onclick="return confirm(\''
					.$this->l('Are you sure want duplicate this item?', __CLASS__, true, false)
					.'\');"  title="'.$this->l('Duplicate').'" href="'.$currentIndex.'&configure='
					.$this->name.'&token='
					.Tools::getAdminTokenLite ('AdminModules').'&duplicateItem&id_spcustomhtml='
					.$customhtml['id_spcustomhtml'].'">
											<i class="icon-copy"></i> '.$this->l('Duplicate').'
										</a>								
									</li>
									<li class="divider"></li>
									<li>
										<a title ="'.$this->l('Delete').'" onclick="return confirm(\''
					.$this->l('Are you sure?', __CLASS__, true, false).'\');" href="'.$currentIndex
					.'&configure='.$this->name.'&token='
					.Tools::getAdminTokenLite ('AdminModules').'&deleteItem&id_spcustomhtml='
					.$customhtml['id_spcustomhtml'].'">
											<i class="icon-trash"></i> '.$this->l('Delete').'
										</a>
									</li>
								</ul>
							</div>
						</div>
					</td>
				</tr>';
			}
		}
		else
		{
			$this->html .= '<td colspan="5" class="list-empty">
								<div class="list-empty-msg">
									<i class="icon-warning-sign list-empty-icon"></i>
									'.$this->l('No records found').'
								</div>
							</td>';
		}
		$this->html .= '
			</tbody>
			</table>
		</div>';
	}

	public function getHookList()
	{
		$hooks = array();
		foreach ($this->default_hook as $key => $hook)
		{
			$id_hook = Hook::getIdByName ($hook);
			$name_hook = $this->getHookTitle ($id_hook);
			$hooks[$key]['key'] = $id_hook;
			$hooks[$key]['name'] = $name_hook;
		}
		return $hooks;
	}

	public function initForm()
	{
		$default_lang = (int)Configuration::get ('PS_LANG_DEFAULT');
		$hooks = $this->getHookList ();
		$this->fields_form[0]['form'] = array(
			'tinymce' => true,
			'legend'  => array(
				'title' => $this->l('General Options'),
				'icon'  => 'icon-cogs'
			),
			'input'   => array(
				array(
					'type'     => 'text',
					'label'    => $this->l('Title'),
					'lang'     => true,
					'name'     => 'title_module',
					'class'    => 'fixed-width-xl',
					'hint'     => $this->l('Title Of Module')
				),
				array(
					'type'  => 'text',
					'label' => $this->l('Module Class Suffix'),
					'name'  => 'moduleclass_sfx',
					'hint'  => $this->l('A suffix to be applied to the CSS class of the module.
					This allows for individual module styling.'),
					'class' => 'fixed-width-xl'
				),
				array(
					'type'   => 'switch',
					'label'  => $this->l('Display Title'),
					'name'   => 'display_title_module',
					'hint'   => $this->l('Display Title Of Module'),
					'values' => array(
						array(
							'id'    => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id'    => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					)
				),
				array(
					'type'   => 'switch',
					'label'  => $this->l('Status'),
					'name'   => 'active',
					'hint'   => $this->l('Status Of Module'),
					'values' => array(
						array(
							'id'    => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id'    => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					)
				),
				array(
					'type'    => 'select',
					'label'   => $this->l('Hook into'),
					'name'    => 'hook',
					'hint'    => $this->l('Select Hook for Module'),
					'options' => array(
						'query' => $hooks,
						'id'    => 'key',
						'name'  => 'name'
					)
				),
				array(
					'type'         => 'textarea',
					'label'        => $this->l('Content'),
					'name'         => 'content',
					'hint'         => $this->l('Show Content Of Module'),
					'lang'         => true,
					'autoload_rte' => true,
					'cols'         => 40,
					'rows'         => 10
				)
			),
			'submit'  => array(
				'title' => $this->l('Save')
			),
			'buttons' => array(
				array(
					'title' => $this->l('Save and stay'),
					'name'  => 'saveAndStay',
					'type'  => 'submit',
					'class' => 'btn btn-default pull-right',
					'icon'  => 'process-icon-save'
				)
			)
		);
		$helper = new HelperForm();
		$helper->module = $this;
		$helper->name_controller = 'spcustomhtml';
		$helper->identifier = $this->identifier;
		$helper->token = Tools::getAdminTokenLite ('AdminModules');
		$helper->show_cancel_button = true;
		$helper->back_url = AdminController::$currentIndex.'&configure='.$this->name.'&token='
			.Tools::getAdminTokenLite ('AdminModules');
		foreach (Language::getLanguages (false) as $lang)
			$helper->languages[] = array(
				'id_lang'    => $lang['id_lang'],
				'iso_code'   => $lang['iso_code'],
				'name'       => $lang['name'],
				'is_default' => ( $default_lang == $lang['id_lang']?1:0 )
			);
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;
		$helper->toolbar_scroll = true;
		$helper->title = $this->displayName;
		$helper->submit_action = 'saveItem';
		$helper->toolbar_btn = array(
			'save' => array(
				'desc' => $this->l('Save'),
				'href' => AdminController::$currentIndex.'&configure='.$this->name
					.'&save'.$this->name.'&token='.Tools::getAdminTokenLite ('AdminModules')
			),
			'back' => array(
				'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='
					.Tools::getAdminTokenLite ('AdminModules'),
				'desc' => $this->l('Back to list') )
		);
		$id_spcustomhtml = (int)Tools::getValue ('id_spcustomhtml');

		if (Tools::isSubmit ('id_spcustomhtml') && $id_spcustomhtml)
		{
			$customhtml = new SpCustomHtmlClass((int)$id_spcustomhtml);
			$params = unserialize($customhtml->params);
			$this->fields_form[0]['form']['input'][] = array(
				'type' => 'hidden',
				'name' => 'id_spcustomhtml' );
		$helper->fields_value['id_spcustomhtml'] = Tools::getValue ('id_spcustomhtml', $customhtml->id_spcustomhtml);
		}
		else
		{
			$customhtml = new SpCustomHtmlClass();
			$params = array();
		}
		foreach (Language::getLanguages (false) as $lang)
		{
			$helper->fields_value['title_module'][(int)$lang['id_lang']] = Tools::getValue ('title_module_'
				.(int)$lang['id_lang'],
				$customhtml->title_module[(int)$lang['id_lang']]);
			$helper->fields_value['content'][(int)$lang['id_lang']] = Tools::getValue ('content_'.(int)$lang['id_lang'],
				$customhtml->content[(int)$lang['id_lang']]);
		}
		$helper->fields_value['hook'] = Tools::getValue ('hook', $customhtml->hook);
		$helper->fields_value['active'] = (int)Tools::getValue('active', $customhtml->active);
		$display_title_module = isset( $params['display_title_module'] ) ? $params['display_title_module'] : 1;
		$helper->fields_value['display_title_module'] = Tools::getValue ('display_title_module', $display_title_module);
		$helper->fields_value['moduleclass_sfx'] = Tools::getValue ('moduleclass_sfx',
			isset($params['moduleclass_sfx']) ? $params['moduleclass_sfx'] : '' );
		$this->html .= $helper->generateForm ($this->fields_form);
	}

	private function getItemInHook($hook_name)
	{
		$list = array();
		$this->context = Context::getContext ();
		$id_shop = $this->context->shop->id;
		$id_lang = $this->context->language->id;
		$id_hook = Hook::getIdByName ($hook_name);
		if ($id_hook)
		{
			$sql = 'SELECT * FROM `'._DB_PREFIX_.'spcustomhtml` b
			LEFT JOIN `'._DB_PREFIX_.'spcustomhtml_shop` bs ON (b.`id_spcustomhtml` = bs.`id_spcustomhtml`)
			LEFT JOIN `'._DB_PREFIX_.'spcustomhtml_lang` bl ON (b.`id_spcustomhtml` = bl.`id_spcustomhtml`)
			WHERE bs.`active` = 1 AND (bs.`id_shop` = '.$id_shop.')
			AND (bl.`id_lang` = '.$id_lang.')
			AND b.`hook` = '.( $id_hook ).' ORDER BY b.`ordering`';
			$results = Db::getInstance ()->ExecuteS ($sql);
			foreach ($results as &$row)
			{
				$row['params'] = unserialize($row['params']);
			}
		}
		return $results;
	}

	public function hookHeader()
	{
		//$this->context->controller->addCSS ($this->_path.'views/css/style.css', 'all');
	}

	public function hookDisplayID1CustomhtmlHeader1()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID1CustomhtmlHeader1');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID1CustomhtmlHeader1');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID1CustomhtmlHeader2()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID1CustomhtmlHeader2');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID1CustomhtmlHeader2');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID1Customhtml()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID1Customhtml');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID1Customhtml');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID1Customhtml2()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID1Customhtml2');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID1Customhtml2');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID1Customhtml3()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID1Customhtml3');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID1Customhtml3');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID1Customhtml4()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID1Customhtml4');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID1Customhtml4');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID1Customhtml5()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID1Customhtml5');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID1Customhtml5');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID1Customhtml6()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID1Customhtml6');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID1Customhtml6');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayCustomhtmlFooter1()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayCustomhtmlFooter1');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayCustomhtmlFooter1');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayCustomhtmlFooter2()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayCustomhtmlFooter2');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayCustomhtmlFooter2');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID2Customhtml()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID2Customhtml');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID2Customhtml');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID2Customhtml2()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID2Customhtml2');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID2Customhtml2');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID2Customhtml3()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID2Customhtml3');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID2Customhtml3');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID3Customhtml()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID3Customhtml');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID3Customhtml');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID3Customhtml2()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID3Customhtml2');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID3Customhtml2');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID4Customhtml()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID4Customhtml');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID4Customhtml');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID4Customhtml2()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID4Customhtml2');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID4Customhtml2');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID4Customhtml3()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID4Customhtml3');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID4Customhtml3');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID4Customhtml4()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID4Customhtml4');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID4Customhtml4');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID4Customhtml5()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID4Customhtml5');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID4Customhtml5');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID5Customhtml()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID5Customhtml');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID5Customhtml');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID5Customhtml2()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID5Customhtml2');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID5Customhtml2');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID5Customhtml3()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID5Customhtml3');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID5Customhtml3');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID5Customhtml4()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID5Customhtml4');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID5Customhtml4');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID5CustomhtmlHeader1()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID5CustomhtmlHeader1');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID5CustomhtmlHeader1');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayID5CustomhtmlHeader2()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayID5CustomhtmlHeader2');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayID5CustomhtmlHeader2');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayFooter()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayFooter');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayFooter');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayLeftColumn()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayLeftColumn');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayLeftColumn');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}

	public function hookDisplayFooterBottom()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayFooterBottom');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayFooterBottom');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayFooterMiddle()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayFooterMiddle');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayFooterMiddle');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}
	
	public function hookDisplayCustomProduct()
	{
		$smarty_cache_id = $this->getCacheId ('spcustomhtml_displayCustomProduct');
		if (!$this->isCached ('default.tpl', $smarty_cache_id))
		{
			$list = $this->getItemInHook ('displayCustomProduct');
			if (empty($list))
				return;
			$this->context->smarty->assign (array(
				'list' => $list
			));
		}
		return $this->display (__FILE__, 'default.tpl', $smarty_cache_id);
	}


	public function headerHTML()
	{
		if (Tools::getValue ('controller') != 'AdminModules' && Tools::getValue ('configure') != $this->name)
			return;
		$this->context->controller->addJqueryUI ('ui.sortable');
		$html = '<script type="text/javascript">
			$(function() {
				var $gird_items = $("#gird_items");
				$gird_items.sortable({
					opacity: 0.6,
					cursor: "move",
					handle: ".dragGroup",
					update: function() {
						var order = $(this).sortable("serialize") + "&action=updateSlidesPosition";
							$.ajax({
								type: "POST",
								dataType: "json",
								data:order,
								url:"'._PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name.'/ajax_'.$this->name
			.'.php?secure_key='.$this->secure_key.'",
								success: function (msg){
									if (msg.error)
									{
										showErrorMessage(msg.error);
										return;
									}
									$(".positions", $gird_items).each(function(i){
										$(this).text(i);
									});
									showSuccessMessage(msg.success);
								}
							});
						
						}
					});
					$(".dragGroup",$gird_items).hover(function() {
						$(this).css("cursor","move");
					},
					function() {
						$(this).css("cursor","auto");
				    });
			});
		</script>
		';
		$html .= '<style type="text/css">#gird_items .ui-sortable-helper{display:table!important;}</style>';
		return $html;
	}
	private function getWarningMultishopHtml()
	{
		if (Shop::getContext() == Shop::CONTEXT_GROUP || Shop::getContext() == Shop::CONTEXT_ALL)
			return '<p class="alert alert-warning">'.
						$this->l('You cannot manage modules items from a "All Shops" or a "Group Shop" context,
						select directly the shop you want to edit').
					'</p>';
		else
			return '';
	}

	private function getShopContextError($shop_contextualized_name, $mode)
	{
		if (is_array($shop_contextualized_name))
			$shop_contextualized_name = implode('<br/>', $shop_contextualized_name);

		if ($mode == 'edit')
			return '<p class="alert alert-danger">'.
							sprintf($this->l('You can only edit this module from the shop(s) context: %s'),
								$shop_contextualized_name).
					'</p>';
		else
			return '<p class="alert alert-danger">'.
							sprintf($this->l('You cannot add modules from a "All Shops" or a "Group Shop" context')).
					'</p>';
	}

	private function getShopAssociationError($id_customhtml)
	{
		return '<p class="alert alert-danger">'.
			sprintf($this->l('Unable to get module shop association information (id_module: %d)'), (int)$id_customhtml).
				'</p>';
	}


	private function getCurrentShopInfoMsg()
	{
		$shop_info = null;

		if (Shop::isFeatureActive())
		{
			if (Shop::getContext() == Shop::CONTEXT_SHOP)
			$shop_info = sprintf($this->l('The modifications will be applied to shop: %s'), $this->context->shop->name);
			else if (Shop::getContext() == Shop::CONTEXT_GROUP)
				$shop_info = sprintf($this->l('The modifications will be applied to this group: %s'),
					Shop::getContextShopGroup()->name);
			else
				$shop_info = $this->l('The modifications will be applied to all shops and shop groups');

			return '<div class="alert alert-info">'.
						$shop_info.
					'</div>';
		}
		else
			return '';
	}
	private function getSharedSlideWarning()
	{
		return '<p class="alert alert-warning">'.
					$this->l('This module is shared with other shops!
					All shops associated to this module will apply modifications made here').
				'</p>';
	}

	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance ()->execute ('
		INSERT IGNORE INTO `'._DB_PREFIX_.'spcustomhtml_shop` (`id_spcustomhtml`, `id_shop`)
		SELECT `id_spcustomhtml`, '.(int)$params['new_id_shop'].'
		FROM `'._DB_PREFIX_.'spcustomhtml_shop`
		WHERE `id_shop` = '.(int)$params['old_id_shop']);
	}
}
