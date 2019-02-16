<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DanhgiaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DanhgiaTable Test Case
 */
class DanhgiaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DanhgiaTable
     */
    public $Danhgia;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.danhgia',
        'app.users',
        'app.roles',
        'app.binhluan',
        'app.sanpham',
        'app.sanphamcc',
        'app.nhacc',
        'app.sanphamcc',
        'app.hangsx',
        'app.phankhuc',
        'app.dong',
        'app.loai',
        'app.nhom',
        'app.mau',
        'app.sanphams',
        'app.diemdgs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Danhgia') ? [] : ['className' => DanhgiaTable::class];
        $this->Danhgia = TableRegistry::get('Danhgia', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Danhgia);

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
