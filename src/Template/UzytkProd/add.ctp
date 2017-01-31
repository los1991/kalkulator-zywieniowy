<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Uzytk Prod'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="uzytkProd form large-9 medium-8 columns content">
    <?= $this->Form->create($uzytkProd) ?>
    <fieldset>
        <legend><?= __('Add Uzytk Prod') ?></legend>
        <?php
            echo $this->Form->input('id_uzytk');
            echo $this->Form->input('id_prod');
            echo $this->Form->input('posilek');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
