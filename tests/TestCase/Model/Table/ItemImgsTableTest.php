<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemImgsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemImgsTable Test Case
 */
class ItemImgsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemImgsTable
     */
    public $ItemImgs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_imgs',
        'app.items',
        'app.item_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItemImgs') ? [] : ['className' => 'App\Model\Table\ItemImgsTable'];
        $this->ItemImgs = TableRegistry::get('ItemImgs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemImgs);

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
