<?php
App::uses('AppController', 'Controller');
/**
 * Games Controller
 *
 * @property Game $Game
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class GamesController extends AppController {

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
		$this->Game->recursive = 0;
		$this->set('games', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Game->exists($id)) {
			throw new NotFoundException(__('Invalid game'));
		}
		$options = array('conditions' => array('Game.' . $this->Game->primaryKey => $id));
		$this->set('game', $this->Game->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Game->create();
			if ($this->Game->save($this->request->data)) {
				$this->Flash->success(__('The game has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The game could not be saved. Please, try again.'));
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
		if (!$this->Game->exists($id)) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Game->save($this->request->data)) {
				$this->Flash->success(__('The game has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The game could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Game.' . $this->Game->primaryKey => $id));
			$this->request->data = $this->Game->find('first', $options);
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
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Game->delete()) {
			$this->Flash->success(__('The game has been deleted.'));
		} else {
			$this->Flash->error(__('The game could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * start method
 *
 * @return void
 */
	public function start() {
		if ($this->request->is('post')) {
			$this->Game->create();
			for ($correct = [], $i = 1; $i <= 10; $i++) {
				do {
					$id = rand(1, 100);
				} while (in_array($id, $correct));
				$correct[$i] = $id;
			}
			for ($i = 1; $i <= 10; $i++) {
				$select[$i][rand(1, 4)] = $correct[$i];
				for ($j = 1; $j <= 4; $j++) {
					if (array_key_exists($j, $select[$i])) {
						continue;
					}
					do {
						$id = rand(1, 100);
					} while (in_array($id, $select[$i]));
					$select[$i][$j] = $id;
				}
			}
			for ($i = 1; $i <= 10; $i++) {
				$this->request->data['Game']['question'.$i.'_correct_songid'] = $correct[$i];
				for ($j = 1; $j <= 4; $j++) {
					$this->request->data['Game']['question'.$i.'_select'.$j.'_songid'] = $select[$i][$j];
				}
			}
			if ($this->Game->save($this->request->data)) {
				$this->Session->write('Game.id', $this->Game->id);
				for ($i = 1; $i <= 10; $i++) {
					$this->Session->write('Game.question'.$i.'_correct_songid', $correct[$i]);
					for ($j = 1; $j <= 4; $j++) {
						$this->Session->write('Game.question'.$i.'_select'.$j.'_songid', $select[$i][$j]);
					}
				}
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The game could not be saved. Please, try again.'));
			}
		}
	}
}
