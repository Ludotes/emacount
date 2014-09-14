<?php
App::uses('AppController', 'Controller');
/**
 * Teams Controller
 *
 * @property Team $Team
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TeamsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');


/**
 * Page d'administation des scores
 */
	public function admin(){
		$this->set('teams', $this->Team->find('all'));
		$this->layout = 'admin';
	}

/**
 * Affichage des score pour les clients
 */
	public function display(){
		$this->set('teams', $this->Team->find('all'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Team->recursive = 0;
		$this->set('teams', $this->Paginator->paginate());
		$this->layout = 'admin';
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Team->create();
			if ($this->Team->save($this->request->data)) {
				$this->Session->setFlash(__('The team has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team could not be saved. Please, try again.'));
			}
		}
		$this->layout = 'admin';
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Team->exists($id)) {
			throw new NotFoundException(__('Invalid team'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Team->save($this->request->data)) {
				$this->Session->setFlash(__('The team has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Team.' . $this->Team->primaryKey => $id));
			$this->request->data = $this->Team->find('first', $options);
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
		$this->Team->id = $id;
		if (!$this->Team->exists()) {
			throw new NotFoundException(__('Invalid team'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Team->delete()) {
			$this->Session->setFlash(__('The team has been deleted.'));
		} else {
			$this->Session->setFlash(__('The team could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * Méthode d'ajout d'un point à une équipe
 * action : "a" pour ajouter, "r" pour retirer
 * Elle sera appellée en AJAX
 * $id : id
 * $a : action
 * $p : nombre de point à retirer/ajouter
 */
	public function managePoint($id = null, $a, $p){
		$this->autoRender = false;
		$this->Team->id = $id;
		if(!$this->Team->exists()){
			throw new NotFoundException(__('Invalid team'));
		}
		$team = $this->Team->findById($id);
		if($a == "a"){
			$team['Team']['points'] = $team['Team']['points']+$p;
		}elseif($a == "r"){
			$team['Team']['points'] = $team['Team']['points']-$p;
		}else{
			throw new NotFoundException(__('Invalid action'));
		}
		$this->Team->save($team);

		$this->response->type('json');
		$json = json_encode($this->Team->find('all'));
		$this->response->body($json);
	}
/**
 * Méthode qui récupère les données des Teams et qui les encode en JSON
 * Idéale pour appel AJAX
 */
	public function getTeamsJSON(){
		$this->autoRender = false;
		$this->response->type('json');
		$json = json_encode($this->Team->find('all'));
		$this->response->body($json);
	}
}
