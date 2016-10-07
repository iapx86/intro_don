<?php
App::uses('AppController', 'Controller');
define('MAX_QUESTION', 10);
define('MAX_SELECT', 4);
/**
 * Games Controller
 *
 * @property Game $Game
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class GamesController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow();
	}

	public function isAuthorized($user) {
			// 登録済ユーザーは投稿できる
			if ($this->action === 'add') {
					return true;
			}

			return parent::isAuthorized($user);
	}


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
			$songs = $this->Song->find('all');
			$songs_count = count($songs);
			for ($correct = [], $i = 1; $i <= MAX_QUESTION; $i++) {
				do {
					$id = rand(1, 100);
				} while (in_array($id, $correct));
				$correct[$i] = $id;
			}
			for ($i = 1; $i <= MAX_QUESTION; $i++) {
				$select[$i][rand(1, MAX_SELECT)] = $correct[$i];
				for ($j = 1; $j <= MAX_SELECT; $j++) {
					if (array_key_exists($j, $select[$i])) {
						continue;
					}
					do {
						$id = rand(1, 100);
					} while (in_array($id, $select[$i]));
					$select[$i][$j] = $id;
				}
			}
			for ($i = 1; $i <= MAX_QUESTION; $i++) {
				$this->request->data['Game']['question'.$i.'_correct_songid'] = $songs[$correct[$i]]['Song']['id'];
				for ($j = 1; $j <= MAX_SELECT; $j++) {
					$this->request->data['Game']['question'.$i.'_select'.$j.'_songid'] = $songs[$select[$i][$j]]['Song']['id'];
				}
			}
			if ($this->Game->save($this->request->data)) {
				$this->Session->write('Game.id', $this->Game->id);
				$this->Session->write('Game.question', 1);
				for ($i = 1; $i <= 10; $i++) {
					$this->Session->write('Game.question'.$i.'_correct_songid', $correct[$i]);
					for ($j = 1; $j <= 4; $j++) {
						$this->Session->write('Game.question'.$i.'_select'.$j.'_songid', $select[$i][$j]);
					}
				}
				return $this->redirect(array('action' => 'question'));
			} else {
				$this->Flash->error(__('The game could not be saved. Please, try again.'));
			}
		}
	}

/**
 * question method
 *
 * @return void
 */
	public function question() {
		$this->set('question', $num = $this->Session->read('Game.question'));
		if ($num > MAX_QUESTION) {
			return $this->redirect(array('action' => 'result'));
		}
		$correct = $this->Session->read('Game.question'.$num.'_correct_songid');
		for ($i = 1; $i <= 4; $i++) {
			$select[$i] = $this->Session->read('Game.question'.$num.'_select'.$i.'_songid');
		}
		$this->set('question', $num);
		$this->set('correct', $correct);
		$this->set('select', $select);
	}

/**
 * answer method
 *
 * @return void
 */
	public function answer($answer = null) {
		$num = $this->Session->read('Game.question');
		$correct = $this->Session->read('Game.question'.$num.'_correct_songid');
		for ($i = 1; $i <= 4; $i++) {
			$select[$i] = $this->Session->read('Game.question'.$num.'_select'.$i.'_songid');
		}
		$judge = $correct === $select[$answer];
		$this->Session->write('Game.question'.$num.'_judge', $judge);
		$this->set('question', $num);
		$this->set('correct', $correct);
		$this->set('select', $select);
		$this->set('answer', $answer);
		$this->set('judge', $judge);
		$this->Session->write('Game.question', $num + 1);
	}

/**
 * result method
 *
 * @return void
 */
	public function result($answer = null) {
		$correct = [];
		$judge = [];
		for ($i = 1; $i <= 10; $i++) {
			$correct[$i] = $this->Session->read('Game.question'.$i.'_correct_songid');
			$judge[$i] = $this->Session->read('Game.question'.$i.'_judge');
		}
		$this->set('correct', $correct);
		$this->set('judge', $judge);
		$this->Session->delete('Game');
	}
}
