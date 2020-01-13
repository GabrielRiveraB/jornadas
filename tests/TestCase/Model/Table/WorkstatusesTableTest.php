<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkstatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkstatusesTable Test Case
 */
class WorkstatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkstatusesTable
     */
    public $Workstatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Workstatuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Workstatuses') ? [] : ['className' => WorkstatusesTable::class];
        $this->Workstatuses = TableRegistry::getTableLocator()->get('Workstatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Workstatuses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
