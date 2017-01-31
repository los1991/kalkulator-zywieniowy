<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Uzytkownik'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="uzytkownik index large-9 medium-8 columns content">
    <h3><?= __('Uzytkownik') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_uzytk') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('haslo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wiek') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wzorst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waga') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plec') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zap_kalorie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zap_bialko') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zap_wegle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zap_tluszcz') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uzytkownik as $uzytkownik): ?>
            <tr>
                <td><?= $this->Number->format($uzytkownik->id_uzytk) ?></td>
                <td><?= h($uzytkownik->login) ?></td>
                <td><?= h($uzytkownik->haslo) ?></td>
                <td><?= h($uzytkownik->email) ?></td>
                <td><?= $this->Number->format($uzytkownik->wiek) ?></td>
                <td><?= $this->Number->format($uzytkownik->wzorst) ?></td>
                <td><?= $this->Number->format($uzytkownik->waga) ?></td>
                <td><?= h($uzytkownik->plec) ?></td>
                <td><?= $this->Number->format($uzytkownik->zap_kalorie) ?></td>
                <td><?= $this->Number->format($uzytkownik->zap_bialko) ?></td>
                <td><?= $this->Number->format($uzytkownik->zap_wegle) ?></td>
                <td><?= $this->Number->format($uzytkownik->zap_tluszcz) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $uzytkownik->id_uzytk]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $uzytkownik->id_uzytk]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $uzytkownik->id_uzytk], ['confirm' => __('Are you sure you want to delete # {0}?', $uzytkownik->id_uzytk)]) ?>
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
