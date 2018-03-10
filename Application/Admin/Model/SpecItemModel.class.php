<?php
namespace Admin\Model;
use Admin\Model\BaseModel;
class SpecItemModel extends BaseModel {
	protected $tableName = 'spec_item'; 
	protected $_link = array(
        'Spec' => array(
		    'mapping_type'  => self::BELONGS_TO,
		    'class_name'    => 'Spec',
		    'foreign_key'   => 'spec_id',
		    'mapping_name'  => 'spec',
		),
	);
}