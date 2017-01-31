<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <li><?= $this->Html->link(__('Edytuj Użytkownika'), ['action' => 'edit', $uzytkownik->id_uzytk]) ?> </li>
        <li><?= $this->Form->postLink(__('Usuń Użytkownika'), ['action' => 'delete', $uzytkownik->id_uzytk], ['confirm' => __('Czy na pewno chcesz usunąć użytkownika # {0}?', $uzytkownik->id_uzytk)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Użytkowników'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nowy Użytkownik'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="uzytkownik view large-9 medium-8 columns content">
    <h3><?= h($uzytkownik->id_uzytk) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Uzytk') ?></th>
            <td><?= $this->Number->format($uzytkownik->id_uzytk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login') ?></th>
            <td><?= h($uzytkownik->login) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($uzytkownik->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rola') ?></th>
            <td><?php if(isset($uzytkownik->rola) && $uzytkownik->rola == 'user') echo 'Użytkownik';
                        elseif(isset($uzytkownik->rola) && $uzytkownik->rola == 'admin'){
                            echo 'Administrator';
                        }
                        else{
                            echo '';
                        }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plec') ?></th>
            <td><?= h($uzytkownik->plec) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Wiek') ?></th>
            <td><?= $this->Number->format($uzytkownik->wiek) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wzorst') ?></th>
            <td><?= $this->Number->format($uzytkownik->wzorst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waga') ?></th>
            <td><?= $this->Number->format($uzytkownik->waga) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zap Kalorie') ?></th>
            <td><?= $this->Number->format($uzytkownik->zap_kalorie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zap Bialko') ?></th>
            <td><?= $this->Number->format($uzytkownik->zap_bialko) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zap Wegle') ?></th>
            <td><?= $this->Number->format($uzytkownik->zap_wegle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zap Tluszcz') ?></th>
            <td><?= $this->Number->format($uzytkownik->zap_tluszcz) ?></td>
        </tr>
    </table>
</div>
