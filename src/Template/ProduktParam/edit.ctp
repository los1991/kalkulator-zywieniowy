<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produktParam->id_prod_param],
                ['confirm' => __('Are you sure you want to delete # {0}?', $produktParam->id_prod_param)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Produkt Param'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="produktParam form large-9 medium-8 columns content">
    <?= $this->Form->create($produktParam) ?>
    <fieldset>
        <legend><?= __('Edit Produkt Param') ?></legend>
        <?php
            echo $this->Form->input('id_prod');
            echo $this->Form->input('id_param');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
