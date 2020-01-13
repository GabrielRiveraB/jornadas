<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JourneysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JourneysTable Test Case
 */
class JourneysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JourneysTable
     */
    public $Journeys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Journeys',
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
        $config = TableRegistry::getTableLocator()->exists('Journeys') ? [] : ['className' => JourneysTable::class];
        $this->Journeys = TableRegistry::getTableLocator()->get('Journeys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Journeys);

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
