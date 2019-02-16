<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SanphamTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SanphamTable Test Case
 */
class SanphamTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SanphamTable
     */
    public $Sanpham;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sanpham',
        'app.binhluan',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sanpham') ? [] : ['className' => SanphamTable::class];
        $this->Sanpham = TableRegistry::get('Sanpham', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sanpham);

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
