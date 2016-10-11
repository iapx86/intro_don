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
	public $uses = Array('Game', 'Song', 'Log');
	public function beforeFilter() {
		$this->Auth->allow();
		if ($this->action !== 'index' && $this->action !== 'view' && $this->action !== 'add' && $this->action !== 'edit' && $this->action !== 'delete') {
			$this->layout = 'game';
		}
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
			if ($songs_count < MAX_QUESTION) {
				$this->Flash->error(__('The number of songs is not enough.'));
				return $this->redirect(array('action' => 'start'));
			}
			for ($correct = [], $i = 1; $i <= MAX_QUESTION; $i++) {
				do {
					$index = rand(0, $songs_count - 1);
				} while (in_array($index, $correct));
				$correct[$i] = $index;
			}
			for ($i = 1; $i <= MAX_QUESTION; $i++) {
				$select[$i][rand(1, MAX_SELECT)] = $correct[$i];
				for ($j = 1; $j <= MAX_SELECT; $j++) {
					if (array_key_exists($j, $select[$i])) {
						continue;
					}
					do {
						$index = rand(0, $songs_count - 1);
					} while (in_array($index, $select[$i]));
					$select[$i][$j] = $index;
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
				$this->Session->write('Game.correct', $correct);
				$this->Session->write('Game.select', $select);
				$this->Session->write('Game.songs', $songs);
				$this->Session->write('Game.answer', []);
				$this->Session->write('Game.judge', []);
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
		$this->set('correct', $this->Session->read('Game.correct'));
		$this->set('select', $this->Session->read('Game.select'));
		$this->set('songs', $this->Session->read('Game.songs'));
	}
	/**
	 * answer method
	 *
	 * @return void
	 */
	public function answer() {
		for ($id = 1; $id <= MAX_SELECT; $id++) {
			if (array_key_exists((string)$id, $this->request->data)) {
				break;
			}
		}
		if ($id > MAX_SELECT) {
			$this->Flash->error(__('Illegal operation is detected.'));
			return $this->redirect(array('action' => 'start'));
		}
		$this->set('question', $num = $this->Session->read('Game.question'));
		$this->set('correct', $correct = $this->Session->read('Game.correct'));
		$this->set('select', $select = $this->Session->read('Game.select'));
		$this->set('songs', $this->Session->read('Game.songs'));
		$answer = $this->Session->read('Game.answer');
		$judge = $this->Session->read('Game.judge');
		$judge[$num] = $correct[$num] === $select[$num][$answer[$num] = $id];
		$this->Session->write('Game.answer', $answer);
		$this->set('answer', $answer);
		$this->Session->write('Game.judge', $judge);
		$this->set('judge', $judge);
		$this->Session->write('Game.question', $num + 1);
		$this->Log->create();
		$this->Log->save(['Log' => [
//			'user_id' =>
			'game_id' => $this->Session->read('Game.id'),
			'score' => $judge[$num] ? 10 : 0,
			'botton_number' => $answer[$num],
			'correct' => $judge[$num] ? 1 : 0,
		]]);
	}
	/**
	 * result method
	 *
	 * @return void
	 */
	public function result() {
		$this->set('correct', $this->Session->read('Game.correct'));
		$this->set('select', $this->Session->read('Game.select'));
		$this->set('songs', $this->Session->read('Game.songs'));
		$this->set('answer', $this->Session->read('Game.answer'));
		$this->set('judge', $this->Session->read('Game.judge'));
		$this->Session->delete('Game');
	}
}
