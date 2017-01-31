<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <?php if(isset($rola) && $rola == 'admin'){ ?>
        <li><?= $this->Html->link(__('Edytuj Kategorie'), ['action' => 'edit', $kategorie->id_kateg]) ?> </li>
        <li><?= $this->Form->postLink(__('Usuń Kategorie'), ['action' => 'delete', $kategorie->id_kateg], ['confirm' => __('Are you sure you want to delete # {0}?', $kategorie->id_kateg)]) ?> </li>
        <li><?= $this->Html->link(__('Nowa Kategoria'), ['action' => 'add']) ?> </li>
        <?php } ?>
        <li><?= $this->Html->link(__('Lista Kategorii'), ['action' => 'index']) ?> </li>
        
    </ul>
</nav>
<div class="kategorie view large-9 medium-8 columns content">
    <h3><?= h($kategorie->id_kateg) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($kategorie->id_kateg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nazwa') ?></th>
            <td><?= h($kategorie->nazwa_kateg) ?></td>
        </tr>
        
    </table>
</div>
