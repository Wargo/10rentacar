<?php
class ServicesController extends AppController {

	var $name = 'Services';

	function index() {
		$this->Service->recursive = 0;
        $conditions['active'] = 1;
		$this->set('services', $this->paginate('Service', $conditions));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action' => 'index'));
		}
        $service = $this->Service->find('first', array(
            'conditions' => array(
                'active' => 1,
                'id' => $id
            )
        ));
        $this->set(compact('service'));
	}

	function admin_index() {
        $this->layout = 'panel';
		$this->Service->recursive = 0;
		$this->set('services', $this->paginate());
	}

	function admin_view($id = null) {
        $this->layout = 'panel';
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('service', $this->Service->read(null, $id));
	}

    function admin_add() {
        $this->admin_edit();
        $this->render('admin_edit');
    }

	function admin_edit($id = null) {
        $this->layout = 'panel';
        $this->set(compact('id'));
		if (!empty($this->data)) {
            if($id) {
                $this->Service->id = $id;
            } else {
                $this->Service->create();
            }
			if ($this->Service->save($this->data)) {
				$this->Session->setFlash(__('Datos guardados', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un error guardando los datos', true));
			}
		}
		if ($id && empty($this->data)) {
			$this->data = $this->Service->read(null, $id);
		}
	}

	function admin_delete($id = null) {
        $this->layout = 'panel';
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Service->delete($id)) {
			$this->Session->setFlash(__('Datos borrados', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ha ocurrido un error borrando los datos', true));
		$this->redirect(array('action' => 'index'));
	}
}
