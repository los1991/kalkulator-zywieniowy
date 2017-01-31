<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <?php if(isset($rola) && $rola == 'admin'){
            echo "<li>". $this->Html->link(__('Nowy produkt'), ['action' => 'add'])."</li>";
        } ?>
        <li><a href="/kalkulator/kategorie/">Wyświetl kategorie</a></li>
        <li><a href="/kalkulator/podkategorie/">Wyświetl podkategorie</a></li>
    </ul>
</nav>
<div class="produkt index large-9 medium-8 columns content">
    <h3><?= __('Produkt') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_prod', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nazwa_prod', 'Nazwa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opis_prod', 'Opis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_podkateg', 'Podkategoria') ?></th>

                <th scope="col" class="actions"><?= __('Akcje') ?></th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produkt as $produkt): ?>
            <tr>
                <td><?= $this->Number->format($produkt->id_prod) ?></td>
                <td><?= h($produkt->nazwa_prod) ?></td>
                <td><?= h($produkt->opis_prod) ?></td>
                <td><?= h($produkt->id_podkateg. ' - ' . $podkategorie_array[$produkt->id_podkateg]) ?></td>
                
                
                
                <td class="actions">
                    <?= $this->Html->link(__('Wyświetl'), ['action' => 'view', $produkt->id_prod]) ?>
                
                    <?php if($this->request->session()->read('User.rola') == 'admin'){ ?>
                    
                    <?= $this->Html->link(__('Edytuj'), ['action' => 'edit', $produkt->id_prod]) ?>
                    <?= $this->Form->postLink(__('Usuń'), ['action' => 'delete', $produkt->id_prod], ['confirm' => __('Czy jesteś pewny, że chesz usunąć # {0}?', $produkt->id_prod)]) ?>
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
