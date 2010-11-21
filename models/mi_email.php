<?php
/**
 * Mi Email
 *
 * A model based email solution to allow db events to trigger sending emails
 *
 * PHP version 5
 *
 * Copyright (c) 2008, Andy Dawson
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) 2008, Andy Dawson
 * @link          www.ad7six.com
 * @package       mi_email
 * @subpackage    mi_email.models
 * @since         v 1.0
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * MiEmail class
 *
 * This class is used to configure the MiEmail behavior (smtp setings etc)
 * and to handle auth if the standard emails controller is used
 *
 * @uses          AppModel
 * @package       mi_email
 * @subpackage    mi_email.models
 */
class MiEmail extends AppModel {

/**
 * name property
 *
 * @var string 'MiEmail'
 * @access public
 */
	public $name = 'MiEmail';

/**
 * displayField property
 *
 * @var string 'subject'
 * @access public
 */
	public $displayField = 'subject';

/**
 * useTable variable
 *
 * Set to false to use the this without saving to the database
 *
 * @var string
 * @access public
 */
	public $useTable = 'mi_emails';

/**
 * actsAs property
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'MiEmail.Email' => array('sendAs' => 'both'),
		'Mi.Slugged',
		'MiEnums.Enum' => array('status', 'type', 'send_as', 'template', 'layout')
	);

	public $recursive = -1;
/**
 * construct method
 *
 * @param mixed $one null
 * @param mixed $two null
 * @param mixed $three null
 * @return void
 * @access private
 */
	public function __construct($one = null, $two = null, $three = null) {
		return parent::__construct($one, $two, $three);
	}

/**
 * isAuthorized method
 *
 * Called only for the emails controller view action - restricts viewing an email on the web to 'normal' emails and
 * only for admin, the author or the recipient. The model id is set in the emails controller beforeFilter.
 *
 * @param mixed $user
 * @param mixed $controller
 * @param mixed $action
 * @return bool
 * @access public
 */
	public function isAuthorized($user, $controller, $action) {
		if ($controller != 'MiEmail' || $action != 'read') {
			debug('Email model isAuthorized has been called'); //@ignore
			debug (Debugger::trace()); //@ignore
			return false;
		}
		if (strtolower($user['User']['group']) == 'admin') {
			return true;
		} elseif (!$this->id) {
			return false;
		}
		$data = $this->read(array('from_user_id', 'to_user_id', 'type'));
		$validUsers = array($data[$this->alias]['to_user_id'], $data[$this->alias]['from_user_id']);
		if ($data[$this->alias]['type'] == 'normal' && in_array($user['User']['id'], $validUsers)) {
			return true;
		}
		return false;
	}

	function send_email($type = null, $data = null) {
		if(!$type || !$data) {
			return false;
		}
		if($data['to_user_id']) {
			$User = ClassRegistry::init('User');
			if (!$User->field('mail_notifications', array('id' => $data['to_user_id']))) {
				return false;
			}
			if (empty($data['to'])) {
				$data['to'] = $User->field('email', array('id' => $data['to_user_id']));
			}
		}
		$this->create();
		return $this->send(array(
			'from_user_id' => $data['user_id'],
			'to_user_id' => $data['to_user_id'],
			'to' => $data['to'],
			'template' => $type,
			'data' => $data['data'],
			'subject' => $data['subject'],
			'type' => 'normal'
		));
	}
}
