<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MauTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MauTable Test Case
 */
class MauTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MauTable
     */
    public $Mau;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mau',
        'app.sanpham',
        'app.sanphamcc',
        'app.nhacc',
        'app.sanphamcc',
        'app.hinh',
        'app.dong',
        'app.loai',
        'app.nhom',
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
        $config = TableRegistry::exists('Mau') ? [] : ['className' => MauTable::class];
        $this->Mau = TableRegistry::get('Mau', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mau);

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
