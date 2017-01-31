<div class="uzytkownik form large-12 medium-12 columns content">
    <div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Zaloguj się') ?></legend>
            <?php 
                echo $this->Form->input('login');  ?>
                
                <div class="input text">
                    <label for="haslo">Hasło</label>
                        <input name="haslo" id="haslo" type="password">
                </div>

            <a href="/kalkulator/uzytkownik/rejestracja">Rejestracja</a>
        </fieldset>
    <?= $this->Form->button(__('Zaloguj')) ?>
    <?= $this->Form->end() ?>
    </div>
    
</div>
