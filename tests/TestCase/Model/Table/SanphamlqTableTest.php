<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SanphamlqTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SanphamlqTable Test Case
 */
class SanphamlqTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SanphamlqTable
     */
    public $Sanphamlq;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sanphamlq',
        'app.sanphams',
        'app.nhaccs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sanphamlq') ? [] : ['className' => SanphamlqTable::class];
        $this->Sanphamlq = TableRegistry::get('Sanphamlq', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sanphamlq);

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
