<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <?php if(isset($rola) && $rola == 'admin'){
            echo "<li>". $this->Html->link(__('Nowy użytkownik'), ['action' => 'add'])."</li>";
        } ?>
    </ul>
</nav>
<div class="uzytkownik index large-9 medium-8 columns content">
    <h3><?= __('Uzytkownik') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_uzytk', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login') ?></th>
<!--                <th scope="col"><?= $this->Paginator->sort('haslo') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rola') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wiek') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wzorst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waga') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plec') ?></th>
<!--                <th scope="col"><?= $this->Paginator->sort('zap_kalorie', 'Kalorie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zap_bialko', 'Białko') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zap_wegle', 'Węgle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zap_tluszcz', 'Tłuszcz') ?></th>-->
                <th scope="col" class="actions"><?= __('Akcje') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uzytkownik as $uzytkownik): ?>
            <tr>
                <td><?= $this->Number->format($uzytkownik->id_uzytk) ?></td>
                <td><?= h($uzytkownik->login) ?></td>

                <td><?= h($uzytkownik->email) ?></td>
                <td><?php if(isset($uzytkownik->rola) && $uzytkownik->rola == 'user') echo 'Użytkownik';
                        elseif(isset($uzytkownik->rola) && $uzytkownik->rola == 'admin'){
                            echo 'Administrator';
                        }
                        else{
                            echo '';
                        }
                ?>
                </td>
                <td><?= $this->Number->format($uzytkownik->wiek) ?></td>
                <td><?= $this->Number->format($uzytkownik->wzorst) ?></td>
                <td><?= $this->Number->format($uzytkownik->waga) ?></td>
                <td><?= h($uzytkownik->plec) ?></td>
<!--                <td><?= $this->Number->format($uzytkownik->zap_kalorie) ?></td>
                <td><?= $this->Number->format($uzytkownik->zap_bialko) ?></td>
                <td><?= $this->Number->format($uzytkownik->zap_wegle) ?></td>
                <td><?= $this->Number->format($uzytkownik->zap_tluszcz) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('Wyświetl'), ['action' => 'view', $uzytkownik->id_uzytk]) ?>
                    <?= $this->Html->link(__('Edytuj'), ['action' => 'edit', $uzytkownik->id_uzytk]) ?>
                    <?= $this->Form->postLink(__('Usuń'), ['action' => 'delete', $uzytkownik->id_uzytk], ['confirm' => __('Czy jesteś pewny że chcesz usunąć # {0}?', $uzytkownik->id_uzytk)]) ?>
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
