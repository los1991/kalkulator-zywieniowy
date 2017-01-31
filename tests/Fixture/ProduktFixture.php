<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProduktFixture
 *
 */
class ProduktFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'produkt';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_prod' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nazwa_prod' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_polish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'opis_prod' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_polish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_podkateg' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_podkateg' => ['type' => 'index', 'columns' => ['id_podkateg'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_prod'], 'length' => []],
            'produkt_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_podkateg'], 'references' => ['podkategorie', 'id_podkateg'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_prod' => 1,
            'nazwa_prod' => 'Lorem ipsum dolor sit amet',
            'opis_prod' => 'Lorem ipsum dolor sit amet',
            'id_podkateg' => 1
        ],
    ];
}
