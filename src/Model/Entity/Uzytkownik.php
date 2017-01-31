<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Uzytkownik Entity
 *
 * @property int $id_uzytk
 * @property string $login
 * @property string $haslo
 * @property string $email
 * @property int $wiek
 * @property int $wzorst
 * @property int $waga
 * @property string $plec
 * @property int $zap_kalorie
 * @property int $zap_bialko
 * @property int $zap_wegle
 * @property int $zap_tluszcz
 * @property string $rola
 * @property int $zap_wzor
 */
class Uzytkownik extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id_uzytk' => false
    ];
    
    protected function _setHaslo($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
        
    }
}
