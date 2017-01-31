<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JednostkiFixture
 *
 */
class JednostkiFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'jednostki';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_jedno' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nazwa_jedno' => ['type' => 'string', 'length' => 25, 'null' => false, 'default' => null, 'collate' => 'utf8_polish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'skrot_jedno' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_polish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_jedno'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf32_polish_ci'
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
            'id_jedno' => 1,
            'nazwa_jedno' => 'Lorem ipsum dolor sit a',
            'skrot_jedno' => 'Lorem ip'
        ],
    ];
}
