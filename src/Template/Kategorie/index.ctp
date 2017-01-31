<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <?php if(isset($rola) && $rola == 'admin'){
            echo "<li>". $this->Html->link(__('Nowa kategoria'), ['action' => 'add'])."</li>";
        } ?>
        <li><a href="/kalkulator/produkt/">Wyświetl produkty</a></li>
        <li><a href="/kalkulator/podkategorie/">Wyświetl podkategorie</a></li>
    </ul>
</nav>
<div class="kategorie index large-9 medium-8 columns content">
    <h3><?= __('Kategorie') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_kateg', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nazwa_kateg', 'Nazwa') ?></th>
                <th scope="col" class="actions"><?= __('Akcje') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kategorie as $kategorie): ?>
            <tr>
                <td><?= $this->Number->format($kategorie->id_kateg) ?></td>
                <td><?= h($kategorie->nazwa_kateg) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Wyświetl'), ['action' => 'view', $kategorie->id_kateg]) ?>
                    <?php if(isset($rola) && $rola == 'admin'){ ?>
                    <?= $this->Html->link(__('Edytuj'), ['action' => 'edit', $kategorie->id_kateg]) ?>
                    <?= $this->Form->postLink(__('Usuń'), ['action' => 'delete', $kategorie->id_kateg], ['confirm' => __('Czy jesteś pewny że chcesz usunąć # {0}?', $kategorie->id_kateg)]) ?>
                    <?php } ?>
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
