<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UzytkProdFixture
 *
 */
class UzytkProdFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'uzytk_prod';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_uzytk_prod' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_uzytk' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_prod' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'posilek' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_uzytk' => ['type' => 'index', 'columns' => ['id_uzytk'], 'length' => []],
            'id_prod' => ['type' => 'index', 'columns' => ['id_prod'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_uzytk_prod'], 'length' => []],
            'uzytk_prod_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_uzytk'], 'references' => ['uzytkownik', 'id_uzytk'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'uzytk_prod_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_prod'], 'references' => ['produkt', 'id_prod'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_polish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id_uzytk_prod' => 1,
            'id_uzytk' => 1,
            'id_prod' => 1,
            'posilek' => 1
        ],
    ];
}
