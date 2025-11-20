<?php


class ModelVideoGallery extends ObjectModel
{


	public $id_product;
	public $video;

	public static $definition = array(
		'table' => 'video_gallery_product',
		'primary' => 'id_video',
		'multilang' => false,
		'fields' => array(
					'id_product' =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
					'video' => 	array('type' => self::TYPE_STRING,  'required' => false),
		),
	);


	public function __construct($id = null)
	{
	    parent::__construct($id);
	}

	public function delete()
	{

		return parent::delete();
	}


	public static function setDefaultConfig($id_video)
	{
	   $config = new ModelVideoGallery((int)$id_video);

	}


}
?>
