<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <li><?= $this->Html->link(__('Lista Parametrów'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="parametry form large-9 medium-8 columns content">
    <?= $this->Form->create($parametry) ?>
    <fieldset>
        <legend><?= __('Dodaj Parametr') ?></legend>
        <?php
            echo $this->Form->input('nazwa_param');
            echo $this->Form->input('nazwa_jedno');
            echo $this->Form->input('skrot_jedno');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Dodaj')) ?>
    <?= $this->Form->end() ?>
</div>
