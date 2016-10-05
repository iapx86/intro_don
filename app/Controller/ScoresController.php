<?php
App::uses('AppController', 'Controller');
/**
 * Scores Controller
 *
 * @property Score $Score
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ScoresController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Score->recursive = 0;
		$this->set('scores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Score->exists($id)) {
			throw new NotFoundException(__('Invalid score'));
		}
		$options = array('conditions' => array('Score.' . $this->Score->primaryKey => $id));
		$this->set('score', $this->Score->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Score->create();
			if ($this->Score->save($this->request->data)) {
				$this->Flash->success(__('The score has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The score could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Score->exists($id)) {
			throw new NotFoundException(__('Invalid score'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Score->save($this->request->data)) {
				$this->Flash->success(__('The score has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The score could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Score.' . $this->Score->primaryKey => $id));
			$this->request->data = $this->Score->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Score->id = $id;
		if (!$this->Score->exists()) {
			throw new NotFoundException(__('Invalid score'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Score->delete()) {
			$this->Flash->success(__('The score has been deleted.'));
		} else {
			$this->Flash->error(__('The score could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
