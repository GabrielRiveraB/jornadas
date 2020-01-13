<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PetitionersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PetitionersTable Test Case
 */
class PetitionersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PetitionersTable
     */
    public $Petitioners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Petitioners',
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
        $config = TableRegistry::getTableLocator()->exists('Petitioners') ? [] : ['className' => PetitionersTable::class];
        $this->Petitioners = TableRegistry::getTableLocator()->get('Petitioners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Petitioners);

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
