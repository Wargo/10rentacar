<?php
class Car extends AppModel {
	var $name = 'Car';
	var $displayField = 'title';
	var $validate = array();

    function __construct() {
        $this->validate = array(
            'title' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => __('Este campo es obligatorio', true),
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
                'maxlength' => array(
                    'rule' => array('maxlength', 100),
                    'message' => __('No puede ser más largo de 100 caracteres', true),
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            )
        );
		return parent::__construct();
    }
}
?>
