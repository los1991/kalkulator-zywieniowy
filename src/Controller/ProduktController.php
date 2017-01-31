<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;

/**
 * Produkt Controller
 *
 * @property \App\Model\Table\ProduktTable $Produkt
 */
class ProduktController extends AppController {

    public function beforeFilter(event $event) {
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
    public function index() {
        
        $this->loadModel('Podkategorie');
        $query = $this->Podkategorie->find('list', [
            'keyField' => 'id_podkateg',
            'valueField' => 'nazwa_podkateg']);
        $podkategorie_array = $query->toArray();
        $this->set('podkategorie_array', $podkategorie_array);
        

        if (isset($this->request->query['szukaj']) && $this->request->query['szukaj'] != null) {

            $this->paginate = array(
                'conditions' => array('Produkt.nazwa_prod LIKE' => '%' . $this->request->query['szukaj'] . '%')
            );
            $produkt = $this->paginate('Produkt');
        } else {
            $produkt = $this->paginate($this->Produkt);
        }

        $session = $this->request->session();

        if ($session->check('User.rola')) {
            $rola = $this->request->session()->read('User.rola');
            $this->set('rola', $rola);
        }

        $this->set(compact('produkt'));
        $this->set('_serialize', ['produkt']);
    }

    /**
     * View method
     *
     * @param string|null $id Produkt id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $prod_param_id = null) {
        
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $this->loadModel('ProduktParam');
            $ProduktParam = $this->ProduktParam->newEntity();
            
            $ProduktParam = $this->ProduktParam->patchEntity($ProduktParam, $this->request->data);
            
            $query = $this->ProduktParam->find('all', [
                'conditions' => [
                    'ProduktParam.id_prod' => $ProduktParam->id_prod,
                    'ProduktParam.id_param' => $ProduktParam->id_param,
                    
                    
                    ]
            ]);
            $number = $query->count();
            
            if($number > 0)
            {
                $this->Flash->error(__('Parametr już jest wpisany do tego produktu.'));
                return $this->redirect(['action' => 'view/' . $id]);
            }
            else{
               if ($this->ProduktParam->save($ProduktParam)) {
                $this->Flash->success(__('Zapisano parametr produktu.'));

                return $this->redirect(['action' => 'view/' . $id]);
                } else {
                    $this->Flash->error(__('Nie udało się zapisać parametru.'));
                } 
            }            
        }

        
        
        $this->loadModel('Podkategorie');
        $query = $this->Podkategorie->find('list', [
            'keyField' => 'id_podkateg',
            'valueField' => 'nazwa_podkateg']);
        $podkategorie_array = $query->toArray();
        $this->set('podkategorie_array', $podkategorie_array);

        $conn = ConnectionManager::get('default');

        $stmt = $conn->execute('select * from Parametry join Produkt_Param on  Parametry.id_param = Produkt_Param.id_param where Produkt_Param.id_prod = ? ', [$id]);

        $rows = $stmt->fetchAll('assoc');

        $ParamHTMLString = '';
        $NazwaParamArray = '';
        $WartoscArray = '';
        $SkrotJednoArray = '';
        $ProduktParamArray = '';
        foreach ($rows as $row) {

            $ParamHTMLString[$row['id_prod_param']] = $row['nazwa_param'];
            $WartoscArray[$row['id_prod_param']] = $row['wartosc'];
            $SkrotJednoArray[$row['id_prod_param']] = $row['skrot_jedno'];
        }

        $this->set('htmlParam', $ParamHTMLString);
        $this->set('wartosc', $WartoscArray);
        $this->set('skrot', $SkrotJednoArray);

        $stmt = $conn->execute('select Parametry.id_param, Parametry.nazwa_param, Parametry.skrot_jedno from  Parametry left outer join Produkt_Param on  Parametry.id_param = Produkt_Param.id_param');

        $rows = $stmt->fetchAll('assoc');
        foreach ($rows as $row) {
            $ProdParamArray[$row['id_param']] = $row['nazwa_param'] . ' ' . $row['skrot_jedno'];
        }

        
        if (isset($ProdParamArray))
            $this->set('ProdParamArray', $ProdParamArray);

        $produkt = $this->Produkt->get($id, [
            'contain' => []
        ]);


        $this->set('produkt', $produkt);
        $this->set('_serialize', ['produkt']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $session = $this->request->session();

        if ($this->request->session()->read('User.rola') != 'admin') {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $this->loadModel('Podkategorie');
        $query = $this->Podkategorie->find('list', [
            'keyField' => 'id_podkateg',
            'valueField' => 'nazwa_podkateg']);
        $Podkategoria_array = $query->toArray();

        if (!$Podkategoria_array) {
            $this->Flash->error(__('Brak podkategorii do wyboru produkt nie może zostać zapisany.'));
        } else {
            $this->set('podkategorie', $Podkategoria_array);
        }

        $produkt = $this->Produkt->newEntity();
        if ($this->request->is('post')) {
            $produkt = $this->Produkt->patchEntity($produkt, $this->request->data);
            if ($this->Produkt->save($produkt)) {
                $this->Flash->success(__('The produkt has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produkt could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('produkt'));
        $this->set('_serialize', ['produkt']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produkt id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        $session = $this->request->session();

        if ($this->request->session()->read('User.rola') != 'admin') {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $produkt = $this->Produkt->get($id, [
            'contain' => []
        ]);

        $this->loadModel('Podkategorie');
        $query = $this->Podkategorie->find('list', [
            'keyField' => 'id_podkateg',
            'valueField' => 'nazwa_podkateg']);
        $Podkategoria_array = $query->toArray();

        if (!$Podkategoria_array) {
            $this->Flash->error(__('Brak podkategorii do wyboru produkt nie może zostać zapisany.'));
        } else {
            $this->set('podkategorie', $Podkategoria_array);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $produkt = $this->Produkt->patchEntity($produkt, $this->request->data);
            if ($this->Produkt->save($produkt)) {
                $this->Flash->success(__('The produkt has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produkt could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('produkt'));
        $this->set('_serialize', ['produkt']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produkt id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {

        $session = $this->request->session();

        if ($this->request->session()->read('User.rola') != 'admin') {
            return $this->redirect($this->Auth->redirectUrl());
        }


        $this->request->allowMethod(['post', 'delete']);
        $produkt = $this->Produkt->get($id);
        if ($this->Produkt->delete($produkt)) {
            $this->Flash->success(__('The produkt has been deleted.'));
        } else {
            $this->Flash->error(__('The produkt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function viewUsunParam($id = null, $prod_param_id = null) {
        $session = $this->request->session();


        if ($this->request->session()->read('User.rola') != 'admin') {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if (!$id)
            return $this->redirect($this->Auth->redirectUrl());
        else if (!$prod_param_id) {
            $this->Flash->error(__('Brak identyfikatora parametru.'));
            return $this->redirect($this->redirect(['action' => 'view/' . $id]));
        }

        $this->loadModel('ProduktParam');

        $ProduktParam = $this->ProduktParam->get($prod_param_id, [
            'contain' => []
        ]);

        if ($this->ProduktParam->delete($ProduktParam)) {
            $this->Flash->success(__('Usunięto parametr.'));
        } else {
            $this->Flash->error(__('Nie udało się usunąć parametru.'));
        }

        return $this->redirect($this->redirect(['action' => 'view/' . $id]));
    }

    public function viewEdytujParam($id = null, $prod_param_id = null) {
        $this->loadModel('ProduktParam');
        $ProduktParam = $this->ProduktParam->newEntity();

        if ($prod_param_id) {
            $ProduktParam = $this->ProduktParam->get($prod_param_id, [
                'contain' => []
            ]);

            $this->set('ProduktParam', $ProduktParam);
        }
        
        $this->loadModel('Podkategorie');
        $query = $this->Podkategorie->find('list', [
            'keyField' => 'id_podkateg',
            'valueField' => 'nazwa_podkateg']);
        $podkategorie_array = $query->toArray();
        $this->set('podkategorie_array', $podkategorie_array);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $ProduktParam = $this->ProduktParam->patchEntity($ProduktParam, $this->request->data);
            if ($this->ProduktParam->save($ProduktParam)) {
                $this->Flash->success(__('Zapisano parametr produktu.'));

                return $this->redirect(['action' => 'view/' . $id]);
            } else {
                $this->Flash->error(__('Nie udało się zapisać parametru.'));
            }
        }




        $conn = ConnectionManager::get('default');

        $stmt = $conn->execute('select * from Parametry join Produkt_Param on  Parametry.id_param = Produkt_Param.id_param where Produkt_Param.id_prod = ? ', [$id]);

        $rows = $stmt->fetchAll('assoc');

        $ParamHTMLString = '';
        $NazwaParamArray = '';
        $WartoscArray = '';
        $SkrotJednoArray = '';
        $ProduktParamArray = '';
        foreach ($rows as $row) {

            $ParamHTMLString[$row['id_prod_param']] = $row['nazwa_param'];
            $WartoscArray[$row['id_prod_param']] = $row['wartosc'];
            $SkrotJednoArray[$row['id_prod_param']] = $row['skrot_jedno'];
        }


        $this->set('htmlParam', $ParamHTMLString);
        $this->set('wartosc', $WartoscArray);
        $this->set('skrot', $SkrotJednoArray);


        $stmt = $conn->execute('select Parametry.id_param, Parametry.nazwa_param, Parametry.skrot_jedno from  Parametry left outer join Produkt_Param on  Parametry.id_param = Produkt_Param.id_param where Produkt_Param.id_prod_param = ? ', [$prod_param_id]);


        $rows = $stmt->fetchAll('assoc');
        foreach ($rows as $row) {
            $ProdParamArray[$row['id_param']] = $row['nazwa_param'] . ' ' . $row['skrot_jedno'];
        }

        
       
        
        if (isset($ProdParamArray))
            $this->set('ProdParamArray', $ProdParamArray);

        $produkt = $this->Produkt->get($id, [
            'contain' => []
        ]);


        $this->set('produkt', $produkt);
        $this->set('_serialize', ['produkt']);
    }

}
