<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Nawigacja') ?></li>
        <li><?= $this->Html->link(__('Lista Użytkowników'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="uzytkownik form large-9 medium-8 columns content">
    <?= $this->Form->create($uzytkownik) ?>
    <fieldset>
        <legend><?= __('Dodaj Użytkownika') ?></legend>
        
        <?php
            echo $this->Form->input('login');
        ?>
        <div class="input text required">
            <label for="rola">Hasło</label>
            <input type="password" name="haslo">
        </div>
        <?php
            echo $this->Form->input('email');
        ?>
        <div class="input text required">
            <label for="rola">Rola</label>
            <select name="rola" value="">
                        <option value="user" selected="">Użytkownik</option>
                        <option value="admin">Administrator</option>
                        
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
                        <option value="Mężczyzna" selected="">Mężczyzna</option>
                        <option value="Kobieta">Kobieta</option>
                        
            </select>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Dodaj')) ?>
    <?= $this->Form->end() ?>
</div>
