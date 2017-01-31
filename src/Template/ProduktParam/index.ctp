<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produkt Param'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produktParam index large-9 medium-8 columns content">
    <h3><?= __('Produkt Param') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_prod_param') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_prod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_param') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produktParam as $produktParam): ?>
            <tr>
                <td><?= $this->Number->format($produktParam->id_prod_param) ?></td>
                <td><?= $this->Number->format($produktParam->id_prod) ?></td>
                <td><?= $this->Number->format($produktParam->id_param) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produktParam->id_prod_param]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produktParam->id_prod_param]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produktParam->id_prod_param], ['confirm' => __('Are you sure you want to delete # {0}?', $produktParam->id_prod_param)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
