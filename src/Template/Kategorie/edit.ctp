<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <li><?= $this->Form->postLink(
                __('Usuń'),
                ['action' => 'delete', $kategorie->id_kateg],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kategorie->id_kateg)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista Kategorii'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="kategorie form large-9 medium-8 columns content">
    <?= $this->Form->create($kategorie) ?>
    <fieldset>
        <legend><?= __('Edycja Kategorii') ?></legend>
        <?php
            echo $this->Form->input('nazwa_kateg');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zapisz')) ?>
    <?= $this->Form->end() ?>
</div>
