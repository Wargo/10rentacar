<?php
class OffersController extends AppController {

	var $name = 'Offers';

	function index() {
		$this->Offer->recursive = 0;
        $conditions['active'] = 1;
		$this->set('offers', $this->paginate('Offer', $conditions));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action' => 'index'));
		}
        $offer = $this->Offer->find('first', array(
            'conditions' => array(
                'active' => 1,
                'id' => $id
            )
        ));
        $this->set(compact('offer'));
	}

	function admin_index() {
        $this->layout = 'panel';
		$this->Offer->recursive = 0;
		$this->set('offers', $this->paginate());
	}

	function admin_view($id = null) {
        $this->layout = 'panel';
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('offer', $this->Offer->read(null, $id));
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
                $this->Offer->id = $id;
            } else {
                $this->Offer->create();
            }
			if ($this->Offer->save($this->data)) {
				$this->Session->setFlash(__('Datos guardados', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un error guardando los datos', true));
			}
		}
		if ($id && empty($this->data)) {
			$this->data = $this->Offer->read(null, $id);
		}
	}

	function admin_delete($id = null) {
        $this->layout = 'panel';
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Offer->delete($id)) {
			$this->Session->setFlash(__('Datos borrados', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ha ocurrido un error borrando los datos', true));
		$this->redirect(array('action' => 'index'));
	}
}
