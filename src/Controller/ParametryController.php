<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parametry Controller
 *
 * @property \App\Model\Table\ParametryTable $Parametry
 */
class ParametryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $parametry = $this->paginate($this->Parametry);

        $session = $this->request->session();
        if ($session->check('User.rola')) {
            $rola = $this->request->session()->read('User.rola');
            $this->set('rola', $rola);
        }
        
        $this->set(compact('parametry'));
        $this->set('_serialize', ['parametry']);
    }

    /**
     * View method
     *
     * @param string|null $id Parametry id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $parametry = $this->Parametry->get($id, [
            'contain' => []
        ]);

        $this->set('parametry', $parametry);
        $this->set('_serialize', ['parametry']);
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
                
        $parametry = $this->Parametry->newEntity();
        if ($this->request->is('post')) {
            $parametry = $this->Parametry->patchEntity($parametry, $this->request->data);
            if ($this->Parametry->save($parametry)) {
                $this->Flash->success(__('The parametry has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parametry could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('parametry'));
        $this->set('_serialize', ['parametry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parametry id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
               
        
        $parametry = $this->Parametry->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parametry = $this->Parametry->patchEntity($parametry, $this->request->data);
            if ($this->Parametry->save($parametry)) {
                $this->Flash->success(__('The parametry has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parametry could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('parametry'));
        $this->set('_serialize', ['parametry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parametry id.
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
        $parametry = $this->Parametry->get($id);
        if ($this->Parametry->delete($parametry)) {
            $this->Flash->success(__('The parametry has been deleted.'));
        } else {
            $this->Flash->error(__('The parametry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
