<?php
class BasicsController extends AppController {

	var $name = 'Basics';

    function home() {
    }

	function send_form($type = null) {
		if($this->data) {
			$this->loadModel('Form');
			if($this->Form->save($this->data['Form'])) {
				$this->data['Form']['type'] = $type;
				$login_id = null;
				$Mail = ClassRegistry::init('MiEmail');
				$data = array(
					'user_id' => $login_id,
					'to_user_id' => null,
					'to' => Configure::read('Admin.mail'),
					'subject' => $this->data['Form']['subject'],
					'data' => $this->data['Form']
				);
                $Mail->send_email('send_form', $data);
				$this->Session->setFlash(__('Formulario enviado correctamente', true));
				$this->redirect('/');
			} else {
				$this->render('/pages/'.$type);
			}
		}
	}

	function search() {
		if($this->Basic->save($this->data)) {
			$this->redirect('/');
		}
		$this->render('home');
	}

}
