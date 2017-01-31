<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;
/**
 * Podkategorie Controller
 *
 * @property \App\Model\Table\PodkategorieTable $Podkategorie
 */
class PodkategorieController extends AppController
{
    public function beforeFilter(event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'view']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $podkategorie = $this->paginate($this->Podkategorie);
        
        
        
        $session = $this->request->session();
        
        $this->loadModel('Kategorie');
        $query = $this->Kategorie->find('list', [
            'keyField' => 'id_kateg',
            'valueField' => 'nazwa_kateg']);
        $kategorie_array = $query->toArray();
        $this->set('kategorie_array', $kategorie_array);
        
        
        if ($session->check('User.rola')) {
            $rola = $this->request->session()->read('User.rola');
            $this->set('rola', $rola);
        }
        
        
        $this->set(compact('podkategorie'));
        $this->set('_serialize', ['podkategorie']);
    }

    /**
     * View method
     *
     * @param string|null $id Podkategorie id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $podkategorie = $this->Podkategorie->get($id, [
            'contain' => []
        ]);
        
        $this->loadModel('Kategorie');
        $query = $this->Kategorie->find('list', [
            'keyField' => 'id_kateg',
            'valueField' => 'nazwa_kateg']);
        $kategorie_array = $query->toArray();
        $this->set('kategorie_array', $kategorie_array);
        

        $this->set('podkategorie', $podkategorie);
        $this->set('_serialize', ['podkategorie']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        //https://book.cakephp.org/3.0/en/controllers.html#loading-additional-models
        $this->loadModel('Kategorie');
        $query = $this->Kategorie->find('list', [
            'keyField' => 'id_kateg',
            'valueField' => 'nazwa_kateg']);
        $kategorie_array = $query->toArray();
        
        
        
        if(!$kategorie_array ){
            $this->Flash->error(__('Brak kategorii do wyboru podkategoria nie może zostać zapisana.'));
        }
        else{
            $this->set('kategorie', $kategorie_array);
        }
        
        

        $podkategorie = $this->Podkategorie->newEntity();
        if ($this->request->is('post')) {
            $podkategorie = $this->Podkategorie->patchEntity($podkategorie, $this->request->data);
            if ($this->Podkategorie->save($podkategorie)) {
                $this->Flash->success(__('The podkategorie has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The podkategorie could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('podkategorie'));
        $this->set('_serialize', ['podkategorie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Podkategorie id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        
        
        
        $podkategorie = $this->Podkategorie->get($id, [
            'contain' => []
        ]);
        
        
        $this->loadModel('Kategorie');
        $query = $this->Kategorie->find('list', [
            'keyField' => 'id_kateg',
            'valueField' => 'nazwa_kateg']);
        $kategorie_array = $query->toArray();
        
        
        
        if(!$kategorie_array ){
            $this->Flash->error(__('Brak kategorii do wyboru podkategoria nie może zostać zapisana.'));
        }
        else{
            $this->set('kategorie', $kategorie_array);
        }
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $podkategorie = $this->Podkategorie->patchEntity($podkategorie, $this->request->data);
            if ($this->Podkategorie->save($podkategorie)) {
                $this->Flash->success(__('The podkategorie has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The podkategorie could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('podkategorie'));
        $this->set('_serialize', ['podkategorie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Podkategorie id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $this->request->allowMethod(['post', 'delete']);
        $podkategorie = $this->Podkategorie->get($id);
        if ($this->Podkategorie->delete($podkategorie)) {
            $this->Flash->success(__('The podkategorie has been deleted.'));
        } else {
            $this->Flash->error(__('The podkategorie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
