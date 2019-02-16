<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoaiTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoaiTable Test Case
 */
class LoaiTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoaiTable
     */
    public $Loai;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loai'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Loai') ? [] : ['className' => LoaiTable::class];
        $this->Loai = TableRegistry::get('Loai', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loai);

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
