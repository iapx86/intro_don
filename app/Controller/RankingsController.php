<?php
App::uses('AppController', 'Controller');
/**
 * Rankings Controller
 *
 * @property Ranking $Ranking
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RankingsController extends AppController {

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
		$this->Ranking->recursive = 0;
		$this->set('rankings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ranking->exists($id)) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		$options = array('conditions' => array('Ranking.' . $this->Ranking->primaryKey => $id));
		$this->set('ranking', $this->Ranking->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ranking->create();
			if ($this->Ranking->save($this->request->data)) {
				$this->Flash->success(__('The ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ranking could not be saved. Please, try again.'));
			}
		}
		$games = $this->Ranking->Game->find('list');
		$users = $this->Ranking->User->find('list');
		$this->set(compact('games', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ranking->exists($id)) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ranking->save($this->request->data)) {
				$this->Flash->success(__('The ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ranking could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ranking.' . $this->Ranking->primaryKey => $id));
			$this->request->data = $this->Ranking->find('first', $options);
		}
		$games = $this->Ranking->Game->find('list');
		$users = $this->Ranking->User->find('list');
		$this->set(compact('games', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ranking->id = $id;
		if (!$this->Ranking->exists()) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ranking->delete()) {
			$this->Flash->success(__('The ranking has been deleted.'));
		} else {
			$this->Flash->error(__('The ranking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
