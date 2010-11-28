<?php
class CarsController extends AppController {

	var $name = 'Cars';

	function index() {
		$this->Car->recursive = 0;
		$conditions['active'] = 1;
		$this->set('cars', $this->paginate('Car', $conditions));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action' => 'index'));
		}
		$car = $this->Car->find('first', array(
			'conditions' => array(
				'active' => 1,
				'id' => $id
			)
		));
		$this->set(compact('car'));
	}

	function admin_index() {
		$this->layout = 'panel';
		$this->Car->recursive = 0;
		$this->set('cars', $this->paginate());
	}

	function admin_view($id = null) {
		$this->layout = 'panel';
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('car', $this->Car->read(null, $id));
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
				$this->Car->id = $id;
			} else {
				$this->Car->create();
			}
			if ($this->Car->save($this->data)) {
				$this->Session->setFlash(__('Datos guardados', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un error guardando los datos', true));
			}
		}
		if ($id && empty($this->data)) {
			$this->data = $this->Car->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		$this->layout = 'panel';
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Car->delete($id)) {
			$this->Session->setFlash(__('Datos borrados', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ha ocurrido un error borrando los datos', true));
		$this->redirect(array('action' => 'index'));
	}
}
