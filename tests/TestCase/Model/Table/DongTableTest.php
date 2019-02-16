<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DongTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DongTable Test Case
 */
class DongTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DongTable
     */
    public $Dong;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dong'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dong') ? [] : ['className' => DongTable::class];
        $this->Dong = TableRegistry::get('Dong', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dong);

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
