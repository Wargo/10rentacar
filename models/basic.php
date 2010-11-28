<?php
class Basic extends Model {
	var $name = 'Basic';

	var $validation = array();
	var $useTable = false;

	function __construct() {
        $this->validate = array(
            'lugar_1' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => __('Este campo es obligatorio', true),
                ),
            ),
            'fecha_1' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => __('Este campo es obligatorio', true),
                ),
				'dateError' => array(
					'rule' => 'validDate1',
					'message' => __('La fecha es errónea', true)
				),
            ),
            'hora_1' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => __('Este campo es obligatorio', true),
                ),
            ),
            'lugar_2' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => __('Este campo es obligatorio', true),
                ),
            ),
            'fecha_2' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => __('Este campo es obligatorio', true),
                ),
				'dateError2' => array(
					'rule' => 'validDate2',
					'message' => __('La fecha de devolución debe ser mayor que la de recogida', true)
				),
            ),
            'hora_2' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => __('Este campo es obligatorio', true),
                ),
            )
        );
		return parent::__construct();
	}

	function validDate1($check) {
		$date = explode(' ', $check['fecha_1']);
		$date = explode('-', $date[0]);
		if(count($date) == 3) {
			if($check['fecha_1'] >= date('Y-m-d')) {
				return checkdate($date[1], $date[2], $date[0]);
			}
		}
		return false;
	}

	function validDate2($check) {
		$date = explode(' ', $check['fecha_2']);
		$date = explode('-', $date[0]);
		if(count($date) == 3) {
			if(checkdate($date[1], $date[2], $date[0])) {
				$first_date = $this->data['Basic']['fecha_1'];
				if($check['fecha_2'] >= $first_date) {
					return true;
				}
			}
		}
		return false;
	}
}
