<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HangsxTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HangsxTable Test Case
 */
class HangsxTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HangsxTable
     */
    public $Hangsx;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Hangsx') ? [] : ['className' => HangsxTable::class];
        $this->Hangsx = TableRegistry::get('Hangsx', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hangsx);

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
