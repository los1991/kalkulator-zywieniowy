<div class="uzytkownik index large-12 medium-12 columns content">
    <h3><?= __('Posiłki użytkownika') ?></h3>

    
    <div class="zapotrzebowanie form">
   
    <fieldset style="margin: 0 px; padding: 0px;">
        <legend><a href="/kalkulator/uzytkownik/zapotrzebowanie">Wylicz zapotrzebowanie</a> <a href="/kalkulator/uzytkownik/posilki"> Zapisz posiłki</a></legend>
        <div class="row">
            <div class='content'>
            
                
                <div class="row wlasne ">
                    
                    <div class="large-12 columns center" >
                        <legend>Dodanie produktów do posiłku</legend>
                        <div class="row wlasne ">
                            <div class="small-10 columns">

                            </div>
                            <div class="small-2 columns">
                                   <button id='dodaj_produkt_posilek' type="buton" style='padding: 8.5px; width: 100%;'>Dodaj produkt</button>
                            </div>
                         </div>
                         <?= $this->Form->create() ?>
                        <div class="row collapse prefix-radius">
                            <div class="small-6 columns">
                              <span class="prefix">Produkt</span>
                            </div>
                            <div class="small-6 columns">
                              
                              <?php
                                    //echo $this->Form->select('id_prod', $produkt_array, ['empty' => false, 'value' => $selected, 'readonly' => true ]);
                                    echo $this->Form->select('id_prod', $produkt_array, ['empty' => false, 'id' => 'id_prod_select']);
                                    
                                ?>
                                
                            </div>
                            <div class="small-2 columns">
                               
                            </div>
                            
                        </div>
                        
                        <div class="row collapse prefix-radius">
                            <div class="small-6 columns">
                              <span class="prefix">Ilość *</span>
                            </div>
                            <div class="small-6 columns">
                              <input type='number' name='produkt_ilosc' id="produkt_ilosc" min="1" >
                            </div>
                        </div>
                         
                         
                        
                        <div class="row collapse prefix-radius">
                            <div class="small-6 columns">
                                
                              <span class="prefix">Przypisz posiłek do dnia:</span>
                            </div>
                            <div class="small-6 columns">
                                
                                <select name="dzien">
                                    <option value='1'>Dzień 1</option>
                                    <option value='2'>Dzień 2</option>
                                    <option value='3'>Dzień 3</option>
                                    <option value='4'>Dzień 4</option>
                                    <option value='5'>Dzień 5</option>
                                    <option value='6'>Dzień 6</option>
                                    <option value='7'>Dzień 7</option>
                                </select>
                            </div>
                            
                        </div>
                        
                         <?= $this->Form->button(__('Zapisz posiłek')) ?>
                        
                        <div class="row collapse prefix-radius">
                            <?php
                                if(isset($ProdParamArray)){
                                    
                                    $params_html = '';
                                    
                                    foreach($ProdParamArray as $row){
                                        
                                        $jest_param = 0;
                                        $prod_paramhtml = '';
                                        
                                        
                                        $prod_paramhtml = '<div class="produkt_pram" id="prod_param_'.$row[0]['id_prod'].'">';
                                        $prod_paramhtml .= 'Parametry dla produktu: '.$row[0]['nazwa_prod'] .' na 100 g/ml';
                                        $prod_paramhtml .= '</br>';
                                        foreach($row as $parametr){
                                            
                                            if(isset($parametr['wartosc']) && $parametr['wartosc'] != NULL  && isset($parametr['nazwa_param']) && $parametr['nazwa_param'] != NULL ){
                                               $jest_param = 1; 
                                                $prod_paramhtml .= $parametr['nazwa_param']. ' ' . $parametr['wartosc'] . ' '. $parametr['skrot_jedno'];
                                                $prod_paramhtml .= '</br>';
                                            }
                                        
                                            
                                        }
                                        
                                        $prod_paramhtml .= '</div>';
                                        
                                        if(isset($jest_param) && $jest_param == 1){
                                            if($params_html == ''){
                                                $params_html = $prod_paramhtml;
                                            }
                                            else{
                                                $params_html .= $prod_paramhtml;
                                            }
                                            
                                        }
                                        
                                        
                                    }
                                    
                                    echo $params_html;
                                    
                                }
                            ?>
                        </div>
                        
                        
                        <legend>Lista dodanych produktow do posiłku i posiłku</legend>
                        <div class="row collapse ">
                            <div class="small-6 columns" id="lista_prod_wpisanych">
                              
                            </div>
                                                       
                        </div>
                        
                        
                        
                        
                    </div>
                </div>
               
                <?= $this->Form->end() ?>
            </div>
            <div class="uzytkownik index large-12 medium-12 columns content">
                
                <legend>Dzienne zapotrzebowanie:</legend>
                <div class="row wlasne ">
                <div class="large-3 columns">
                      <div class="row collapse prefix-radius">
                        <div class="small-4 columns">
                          <span class="prefix">Kalorie</span>
                        </div>
                        <div class="small-5 columns">

                          <input type="text" value="<?= $uzytkownik->zap_kalorie ?>" name="zap_kalorie_wlasne" id='zap_kalorie' disabled>
                        </div>
                          <div class="small-3 columns postfix-radius">
                          <span class="prefix">kcal</span>
                        </div>
                      </div>
                </div>
                <div class="large-3 columns">
                      <div class="row collapse prefix-radius">
                        <div class="small-4 columns">
                          <span class="prefix">Białko</span>
                        </div>
                        <div class="small-5 columns">
                             
                            <input type="text" value="<?= $uzytkownik->zap_bialko ?>" name="zap_bialko_wlasne" id='zap_bialko_wlasne' disabled>
                        </div>
                          <div class="small-3 columns postfix-radius">
                          <span class="prefix">g</span>
                        </div>
                      </div>
                </div>
                <div class="large-3 columns">
                      <div class="row collapse prefix-radius">
                        <div class="small-4 columns">
                          <span class="prefix">Węglowodany</span>
                        </div>
                        <div class="small-5 columns">
                            
                            <input type="text" value="<?= $uzytkownik->zap_wegle ?>" name="zap_wegle_wlasne" id='zap_wegle_wlasne' disabled>
                        </div>
                          <div class="small-3 columns postfix-radius">
                          <span class="prefix">g</span>
                        </div>
                      </div>
                </div>
                <div class="large-3 columns">
                      <div class="row collapse prefix-radius">
                        <div class="small-4 columns">
                          <span class="prefix">Tłuszcze</span>
                        </div>
                        <div class="small-5 columns">
                           
                            <input type="text" value="<?= $uzytkownik->zap_tluszcz ?>" name="zap_tluszcz_wlasne" id='zap_tluszcz_wlasne' disabled>
                        </div>
                          <div class="small-3 columns postfix-radius">
                          <span class="prefix">g</span>
                        </div>
                      </div>
                    </div>
            </div>
                
                <?php

                
                    
                
                ?>
                
                <table summary="">
                    <tr>
                        
                        <?php 
                            
                            for ($i = 1; $i <= 7; $i++) {
                                
                                $html_dzien= '';
                                $html_dzien_styl = '';
                                $styl = '';

                                
                                if(isset($uzyte_makro['Białko'][$i]))
                                {
                                    
                                    if( ($uzytkownik->zap_bialko-$uzyte_makro['Białko'][$i]) < 0){
                                        $styl='style="background-color:#fe5f5f;"';
                                    }
                                    
                                    $html_dzien .= '<span> B:</span> <span style="float: right;"> '.($uzytkownik->zap_bialko - $uzyte_makro['Białko'][$i]).' g</span></br>';
                                }
                                else{
                                    $html_dzien .= '<span> B:</span> <span style="float: right;"> '.$uzytkownik->zap_bialko.' g</span></br>';
                                }
                                if(isset($uzyte_makro['Węgle'][$i]))
                                {
                                
                                   if( ( $uzytkownik->zap_wegle-$uzyte_makro['Węgle'][$i] ) < 0){
                                        $styl='style="background-color:#fe5f5f;"';
                                   }
                                
                                    $html_dzien .= '<span> W:</span> <span style="float: right;"> '.($uzytkownik->zap_wegle-$uzyte_makro['Węgle'][$i]).' g</span></br>';
                                }
                                else{
                                    $html_dzien .= '<span> W:</span> <span style="float: right;"> '.$uzytkownik->zap_wegle.' g</span></br>';
                                }
                                if(isset($uzyte_makro['Tłuszcz'][$i]))
                                {
                                   if(($uzytkownik->zap_tluszcz-$uzyte_makro['Tłuszcz'][$i]) < 0){
                                       $styl='style="background-color:#fe5f5f;"';
                                   }
                                
                                    $html_dzien .= '<span> T:</span> <span style="float: right;"> '.($uzytkownik->zap_tluszcz-$uzyte_makro['Tłuszcz'][$i]).' g</span></br>';
                                }
                                else{
                                    $html_dzien .= '<span> T:</span> <span style="float: right;"> '.$uzytkownik->zap_tluszcz.' g</span></br>';
                                }
                               if(isset($uzyte_makro['Kalorie'][$i]))
                                {
                                   if( ( $uzytkownik->zap_kalorie-$uzyte_makro['Kalorie'][$i] ) < 0){
                                       $styl='style="background-color:#fe5f5f;"';
                                   }
                                //
                                    $html_dzien .= '<span> K:</span> <span style="float: right;"> '.($uzytkownik->zap_kalorie-$uzyte_makro['Kalorie'][$i]).' g</span>';
                                }
                                else{
                                    $html_dzien .= '<span> K:</span> <span style="float: right;"> '.$uzytkownik->zap_kalorie.' kcal</span>';
                                }
                                
                                                              
                            $html_dzien .= '</td>';
                            
                            $html_dzien_styl .= '<td '.$styl.'>Pozostało:</br>';
                            $html_dzien_styl .= $html_dzien;
                            
                            
                            
                            
                            echo $html_dzien_styl;
                            }
                        ?>
                    </tr>
                  <tr>
                      
                      <th>Dzień 1</th>
                      <th>Dzień 2</th>
                      <th>Dzień 3</th>
                      <th>Dzień 4</th>
                      <th>Dzień 5</th>
                      <th>Dzień 6</th>
                      <th>Dzień 7</th>
                    
                  </tr>
                  <?php echo $html_tabela; ?>
                  <!-- ... -->
                </table>
            </div>
</div>
        
        
        
        
        <script>
            $('.produkt_pram').hide();
            id_prod = $('#id_prod_select').val();
            $('#prod_param_'+id_prod).show();
            
            $('#id_prod_select').on('change', function() {
                $('.produkt_pram').hide();
                id_prod = $('#id_prod_select').val();
                $('#prod_param_'+id_prod).show();    
            });
            
            
            
            
            
            $('#dodaj_produkt_posilek').on('click', function() {
                
                
                
                ilosc = $('#produkt_ilosc').val();
                
                if(ilosc > 0){
                    id_prod = $('#id_prod_select').val();
                    nazwa = $('#id_prod_select option[value="'+id_prod+'"').text();

                    if ( $( "#produkt_"+id_prod+"_div" ).length ){
                        $( "#produkt_"+id_prod+"_div" ).remove();
                    }
                    

                    $('#lista_prod_wpisanych').append('<div id="produkt_'+id_prod+'_div">- '+nazwa+': '+ilosc+' g, <input type="hidden" value="'+id_prod+'" name="produkt[]"> <input type="hidden" value="'+ilosc+'" name="prod_ilosc_'+id_prod+'"> <a class="usun_produkt" >Usuń</a>  </br></div>');
                
                    $('.usun_produkt').on('click', function() {
                         $('#'+this.id+'_div').remove();
                    });
                
                }
            });
        </script>