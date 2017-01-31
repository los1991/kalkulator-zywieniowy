<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Lista Podkategorii'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="podkategorie form large-9 medium-8 columns content">
    <?= $this->Form->create($podkategorie) ?>
    <fieldset>
        <legend><?= __('Dodaj Podkategorie') ?></legend>
        <?php
            echo $this->Form->input('nazwa_podkateg');
        ?>
            <div class="input text required">
                <label for="id_kateg-podkateg">Kategoria</label>
                <?php
                    if(isset($kategorie)){
                        echo $this->Form->select('id_kateg', $kategorie, ['empty' => false]);
                    }
                    else{
                        $kategorie = '';
                        echo $this->Form->select('id_kateg', $kategorie, ['empty' => false, 'disabled' => true]);
                    }
                ?>
            </div>
    </fieldset>
    <?= $this->Form->button(__('Dodaj')) ?>
    <?= $this->Form->end() ?>
</div>
