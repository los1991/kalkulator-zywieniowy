<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        
        <?php if($this->request->session()->read('User.rola') == 'admin'){ ?>
        <li><?= $this->Html->link(__('Nowy Produkt'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Edytuj Produkt'), ['action' => 'edit', $produkt->id_prod]) ?> </li>
        <li><?= $this->Form->postLink(__('Usuń Produkt'), ['action' => 'delete', $produkt->id_prod], ['confirm' => __('Are you sure you want to delete # {0}?', $produkt->id_prod)]) ?> </li>
        
        <?php } ?>
        
        <li><?= $this->Html->link(__('Lista Produktów'), ['action' => 'index']) ?> </li>
        
    </ul>
</nav>
<div class="produkt view large-9 medium-8 columns content">
    <h3><?= h($produkt->id_prod) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nazwa') ?></th>
            <td><?= h($produkt->nazwa_prod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Opis') ?></th>
            <td><?= h($produkt->opis_prod) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Podkategoria') ?></th>
            <td><?= h($podkategorie_array[$produkt->id_podkateg]) ?></td>
        </tr>
        
        
       
        
        <tr>
            <th scope="row">Parametry produktu na : </span><input type='number' id='gramatura_ilosc' value='100' style="display: inline-block; width: 100px;">g/ml</th>
            <td></td>
        </tr>
        
        <?php if(isset($htmlParam) && $htmlParam != ''){
            foreach($htmlParam as $key => $Param){
            
                echo "<tr><th>".$Param.": <input type='text' class='gramatura_ilosc' placeholder=".$wartosc[$key]." value=".$wartosc[$key]." style='display: inline-block; width: 45px;' disabled>".$skrot[$key]."</th><td>";
                
                if($this->request->session()->read('User.rola') == 'admin')
                echo '<a href="/kalkulator/produkt/view_edytuj_param/'.$produkt->id_prod.'/'.$key.'">Edytuj<a> <a href="/kalkulator/produkt/view_usun_param/'.$produkt->id_prod.'/'.$key.'"> Usuń<a>';
                
                echo '</td></tr>';
            }
        }
        ?>
        
         <?php if($this->request->session()->read('User.rola') == 'admin'){ ?>
        
        <tr>
           <th scope="row">Edytuj parametr na 100g/100ml produktu:</th> 
           <td>
               <div class="produkt view large-12 medium-12 columns content">
               <?= $this->Form->create($produkt) ?>
               
               <?php if(isset($ProduktParam->id_prod) && $ProduktParam->id_prod != ''){
                        $id_prod = $ProduktParam->id_prod;
                     }
                    else{
                        $id_prod = '';
                    }
                    
                    
                     if(isset($ProduktParam->wartosc) && $ProduktParam->wartosc != ''){
                        $wartosc = $ProduktParam->wartosc;
                     }
                    else{
                        $wartosc = '';
                    }
                   
                ?>
                    <input type="hidden" name="id_prod" value=<?= $this->Number->format($id_prod) ?>>
               <div class="produkt view large-3 medium-4 columns">
                   <input type="number" name="wartosc" value=<?= ($wartosc) ?>>
               </div>
               <div class="produkt view large-4 medium-4 columns">
               <?php
                
                    if(isset($ProdParamArray)){
                            
                        if(isset($ProduktParam->id_param)){
                            $selected = $produkt->id_param;
                        }
                        else{
                            $selected = '';
                        }
                        
                        echo $this->Form->select('id_param', $ProdParamArray, ['empty' => false, 'value' => $selected, 'readonly' => true ]);
                    }
                    else{
                        $ProdParamArray = '';
                        echo $this->Form->select('id_param', $ProdParamArray, ['empty' => false, 'disabled' => true]);
                    }
                    

                ?>
               </div>
                <div class="produkt view large-5 medium-5 columns">
                <?= $this->Form->button(__('Zapisz')) ?>
                <?= $this->Form->end() ?>
                <?php 
                    echo '<a href="/kalkulator/produkt/view/'.$produkt->id_prod.'">Anuluj<a>';
                ?>
               </div>
               </div>
            </td>
        </tr>
        
        <?php } ?>
        
    </table>
    
    
</div>



<script>
    
    $( "#gramatura_ilosc" ).on('change', function() {
         ilosc_gram = $( "#gramatura_ilosc" ).val();
         
         
         
         $( ".gramatura_ilosc" ).each(function(  ) {
             
            
            ilosc_gram_parametru  = ( ( $(this).attr('placeholder') * ilosc_gram ) /100 );
            $(this).val(ilosc_gram_parametru);
          });
         
         
         
     });
</script>
