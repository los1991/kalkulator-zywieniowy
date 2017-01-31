<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PodkategorieFixture
 *
 */
class PodkategorieFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'podkategorie';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_podkateg' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nazwa_podkateg' => ['type' => 'string', 'length' => 40, 'null' => false, 'default' => null, 'collate' => 'utf8_polish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_kateg' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_kateg' => ['type' => 'index', 'columns' => ['id_kateg'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_podkateg'], 'length' => []],
            'podkategorie_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_kateg'], 'references' => ['kategorie', 'id_kateg'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_podkateg' => 1,
            'nazwa_podkateg' => 'Lorem ipsum dolor sit amet',
            'id_kateg' => 1
        ],
    ];
}
