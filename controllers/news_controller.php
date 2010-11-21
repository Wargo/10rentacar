<?php
class NewsController extends AppController {

	var $name = 'News';

	function index() {
		$this->News->recursive = 0;
        $conditions['active'] = 1;
		$this->set('news', $this->paginate('News', $conditions));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action' => 'index'));
		}
        $news = $this->News->find('first', array(
            'conditions' => array(
                'active' => 1,
                'id' => $id
            )
        ));
        $this->set(compact('news'));
	}

	function admin_index() {
        $this->layout = 'panel';
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
	}

	function admin_view($id = null) {
        $this->layout = 'panel';
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('news', $this->News->read(null, $id));
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
                $this->News->id = $id;
            } else {
                $this->News->create();
            }
			if ($this->News->save($this->data)) {
				$this->Session->setFlash(__('Datos guardados', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un error guardando los datos', true));
			}
		}
		if ($id && empty($this->data)) {
			$this->data = $this->News->read(null, $id);
		}
	}

	function admin_delete($id = null) {
        $this->layout = 'panel';
		if (!$id) {
			$this->Session->setFlash(__('Datos inválidos', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->News->delete($id)) {
			$this->Session->setFlash(__('Datos borrados', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ha ocurrido un error borrando los datos', true));
		$this->redirect(array('action' => 'index'));
	}
}
