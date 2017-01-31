<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Kategorie Controller
 *
 * @property \App\Model\Table\KategorieTable $Kategorie
 */
class KategorieController extends AppController
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
        $kategorie = $this->paginate($this->Kategorie);

        $session = $this->request->session();
        
        
        if ($session->check('User.rola')) {
            $rola = $this->request->session()->read('User.rola');
            $this->set('rola', $rola);
        }
        
        $this->set(compact('kategorie'));
        $this->set('_serialize', ['kategorie']);
    }

    /**
     * View method
     *
     * @param string|null $id Kategorie id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kategorie = $this->Kategorie->get($id, [
            'contain' => []
        ]);

        $this->set('kategorie', $kategorie);
        $this->set('_serialize', ['kategorie']);
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
        
        $kategorie = $this->Kategorie->newEntity();
        if ($this->request->is('post')) {
            $kategorie = $this->Kategorie->patchEntity($kategorie, $this->request->data);
            if ($this->Kategorie->save($kategorie)) {
                $this->Flash->success(__('The kategorie has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The kategorie could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('kategorie'));
        $this->set('_serialize', ['kategorie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Kategorie id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $kategorie = $this->Kategorie->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kategorie = $this->Kategorie->patchEntity($kategorie, $this->request->data);
            if ($this->Kategorie->save($kategorie)) {
                $this->Flash->success(__('The kategorie has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The kategorie could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('kategorie'));
        $this->set('_serialize', ['kategorie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Kategorie id.
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
        $kategorie = $this->Kategorie->get($id);
        if ($this->Kategorie->delete($kategorie)) {
            $this->Flash->success(__('The kategorie has been deleted.'));
        } else {
            $this->Flash->error(__('The kategorie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
