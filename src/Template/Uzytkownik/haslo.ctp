<div class="uzytkownik form large-12 medium-12 columns content">
    <?= $this->Form->create($uzytkownik) ?>

    <fieldset>
        <legend><a href="/kalkulator/uzytkownik/ustawienia">Edytuj swoje dane</a> <a href="/kalkulator/uzytkownik/haslo"> Zmiana hasła</a></legend>
            <div class="input text">
                    <label for="haslo">Hasło</label>
                        <input name="haslo" id="haslo" type="password">
                </div>
               <div class="input text">
                    <label for="haslo">Powtórz hasło</label>
                        <input name="haslo2" id="haslo2" type="password">
                </div>

    </fieldset>
    <?= $this->Form->button(__('Zapisz')) ?>
    <?= $this->Form->end() ?>
</div>
