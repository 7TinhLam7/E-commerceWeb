<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NhomTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NhomTable Test Case
 */
class NhomTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NhomTable
     */
    public $Nhom;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nhom'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nhom') ? [] : ['className' => NhomTable::class];
        $this->Nhom = TableRegistry::get('Nhom', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nhom);

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
