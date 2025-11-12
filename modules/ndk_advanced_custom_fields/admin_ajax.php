<?php
/**
 *  Tous droits réservés NDKDESIGN
 *
 *  @author    Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*/

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
require_once _PS_MODULE_DIR_.'ndk_advanced_custom_fields/models/ndkCf.php';
require_once _PS_MODULE_DIR_.'ndk_advanced_custom_fields/models/ndkCfValues.php';
require_once _PS_MODULE_DIR_.'ndk_advanced_custom_fields/models/ndkCfSpecificPrice.php';

$additionnals = '';

if(Tools::getValue('action') && Tools::getValue('action') == 'saveSpecificPrice')
{
	$values = Tools::getValue('specificprice');
	if((int)$values['id_ndk_customization_field_specific_price'] > 0)
	$specificPrice = new NdkCfSpecificPrice((int)$values['id_ndk_customization_field_specific_price']);
	else
	$specificPrice = new NdkCfSpecificPrice();
	$specificPrice->id_ndk_customization_field = (int)$values['id_ndk_customization_field'];
	$specificPrice->id_ndk_customization_field_value = (int)$values['id_ndk_customization_field_value'];
	$specificPrice->reduction = $values['reduction'];
	$specificPrice->reduction_type = $values['reduction_type'];
	$specificPrice->from_quantity = (int)$values['from_quantity'];
	if($specificPrice->save())
		echo $specificPrice->id;
	
}

if(Tools::getValue('action') && Tools::getValue('action') == 'deleteSpecificPrice')
{
	$values = Tools::getValue('specificprice');
	if((int)$values['id_ndk_customization_field_specific_price'] > 0)
	$specificPrice = new NdkCfSpecificPrice((int)$values['id_ndk_customization_field_specific_price']);
	$specificPrice->delete();
	
	
}

if(Tools::getValue('action') && Tools::getValue('action') == 'deleteFile')
{
	$file = _PS_ROOT_DIR_.Tools::getValue('file');
	@unlink($file);
}


if(Tools::getValue('getTargetChild'))
{
	$childs = NdkCf::getTargetsChilds(Tools::getValue('id_target'));
	
	if(sizeof($childs) > 0)
	{
		//array_push($childs, array('id'=>0, 'value' =>'all'));
		$return  = '<div id="target_zoning"><select id="target_child" class=" fixed-width-xl" name="target_child" onchange="getTargets();"><option value="">--</option>';
			foreach($childs as $child)
			{
				$return  .= '<option '.(Tools::getValue('target_child') == $child['id'] ? 'selected="selected"' : '').' value="'.$child['id'].'">'.$child['value'].'</option>';
			}
		$return  .= '</select>';
		if(Tools::getValue('target_child')){
			if(file_exists(_PS_ROOT_DIR_.'/img/scenes/ndkcf/'.Tools::getValue('target_child').'.svg'))
			{
				$additionnals = '<p><select data-value="'.Tools::getValue('svg_path').'" id="svg_path" class=" fixed-width-xl" name="svg_path"><option value="">SVG PATH</option></select></p>';
				$additionnals .= '<div id="large_scene_image">'. str_replace(']>', '', Tools::file_get_contents(_PS_ROOT_DIR_.'/img/scenes/ndkcf/'.Tools::getValue('target_child').'.svg')).'</div>';
			}
			else 
			{
				//$additionnals ='<img id="large_scene_image" src="'._PS_ROOT_DIR_.'/img/scenes/ndkcf/thumbs/'.Tools::getValue('target_child').'-'.Configuration::get('NDK_IMAGE_SIZE').'.jpg" />';
				$additionnals ='<img id="large_scene_image" src="../img/scenes/ndkcf/'.Tools::getValue('target_child').'.jpg" />';
				$additionnals .= '<input type="hidden" name="svg_path" value=""/>';
			}
			
			$additionnals .='<p><input name="x_axis"/><input name="y_axis"/><input name="zone_width"/><input name="zone_height"/></p>';
		}
		$return .= $additionnals;
		$return .= '</div>';
		
		echo $return;
	}
}

?>