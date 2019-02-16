<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhankhucTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhankhucTable Test Case
 */
class PhankhucTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhankhucTable
     */
    public $Phankhuc;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.phankhuc',
        'app.dong',
        'app.loai',
        'app.nhom',
        'app.sanpham',
        'app.sanphamcc',
        'app.nhacc',
        'app.sanphamcc',
        'app.hinh',
        'app.hangsx',
        'app.users',
        'app.roles',
        'app.binhluan'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Phankhuc') ? [] : ['className' => PhankhucTable::class];
        $this->Phankhuc = TableRegistry::get('Phankhuc', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Phankhuc);

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
