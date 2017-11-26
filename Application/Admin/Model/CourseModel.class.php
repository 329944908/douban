<?php
namespace Admin\Model;
use Admin\Model\BaseModel;
class CourseModel extends BaseModel {
	protected $_link = array(
        'Category' => array(
		    'mapping_type'  => self::BELONGS_TO,
		    'class_name'    => 'Category',
		    'foreign_key'   => 'major_id',
		    'mapping_name'  => 'category',
		),
     );

}