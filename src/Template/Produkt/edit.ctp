<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <li><?= $this->Form->postLink(
                __('Usuń'),
                ['action' => 'delete', $produkt->id_prod],
                ['confirm' => __('Czy jesteś pewny, że chcesz usunąc # {0}?', $produkt->id_prod)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista Produktów'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="produkt form large-9 medium-8 columns content">
    <?= $this->Form->create($produkt) ?>
    <fieldset>
        <legend><?= __('Edytuj Produkt') ?></legend>
        <?php
            echo $this->Form->input('nazwa_prod');
            echo $this->Form->input('opis_prod');
        ?>
        
        <div class="input text required">
                <label for="id_podkateg-podkateg">Podkategoria</label>
                <?php
                
                    if(isset($podkategorie)){
                        echo $this->Form->select('id_podkateg', $podkategorie, ['empty' => false, 'value' => $produkt->id_podkateg]);
                    }
                    else{
                        $podkategorie = '';
                        echo $this->Form->select('id_podkateg', $podkategorie, ['empty' => false, 'disabled' => true]);
                    }
                    

                ?>
            </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
