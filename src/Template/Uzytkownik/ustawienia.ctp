<div class="uzytkownik form large-12 medium-12 columns content">
    <?= $this->Form->create($uzytkownik) ?>

    <fieldset>
        <legend><a href="/kalkulator/uzytkownik/ustawienia">Edytuj swoje dane</a> <a href="/kalkulator/uzytkownik/haslo"> Zmiana hasła</a></legend>
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
    <?= $this->Form->button(__('Zapisz')) ?>
    <?= $this->Form->end() ?>
</div>

