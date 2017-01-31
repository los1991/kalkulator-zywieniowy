<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Uzytk Prod'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="uzytkProd index large-9 medium-8 columns content">
    <h3><?= __('Uzytk Prod') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_uzytk_prod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_uzytk') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_prod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('posilek') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uzytkProd as $uzytkProd): ?>
            <tr>
                <td><?= $this->Number->format($uzytkProd->id_uzytk_prod) ?></td>
                <td><?= $this->Number->format($uzytkProd->id_uzytk) ?></td>
                <td><?= $this->Number->format($uzytkProd->id_prod) ?></td>
                <td><?= $this->Number->format($uzytkProd->posilek) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $uzytkProd->id_uzytk_prod]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $uzytkProd->id_uzytk_prod]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $uzytkProd->id_uzytk_prod], ['confirm' => __('Are you sure you want to delete # {0}?', $uzytkProd->id_uzytk_prod)]) ?>
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
