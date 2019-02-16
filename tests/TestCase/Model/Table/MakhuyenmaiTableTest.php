<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MakhuyenmaiTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MakhuyenmaiTable Test Case
 */
class MakhuyenmaiTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MakhuyenmaiTable
     */
    public $Makhuyenmai;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.makhuyenmai',
        'app.khuyenmais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Makhuyenmai') ? [] : ['className' => MakhuyenmaiTable::class];
        $this->Makhuyenmai = TableRegistry::get('Makhuyenmai', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Makhuyenmai);

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
