<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestupdatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestupdatesTable Test Case
 */
class RequestupdatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestupdatesTable
     */
    public $Requestupdates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Requestupdates',
        'app.Requests',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Requestupdates') ? [] : ['className' => RequestupdatesTable::class];
        $this->Requestupdates = TableRegistry::getTableLocator()->get('Requestupdates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Requestupdates);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
