<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConceptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConceptsTable Test Case
 */
class ConceptsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConceptsTable
     */
    public $Concepts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Concepts',
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
        $config = TableRegistry::getTableLocator()->exists('Concepts') ? [] : ['className' => ConceptsTable::class];
        $this->Concepts = TableRegistry::getTableLocator()->get('Concepts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Concepts);

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
