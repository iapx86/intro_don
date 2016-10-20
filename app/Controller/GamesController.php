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
	public $uses = Array('Game', 'Song', 'Log', 'User');
	public function beforeFilter() {
		$this->Auth->allow();
		if ($this->action !== 'index' && $this->action !== 'view' && $this->action !== 'add' && $this->action !== 'edit' && $this->action !== 'delete' && $this->action !== 'startMulti') {
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
	// public $components = array('Paginator', 'Session', 'Flash');
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
		$this->set('loginUser', $this->Auth->user());

		if ($this->request->is('post')) {

			if ($this->Auth->login()) {
				$this->__startGame();
			}else{
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Auth->login();
					$this->__startGame();
				} else {
					$this->Flash->error(__('ログインも新規作成もできません'));
				}
			}
		}
	}

	/**
	 * 問題作成
	 */
	private function __startGame(){
		
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
			$this->Flash->error(__('問題作成に失敗しました。'));
		}
	}


	/**
	 * question method
	 *
	 * @return void
	 */
	public function question() {
				$this->set('loginUser', $this->Auth->user());
		$this->set('question', $num = $this->Session->read('Game.question'));
		if ($num > MAX_QUESTION) {
			return $this->redirect(array('action' => 'result'));
		}
		$this->set('correct', $this->Session->read('Game.correct'));
		$this->set('select', $this->Session->read('Game.select'));
		$this->set('songs', $this->Session->read('Game.songs'));

		// debug($_SESSION['Game']);
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
			'user_id' => $this->Auth->user()['id'],
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
	// public function result() {
	// 	$this->set('correct', $this->Session->read('Game.correct'));
	// 	$this->set('select', $this->Session->read('Game.select'));
	// 	$this->set('songs', $this->Session->read('Game.songs'));
	// 	$this->set('answer', $this->Session->read('Game.answer'));
	// 	$this->set('judge', $this->Session->read('Game.judge'));
	// 	$this->Session->delete('Game');
	// }


	public function result() {
		// ゲームテーブルから該当レコードを取得
		$gameContent = $this->Game->find('first' ,
			array(
				'conditions' => array(
					'Game.id' => $this->Session->read('Game.id')
					)
				)
			);

		// ユーザー情報まとめ
		$ranker = [];

		for ($i= 1; $i <= 5; $i++) { 
			if(isset($gameContent['Game']['entry_user'.$i])){

				// ユーザーＩＤ取得
				$ranker[$i] = ['id' => $gameContent['Game']['entry_user'.$i]];

				// ユーザー名取得
				 $this->User->unbindModel(
					array('hasMany' => array('Log'))
				);
				 $username =  $this->User->find('first' , 
					array(
						'conditions'=>array(
								'User.id'=> $gameContent['Game']['entry_user'.$i]
						),
						'fields' => array('User.username')
					)
				);
				$ranker[$i] = ['username' => $username['User']['username']];

				// 正解数の取得
				$countCorrect = $this->Log->find('count' , 
					array(
						'conditions'=>array(
							'and' =>array(
								'Log.game_id' => $gameContent['Game']['id'],
								'Log.correct' => 1,
								'Log.user_id'=> $gameContent['Game']['entry_user'.$i]
								)
							)
						)
					);
				$ranker[$i] += ['countCorrect' => $countCorrect];

				// スコア合計
				$sumScore = $this->Log->find('first' , 
					array(
						'fields' =>array(
							'sum(Log.score) as sumScore'),
						'conditions'=>array(
							'and' =>array(
								'Log.game_id' => $gameContent['Game']['id'],
								'Log.correct' => 1,
								'Log.user_id'=> $gameContent['Game']['entry_user'.$i]
								)
							)
						)
					);

				$ranker[$i] += ['sumScore' => $sumScore[0]['sumScore']];

			}else{
				$ranker[$i] = null;
			}
		}

		// 正解数の多い順番にソート
		foreach ($ranker as $key => $value) {
			$sort[$key] = $value['countCorrect'];
			}
		array_multisort($sort, SORT_DESC, $ranker);


		$this->set('ranker', $ranker);





		$this->set('correct', $this->Session->read('Game.correct'));
		$this->set('select', $this->Session->read('Game.select'));
		$this->set('songs', $this->Session->read('Game.songs'));
		$this->set('answer', $this->Session->read('Game.answer'));
		$this->set('judge', $this->Session->read('Game.judge'));

		// debug($this->Auth->user());
		// debug($gameContent);
		// debug($ranker);
		// debug($_SESSION['Game']);

	}


	/**
	 * startMulti method
	 *
	 * @return void
	 */
	public function startMulti() {
		$options = ['order' => 'Game.id DESC', 'conditions' => ['Game.created >' => date('Y-m-d H:i:s', time() - 60), 'Game.host !=' => '']];
		$game = $this->Game->find('first', $options);
		if (count($game)) {
			for ($i = 2; $i <= 5; $i++) {
				if (isset($game['Game']['entry_user' . $i]))
					continue;
				$game['Game']['entry_user' . $i] = $this->Auth->user() ? $this->Auth->user('id') : 0;
				$this->Game->save($game, true, ['entry_user' . $i]);
				$this->set('game', $game);
				$this->Session->write('Game.id', $game['Game']['id']);
				$this->Session->write('Game.question', 1);
				$this->redirect(array('action' => 'questionMulti'));
				return;
			}
			unset($game);
		}
		$songs = $this->Song->find('all');
		$songs_count = count($songs);
		if ($songs_count < MAX_QUESTION) {
			$this->Flash->error(__('The number of songs is not enough.'));
			$this->redirect(array('action' => 'index'));
			return;
		}
		for ($correct = [], $i = 1; $i <= MAX_QUESTION; $i++) {
			do {
				$id = $songs[rand(0, $songs_count - 1)]['Song']['id'];
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
					$id = $songs[rand(0, $songs_count - 1)]['Song']['id'];
				} while (in_array($id, $select[$i]));
				$select[$i][$j] = $id;
			}
		}
		for ($i = 1; $i <= MAX_QUESTION; $i++) {
			$game['Game']['question' . $i . '_correct_songid'] = $correct[$i];
			for ($j = 1; $j <= MAX_SELECT; $j++) {
				$game['Game']['question' . $i . '_select' . $j . '_songid'] = $select[$i][$j];
			}
		}
		$game['Game']['entry_user1'] = $game['Game']['host'] = $this->Auth->user() ? $this->Auth->user('id') : 0;
		$this->Game->save($game);
		$this->set('game', $game = $this->Game->find('first', ['conditions' => ['Game.id' => $this->Game->id]]));
		$this->Session->write('Game.id', $game['Game']['id']);
		$this->Session->write('Game.question', 1);
		$this->redirect(array('action' => 'questionMulti'));
	}

	/**
	 * questionMulti method
	 *
	 * @return void
	 */
	public function questionMulti() {
		$this->set('loginUser', $this->Auth->user());
		$this->set('question', $num = $this->Session->read('Game.question'));
		if ($num > MAX_QUESTION) {
			$this->redirect(array('action' => 'resultMulti'));
			return;
		}
		$game = $this->Game->find('first', ['conditions' => ['Game.id' => $this->Session->read('Game.id')]]);
		$this->set('correct', $this->Song->find('first', ['conditions' => ['Song.id' => $game['Game']['question'.$num.'_correct_songid']]]));
		for ($select = [], $i = 1; $i <= 4; $i++)
			$select[$i] = $this->Song->find('first', ['conditions' => ['Song.id' => $game['Game']['question'.$num.'_select'.$i.'_songid']]]);
		$this->set('select', $select);
	}

	/**
	 * answerMulti method
	 *
	 * @return void
	 */
	public function answerMulti() {
		for ($id = 1; $id <= MAX_SELECT; $id++) {
			if (array_key_exists((string)$id, $this->request->data)) {
				break;
			}
		}
		if ($id > MAX_SELECT) {
			$this->Flash->error(__('Illegal operation is detected.'));
			$this->redirect(array('action' => 'start'));
			return;
		}
		$this->set('question', $num = $this->Session->read('Game.question'));
		$game = $this->Game->find('first', ['conditions' => ['Game.id' => $this->Session->read('Game.id')]]);
		$this->set('correct', $this->Song->find('first', ['conditions' => ['Song.id' => $game['Game']['question'.$num.'_correct_songid']]]));
		$this->set('judge', $judge = $game['Game']['question'.$num.'_correct_songid'] === $game['Game']['question'.$num.'_select'.$id.'_songid']);
		$this->Session->write('Game.question', $num + 1);
		$this->Log->create();
		$this->Log->save(['Log' => [
			'user_id' => $this->Auth->user() ? $this->Auth->user('id') : 0,
			'game_id' => $game['Game']['id'],
			'score' => $judge ? 10 : 0,
			'botton_number' => $id,
			'correct' => $judge[$num] ? 1 : 0,
		]]);
	}

}
