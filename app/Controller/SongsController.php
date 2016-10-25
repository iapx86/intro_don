<?php
App::uses('AppController', 'Controller');
/**
 * Songs Controller
 *
 * @property Song $Song
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SongsController extends AppController {

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
		$this->Song->recursive = 0;
		$this->set('songs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Song->exists($id)) {
			throw new NotFoundException(__('Invalid song'));
		}
		$options = array('conditions' => array('Song.' . $this->Song->primaryKey => $id));
		$this->set('song', $this->Song->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Song->create();
			if ($this->Song->save($this->request->data)) {
				$this->Flash->success(__('The song has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The song could not be saved. Please, try again.'));
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
		if (!$this->Song->exists($id)) {
			throw new NotFoundException(__('Invalid song'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Song->save($this->request->data)) {
				$this->Flash->success(__('The song has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The song could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Song.' . $this->Song->primaryKey => $id));
			$this->request->data = $this->Song->find('first', $options);
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
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Song->delete()) {
			$this->Flash->success(__('The song has been deleted.'));
		} else {
			$this->Flash->error(__('The song could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * search method
 *
 * @return void
 */
	public function search() {
		if ($this->request->is('post')) {
			$url = 'http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/wa/wsSearch?country=JP&entity=musicTrack&term=' . $this->request->data['Song']['term'];
			$obj = json_decode($json = file_get_contents($url));
			$this->log($obj);
			foreach ($obj->results as $result) {
				if (!property_exists($result, "trackName") || !property_exists($result, "artistName") || !property_exists($result, "primaryGenreName")
					|| !property_exists($result, "collectionName") || !property_exists($result, "artworkUrl100") || !property_exists($result, "previewUrl"))
					continue;
				$song['Song']['title'] = $result->trackName;
				$song['Song']['artist'] = $result->artistName;
				$song['Song']['genre'] = $result->primaryGenreName;
				$song['Song']['album'] = $result->collectionName;
				$song['Song']['jacket_img'] = $result->artworkUrl100;
				$song['Song']['preview'] = $result->previewUrl;
				$songs[] = $song;
			}
			if (count($songs) == 0)
				return $this->redirect(array('action' => 'index'));
			$this->Session->write('Song.search_result', $songs);
			$this->set('songs', $songs);
			$this->render('search-result');
		}
	}

/**
 * addResult method
 *
 * @return void
 */
	public function addResult() {
		if ($this->request->is('post')) {
			$songs = $this->Session->read('Song.search_result');
			$select = $this->request->data['Song'];
			for ($n = count($select), $i = 0; $i < $n; $i++)
				if (!$select[$i]['valid'])
					unset($songs[$i]);
			$this->Song->saveAll($songs);
		}
		$this->redirect(array('action' => 'index'));
	}

/**
 * deleteDup method
 *
 * @return void
 */
	public function deleteDup() {
		if ($this->request->is('post')) {
			$n = count($songs = $this->Song->find('all'));
			for ($i = 0; $i < $n - 1; $i++) {
				if (!isset($songs[$i]))
					continue;
				for ($j = $i + 1; $j < $n; $j++) {
					if (!isset($songs[$j]) || $songs[$j]['Song']['preview'] != $songs[$i]['Song']['preview'])
						continue;
					$this->Song->id = $songs[$j]['Song']['id'];
					$this->Song->delete();
					unset($songs[$j]);
				}
			}
		}
		$this->redirect(array('action' => 'index'));
	}
}
