<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Uzytk Prod'), ['action' => 'edit', $uzytkProd->id_uzytk_prod]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Uzytk Prod'), ['action' => 'delete', $uzytkProd->id_uzytk_prod], ['confirm' => __('Are you sure you want to delete # {0}?', $uzytkProd->id_uzytk_prod)]) ?> </li>
        <li><?= $this->Html->link(__('List Uzytk Prod'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Uzytk Prod'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="uzytkProd view large-9 medium-8 columns content">
    <h3><?= h($uzytkProd->id_uzytk_prod) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Uzytk Prod') ?></th>
            <td><?= $this->Number->format($uzytkProd->id_uzytk_prod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Uzytk') ?></th>
            <td><?= $this->Number->format($uzytkProd->id_uzytk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Prod') ?></th>
            <td><?= $this->Number->format($uzytkProd->id_prod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Posilek') ?></th>
            <td><?= $this->Number->format($uzytkProd->posilek) ?></td>
        </tr>
    </table>
</div>
