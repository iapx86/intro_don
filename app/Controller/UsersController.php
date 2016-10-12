<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {


	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function login() {
		if ($this->request->is('post')) {
				if ($this->Auth->login()) {
//						$this->redirect($this->Auth->redirect());
						$this->redirect(array('controller' => 'games', 'action' => 'start'));
				} else {
						$this->Flash->error(__('ログインできません、再度入力お願いします。'));
				}
			}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

// public function isAuthorized($user) {
// 	 $loginuser = $this->Auth->user();

//     // 投稿のオーナーは編集や削除ができる
//     if (in_array($this->action, array('edit'))) {
//         $postId = (int) $this->request->params['pass'][0];
//         if ($this->Users->isOwnedBy($postId, $user['id'])) {
//             return true;
//         }
//     }

//     return parent::isAuthorized($user);
// }


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
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());

		// debug($this->request->data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
		public function add() {
			if ($this->request->is('post')) {
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Auth->login();
					return $this->redirect(array('controller' => 'games' , 'action' => 'start'));
				} else {
					$this->Flash->error(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		// debug($this->request);
		// debug($this->request->params['pass'][0]);
		// debug($loginuser);


	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
