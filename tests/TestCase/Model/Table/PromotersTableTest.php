<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PromotersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PromotersTable Test Case
 */
class PromotersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PromotersTable
     */
    public $Promoters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Promoters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Promoters') ? [] : ['className' => PromotersTable::class];
        $this->Promoters = TableRegistry::getTableLocator()->get('Promoters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Promoters);

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
