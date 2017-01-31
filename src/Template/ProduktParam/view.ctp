<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produkt Param'), ['action' => 'edit', $produktParam->id_prod_param]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produkt Param'), ['action' => 'delete', $produktParam->id_prod_param], ['confirm' => __('Are you sure you want to delete # {0}?', $produktParam->id_prod_param)]) ?> </li>
        <li><?= $this->Html->link(__('List Produkt Param'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produkt Param'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produktParam view large-9 medium-8 columns content">
    <h3><?= h($produktParam->id_prod_param) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Prod Param') ?></th>
            <td><?= $this->Number->format($produktParam->id_prod_param) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Prod') ?></th>
            <td><?= $this->Number->format($produktParam->id_prod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Param') ?></th>
            <td><?= $this->Number->format($produktParam->id_param) ?></td>
        </tr>
    </table>
</div>
