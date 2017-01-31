<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
       
        Kalkulator żywieniowy
    </title>
    <?= $this->Html->meta('icon') ?>
    <?php echo $this->Html->script('jquery-3.1.1.slim.min'); ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-10 medium-10 columns">
            <li class="name large-2 medium-2 columns">

                <?php if($this->request->session()->read('User.login')){
                        echo '<h1><a href="/kalkulator/uzytkownik/zapotrzebowanie">Strona główna</a></h1>';
                    }
                    else{
                       echo '<h1><a href="/kalkulator/uzytkownik/login">Strona główna</a></h1>'; 
                    }
                ?>
                
            </li>
            <li class="name large-3 medium-4 columns end">
                <h1><a href="/kalkulator/produkt/">Katalog produktów i kategorii</a></h1>
            </li>
           
            <?php if($this->request->session()->read('User.rola') == 'admin'){
                echo '<li class="name large-2 medium-2 columns end">
                
                <h1><a href="/kalkulator/uzytkownik/">Użytkownicy</a></h1>
                </li>
                <li class="name large-2 medium-2 columns end">
                
                <h1><a href="/kalkulator/parametry/">Parametry</a></h1>
                </li>';
                }
            ?>
            
            <li class="name large-3 medium-4 columns end">
                <form method="get" accept-charset="utf-8" action="/kalkulator/produkt/index">                
                    <input name="szukaj" value="" placeholder="Wyszukaj produkt" type="text" style='width: 50%; float: left;'>
                    <button type="submit">Szukaj</button>    
                 </form>   
            </li>
             
        </ul>
                
        <div class="top-bar-section">
            <ul class="right">
                
                <?php
                    if($this->request->session()->read('User.login')){
                        echo '<li><a href="/kalkulator/uzytkownik/ustawienia">Zalogowano jako: '.$this->request->session()->read('User.login').'</a></li>';
                        echo '<li><a href="/kalkulator/uzytkownik/logout">Wyloguj</a></li>';
                    }
                ?>
                
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
