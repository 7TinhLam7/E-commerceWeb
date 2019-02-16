<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HinhTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HinhTable Test Case
 */
class HinhTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HinhTable
     */
    public $Hinh;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hinh',
        'app.sanphams'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hinh') ? [] : ['className' => HinhTable::class];
        $this->Hinh = TableRegistry::get('Hinh', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hinh);

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
