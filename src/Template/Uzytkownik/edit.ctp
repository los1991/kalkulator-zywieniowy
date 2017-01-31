<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'Usuń', $uzytkownik->id_uzytk],
                ['confirm' => __('Czy na pewno chcesz usunąć użytkownika # {0}?', $uzytkownik->id_uzytk)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista Użytkowników'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="uzytkownik form large-9 medium-8 columns content">
    <?= $this->Form->create($uzytkownik) ?>
    <fieldset>
        <legend><?= __('Edytuj Użytkownika') ?></legend>
        <?php
            echo $this->Form->input('login');
        ?>
            
        <?php
            echo $this->Form->input('email');
       ?>
            <div class="input text required">
            <label for="rola">Rola</label>
            <select name="rola">
                        <option value="user" <?php if($uzytkownik->rola == 'user') echo 'selected'; ?>  >Użytkownik</option>
                        <option value="admin" <?php if($uzytkownik->rola == 'admin') echo 'selected'; ?> >Administrator</option>
                        
            </select>
        </div>
       <?php
            echo $this->Form->input('wiek');
            echo $this->Form->input('wzorst');
            echo $this->Form->input('waga');
        ?>
        
        <div class="input text required">
            <label for="rola">Płeć</label>
            <select name="plec" value="">
                        <option value="Mężczyzna"  <?php if($uzytkownik->plec == 'Mężczyzna') echo 'selected'; ?>  >Mężczyzna</option>
                        <option value="Kobieta" <?php if($uzytkownik->plec == 'Kobieta') echo 'selected'; ?> >Kobieta</option>
                        
            </select>
        </div>
        
        <?php
            echo $this->Form->input('zap_kalorie');
            echo $this->Form->input('zap_bialko');
            echo $this->Form->input('zap_wegle');
            echo $this->Form->input('zap_tluszcz');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zapisz')) ?>
    <?= $this->Form->end() ?>
</div>
