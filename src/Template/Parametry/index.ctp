<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <?php if(isset($rola) && $rola == 'admin'){
            echo "<li>". $this->Html->link(__('Nowy parametr'), ['action' => 'add'])."</li>";
        } ?>
    </ul>
</nav>
<div class="parametry index large-9 medium-8 columns content">
    <h3><?= __('Parametry') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_param', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nazwa_param', 'Nazwa parametru') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nazwa_jedno', 'Nazwa jednostki') ?></th>
                <th scope="col"><?= $this->Paginator->sort('skrot_jedno', 'Skrót jednostki') ?></th>
                <th scope="col" class="actions"><?= __('Akcje') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametry as $parametry): ?>
            <tr>
                <td><?= $this->Number->format($parametry->id_param) ?></td>
                <td><?= h($parametry->nazwa_param) ?></td>
                <td><?= h($parametry->nazwa_jedno) ?></td>
                <td><?= h($parametry->skrot_jedno) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Wyświetl'), ['action' => 'view', $parametry->id_param]) ?>
                    <?= $this->Html->link(__('Edytuj'), ['action' => 'edit', $parametry->id_param]) ?>
                    <?= $this->Form->postLink(__('Usuń'), ['action' => 'delete', $parametry->id_param], ['confirm' => __('Czy jesteś pewny że chcesz usunąć # {0}?', $parametry->id_param)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('pierwsza')) ?>
            <?= $this->Paginator->prev('< ' . __('poprzednia')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('następna') . ' >') ?>
            <?= $this->Paginator->last(__('ostatnia') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Strona {{page}} z {{pages}}, wyświetlane {{current}} wierszy z {{count}}')]) ?></p>
    </div>
</div>
