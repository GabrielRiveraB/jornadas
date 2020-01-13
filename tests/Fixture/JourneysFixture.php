<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JourneysFixture
 */
class JourneysFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'municipio' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'from' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'to' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'map' => ['type' => 'string', 'length' => 250, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'municipio' => 'Lorem ipsum dolor ',
                'date' => '2020-01-10 22:45:29',
                'from' => '22:45:29',
                'to' => '22:45:29',
                'map' => 'Lorem ipsum dolor sit amet',
                'created' => '2020-01-10',
                'modified' => '2020-01-10',
            ],
        ];
        parent::init();
    }
}
