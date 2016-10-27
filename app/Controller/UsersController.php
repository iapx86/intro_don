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
		if ($this->action === 'login') {
			$this->layout = 'game';
		}

	}

	/**
	 * login
	 *
	 * @return void
	 */
	public function login() {
		if($this->Auth->user()){
			return $this->redirect(array('controller' => 'games' , 'action' => 'start'));
		}else{
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					return $this->redirect(array('controller' => 'games' , 'action' => 'start'));
				}else{
					$this->User->create();
					if ($this->User->save($this->request->data)) {
						$this->Auth->login();
						return $this->redirect(array('controller' => 'games' , 'action' => 'start'));
					} else {
						$this->Flash->error(__('ログインも新規作成もできません'));
					}
				}
			}
		}
	}


	public function logout() {
		$this->redirect($this->Auth->logout());
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
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
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
 *startに組み込んだため不要
 */


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
//  */
// 	public function edit($id = null) {
// 		if (!$this->User->exists($id)) {
// 			throw new NotFoundException(__('Invalid user'));
// 		}
// 		if ($this->request->is(array('post', 'put'))) {
// 			if ($this->User->save($this->request->data)) {
// 				$this->Flash->success(__('The user has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Flash->error(__('The user could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
// 			$this->request->data = $this->User->find('first', $options);
// 		}
// 	}

// /**
//  * delete method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function delete($id = null) {
// 		$this->User->id = $id;
// 		if (!$this->User->exists()) {
// 			throw new NotFoundException(__('Invalid user'));
// 		}
// 		$this->request->allowMethod('post', 'delete');
// 		if ($this->User->delete()) {
// 			$this->Flash->success(__('The user has been deleted.'));
// 		} else {
// 			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
// 		}
// 		return $this->redirect(array('action' => 'index'));
// 	}
}
