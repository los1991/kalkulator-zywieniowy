<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <li><?= $this->Html->link(__('Edytuj Parametr'), ['action' => 'edit', $parametry->id_param]) ?> </li>
        <li><?= $this->Form->postLink(__('Usuń Parametr'), ['action' => 'delete', $parametry->id_param], ['confirm' => __('Czy jesteś pewny że chcesz usunąć # {0}?', $parametry->id_param)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Parametrów'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nowy Parametr'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parametry view large-9 medium-8 columns content">
    <h3><?= h($parametry->id_param) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nazwa parametru') ?></th>
            <td><?= h($parametry->nazwa_param) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nazwa jednostki') ?></th>
            <td><?= h($parametry->nazwa_jedno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skrót jednostki') ?></th>
            <td><?= h($parametry->skrot_jedno) ?></td>
        </tr>
    </table>
</div>
