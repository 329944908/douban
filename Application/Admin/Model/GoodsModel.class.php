<?php
namespace Admin\Model;
use Admin\Model\BaseModel;
class GoodsModel extends BaseModel {
	protected $_link = array(
        'Classify' => array(
		    'mapping_type'  => self::BELONGS_TO,
		    'class_name'    => 'Classify',
		    'foreign_key'   => 'classify_id',
		    'mapping_name'  => 'classify',
		),
		'Seller' =>array(
			'mapping_type'  => self::BELONGS_TO,
		    'class_name'    => 'Seller',
		    'foreign_key'   => 'seller_id',
		    'mapping_name'  => 'seller',
		),
    );
}