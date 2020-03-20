<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DependenciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DependenciesTable Test Case
 */
class DependenciesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DependenciesTable
     */
    public $Dependencies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Dependencies',
        'app.Activities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dependencies') ? [] : ['className' => DependenciesTable::class];
        $this->Dependencies = TableRegistry::getTableLocator()->get('Dependencies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dependencies);

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
