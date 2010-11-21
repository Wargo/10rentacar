<?php
class Form extends Model {
	var $name = 'Form';

	var $useTable = false;

	var $validate = array();

	function __construct() {
		$this->validate = array(
			'email' => array(
				'missing' => array(
					'rule' => 'notEmpty', 
					'last' => true,
					'message' => __('El e-mail es obligatorio', true)
				),
				'email' => array(
					'rule' => 'email',
					'last' => true,
					'message' => __('No es una dirección de e-mail válida', true)
				),
			),
			'name' => array(
				'missing' => array(
					'rule' => 'notEmpty', 
					'last' => true,
					'message' => __('El nombre de usuario es obligatorio', true)
				),
			),
			'subject' => array(
				'missing' => array(
					'rule' => 'notEmpty', 
					'last' => true,
					'message' => __('El asunto es obligatorio', true)
				),
			),
			'comment' => array(
				'missing' => array(
					'rule' => 'notEmpty', 
					'last' => true,
					'message' => __('Te has dejado el comentario vacío', true)
				),
			)
		);
		return parent::__construct();
	}

}
