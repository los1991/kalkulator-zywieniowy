<div class="uzytkownik form large-12 medium-12 columns content">
    <?= $this->Form->create($uzytkownik) ?>
    <fieldset>
        <legend><?= __('Rejestracja uzytkownika') ?></legend>
        <?php
            echo $this->Form->input('login');
        ?>
            <div class="input text required">
                    <label for="haslo">Hasło</label>
                        <input name="haslo" id="haslo" type="password">
            </div>
            <input name="rola" value="user" type="hidden">
        <?php
            echo $this->Form->input('email');
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
    <?= $this->Form->button(__('Zarejestruj')) ?>
    <?= $this->Form->end() ?>
</div>
