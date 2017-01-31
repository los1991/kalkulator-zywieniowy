<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $uzytkProd->id_uzytk_prod],
                ['confirm' => __('Are you sure you want to delete # {0}?', $uzytkProd->id_uzytk_prod)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Uzytk Prod'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="uzytkProd form large-9 medium-8 columns content">
    <?= $this->Form->create($uzytkProd) ?>
    <fieldset>
        <legend><?= __('Edit Uzytk Prod') ?></legend>
        <?php
            echo $this->Form->input('id_uzytk');
            echo $this->Form->input('id_prod');
            echo $this->Form->input('posilek');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
