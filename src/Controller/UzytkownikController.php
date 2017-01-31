<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Error\Debugger;
use Cake\Event\Event;
use Cake\Cache\Cache;
use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;

/**
 * Uzytkownik Controller
 *
 * @property \App\Model\Table\UzytkownikTable $Uzytkownik
 */
class UzytkownikController extends AppController {

    public function beforeFilter(event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['rejestracja', 'logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $session = $this->request->session();

        if ($this->request->session()->read('User.rola') != 'admin') {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($session->check('User.rola')) {
            $rola = $this->request->session()->read('User.rola');
            $this->set('rola', $rola);
        }

        $uzytkownik = $this->paginate($this->Uzytkownik);

        $this->set(compact('uzytkownik'));
        $this->set('_serialize', ['uzytkownik']);
    }

    public function login() {
        $session = $this->request->session();

        if ($session->check('User.login')) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                // session

                $session->write('User.id', $user['id_uzytk']);
                $session->write('User.login', $user['login']);
                $session->write('User.rola', $user['rola']);
                $session->write('User.zap_kalorie', $user['zap_kalorie']);
                $session->write('User.zap_bialko', $user['zap_bialko']);
                $session->write('User.zap_wegle', $user['zap_wegle']);
                $session->write('User.zap_tluszcz', $user['zap_tluszcz']);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Uzytkownik id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $session = $this->request->session();

        if ($this->request->session()->read('User.rola') != 'admin') {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $uzytkownik = $this->Uzytkownik->get($id, [
            'contain' => []
        ]);

        $this->set('uzytkownik', $uzytkownik);
        $this->set('_serialize', ['uzytkownik']);
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

        $uzytkownik = $this->Uzytkownik->newEntity();
        if ($this->request->is('post')) {
            $uzytkownik = $this->Uzytkownik->patchEntity($uzytkownik, $this->request->data);
            if ($this->Uzytkownik->save($uzytkownik)) {
                $this->Flash->success(__('The uzytkownik has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The uzytkownik could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('uzytkownik'));
        $this->set('_serialize', ['uzytkownik']);
    }

    public function rejestracja() {
        $uzytkownik = $this->Uzytkownik->newEntity();
        if ($this->request->is('post')) {
            $uzytkownik = $this->Uzytkownik->patchEntity($uzytkownik, $this->request->data);
            if ($this->Uzytkownik->save($uzytkownik)) {
                $this->Flash->success(__('Użytkownik został zarejestrowany.'));

                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('Wystąpił błąd, użytkownik nie mógł zostać zarejestrowany.'));
            }
        }
        $this->set(compact('uzytkownik'));
        $this->set('_serialize', ['uzytkownik']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Uzytkownik id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $session = $this->request->session();

        if ($this->request->session()->read('User.rola') != 'admin') {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $uzytkownik = $this->Uzytkownik->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uzytkownik = $this->Uzytkownik->patchEntity($uzytkownik, $this->request->data);
            if ($this->Uzytkownik->save($uzytkownik)) {
                $this->Flash->success(__('The uzytkownik has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The uzytkownik could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('uzytkownik'));
        $this->set('_serialize', ['uzytkownik']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Uzytkownik id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $session = $this->request->session();

        if ($this->request->session()->read('User.rola') != 'admin') {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $this->request->allowMethod(['post', 'delete']);
        $uzytkownik = $this->Uzytkownik->get($id);
        if ($this->Uzytkownik->delete($uzytkownik)) {
            $this->Flash->success(__('The uzytkownik has been deleted.'));
        } else {
            $this->Flash->error(__('The uzytkownik could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function logout() {
        $session = $this->request->session();
        $session->destroy();
        $this->Auth->logout();
        //return $this->redirect($this->Auth->logout());
        return $this->redirect(['action' => 'login']);
    }

    public function zapotrzebowanie() {
        if ($this->request->session()->check('User.id')) {
            $id = $this->request->session()->read('User.id');

            $uzytkownik = $this->Uzytkownik->get($id, [
                'contain' => []
            ]);


            if ($this->request->is(['patch', 'post', 'put'])) {

                $uzytkownikTable = TableRegistry::get('Uzytkownik');
                $uzytkownik = $uzytkownikTable->get($id);

                if ($this->request->data['waga'] && $this->request->data['aktywnosc'] && $this->request->data['zapotrzebowanie'] && $this->request->data['zapotrzebowanie'] == 'Wzor') {
                    $uzytkownik->zap_wzor = 1;
                    $uzytkownik->waga = $this->request->data['waga'];
                    $uzytkownik->zap_aktywnosc = $this->request->data['aktywnosc'];
                    $uzytkownik->zap_modyfikator = $this->request->data['modyfikator'];
                    $uzytkownik->zap_kalorie = $this->request->data['kalorie_wybrane'];
                    $uzytkownik->zap_bialko = $this->request->data['zap_bialko'];
                    $uzytkownik->zap_wegle = $this->request->data['zap_wegle'];
                    $uzytkownik->zap_tluszcz = $this->request->data['zap_tluszcz'];
                } elseif ($this->request->data['zapotrzebowanie'] && $this->request->data['zapotrzebowanie'] == 'Wlasne') {
                    $uzytkownik->zap_wzor = 0;
                    $uzytkownik->zap_bialko = $this->request->data['zap_bialko_wlasne'];
                    $uzytkownik->zap_wegle = $this->request->data['zap_wegle_wlasne'];
                    $uzytkownik->zap_kalorie = $this->request->data['zap_kalorie_wlasne'];
                    $uzytkownik->zap_tluszcz = $this->request->data['zap_tluszcz_wlasne'];
                } else {
                    $this->Flash->error(__('Błąd podczas zapisu zapotrzebowania.'));
                }

                if ($this->Uzytkownik->save($uzytkownik)) {
                    $this->Flash->success(__('Zapisano zapotrzebowanie.'));

                    return $this->redirect(['action' => 'zapotrzebowanie']);
                } else {
                    $this->Flash->error(__('Błąd podczas zapisu zapotrzebowania.'));
                }
            }

            $this->set(compact('uzytkownik'));
            $this->set('_serialize', ['uzytkownik']);
        }
    }

    public function posilki() {
        $session = $this->request->session();
  
        if ($this->request->session()->check('User.id')) {
            $id = $this->request->session()->read('User.id');
            
            // zapis posiłku do bazy
            if ($this->request->is(['patch', 'post', 'put'])) {
                
                
                $modelUzytkProd = $this->loadModel('UzytkProd');
                if(isset($this->request->data['produkt'])){
                    $Error;

                    // do jakiego posilku dopisac
                        // maks posiłek
                    $query = $this->UzytkProd->find('all', [
                       'conditions' => array('UzytkProd.id_uzytk' => $id, 'UzytkProd.dzien' => $this->request->data['dzien']),
                       'order' => ['UzytkProd.posilek' => 'DESC'],
                       'Limit' => 1,
                    ]);

                    $row = $query->first();
                        
                    
                    
                    foreach($this->request->data['produkt'] as $produkt_post){
                        $uzytk_prod = $this->UzytkProd->newEntity();
                        $uzytkownik = $this->UzytkProd->patchEntity($uzytk_prod, $this->request->data);
                        $uzytk_prod->id_uzytk =$id;
                        $uzytk_prod->id_prod = $produkt_post;
                        
                        
                        $uzytk_prod->posilek = $row['posilek']+1; 
                        
                        $uzytk_prod->dzien = $this->request->data['dzien'];
                        $uzytk_prod->ilosc = $this->request->data['prod_ilosc_'.$produkt_post];

                        
                        
                        
                        if ($this->UzytkProd->save($uzytk_prod)) {
                                                        
                        } else {
                            $Error = 1;
                        }
                    }
                }
                
                if(isset($Error) && $Error == 1){
                    $this->Flash->error(__('Posiłek nie został zapisany.'));
                }
                elseif(!isset($this->request->data['produkt'])){
                    $this->Flash->error(__('Brak produktu nie można zapisać posiłku.'));
                }
                else{
                    $this->Flash->success(__('Zapisano posiłek użytkownika.'));
                }

            }
            // koniec zapis

            $uzytkownik = $this->Uzytkownik->get($id, [
                'contain' => []
            ]);
            
            $this->loadModel('Produkt');
            $query = $this->Produkt->find('list', [
                'keyField' => 'id_prod',
                'valueField' => 'nazwa_prod']);
            $produkt_array = $query->toArray();
            $this->set('produkt_array', $produkt_array);
            

            $conn = ConnectionManager::get('default');
            
            $stmt = $conn->execute('SELECT * FROM produkt left join produkt_param on produkt.id_prod = produkt_param.id_prod left outer join parametry on produkt_param.id_param = parametry.id_param');
            $ProdParamArray;
            $ProdJednostka;
            $rows = $stmt->fetchAll('assoc');
            foreach ($rows as $row) {
                $ProdParamArray[$row['id_prod']][] = $row;
                $ProdJednostka[$row['id_prod']][] = $row['skrot_jedno'];
            }
            
            $this->set('produkt_jednostka', $ProdJednostka);
            
            if (isset($ProdParamArray))
                $this->set('ProdParamArray', $ProdParamArray);

            
            
            $TabelaHTML = $this->generujPosilkiHTML($id, $ProdParamArray);
            
            $this->set('html_tabela', $TabelaHTML[0]);
            $this->set('uzyte_makro', $TabelaHTML[1]);
            
            
            $this->set('uzytkownik', $uzytkownik);
            $this->set('_serialize', ['uzytkownik']);
        }
    }
    
    // edycja posiłku
    public function edytujposilek($dzien, $posilek) {
        $session = $this->request->session();
  
        
        //var_dump($this->request->data); die;
        if(isset($dzien) && isset($posilek)){
        
        if ($this->request->session()->check('User.id')) {
            $id = $this->request->session()->read('User.id');
            
            // zapis edytowanego posiłku do bazy
            if ($this->request->is(['patch', 'post', 'put'])) {
                
                
                $modelUzytkProd = $this->loadModel('UzytkProd');
                if(isset($this->request->data['edit_produkt'])){
                    $Error;                       
                       

                    foreach($this->request->data['edit_produkt'] as $produkt_post){
                        
                       
                        
                        $uzytk_prod = $this->UzytkProd->get($produkt_post, [
                            'contain' => []
                        ]);
                        
                        //$uzytk_prod = $this->UzytkProd->newEntity();
                        //$uzytkownik = $this->UzytkProd->patchEntity($uzytk_prod, $this->request->data);
                       // $uzytk_prod->id_uzytk =$id;
                       // $uzytk_prod->id_prod = $produkt_post;
                        
                        
                       // $uzytk_prod->posilek = $row['posilek']+1; 
                        
                       // $uzytk_prod->dzien = $this->request->data['dzien'];
                        $uzytk_prod->ilosc = $this->request->data['edit_prod_ilosc_'.$produkt_post];

                        
                        
                        
                        if ($this->UzytkProd->save($uzytk_prod)) {
                                                        
                        } else {
                            $Error = 1;
                        }
                    }
                }
                if(isset($this->request->data['produkt'])){   
                    foreach($this->request->data['produkt'] as $produkt_post){
                        $uzytk_prod = $this->UzytkProd->newEntity();
                        $uzytkownik = $this->UzytkProd->patchEntity($uzytk_prod, $this->request->data);
                        $uzytk_prod->id_uzytk =$id;
                        $uzytk_prod->id_prod = $produkt_post;
                        
                        
                        $uzytk_prod->posilek = $posilek; 
                        
                        $uzytk_prod->dzien = $dzien;
                        $uzytk_prod->ilosc = $this->request->data['prod_ilosc_'.$produkt_post];

                        
                        
                        
                        if ($this->UzytkProd->save($uzytk_prod)) {
                                                        
                        } else {
                            $Error = 1;
                        }
                    }
                    
                    
                    
                }
                
                if(isset($Error) && $Error == 1){
                    $this->Flash->error(__('Posiłek nie został zapisany.'));
                }
                elseif(!isset($this->request->data['edit_produkt']) && !isset($this->request->data['produkt'])){
                    $this->Flash->error(__('Brak produktu nie można zapisać posiłku.'));
                }
                else{
                    $this->Flash->success(__('Zapisano posiłek użytkownika.'));
                }

            }
            // koniec zapis

            $uzytkownik = $this->Uzytkownik->get($id, [
                'contain' => []
            ]);
            
            $this->loadModel('Produkt');
            $query = $this->Produkt->find('list', [
                'keyField' => 'id_prod',
                'valueField' => 'nazwa_prod']);
            $produkt_array = $query->toArray();
            $this->set('produkt_array', $produkt_array);
            

            $conn = ConnectionManager::get('default');
            
            $stmt = $conn->execute('SELECT * FROM produkt left join produkt_param on produkt.id_prod = produkt_param.id_prod left outer join parametry on produkt_param.id_param = parametry.id_param');
            $ProdParamArray;
            $ProdJednostka;
            $rows = $stmt->fetchAll('assoc');
            foreach ($rows as $row) {
                $ProdParamArray[$row['id_prod']][] = $row;
                $ProdJednostka[$row['id_prod']][] = $row['skrot_jedno'];
            }
            
            $this->set('produkt_jednostka', $ProdJednostka);
            
            if (isset($ProdParamArray))
                $this->set('ProdParamArray', $ProdParamArray);

            
            
            $TabelaHTML = $this->generujPosilkiHTML($id, $ProdParamArray);
            
            $this->set('html_tabela', $TabelaHTML[0]);
            $this->set('uzyte_makro', $TabelaHTML[1]);
            
            
            $query = $this->UzytkProd->find('all', [
                       'conditions' => array('UzytkProd.id_uzytk' => $id, 'UzytkProd.dzien' => $dzien, 'UzytkProd.posilek' => $posilek),
            ]);
            
            $rows = $query->find('all');
            foreach ($rows as $row) {
               $produktyPosilku[] =  $row;
            }
            $this->set('produktyPosilku', $produktyPosilku);
            
            
            $this->set('uzytkownik', $uzytkownik);
            $this->set('_serialize', ['uzytkownik']);
        }
        }
        else{
            return $this->redirect(['action' => 'posilki']);     
        }
           
    }
    
    private function generujPosilkiHTML($id, $ProduktyParametry){
            
        
            $this->loadModel('UzytkProd');
            $this->loadModel('ProduktParam');
            
            
            // słowniki Produktów i paramterrów
            $this->loadModel('Produkt');
            $query = $this->Produkt->find('list', [
                'keyField' => 'id_prod',
                'valueField' => 'nazwa_prod']);
            $produkt_array = $query->toArray();
            
            $this->loadModel('Parametry');
            $query = $this->Parametry->find('list', [
                'keyField' => 'id_param',
                'valueField' => 'nazwa_param']);
            $Parametry_array = $query->toArray();            
            
            
            $query = $this->UzytkProd->find('all',  [
                    'order' => ['UzytkProd.dzien' => 'ASC'],
            ])
            ->where(['id_uzytk' => $id]);
            
            $TablicaDzienPosilek;
            $TablicaDzienPosilekDane;
            foreach($query as $row){
                
                $this->loadModel('ProduktParam');
                $queryProduktParam = $this->ProduktParam->find('all',  [
                        
                ])
                ->where(['id_prod' => $row['id_prod']]);
                
                foreach($queryProduktParam as $ProduktParamRow){
                    $TablicaDzienPosilek[$row['dzien']][$row['posilek']][$row['id_prod']][$ProduktParamRow['id_param']] = $ProduktParamRow['wartosc'];
                }
                
                $TablicaDzienPosilekDane[$row['dzien']][$row['posilek']][$row['id_prod']] = $row['ilosc'];
                
            }
            
            $WartosciMakroTab;

            $TabelaHTML = '';
            $TabelaHTML .= '<tr>';
            for ($i = 1; $i <= 7; $i++) {
                if(isset($TablicaDzienPosilekDane[$i])){
                    
                    $TabelaHTML .= '<td style="padding:5px 0px;">';
                    $tmpposilek = 0;
                    foreach($TablicaDzienPosilekDane[$i] as $key_posilek=>$posilek){
                          if($tmpposilek !== $key_posilek){
                              $TabelaHTML .= '<div class="posilek_wpis" style="border:1px solid #dedede; padding:5px 5px; margin-bottom:5px;"> ';
                              $TabelaHTML .= 'Posiłek: '.$key_posilek . '<span > <a href="/kalkulator/uzytkownik/edytujposilek/'.$i.'/'.$key_posilek.'">Edytuj</a> <a href="/kalkulator/uzytkownik/usunposilek/'.$i.'/'.$key_posilek.'">Usuń</a></span></br>';
                          }
                          $tmpposilek = $key_posilek;
                          
                          $tmpBialko = 0;
                          $tmpWegle = 0;
                          $tmpTluszcz = 0;
                          $tmpKcal = 0;
                          
                          //var_dump('dupa'. $key_posilek. ' dzien:')
                          
                          foreach($posilek as $key=>$produkt_ilosc){
                            
                            $TabelaHTML .= $produkt_array[$key].' '.$produkt_ilosc . ': (g/ml)</br>';
                            
                            foreach($TablicaDzienPosilek[$row['dzien']][$row['posilek']][$key] as $key_param_val => $param_val){
                                
                                $query_prod_param = $this->ProduktParam->find('all', [
                                    'conditions' => array('ProduktParam.id_prod' => $key, 'ProduktParam.id_param' => $key_param_val),
                                    'Limit' => 1,
                                 ]);

                                 $row_prod_param = $query_prod_param->first();
                                 
                                 
                                 $param_val = round($row_prod_param['wartosc'] * ($produkt_ilosc/100), 2);
                                 
                                 
                                 
                              if(isset($key_param_val) && $key_param_val == 4){
                                  $tmpBialko += $param_val;
                              }
                                
                              
                              if(isset($key_param_val) && $key_param_val == 5){
                                   $tmpWegle += $param_val;
                              }
                               
                              
                              if(isset($key_param_val) && $key_param_val == 6){
                                  $tmpTluszcz += $param_val;
                              }
                                
                              
                            }
                            
                          
                        }
                        
                        
                          $kcal = $tmpBialko*4+$tmpWegle*4+$tmpTluszcz*9;
                          
                         
                          $TabelaHTML .= '<span style="margin-top:5px"> B: '.$tmpBialko.'g W: '.$tmpWegle.'g T: '.$tmpTluszcz.'g K: '.$kcal.'kcal</span></div>';
                          
                          if(isset($WartosciMakroTab['Białko'][$i])){
                              $WartosciMakroTab['Białko'][$i] += $tmpBialko;
                          }
                          else{
                              $WartosciMakroTab['Białko'][$i] = $tmpBialko;
                          }
                          if(isset($WartosciMakroTab['Węgle'][$i])){
                              $WartosciMakroTab['Węgle'][$i] += $tmpWegle;
                          }
                          else{
                              $WartosciMakroTab['Węgle'][$i] = $tmpWegle;
                          }
                          if(isset($WartosciMakroTab['Tłuszcz'][$i])){
                              $WartosciMakroTab['Tłuszcz'][$i] += $tmpTluszcz;
                          }
                          else{
                              $WartosciMakroTab['Tłuszcz'][$i] = $tmpTluszcz;
                          }
                          if(isset($WartosciMakroTab['Kalorie'][$i])){
                              $WartosciMakroTab['Kalorie'][$i] += $kcal;
                          }
                          else{
                              $WartosciMakroTab['Kalorie'][$i] = $kcal;
                          }
                    }
                    
                    $TabelaHTML .= '</td>';
                }
                else{
                    $TabelaHTML .= '<td></td>';
                }
            }
            $TabelaHTML .= '</tr>';
           
            
            if(isset($WartosciMakroTab))            
            {   
                $ReturnTab = [$TabelaHTML, $WartosciMakroTab];
                return $ReturnTab;
            }
    }
    
    
    public function usunposilek($dzien, $posilek){
        if ($this->request->session()->check('User.id')) {
            $id = $this->request->session()->read('User.id');
        
        $this->loadModel('UzytkProd');

        if($this->UzytkProd->deleteAll(['dzien' => $dzien, 'posilek' => $posilek])){
            $this->Flash->success(__('Usunięto posiłek.'));
        }
        else{
            $this->Flash->success(__('Nie można usunąć posiłku.'));
        }
        
        

        return $this->redirect(['action' => 'posilki']);
    
        }
        return $this->redirect(['action' => 'posilki']);
    }
    
    public function usunproduktposilek($dzien, $posilek, $id_usun){
        if ($this->request->session()->check('User.id')) {
            $id = $this->request->session()->read('User.id');
        
        $this->loadModel('UzytkProd');

        if($this->UzytkProd->deleteAll(['id_uzytk_prod' => $id_usun])){
            $this->Flash->success(__('Usunięto produkt z posiłu.'));
        }
        else{
            $this->Flash->success(__('Nie można usunąć posiłku.'));
        }
        
        

        return $this->redirect(['action' => 'edytujposilek/'.$dzien.'/'.$posilek]);
    
        }
        return $this->redirect(['action' => 'posilki']);
    }
    
    
    public function ustawienia() {
        if ($this->request->session()->check('User.id')) {
            $id = $this->request->session()->read('User.id');

            $uzytkownik = $this->Uzytkownik->get($id, [
                'contain' => []
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {

                $uzytkownikTable = TableRegistry::get('Uzytkownik');
                $uzytkownik = $uzytkownikTable->get($id);

                if (isset($this->request->data['email']) && $this->request->data['email'])
                    $uzytkownik->email = $this->request->data['email'];
                if (isset($this->request->data['wiek']) && $this->request->data['wiek'])
                    $uzytkownik->wiek = $this->request->data['wiek'];
                if (isset($this->request->data['wzorst']) && $this->request->data['wzorst'])
                    $uzytkownik->wzorst = $this->request->data['wzorst'];
                if (isset($this->request->data['waga']) && $this->request->data['waga'])
                    $uzytkownik->waga = $this->request->data['waga'];
                if (isset($this->request->data['plec']) && $this->request->data['plec'])
                    $uzytkownik->plec = $this->request->data['plec'];

                if ($this->Uzytkownik->save($uzytkownik)) {
                    $this->Flash->success(__('Zapisano nowe dane użytkownika.'));

                    return $this->redirect(['action' => 'ustawienia']);
                } else {
                    $this->Flash->error(__('Błąd podczas zapisu danych użytkownika.'));
                }
            }

            $this->set(compact('uzytkownik'));
            $this->set('_serialize', ['uzytkownik']);
        }
    }

    public function haslo() {
        if ($this->request->session()->check('User.id')) {
            $id = $this->request->session()->read('User.id');

            $uzytkownik = $this->Uzytkownik->get($id, [
                'contain' => []
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {

                $uzytkownikTable = TableRegistry::get('Uzytkownik');
                $uzytkownik = $uzytkownikTable->get($id);

                if ($this->request->data['haslo'] && $this->request->data['haslo2'] && $this->request->data['haslo'] == $this->request->data['haslo2'])
                    $uzytkownik->haslo = $this->request->data['haslo'];

                else {
                    $this->Flash->error(__('Błąd - podane hasła nie są takie same.'));
                    return $this->redirect(['action' => 'haslo']);
                }

                if ($this->Uzytkownik->save($uzytkownik)) {
                    $this->Flash->success(__('Nowe hasło zostało zapisane poprawnie.'));

                    return $this->redirect(['action' => 'haslo']);
                } else {
                    $this->Flash->error(__('Błąd podczas zapisu hasła użytkownika.'));
                }
            }

            $this->set(compact('uzytkownik'));
            $this->set('_serialize', ['uzytkownik']);
        }
    }

}
