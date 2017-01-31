<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <?php if(isset($rola) && $rola == 'admin'){ ?>
        <li><?= $this->Html->link(__('Edytuj Podkategorie'), ['action' => 'edit', $podkategorie->id_podkateg]) ?> </li>
        <li><?= $this->Form->postLink(__('Usuń Podkategorie'), ['action' => 'delete', $podkategorie->id_podkateg], ['confirm' => __('Are you sure you want to delete # {0}?', $podkategorie->id_podkateg)]) ?> </li>
        <li><?= $this->Html->link(__('Dodaj Podkategorie'), ['action' => 'add']) ?> </li>
        
        <?php } ?>
        <li><?= $this->Html->link(__('Lista Podkategorii'), ['action' => 'index']) ?> </li>
        
    </ul>
</nav>
<div class="podkategorie view large-9 medium-8 columns content">
    <h3><?= h($podkategorie->id_podkateg) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($podkategorie->id_podkateg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nazwa') ?></th>
            <td><?= h($podkategorie->nazwa_podkateg) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Kategoria') ?></th>
            <td><?= h($kategorie_array[$podkategorie->id_kateg]) ?></td>
        </tr>
    </table>
</div>
