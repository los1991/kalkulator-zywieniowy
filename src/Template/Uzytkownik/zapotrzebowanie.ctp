<div class="uzytkownik index large-12 medium-12 columns content">
    <h3><?= __('Wylicz zapotrzebowanie') ?></h3>

    
    <div class="zapotrzebowanie form">
    <?= $this->Form->create() ?>
    <fieldset style="margin: 0 px; padding: 0px;">
        <legend><a href="/kalkulator/uzytkownik/zapotrzebowanie">Wylicz zapotrzebowanie</a> <a href="/kalkulator/uzytkownik/posilki"> Zapisz posiłki</a></legend>
        <div class="row">
            <div class=" large-9 medium-9 columns content large-centered">

                <input type="radio" name="zapotrzebowanie" value="Wzor" id="zapotrzebowanieWzor" <?php if($uzytkownik->zap_wzor == 1) echo 'checked'; ?> ><label for="zapotrzebowanieWzor">Zapotrzebowanie ze wzoru</label>
                    <input type="radio" name="zapotrzebowanie" value="Wlasne" id="zapotrzebowanieWlasne" <?php if($uzytkownik->zap_wzor == 0) echo 'checked'; ?>><label for="zapotrzebowanieWlasne">Własne zapotrzebowanie</label>
            </div>
        </div>
        
        <div class="row wzor">
            <legend>Podaj wagę i współczynnik aktywności</legend>
             <div class="row wzor">
            <div class="large-3 columns">
                  <div class="row collapse prefix-radius">
                    <div class="small-3 columns">
                      <span class="prefix">Waga</span>
                    </div>
                    <div class="small-6 columns">
                      <input id="waga_zmiana" type="number" value="<?= $uzytkownik->waga ?>" name="waga">
                        <input type="hidden" value="1" name="zap_wzor">
                    </div>
                      <div class="small-3 columns postfix-radius">
                  <span class="prefix">kg</span>
                </div>
                    </div>
            </div>
            
            <div class="large-6 columns">
                <div class="row collapse prefix-radius">
                    <div class="small-5 columns">
                      <span class="prefix">Współczynnik aktywności:</span>
                    </div>
                    <div class="small-7 columns">
                      <select id="wspolczynnik_zmiana" name="aktywnosc" value="">
                        <option value="1" <?php if($uzytkownik->zap_aktywnosc == 1) echo 'selected'; ?> >1,0 – leżący lub siedzący tryb życia, brak aktywności fizycznej</option>
                        <option value="2" <?php if($uzytkownik->zap_aktywnosc == 2) echo 'selected'; ?> >1,2 – praca siedząca, aktywność fizyczna na niskim poziomie</option>
                        <option value="3" <?php if($uzytkownik->zap_aktywnosc == 3) echo 'selected'; ?> >1,4 – praca niefizyczna, trening 2 razy w tygodniu</option>
                        <option value="4" <?php if($uzytkownik->zap_aktywnosc == 4) echo 'selected'; ?>  >1,6 – lekka praca fizyczna, trening 3-4 razy w tygodniu</option>
                        <option value="5" <?php if($uzytkownik->zap_aktywnosc == 5) echo 'selected'; ?> >1,8 – praca fizyczna, trening 5 razy w tygodniu</option>
                        <option value="6" <?php if($uzytkownik->zap_aktywnosc == 6) echo 'selected'; ?> >2,0 – ciężka praca fizyczna, codzienny trening</option>
                      </select>
                    </div>
                </div>
            </div>
           <div class="large-3 columns">
               <div class="row collapse prefix-radius">
                    <div class="small-4 columns">
                      <span class="prefix">Modyfikator:</span>
                    </div>
                    <div class="small-8 columns">
                      <select id="modyfikator_zmiana" name="modyfikator" value="">
                        <option value="0" <?php if($uzytkownik->zap_modyfikator == 0) echo 'selected'; ?> >Brak</option>
                        <option value="10" <?php if($uzytkownik->zap_modyfikator == 10) echo 'selected'; ?> >+10% - przyrost masy</option>
                        <option value="20" <?php if($uzytkownik->zap_modyfikator == 20) echo 'selected'; ?> >+20% - przyrost masy</option>
                        <option value="30" <?php if($uzytkownik->zap_modyfikator == 30) echo 'selected'; ?> >+30% - przyrost masy</option>
                        <option value="-10" <?php if($uzytkownik->zap_modyfikator == -10) echo 'selected'; ?> >-10% - redukcja</option>
                        <option value="-20" <?php if($uzytkownik->zap_modyfikator == -20) echo 'selected'; ?> >-20% - redukcja</option>
                        <option value="-30" <?php if($uzytkownik->zap_modyfikator == -30) echo 'selected'; ?> >-30% - redukcja</option>
                      </select>
                    </div>
                </div>
           </div>
           
           <div class='rows'>
               <div class="large-4 columns">
                <div class="row collapse prefix-radius">
                  <div class="small-6 columns">
                    <span class="prefix">Kalorie dostępne</span>
                  </div>
                  <div class="small-3 columns">
                    <input type="text" placeholder="Value" id="zap_kalorie" value="<?= $uzytkownik->zap_kalorie ?>" name="zap_kalorie" disabled>
                  </div>
                    <div class="small-3 end columns postfix-radius">
                  <span class="prefix">kcal</span>
                </div>
                </div>
                 </div>
               <div class="large-8 columns">
                   
               </div>
                   
           </div>
                  


           </div>
           <div class='rows'>
               <legend>Wybierz makro składniki w oparciu o dostępne kalorie</legend>

            <div class='rows'>   
                <div class="large-4 columns" style='padding:0px;'>
                         <div class="small-6 columns" style='padding:0px;'>
                              <span class="prefix">Kalorie wykorzystane</span>
                            </div>
                            <div class="small-3 columns" style='padding:0px;'>
                                <input type="text" name="kalorie_wybrane" placeholder="Value" id="kalorie_wybrane" value="<?= $uzytkownik->zap_kalorie ?>" readonly>
                            </div>
                              <div class="small-3 columns postfix-radius" style='padding:0px;'>
                            <span class="prefix">kcal</span>
                          </div>
                 </div>
                 <div class="large-8 columns">

                 </div>
              </div>  
               <div class="large-12 columns" style='padding:0px;'>
<!--               
-->                        <div class="large-4 columns"  style='padding:0px;'>
                           <div class="row collapse prefix-radius">
                             <div class="small-6 columns">
                               <span class="prefix">Białko</span>
                             </div>
                             <div class="small-3 columns">
                               <input type="number" value=<?= $uzytkownik->zap_bialko ?> name="zap_bialko" id="zap_bialko">
                               <input type="hidden" value=<?= $uzytkownik->zap_bialko ?> id="bialko_placeholder">
                             </div>
                              <div class="small-3 end columns postfix-radius">
                                   <span class="prefix" style="text-align:left;"> g - <span id="bialko_kcal" class=""></span>kcal</span>
                                </div> 
                           </div>
                     </div>
                        <div class="large-4 columns">
                              <div class="row collapse prefix-radius">
                                <div class="small-6 columns">
                                  <span class="prefix">Węglowodany</span>
                                </div>
                                <div class="small-3 columns">
                                  <input type="number"  value=<?= $uzytkownik->zap_wegle ?> name="zap_wegle" id="zap_wegle">
                                  <input type="hidden" value=<?= $uzytkownik->zap_wegle ?> id="wegle_placeholder">
                                </div>
                                 <div class="small-3 end columns postfix-radius">
                                   <span class="prefix" style="text-align:left;"> g - <span id="wegle_kcal" class=""></span>kcal</span>
                                </div> 

                              </div>
                        </div>
                        <div class="large-4 columns" style='padding:0px;'>
                              <div class="row collapse prefix-radius">
                                <div class="small-6 columns">
                                  <span class="prefix">Tłuszcze</span>
                                </div>
                                <div class="small-3 columns">
                                  <input type="number" value=<?= $uzytkownik->zap_tluszcz ?> name="zap_tluszcz" id="zap_tluszcz">
                                  <input type="hidden" value=<?= $uzytkownik->zap_tluszcz ?> id="tluszcz_placeholder">       
                                </div>
                                  <div class="small-3 end columns postfix-radius">
                                      <span class="prefix" style="text-align:left;"> g - <span id="tluszcz_kcal" class=""></span>kcal</span>
                                </div> 
                              </div>
                            </div>
<!--</div>-->
       
           </div>
        </div>
    </div>    
 
    <div class="row wlasne">
        <div class="large-3 columns">
              <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                  <span class="prefix">Kalorie</span>
                </div>
                <div class="small-5 columns">
                  <input type="text" placeholder="Value" value="<?= $uzytkownik->zap_kalorie ?>" name="zap_kalorie_wlasne" id='zap_kalorie_wlasne'>
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
                <div class="small-7 columns">
                  <input type="number" value="<?= $uzytkownik->zap_bialko ?>" name="zap_bialko_wlasne" id='zap_bialko_wlasne'>
                </div>
                  <div class="small-1 columns postfix-radius">
                  <span class="prefix">g</span>
                </div>
              </div>
        </div>
        <div class="large-3 columns">
              <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                  <span class="prefix">Węglowodany</span>
                </div>
                <div class="small-7 columns">
                  <input type="number" value="<?= $uzytkownik->zap_wegle ?>" name="zap_wegle_wlasne" id='zap_wegle_wlasne'>
                </div>
                  <div class="small-1 columns postfix-radius">
                  <span class="prefix">g</span>
                </div>
              </div>
        </div>
        <div class="large-3 columns">
              <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                  <span class="prefix">Tłuszcze</span>
                </div>
                <div class="small-7 columns">
                  <input type="number" value="<?= $uzytkownik->zap_tluszcz ?>" name="zap_tluszcz_wlasne" id='zap_tluszcz_wlasne'>
                </div>
                  <div class="small-1 columns postfix-radius">
                  <span class="prefix">g</span>
                </div>
              </div>
            </div>
        </div>
    </div>
<div class="rows ">    
<div class="large-centered center-btn" style="">
    <style>
        .center-btn button{
            display: block; margin: auto;
        }
     </style>
    <?= $this->Form->button(__('Zapisz zapotrzebowanie')) ?>
</div>
    <?= $this->Form->end() ?>
</div>


<script>
    
    
    $( "#zap_tluszcz_wlasne" ).on('change', function() {
        przelicz_wlasne_kalorie();       
     });
     $( "#zap_bialko_wlasne" ).on('change', function() {
        przelicz_wlasne_kalorie();       
     });
     $( "#zap_wegle_wlasne" ).on('change', function() {
        przelicz_wlasne_kalorie();       
     });
     
     function przelicz_wlasne_kalorie(){
         tluszcz = $( "#zap_tluszcz_wlasne" ).val();
         bialko = $( "#zap_bialko_wlasne" ).val();
         wegle = $( "#zap_wegle_wlasne" ).val();
         
         nowe_kalorie = (tluszcz*9) + (bialko*4) + (wegle*4);
         
         $( "#zap_kalorie_wlasne" ).val(nowe_kalorie);
     }
     
    
    $( "#waga_zmiana" ).on('change', function() {
        zmiana_zap();       
     });
     
    $( "#modyfikator_zmiana" ).on('change', function() {
        zmiana_zap();       
     });

     $( "#wspolczynnik_zmiana" ).on('change', function() {
        zmiana_zap();
     });
     
     $( "#zap_bialko"  ).on('change', function() {
        zmiana_makro();
     });
     $( "#zap_tluszcz"  ).on('change', function() {
        zmiana_makro();
     });
     
     $( "#zap_wegle"  ).on('change', function() {
        zmiana_makro();
     });

     function zmiana_makro(){
         bialko = $( "#zap_bialko" ).val();  
         bialko_placeholder = $( "#bialko_placeholder" ).val();  
         bialko_kcal = bialko*4;
         
         kalorie = $( "#zap_kalorie" ).val(); 

         
         
         tluszcz = $( "#zap_tluszcz" ).val();
         tluszcz_placeholder = $( "#tluszcz_placeholder" ).val();  
         tluszcz_kcal = tluszcz*9;

         
         
         wegle = $( "#zap_wegle" ).val();
         wegle_placeholder = $( "#wegle_placeholder" ).val();  
         wegle_kcal = wegle*4;

         
         
         
         ogolnie_kcal = kalorie -  (bialko_kcal + tluszcz_kcal + wegle_kcal);
         $( "#kalorie_wybrane" ).val(bialko_kcal + tluszcz_kcal + wegle_kcal); 

         
         if(ogolnie_kcal > 100 || (bialko_kcal + tluszcz_kcal + wegle_kcal) > kalorie ){
             
             $( "#zap_wegle" ).val(wegle_placeholder);
             $( "#zap_tluszcz" ).val(tluszcz_placeholder); 
             $( "#zap_bialko" ).val(bialko_placeholder);  
             
             
         }
         else if(ogolnie_kcal < 50 ){
             $( "#wegle_placeholder" ).val(wegle);  
             $( "#tluszcz_placeholder" ).val(tluszcz);  
             $( "#bialko_placeholder" ).val(bialko);  
             
             $( "#tluszcz_kcal" ).html( tluszcz_kcal );
             $( "#wegle_kcal" ).html( wegle_kcal );
             $( "#bialko_kcal" ).html( bialko_kcal );
         
             
             $( "#zap_kalorie" ).css("background-color", 'green'); 
             $( "#kalorie_wybrane" ).css("background-color", 'green'); 
         }
         else{
             $( "#zap_kalorie" ).css("background-color", 'yellow'); 
             $( "#kalorie_wybrane" ).css("background-color", 'yellow'); 
         }
         
         
         
     }
     
     

    function zmiana_zap() {
        waga = $( "#waga_zmiana" ).val();
        wspolczynnik_val = $( "#wspolczynnik_zmiana" ).val();
        modyfikator = $( "#modyfikator_zmiana" ).val();
        
            var wspolczynnik = [0, 1, 1.2, 1.4, 1.6, 1.8, 2];
            var zapotrzebowanie = parseInt((waga*24)*wspolczynnik[wspolczynnik_val] + ( modyfikator * (waga*24)*wspolczynnik[wspolczynnik_val] )/100 );            
            $( "#zap_kalorie" ).val(zapotrzebowanie);
            
            
            bialko_domyslnie = parseInt ((zapotrzebowanie*0.33)/4);
            wegle_domyslnie = parseInt ((zapotrzebowanie*0.33)/4);
            tluszcz_domyslnie = parseInt ((zapotrzebowanie*0.33)/9);

            $( "#zap_bialko" ).val(bialko_domyslnie);  
            $( "#zap_wegle" ).val(wegle_domyslnie);  
            $( "#zap_tluszcz" ).val(tluszcz_domyslnie);  
            
            zmiana_makro();
            
       }
    
    $( "#slider_bialko" ).on('change', function() {
         var wart = $( "#slider_bialko" ).val();
         $( "#bialk_procent" ).val(wart);
         
     });
    
    
    
    if ($('#zapotrzebowanieWzor').is(':checked')){
        $('.wzor').show();
        $('.wlasne').hide();
        
        
        <?php
        
        if($uzytkownik->zap_wzor != 1){
            echo 'zmiana_zap();
            zmiana_makro();';
        }
        ?>
    }
    else{
        
         $('.wzor').hide();
    }

    if ($('#zapotrzebowanieWlasne').is(':checked')){
        $('.wlasne').show();
        $('.wzor').hide();
    }
    else{
         $('.wlasne').hide();
    }


    $( "#zapotrzebowanieWzor" ).on('change', function() {
         if ($('#zapotrzebowanieWzor').is(':checked')){
            $('.wzor').show();
            $('.wlasne').hide();
            zmiana_zap();
            zmiana_makro();
            }
            else{
                 $('.wzor').hide();
            }
     });

    $( "#zapotrzebowanieWlasne" ).on('change', function() {
        if ($('#zapotrzebowanieWlasne').is(':checked')){
            $('.wlasne').show();
            $('.wzor').hide();
        }
        else{
             $('.wlasne').hide();
        }
     });

</script>