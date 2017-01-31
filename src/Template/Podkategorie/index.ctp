<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <?php if(isset($rola) && $rola == 'admin'){
            echo "<li>". $this->Html->link(__('Nowa podkategoria'), ['action' => 'add'])."</li>";
        } ?>
        <li><a href="/kalkulator/kategorie/">Wyświetl kategorie</a></li>
        <li><a href="/kalkulator/produkt/">Wyświetl produkty</a></li>
    </ul>
</nav>
<div class="podkategorie index large-9 medium-8 columns content">
    <h3><?= __('Podkategorie') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_podkateg', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nazwa_podkateg', 'Nazwa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_kateg', 'Kategoria') ?></th>
                <th scope="col" class="actions"><?= __('Akcje') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($podkategorie as $podkategorie): ?>
            <tr>
                <td><?= $this->Number->format($podkategorie->id_podkateg) ?></td>
                <td><?= h($podkategorie->nazwa_podkateg) ?></td>
                <td><?= h($podkategorie->id_kateg. ' ' . $kategorie_array[$podkategorie->id_kateg]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Wyświetl'), ['action' => 'view', $podkategorie->id_podkateg]) ?>
                    <?php if(isset($rola) && $rola == 'admin'){ ?>
                    <?= $this->Html->link(__('Edytuj'), ['action' => 'edit', $podkategorie->id_podkateg]) ?>
                    <?= $this->Form->postLink(__('Usuń'), ['action' => 'delete', $podkategorie->id_podkateg], ['confirm' => __('Czy jesteś pewny że chcesz usunąc # {0}?', $podkategorie->id_podkateg)]) ?>
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
