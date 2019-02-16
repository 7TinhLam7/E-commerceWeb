<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NhaccTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NhaccTable Test Case
 */
class NhaccTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NhaccTable
     */
    public $Nhacc;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nhacc',
        'app.sanpham',
        'app.binhluan',
        'app.users',
        'app.roles',
        'app.dong',
        'app.loai',
        'app.nhom',
        'app.hangsx'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nhacc') ? [] : ['className' => NhaccTable::class];
        $this->Nhacc = TableRegistry::get('Nhacc', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nhacc);

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
