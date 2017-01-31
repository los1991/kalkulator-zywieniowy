<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Produkt'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="produkt form large-9 medium-8 columns content">
    <?= $this->Form->create($produkt) ?>
    <fieldset>
        <legend><?= __('Add Produkt') ?></legend>
        <?php
            echo $this->Form->input('nazwa_prod');
            echo $this->Form->input('opis_prod');
            //echo $this->Form->input('id_podkateg');
         ?>
         
            <div class="input text required">
                <label for="id_podkateg-podkateg">Podkategoria</label>
                <?php
                
                    if(isset($podkategorie)){
                        echo $this->Form->select('id_podkateg', $podkategorie, ['empty' => false]);
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
