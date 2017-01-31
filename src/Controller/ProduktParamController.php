<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProduktParam Controller
 *
 * @property \App\Model\Table\ProduktParamTable $ProduktParam
 */
class ProduktParamController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $produktParam = $this->paginate($this->ProduktParam);

        $this->set(compact('produktParam'));
        $this->set('_serialize', ['produktParam']);
    }

    /**
     * View method
     *
     * @param string|null $id Produkt Param id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $produktParam = $this->ProduktParam->get($id, [
            'contain' => []
        ]);

        $this->set('produktParam', $produktParam);
        $this->set('_serialize', ['produktParam']);
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
        
        $produktParam = $this->ProduktParam->newEntity();
        if ($this->request->is('post')) {
            $produktParam = $this->ProduktParam->patchEntity($produktParam, $this->request->data);
            if ($this->ProduktParam->save($produktParam)) {
                $this->Flash->success(__('The produkt param has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produkt param could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('produktParam'));
        $this->set('_serialize', ['produktParam']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produkt Param id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $produktParam = $this->ProduktParam->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produktParam = $this->ProduktParam->patchEntity($produktParam, $this->request->data);
            if ($this->ProduktParam->save($produktParam)) {
                $this->Flash->success(__('The produkt param has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produkt param could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('produktParam'));
        $this->set('_serialize', ['produktParam']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produkt Param id.
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
        $produktParam = $this->ProduktParam->get($id);
        if ($this->ProduktParam->delete($produktParam)) {
            $this->Flash->success(__('The produkt param has been deleted.'));
        } else {
            $this->Flash->error(__('The produkt param could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
