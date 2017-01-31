<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProduktParamFixture
 *
 */
class ProduktParamFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'produkt_param';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_prod_param' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_prod' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_param' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_prod' => ['type' => 'index', 'columns' => ['id_prod'], 'length' => []],
            'id_param' => ['type' => 'index', 'columns' => ['id_param'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_prod_param'], 'length' => []],
            'produkt_param_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_prod'], 'references' => ['produkt', 'id_prod'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'produkt_param_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_param'], 'references' => ['parametry', 'id_param'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_prod_param' => 1,
            'id_prod' => 1,
            'id_param' => 1
        ],
    ];
}
