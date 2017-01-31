<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UzytkProd Controller
 *
 * @property \App\Model\Table\UzytkProdTable $UzytkProd
 */
class UzytkProdController extends AppController
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
        
        $uzytkProd = $this->paginate($this->UzytkProd);

        $this->set(compact('uzytkProd'));
        $this->set('_serialize', ['uzytkProd']);
    }

    /**
     * View method
     *
     * @param string|null $id Uzytk Prod id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $uzytkProd = $this->UzytkProd->get($id, [
            'contain' => []
        ]);

        $this->set('uzytkProd', $uzytkProd);
        $this->set('_serialize', ['uzytkProd']);
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
        
        $uzytkProd = $this->UzytkProd->newEntity();
        if ($this->request->is('post')) {
            $uzytkProd = $this->UzytkProd->patchEntity($uzytkProd, $this->request->data);
            if ($this->UzytkProd->save($uzytkProd)) {
                $this->Flash->success(__('The uzytk prod has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The uzytk prod could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('uzytkProd'));
        $this->set('_serialize', ['uzytkProd']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Uzytk Prod id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->session();
        
        if ( $this->request->session()->read('User.rola') != 'admin' ) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $uzytkProd = $this->UzytkProd->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uzytkProd = $this->UzytkProd->patchEntity($uzytkProd, $this->request->data);
            if ($this->UzytkProd->save($uzytkProd)) {
                $this->Flash->success(__('The uzytk prod has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The uzytk prod could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('uzytkProd'));
        $this->set('_serialize', ['uzytkProd']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Uzytk Prod id.
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
        $uzytkProd = $this->UzytkProd->get($id);
        if ($this->UzytkProd->delete($uzytkProd)) {
            $this->Flash->success(__('The uzytk prod has been deleted.'));
        } else {
            $this->Flash->error(__('The uzytk prod could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
